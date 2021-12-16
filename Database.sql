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

use db_blood_bank1;

insert into blood_bank values
('B1','Spandana Hospital','bloodbank@spandana.com',1234567890,'Rajajinagara, Bengaluru','1999-03-01','Open','spandana@123');
insert into blood_bank values
('B2','Kanva Hospital','bloodbank1@kanvahospitals.com',9878656432,'Kamlanagara, Bengaluru','2008-12-04','Open','kanva@123');
insert into blood_bank values
('B3','Kanva Hospital','bloodbank2@kanvahospitals.com',9878654322,'Maruthi Nagar, Bengaluru','2008-12-04','Open','kanva@123');
insert into blood_bank values
('B4','Ramaiah Hospital','blood_bank@ramaiah.in',7654321123,'BEL Circle, Bengaluru;','1976-11-14','Open','ramaiah@1976');
insert into blood_bank values
('B5','Appolo Hospital','blood_bankA12@appolo.com',8765432451,'Sheshadripuram, Bengaluru','1993-02-28','Closed','appolobloodbank@1993');
insert into blood_bank values
('B6','Appolo Hospital','blood_bankA24@appolo.com',8765432452,'Shivajinagar, Bengaluru','1993-02-28','Open','appolobloodbank@1993');
insert into blood_bank values
('B7','Appolo Hospital','blood_bankA36@appolo.com',8765432453,'Tambaram, Chennai','1970-02-28','Open','appolobloodbank@1970');
insert into blood_bank values
('PTH3216','People Tree Hospital','bloodbank32@peopletree.com',9845698456,'Yelhanka, Bengaluru','2015-05-05','Open','peopletree@2011');
insert into blood_bank values
('B9','People Tree Hospital','bloodbank00@peopletree.com',9845698456,'Goraguntepalya, Bengaluru','2011-05-05','Open','peopletree@2011');


insert into bank_staff values
('S1','B1','Rajan Sha','rajansha@gmail.com',9876545678,'1997-08-21','M','AB+','Ramdevnagara','rajansha123','Administrator','',0,'Existing');
insert into bank_staff values
('S2','B1','James Potter','jamespotter@gmail.com',8601498981,'2000-07-10','M','O+','Bengaluru','James12345','Data entry','',0,'Existing');
insert into bank_staff values
('S3','B1','Bharghhav M','bharghav@gmail.com',7209879007,'1999-02-02','M','B-','Bengaluru','Bharghav123','Data entry','',0,'Existing');
insert into bank_staff values
('S4','B4','Prashanth S','prashusvjp@gmail.com',9113042617,'2001-08-21','M','O+','Bengaluru','prashusvjp','Data entry','',0,'Existing');
insert into bank_staff values
('S5','B4','Jyothi R','jyothir@gmail.com',9876789876,'1998-01-19','F','O+','Bengaluru','jr1998','Administrator','',0,'Existing');
insert into bank_staff values
('S6','B7','Prashanth','prashanth1380@gmail.com',7828348229,'1980-03-01','M','A-','Adayar, Chennai','prasahnth123','Data entry','',0,'Existing');
insert into bank_staff values
('S7','B5','Rashmika','rashmika@gmail.com',7828348229,'1990-12-12','F','A+','Kanteerava Studio, Bengaluru','rashmika123','Lab Technician','',0,'Existing');
insert into bank_staff values
('S8','B9','Ramesh P','rameshp@peopletree.com',9878923451,'1982-05-21','F','A-','Goraguntepalya, Bengaluru','ramesh123','Administrator','',0,'Existing');


insert into doner values
('D1','Aashish','ashish@gmail.com',8908765454,'1984-07-08','M','B-','Maruthi nagar','');
insert into doner values
('D2','Sathish','sathish@gmail.com',8908123454,'1975-05-13','M','B+','Rajajinagar','');
insert into doner values
('D3','Prashanth','prashanth1380@gmail.com',9113042617,'2001-08-21','M','O+','Rajajinagar','');
insert into doner values
('D4','Jyothi R','jyothir@gmail.com',9876789876,'1998-01-19','F','O+','Peenya','');
insert into doner values
('D5','Manasa','manasa@gmail.com',8908123454,'2001-03-17','F','B-','K R Market','');

insert into inventory values
('I1','2021-10-12','AB-','Plasma','B3','D4','In-stock','');
insert into inventory values
('I2','2021-10-12','AB-','RBC','B3','D4','In-stock','');
insert into inventory values
('I3','2019-12-14','O-','Plasma','B5','D2','In-stock','');
insert into inventory values
('I4','2019-12-14','AB-','RBC','B5','D2','In-stock','');
insert into inventory values
('I5','2021-08-12','AB-','RBC','B4','D5','In-stock','');


insert into requests values
('R1','AB-','Plasma',1,'2021-10-16','Processing','B6');
insert into requests values
('R2','AB-','RBC',1,'2021-10-16','Delivered','B6');
insert into requests values
('R3','O+','RBC',1,'2021-10-16','Delivered','B4');
insert into requests values
('R4','A+','RBC',1,'2021-10-16','Processing','B5');
insert into requests values
('R5','AB-','RBC',2,'2021-10-16','Delivered','B7');

insert into transactions values
('T1','R2','B3','B6',981.00,'2021-12-16');
insert into transactions values
('T2','R5','B3','B7',1962.00,'2021-12-16');

