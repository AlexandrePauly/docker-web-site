-- Suppression de la base de données si elle existe déjà --
drop database if exists Fauget;

-- Création de la base de données --
create database Fauget;

-- Utilisation de la base de données --
use Fauget;

-- Création de la table Products --
CREATE TABLE Products(
    idProducts  int PRIMARY KEY AUTO_INCREMENT,
    product     varchar(100) NOT NULL,
    link        varchar(100) NOT NULL,
    alt         varchar(100) NOT NULL,
    price       decimal(6,2) NOT NULL
);

-- Création de la table Accessories --
CREATE TABLE Accessories(
    idAccessories   int PRIMARY KEY,

    CONSTRAINT Accessories FOREIGN KEY (idAccessories)
                references Products (idProducts)
);

-- Création de la table Clothes --
CREATE TABLE Clothes(
    idClothes   int PRIMARY KEY,

    CONSTRAINT Clothes_idClothes FOREIGN KEY (idClothes)
                references Products (idProducts)
);

-- Création de la table Customs --
CREATE TABLE Customs(
    idCustoms   int PRIMARY KEY, 

    CONSTRAINT Customs_idClothes FOREIGN KEY (idCustoms)
                references Products (idProducts)
);

-- Création de la table Shoes --
CREATE TABLE Shoes(
    idShoes     int PRIMARY KEY AUTO_INCREMENT,

    CONSTRAINT Shoes_idClothes FOREIGN KEY (idShoes)
                references Products (idProducts)
);

-- Création de la table Stock --
CREATE TABLE Stock(
    idSize      varchar(3),
    idProducts  int,
    quantity    int NOT NULL,

    CONSTRAINT Stock_idSize_idClothes PRIMARY KEY (idSize, idProducts),
    CONSTRAINT Stock_idProducts FOREIGN KEY (idProducts)
                references Products (idProducts),
    CONSTRAINT Stock_quantity CHECK (quantity >= 0)
);

-- Création de la table User --
CREATE TABLE User(
    email           varchar(30) PRIMARY KEY,
    nameUser        varchar(30) NOT NULL,
    surnameUser     varchar(30) NOT NULL,
    birthday        date NOT NULL,
    passworduser    varchar(15)

);