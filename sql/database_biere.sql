
create database if not exists biere character set utf8 collate utf8_unicode_ci;
use biere;

grant all privileges on biere.* to 'biere_user'@'localhost' identified by 'secret';



