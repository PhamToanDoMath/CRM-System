Hướng dẫn khởi tạo môi trường trên Linux:

Bước 1: Cài đặt PHP và MySQL <br>
apt install php7.2 php7.2-xml php7.2-mbstring php7.2-mysql php7.2-json php7.2-curl php7.2-cli php7.2-common php7.1-mcrypt php7.2-gd libapache2-mod-php7.2 php7.2-zip<br>
apt-get install mysql-server<br>

Bước 2a: Kéo repo về <br>
Bước 2b: Di chuyển vào thư mục vừa kéo về <br>
cd CRM-System<br>

Bước 3: Copy file .env<br>
copy .env.example .env<br>

Bước 4: Điều chỉnh trên file .env như sau:<br>
DB_HOST=localhost<br>
DB_DATABASE=laravel<br>

Bước 5: Chạy dịch vụ mySQL trên linux<br>
service mysql start<br>

Bước 6:Truy cập mySQL<br>
mysql -u root -p<br>

Bước 7: Nhập lệnh dưới vào mysql CLI<br>
CREATE DATABASE laravel;<br>
exit;<br>

Bước 8: Khởi tạo database trên MySQL<br>
php artisan migrate<br>

Bước 9: Chạy web<br>
php artisan serve<br>
