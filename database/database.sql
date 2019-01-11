CREATE DATABASE php_crud_mysql;
USE php_crud_mysql;
CREATE TABLE task (
	id Int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	title VARCHAR(255) ,
	description TEXT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
