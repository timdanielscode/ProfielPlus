/*
    create database
*/

CREATE DATABASE profileapp;

USE DATABASE profileapp;



/*
    USERS TABLE
*/

CREATE TABLE users (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    retypePassword VARCHAR(255) NOT NULL,
    createdAt DATETIME NOT NULL,
    updatedAt DATETIME NOT NULL
);


