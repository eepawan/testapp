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

 _And copy .env.example sample content and paste into .env file and change some configuration as you wanted._
 _ then run command : sudo chmod -R 777 .env_
 _then run command: php artisan key:generate_
    
_Then cd into project direcoty and run the below command_
- `php artisan migrate`    
    








