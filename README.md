Hướng dẫn khởi tạo môi trường trên Linux:

Bước 1: Cài đặt PHP và MySQL
apt install php7.2 php7.2-xml php7.2-mbstring php7.2-mysql php7.2-json php7.2-curl php7.2-cli php7.2-common php7.1-mcrypt php7.2-gd libapache2-mod-php7.2 php7.2-zip
apt-get instal mysql-server

Bước 2a: Kéo repo về 
Bước 2b: Di chuyển vào thư mục vừa kéo về 
cd CRM-System

Bước 3: Copy file .env
copy .env.example .env

Bước 4: Điều chỉnh trên file .env như sau:
DB_HOST=localhost
DB_DATABASE=laravel

Bước 5: Chạy dịch vụ mySQL trên linux
service mysql start

Bước 6:Truy cập mySQL
mysql -u root -p

Bước 7: Nhập lệnh dưới vào mysql CLI
CREATE DATABASE laravel;
exit;

Bước 8: Khởi tạo database trên MySQL
php artisan migrate

Bước 9: Chạy web
php artisan serve
