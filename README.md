Hướng dẫn khởi tạo môi trường trên Linux:

Bước 1: Cài đặt PHP và MySQL <br>
<code>apt-get install mysql-server </code> <br>
<code>sudo apt install php7.4 php7.4-common php7.4-cli php7.4-xml php7.4-curl php7.4-json php7.4-gd php7.4-mbstring php7.4-intl 
php7.4-bcmath php7.4-bz2 php7.4-readline php7.4-zip php7.4-mysql</code><br>
Bước 1b: Cài đặt composer<br>
<code> curl -sS https://getcomposer.org/installer | php </code><br>
<code> mv composer.phar /usr/bin/composer</code> <br>

Bước 2a: Kéo repo về <br>
Bước 2b: Di chuyển vào thư mục vừa kéo về <br>
<code>cd CRM-System</code><br>
Bước 2c: Tải vendors về <br>
<code>composer install</code><br>

Bước 3: Copy file .env<br>
<code>copy .env.example .env</code><br>

Bước 4: Điều chỉnh trên file .env như sau:<br>
DB_HOST=localhost<br>
DB_DATABASE=laravel<br>

Bước 5: Chạy dịch vụ mySQL trên linux<br>
<code>service mysql start</code><br>

Bước 6:Truy cập mySQL<br>
<code>mysql -u root -p</code><br>

Bước 7: Nhập lệnh dưới vào mysql CLI<br>
CREATE DATABASE laravel;<br>
exit;<br>

Bước 8: Khởi tạo database trên MySQL<br>
<code>php artisan migrate --seed</code><br>

Bước 9: Chạy web<br>
<code>php artisan serve</code><br>
