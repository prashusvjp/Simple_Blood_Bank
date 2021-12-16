create database DB_Blood_Bank;

use DB_Blood_Bank;

create table Blood_Bank(
BankID varchar(20) primary key,
Bank_Name varchar(20) not null,
EmailID varchar(50) not null,
PhoneNo bigint not null,
Address varchar(50) not null,
Start_Date date not null,
Status varchar(20) not null,
Password varchar(30) not null);

create table Doner(
DonerID varchar(20) primary key,
Doner_Name varchar(50) not null,
EmailID varchar(50) not null,
PhoneNo bigint not null,
Date_Of_Birth date not null,
Gender char(1) not null,
Blood_Group varchar(3) not null,
Address varchar(50) not null,
Photo blob);

create table Bank_Staff(
StaffID varchar(20) primary key,
BankID varchar(20),
Staff_Name varchar(50) not null,
EmailID varchar(50) not null,
PhoneNo bigint not null,
Date_Of_Birth date not null,
Gender char(1) not null,
Blood_Group varchar(3) not null,
Address varchar(50) not null,
Password varchar(20) not null,
Role varchar(20) not null,
Photo blob,
salary float,
status varchar(20),
foreign key(BankID) references Blood_Bank(BankID));

create table Inventory(
StockID varchar(20) primary key,
Arrival_Date date not null,
Blood_Group varchar(3) not null,
Category varchar(20) not null,
BankID varchar(20),
DonerID varchar(20),
Status varchar(20) not null,
TransactionID varchar(20),
foreign key(BankID) references Blood_Bank(BankID),
foreign key(DonerID) references Doner(DonerID));

create table Requests(
RequestID varchar(20) primary key,
Blood_Group varchar(3) not null,
Category varchar(20) not null,
Quantity int not null,
Request_Date date not null,
Status varchar(20) not null,
Requesting_BankID varchar(20),
foreign key(Requesting_BankID) references Blood_Bank(BankID));

create table Transactions(
TransactionID varchar(20) primary key,
RequestID varchar(20),
From_BankID varchar(20),
To_BankID varchar(20),
Total_Amount real,
TransactionDate date not null,
foreign key(From_BankID) references Blood_Bank(BankID),
foreign key(To_BankID) references Blood_Bank(BankID));

show databases;