<?php
//include("../action/connect.php");
/*
$registrationTBL = "CREATE TABLE registration(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(100) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
phone VARCHAR(12) NOT NULL,
company VARCHAR(60) NOT NULL,
position ENUM('Sales Person','Sales Manager') NOT NULL DEFAULT 'Sales Person',
address VARCHAR(50) NOT NULL,
city VARCHAR(40) NOT NULL,
state VARCHAR(2) NOT NULL,
zipcode VARCHAR(5) NOT NULL,
country VARCHAR(50) NOT NULL,
registration_key VARCHAR(255) NOT NULL,
UNIQUE KEY email (email)
)ENGINE=InnoDB";
// Run query      
$registrationTBLQRY = mysql_query($registrationTBL) or die(mysql_error());
if($registrationTBLQRY === TRUE){
echo 'Registration table created<br />';
}else{
echo 'Registration table NOT created<br />';
};

/////////////////////////////////////////////////////////////////////////////////////////////////


$userTBL = "CREATE TABLE users(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(100) NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(120) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
company VARCHAR(60) NOT NULL,
position VARCHAR(80) NOT NULL,
website VARCHAR(60) NOT NULL,
address VARCHAR(50) NOT NULL,
city VARCHAR(40) NOT NULL,
state VARCHAR(2) NOT NULL,
zipcode VARCHAR(5) NOT NULL,
country VARCHAR(50) NOT NULL,
avatar ENUM('N','Y') NOT NULL DEFAULT 'N',
level INT(1) NOT NULL DEFAULT '3',
active ENUM('N','Y') NOT NULL DEFAULT 'Y',
UNIQUE KEY email (email)
)ENGINE=InnoDB";
// Run query      
$userTBLQRY = mysql_query($userTBL) or die(mysql_error());
if($userTBLQRY === TRUE){
echo 'Users table created<br />';
}else{
echo 'Users table NOT created<br />';
};

/////////////////////////////////////////////////////////////////////////////////////////////////

$leadsTBL = "CREATE TABLE leads(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
leadowner INT(255) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
month INT(2) NOT NULL,
day INT(2) NOT NULL,
year INT(4) NOT NULL,
company VARCHAR(60) NOT NULL,
website VARCHAR(100) NOT NULL,
title VARCHAR(30) NOT NULL,
email VARCHAR(100) NOT NULL,
phone VARCHAR(20) NOT NULL,
cell VARCHAR(20) NOT NULL,
address VARCHAR(100) NOT NULL,
city VARCHAR(50) NOT NULL,
state VARCHAR(10) NOT NULL,
zipcode VARCHAR(10) NOT NULL,
country VARCHAR(50) NOT NULL,
origin VARCHAR(250) NOT NULL,
status VARCHAR(50) NOT NULL DEFAULT 'PROSPECT',
added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
deleted ENUM('N', 'Y') DEFAULT 'N'
)ENGINE=InnoDB";
// Run query      
$leadsTBLQRY = mysql_query($leadsTBL) or die(mysql_error());
if($leadsTBLQRY === TRUE){
echo 'Leads table created<br />';
}else{
echo 'Leads table NOT created<br />';
};

/////////////////////////////////////////////////////////////////////////////////////////////////

$competitorsTBL = "CREATE TABLE competitors(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
lead_id INT(255) NOT NULL,
competitor VARCHAR(250) NOT NULL,
url VARCHAR(100) NOT NULL
)ENGINE=InnoDB";
// Run query      
$competitorsTBLQRY = mysql_query($competitorsTBL) or die(mysql_error());
if($competitorsTBLQRY === TRUE){
echo 'Competitors table created<br />';
}else{
echo 'Competitors table NOT created<br />';
};

/////////////////////////////////////////////////////////////////////////////////////////////////

$familyTBL = "CREATE TABLE family(
id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
lead_id INT(255) NOT NULL,
name VARCHAR(250) NOT NULL,
relationship VARCHAR(250) NOT NULL,
info TEXT NOT NULL,
dob_month INT(2) NOT NULL,
dob_day INT(2) NOT NULL,
dob_year INT(4) NOT NULL
)ENGINE=InnoDB";
// Run query      
$familyTBLQRY = mysql_query($familyTBL) or die(mysql_error());
if($familyTBLQRY === TRUE){
echo 'Family table created<br />';
}else{
echo 'Family table NOT created<br />';
};

/////////////////////////////////////////////////////////////////////////////////////////////////

$notesTBL = "CREATE TABLE notes(
note_id INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
lead_id INT(255) NOT NULL,
user_id INT(255) NOT NULL,
subject VARCHAR(250) NOT NULL,
note TEXT NOT NULL,
attachments VARCHAR(250) NOT NULL,
added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
modified TIMESTAMP NOT NULL
)ENGINE=InnoDB";
// Run query      
$notesTBLQRY = mysql_query($notesTBL) or die(mysql_error());
if($notesTBLQRY === TRUE){
echo 'Notes table created<br />';
}else{
echo 'Notes table NOT created<br />';
};

*/