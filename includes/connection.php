<?php 
/*connection bd*/
$dbHost="localhost"; /*Имя хоста:ip adress or domen (192.168.0.2 or www.dfds.com)*/
$dbUser="HospitalAdmin"; /*Имя пользователя  для доступа к БД*/
$dbPass="z3OimAwtpmBNQ4Yb"; /*Pass*/
$dbName="hospital"; /* database Name*/
$connection=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
//Проверка соединения с БД
//Test if connection occured
if(mysqli_connect_errno()){
	die("<h1>Database connection failed.<br>Нет соединения с БД </h1>".mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
?>