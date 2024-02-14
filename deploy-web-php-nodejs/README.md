# Deploy WEB-PHP NODE.js PHPMYADMIN MYSQL
### Prerequisites
 - Linux OS Ubunto v.20 
 - web php 
 - node.js 
 - spec
   - CPU 2 core 
   - RAM 4 GB
   - DISK 50 GB
### STEP 1 Set Tool บนเครื่อง Linux
#### install docker
[Link Docker official ](https://docs.docker.com/engine/install/ubuntu/)

1). Install using the apt repository
```bash
# Add Docker's official GPG key:
sudo apt-get update
sudo apt-get install ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc

# Add the repository to Apt sources:
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
```

![result](./images/Screenshot%202567-02-11%20at%2021.41.11.png)
2). Install the Docker packages.
 - Install docker engine docker-compose containerd
```bash
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```
- check status docker 
```bash
systemctl status docker
```
![result](./images/Screenshot%202567-02-11%20at%2021.47.11.png)
#### Deploy Apply
- Setup phpmysql+mysql
  - สร้าง forlder phpmysql
```bash
mkdir phpmysql 
```
```bash
cd ./phpmysql 
```
 - สร้างไฟล์ docker-compose.yaml
```bash
vi docker-compose.yaml
```
ตัวอย่าง file : docker-compose.yaml ตาม folder  ที่เตรียมไว้ให้
- ใช้คำสั่งเพื่อ up docker-compose.yaml
```bash
docker compose up -d 
```
check container 
```bash
docker ps -a 
```
result ตัวอย่าง
![result container image running](./images/Screenshot%202567-02-12%20at%2000.36.17.png)

3). Nginx
- Front-End
[Link Ref ](https://www.theserverside.com/blog/Coffee-Talk-Java-News-Stories-and-Opinions/Nginx-PHP-FPM-config-example)
install nginx
```bash
sudo apt-get install nginx -y
```
```bash
sudo systemctl status nginx
```
![status nginx](./images/Screenshot%202567-02-14%20at%2000.19.27.png)
install php8.1-fpm
```bash
sudo apt-get install php8.1-fpm -y
```
```bash
sudo systemctl status php8.1-fpm
```
![status nginx](./images/Screenshot%202567-02-14%20at%2000.20.11.png)
set Config file Nginx  ให้สามารถ Run Php ได้
```bash
sudo vi /etc/nginx/sites-available/default
```
```bash
server {
  # Example PHP Nginx FPM config file
  listen 80 default_server;
  listen [::]:80 default_server;
  root /var/www/html;

  # Add index.php to setup Nginx, PHP & PHP-FPM config
  index index.php index.html index.htm index.nginx-debian.html;

  server_name _;

  location / {
    try_files $uri $uri/ =404;
  }

  # pass PHP scripts on Nginx to FastCGI (PHP-FPM) server
  location ~ \.php$ {
    include snippets/fastcgi-php.conf;

    # Nginx php-fpm sock config:
    fastcgi_pass unix:/run/php/php8.1-fpm.sock;
    # Nginx php-cgi config :
    # Nginx PHP fastcgi_pass 127.0.0.1:9000;
  }

  # deny access to Apache .htaccess on Nginx with PHP, 
  # if Apache and Nginx document roots concur
  location ~ /\.ht {
    deny all;
  }
} # End of PHP FPM Nginx config example
```
restart nginx
```bash
sudo systemctl restart nginx
```
set permission ให้ path เพื่อวาง file php /var/www/html
```bash
sudo chmod -R 777 /var/www/html
```
เข้าไปข้าง folder /var/www/html
```bash 
cd /var/www/html
```
Create fil :index.php
```bash
vi ./info.php
```
และใส่ code เพื่อนำไปเทส

```bash
<?php 
phpinfo(); 
?>
```
ลองเปิดหน้าเว็บ <IP-MECHINE> ตัวอย่าง 10.222.14.1
![status nginx](./images/Screenshot%202567-02-14%20at%2000.26.54.png)
- Back-End
สร้าง Folder backend-app
```bash
mkdir backend-app
```
เข้าไปข้าง Folder 
```bash
cd ./backend-app
```
สร้าง docker-compose.yaml และใส่ code ดังนี้
```yaml
version: '3.8'
services:
  backendapp:
    container_name: backendapp
    image: frongfrank17/ctv-pr:v.deploy1amd64
    restart: always
    environment:
      DB: DBCTC
      URL_DB: <IP-HOST>
      PORT_DB: 3333
      DB_USER: "root"
      DB_PASSWORD: "P@ssw0rd"
```
```bash
docker-compose up -d 
```