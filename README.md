# PHP-IP-Block-System

An PHP and SQL system designed to block IP adresses automatically when obtaining unauthorized access in webpages, etc. 

# Usage

To include the script that scans for blocked IPs in your file, copy the PHP code in the script ipfind.php and paste it into your file at the very top.
Don`t  forget to tweak the SQL connection settings in the php scripts!

# How to install?

Firstly, download the ZIP file. UnZIP it and then run the SQL file in your database at PHPMyAdmin or MySQL, then upload the PHP files to your web server for it to serve. In the PHP files, you are going to change the server name, password, username and database which correspond to yoour MySQL/MariaDB server.
In `ipfind.php` you are going to copy the code at the very top and paste it into the PHP file you want to protect from bad actors.  `ipfind.php` is just a test file that I made.
