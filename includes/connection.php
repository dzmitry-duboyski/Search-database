<?php 
$dbHost="localhost";
$dbUser="HospitalAdmin"; 
$dbPass="z3OimAwtpmBNQ4Yb"; 
$dbName="hospital";
$connection=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(mysqli_connect_errno()){
	die("<h1>Database connection failed.<br>Нет соединения с БД </h1>".mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
?>