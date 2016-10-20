drop table if exists biere_table;
create table biere_table (
id integer not null primary key auto_increment,
date datetime not null,
lieu varchar(50) not null,
type varchar(50) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;
