CREATE DATABASE BCSdb;
GRANT USAGE ON *.* TO 'assignmentUser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON BCSdb.* TO 'assignmentUser'@'localhost';
FLUSH PRIVILEGES;

USE BCSdb;
CREATE TABLE Users(
ID INT AUTO_INCREMENT PRIMARY KEY,
username varchar(15) UNIQUE,
password varchar(15)
);

USE BCSdb;
CREATE TABLE books(
ID INT AUTO_INCREMENT PRIMARY KEY,
title varchar(50),
description varchar(200),
author varchar(50),
genre varchar(200),
cover varchar(200)
);

INSERT INTO books VALUES
(1, "Book 1", "Description 1", "Author 1", "Action", "img/default.jpg"),
(2, "Book 2", "Description 2", "Author 2", "Action", "img/default.jpg"),
(3, "Book 3", "Description 3", "Author 3", "Horror", "img/default.jpg")
;