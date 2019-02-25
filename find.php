<?php include("includes.php"); ?>
<?php 
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Результат поиска:</title>
	<style>
		thead {color:green;}
		tbody {color:blue;}
		tfoot {color:red;}
		table,th,td{border:1px solid black;}
	</style>
</head>
<body>
<br>
<?php 
	//2. Выполнить запрос БД
	//2. Perform database query
	$query="SELECT * FROM patient"; /*SELECT * FROM patient*/
	$result=mysqli_query($connection,$query);//Выполняем запрос к БД
	//проверяем успешность выполнения запроса
	if (!$result)
	{
		die("<h1>Database query failed.<br>Запрос в Базу Данных не удался.</h1>");
	}
?>
<?php 
	if (isset($_POST["submit"]))
	{
		$fio=$_POST["fio"];
		$fio=parsingString($fio);
		echo 'Результаты поиска по запросу: ',"${fio[0]}",' ',"${fio[1]}",' ',"${fio[2]}";
		echo '<br>Колличество найденных записей:';
	}
?>
<br>
<?php
	//2. Выполнить запрос БД
	//2. Perform database query

// поиск только по ФИО
		$query="SELECT * FROM patient where Surname='$fio[0]' and Name='$fio[1]' and Patronymic='$fio[2]' ";
		//Выполняем запрос к БД
		$result=mysqli_query($connection,$query);
		//проверяем успешность выполнения запроса
		if (!$result)
		{
			die("<h1>Database query failed.<br>Запрос в Базу Данных не удался.</h1>");
		}

// поиск только по фамилии и имени(без отчества)
	if ($fio[2]=="") {
		$query="SELECT * FROM patient where Surname='$fio[0]' and Name='$fio[1]'";
		//Выполняем запрос к БД
		$result=mysqli_query($connection,$query);
		//проверяем успешность выполнения запроса
		if (!$result)
		{
			die("<h1>Database query failed.<br>Запрос в Базу Данных не удался.</h1>");
		}
	}

// поиск только по фамилии
	if ($fio[1]=="" and $fio[2]=="") {
		$query="SELECT * FROM patient where Surname='$fio[0]'";
		//Выполняем запрос к БД
		$result=mysqli_query($connection,$query);
		//проверяем успешность выполнения запроса
		if (!$result)
		{
			die("<h1>Database query failed.<br>Запрос в Базу Данных не удался.</h1>");
		}
	}
?>
<br>
<a href='index.php'>Назад к поиску</a>
<br>
<table border="1" style="width:300px">
	<thead>
		<tr>
			<th>Номер истории</th>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Отчество</th>
			<th>Дата рождения</th>
			<th>Паспорт</th>
			<th>Работа</th>
			<th>Город</th>
			<th>Адрес проживания</th>
			<th>Телефон</th>
			<th>Дата поступления</th>
			<th>Время поступления в ПР покой</th>
			<th>Дата выписки</th>
			<th>Отделение при поступлении</th>
			<th>Отделение при выписке</th>
			<th>Тип оказанной помощи</th>
			<th>Заключительный диагноз</th>
		</tr>
	</thead>
<tbody>
	
<?php
	//3. Use returned data (if any)
	//3. Использование возвращаемых данных
	while ($row=mysqli_fetch_assoc($result))
	{
		//Выводить данные каждого ряда
		//var_dump($row);
		//echo $row[4];
		echo "<tr>";
		echo "<th>".$row["HistoryNamber"]."</th>";
		echo "<th>".$row["Surname"]."</th>";
		echo "<th>".$row["Name"]."</th>";
		echo "<th>".$row["Patronymic"]."</th>";
		echo "<th>".$row["DOB"]."</th>";
		echo "<th>".$row["Document"]."</th>";
		echo "<th>".$row["WorkDescription"]."</th>";
		echo "<th>".$row["Sity"]."</th>";
		echo "<th>".$row["ResidentialAddress"]."</th>";
		echo "<th>".$row["Phone"]."</th>";
		echo "<th>".$row["DateInReceiver"]."</th>";
		echo "<th>".$row["TimeInReceiver"]."</th>";
		echo "<th>".$row["DateOutReceiverHospital"]."</th>";
		echo "<th>".$row["DepartmentIn"]."</th>";
		echo "<th>".$row["DepartmentOut"]."</th>";
		echo "<th>".$row["TypeMedicalHelp"]."</th>";
		echo "<th>".$row["FinalDiagnosis"]."</th>";
	}
	echo "<br>";
?>
	</tr>
<tbody>
</table>
</body>
</html>
