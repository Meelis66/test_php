<?php
include "connect.php";
$x="create table pizzad(
id int(10) unsigned auto_increment primary key,
nimi varchar(30) not null,
koostis varchar(150) not null,
hind decimal(10,2),
teravus int(4) )";

if($conn->query($x)===FALSE)
	echo "Viga books tabeli loomisel: ".$conn->error;

?>