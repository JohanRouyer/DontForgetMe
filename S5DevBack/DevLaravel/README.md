# DON'T FORGET ME

## À propos de DON'T FORGET ME

Dans le cadre de leurs activités, de nombreux professionnels recevant des clients ont exprimés leur mécontentement face à des rendez-vous non honorés. <br>
Ces absences représentent un manque à gagner considérable et nuisent à leur organisation. <br>
Pour répondre à ce problème, le projet Dont Forget Me vise à développer une solution complète permettant à ces professionnels : <br>
•    Gérer leurs rendez-vous selon leurs besoins spécifiques, <br>
•    Envoyer automatiquement des rappels à leurs clients par mail ou par SMS. <br>

Le projet se structure en deux volets principaux : <br>
### 1. Application web : une plateforme en ligne responsive permettant : <br>
• l’inscription des professionnels, <br>
• la gestion des rendez-vous et des plannings, <br>
• la consultation et la gestion des informations clients. <br>

### 2.Configuration d’un Raspberry Pi : <br>
Ce dispositif communiquera avec l’application web pour récupérer les données des clients pour leur envoyer des notifications par mail ou par SMS afin de les inciter à honorer leur rendez-vous. <br>

Ce projet vise donc à offrir une solution d’intermédiation simple et efficace entre des professionnels proposant des services et des clients souhaitant y accéder en ayant pour objectif d’améliorer l’organisation des premiers et accompagner les seconds dans leur expérience de prise de rendez-vous pour une prestation.

## Installation

### installation VPS

### 1. Connexion au VPS(ubuntu 24.04 LTS (Noble Numbat) + SSH) via SSH 

Connectez-vous à votre VPS en utilisant SSH : 

```
ssh root@votre-ip
``` 
 
Mettre les paquets à jour : 

```
sudo apt update && sudo apt upgrade -y
```
 

### 2. Installation de Nginx 

Installez Nginx : 

```
sudo apt install nginx -y
```

Vérifiez que Nginx fonctionne : 

```
systemctl status nginx
``` 

Accédez à votre serveur via l’adresse IP pour vérifier l’installation nginx par défaut. 

### 3. Lier un nom de domaine au serveur 

Configurez votre nom de domaine en créant un enregistrement A (dans votre DNS) qui pointe vers l’adresse IP de votre VPS. 

Testez la résolution DNS (peut prendre entre 2h a 24h): 

https://dnschecker.org/ 

```
ping votre-domaine.com
``` 
 
### 4. Mise en place des certificats SSL (Let's Encrypt) 

Installez Certbot et son plugin pour Nginx : 

```
sudo apt install certbot python3-certbot-nginx -y
```
 
Générez et appliquez un certificat SSL : 

```
sudo certbot --nginx -d votre-domaine.com -d www.votre-domaine.com
``` 
 
Testez le renouvellement automatique : 

```
sudo certbot renew --dry-run
``` 
 
### 5. Suppression du site par défaut 

Désactivez la configuration par défaut : 
```
sudo rm /etc/nginx/sites-enabled/default 
sudo rm /etc/nginx/sites-available/default 
```
Redémarrez Nginx pour appliquer les changements :  

```
sudo systemctl restart nginx
``` 
 
### 6. Cloner le projet Laravel 

Accédez au dossier où vous souhaitez cloner le projet : 

```
cd /var/www/
``` 
 
Installer et Clonez le dépôt Git : 

```
sudo apt install git -y  
git clone https://github.com/JohanRouyer/DontForgetMe.git 
```
Naviguez dans le dossier du projet backend : 

```
cd DontForgetMe/S5DevBack/DevLaravel/
``` 
 
### 7. Installer les dépendances Laravel 

Installez Composer si ce n’est pas encore fait : 

```
sudo apt install composer -y
``` 
 
Installez les dépendances du projet : 

```
composer install
``` 
 
Installez les extensions manquantes avec la commande suivante : 

```
sudo apt update 

sudo apt install php8.3-fpm 

sudo systemctl enable php8.3-fpm 

sudo apt install php8.3-xml 

sudo apt install php8.3-mysql 
 ```
Générez une clé d’application Laravel : 

```
php artisan key:generate
``` 
 
### 8. Configurer la base de données 

```
sudo apt install mysql-server -y
``` 

#### 1. Connectez-vous à MySQL avec un utilisateur ayant les privilèges appropriés (par exemple, root) : 

```
mysql -u root -p
``` 
 

##### 2. Créez la base de données. Utilisez le même nom que celui spécifié dans votre fichier .env (dans cet exemple : bd_dfm) : 

```
CREATE DATABASE bd_dfm;
``` 

#### 3. Créez un utilisateur MySQL dédié et attribuez-lui des droits : 
```
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'mot_de_passe'; 
GRANT ALL PRIVILEGES ON bd_dfm.* TO 'laravel_user'@'localhost'; 
FLUSH PRIVILEGES; 
 ```

Remplacez laravel_user et mot_de_passe par vos propres valeurs. 

#### 4. Quittez MySQL : 

```
EXIT;
``` 


Modifiez le fichier .env pour configurer les informations de connexion à la base de données . 

Exemple de configuration dans le fichier .env : 

```
APP_NAME=Laravel APP_ENV=local APP_KEY=base64:vSaIcedhMRoXcZ4bX0pG6Oa/eb3Q/6D6ErC6uiVBV7s= APP_DEBUG=true APP_URL=https://dontforgetme.online 

LOG_CHANNEL=stack LOG_DEPRECATIONS_CHANNEL=null LOG_LEVEL=debug 

DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=bd_dfm DB_USERNAME=laravel_user DB_PASSWORD=mot_de_passe 

CACHE_DRIVER=file SESSION_DRIVER=file SESSION_LIFETIME=120 

REDIS_HOST=127.0.0.1 REDIS_PASSWORD=null REDIS_PORT=6379 

MAIL_MAILER=smtp MAIL_HOST=mailhog MAIL_PORT=1025 MAIL_USERNAME=null MAIL_PASSWORD=null MAIL_ENCRYPTION=null MAIL_FROM_ADDRESS=null MAIL_FROM_NAME="${APP_NAME}" 

AWS_ACCESS_KEY_ID= AWS_SECRET_ACCESS_KEY= AWS_DEFAULT_REGION=us-east-1 AWS_BUCKET= AWS_USE_PATH_STYLE_ENDPOINT=false 

PUSHER_APP_ID= PUSHER_APP_KEY= PUSHER_APP_SECRET= PUSHER_APP_CLUSTER=mt1 

VITE_APP_NAME="${APP_NAME}" 
```
 

Appliquez les migrations pour créer les tables nécessaires : 

```
php artisan migrate
``` 
 

### 9. Configurer Nginx pour le projet Laravel 

Créez un nouveau fichier de configuration Nginx : 

```
sudo nano /etc/nginx/sites-available/dontforgetme
```
 
Ajoutez la configuration suivante : 
```
server { listen 443 ssl; server_name dontforgetme.online www.dontforgetme.online; 

ssl_certificate /etc/letsencrypt/live/dontforgetme.online/fullchain.pem; 
ssl_certificate_key /etc/letsencrypt/live/dontforgetme.online/privkey.pem; 
 
root /var/www/DontForgetMe/S5DevBack/DevLaravel/public; 
index index.php index.html; 
 
location / { 
    try_files $uri $uri/ /index.php?$query_string; 
} 
 
location ~ \.php$ { 
    include snippets/fastcgi-php.conf; 
    fastcgi_pass unix:/var/run/php/php8.3-fpm.sock; 
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; 
    include fastcgi_params; 
} 
 
location ~ /\.ht { 
    deny all; 
} 
  

} 
```
Activez la configuration et redémarrez Nginx : 
```
sudo ln -s /etc/nginx/sites-available/dontforgetme /etc/nginx/sites-enabled/ 
sudo systemctl restart nginx 
 ```
### 10. Configurer les permissions 

Laravel nécessite que certains dossiers aient les bonnes permissions pour fonctionner correctement (notamment les dossiers storage et bootstrap/cache) : 
```
sudo chown -R www-data:www-data /var/www/DontForgetMe/S5DevBack/DevLaravel 
sudo chmod -R 775 /var/www/DontForgetMe/S5DevBack/DevLaravel/storage 
sudo chmod -R 775 /var/www/DontForgetMe/S5DevBack/DevLaravel/bootstrap/cache 
 ```
### 11. Activer SSL (Let's Encrypt) 

Installez Certbot si ce n’est pas fait : 

```
sudo apt install certbot python3-certbot-nginx -y
```
 
Activez SSL pour le domaine : 

```
sudo certbot --nginx -d votre-domaine.com -d www.votre-domaine.com
```
 
Vérifiez que le certificat est actif : 

```
sudo certbot renew --dry-run
```

