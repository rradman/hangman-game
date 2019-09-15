sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get -y install lamp-server^
sudo chmod 777 /var/www/html
sudo git clone https://robi92@bitbucket.org/robi92/public.git
sudo cp -r ~/public/Hangman/* /var/www/html
sudo mysql --user=root --password=root -e "create database projekt";
sudo mysql --user=root --password=root --default_character_set=utf8 projekt < /var/www/html/projekt.sql