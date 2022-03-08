# Introduction: 
The purpose of a CRM system is to store information regarding customers who have made
transactions with the restaurant. From there, it is possible to make a list of potential customers
for the restaurant so that reasonable business strategies can be devised. Therefore, within the
scope of this project, we perform some basic functions that a CRM system should have, including:
customer information management, order management, restaurant menu management, voucher
management,... 

In addition, this CRM system will also decentralize administration based on employee roles in the restaurant including: Owner, Clerk and Chef - each role will be limited
with only a handful of features to ensure the security of restaurant data.

# Get Started:

**Prequisite:**

* PHP and MySQL
```
apt-get install mysql-server
sudo apt install php7.4 php7.4-common php7.4-cli php7.4-xml php7.4-curl php7.4-json php7.4-gd php7.4-mbstring php7.4-intl 
php7.4-bcmath php7.4-bz2 php7.4-readline php7.4-zip php7.4-mysql
```

* Composer
``` 
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer
```

**Installation:**

1. Clone this repo

2. Move to the directory
```
cd CRM-System
```

3. Install dependency with composer
```
composer install
```
4. Create new .env file
```
cp .env.example .env
```

5. Modify .env file as follow:
```
DB_HOST=localhost<br>
DB_DATABASE=laravel<br>
```

6. Run MySQL service
```
service mysql start
```

7. Log in MySQL
```
mysql -u root -p
```

8. Create new database for laravel
```
CREATE DATABASE laravel;
exit;
```
9. Initialize database with Laravel Seeder
```
php artisan migrate --seed
```

10. Run local server
```
php artisan serve
```
