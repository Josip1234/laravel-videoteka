create user if not exists 'videoteka_user'@'localhost' identified by 'moviefan';
create database if  not exists videoteka_generalna character set utf8mb4 collate utf8mb4_unicode_ci;
grant all privileges on videoteka_generalna.* to 'videoteka_user'@'localhost';
