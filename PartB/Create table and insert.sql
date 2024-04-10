CREATE DATABASE GDPR;
CREATE TABLE users (
records INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
description VARCHAR(255)
);

INSERT INTO `users` (`username`, `password`, `description`) VALUES ('3190077','password1','User 1');
INSERT INTO `users` (`username`, `password`, `description`) VALUES ('admin','password2','Administration');
