create database registerDB;
use registerDB;

create table register(
ID int auto_increment primary key,
user varchar(50) not null unique,
password varchar(255) not null);
