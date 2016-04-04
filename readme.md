# TestApp

_Test app is a assingment.

## Setup

### System requirement
- Ubuntu 15.10
- Php version 5.6
- Apache any current version
- Mysql any current version

### Install system dependencies
-  `sudo apt-get update`
- `sudo apt-get install curl libc6 libcurl3 zlib1g apache2 php5 git libcurl3-dev php5-mcrypt php5-curl`
- `curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`

### Mysql

- `sudo apt-get install mysql-server php5-mysql`
- `mysql -uroot -p`
 _Enter password._
- `create DATABASE dbname;`

### Creating Project
_Now go to  https://github.com/phpmysqlexpert/testapp and download the zip file. unzip the file.

_Go to project path and run the following command.

- `sudo chmod -R 777 public/ storage/ bootstrap/`
 
- `composer install --no-scripts`


### Apache configuration
- `cd  /etc/apache2/sites-available/`
- `sudo nano 000-default.conf`

 _Change:_
 
> DocumentRoot /var/www/html 

 _To_
 
>  DocumentRoot /project path/public
 
 _Add following lines after DocumentRoot_
 
>           <Directory /project path/public>

>             AllowOverride All

>             Order Allow,Deny

>             Allow from all

>             Require all granted

>            </Directory>

_In case of if apache > 2.4 please use below configuration_

>           <Directory /project path/public>

>             DirectoryIndex index.php

>             AllowOverride All

>             Require all granted

>            </Directory>
          


- `sudo a2dissite 000-default.conf`
- `sudo a2ensite 000-default.conf`
- `sudo a2enmod rewrite`
-  `sudo service apache2 restart`



### Environment setup
##### Go to project directory.
- `sudo nano .env`

 _Add following configuration_
    
    APP_ENV=local
    APP_DEBUG=true
    APP_KEY=base64:aub+Jg1OfZ8FKLV/FL7zbYFx0abmMkl1wU3UC0h3XEE=
    APP_URL=http://localhost
    
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=dbname
    DB_USERNAME=dbuser
    DB_PASSWORD=dbpassword
    
    CACHE_DRIVER=file
    SESSION_DRIVER=file
    QUEUE_DRIVER=sync
    
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_DRIVER=smtp
    MAIL_HOST=mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    
_Then cd into project direcoty and run the below command_
- `php artisan migrate`    
    








