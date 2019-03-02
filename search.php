<?php include("includes/includes.php"); ?>
<?php include("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Результат поиска:</title>
	<link rel="stylesheet" href="css/styly.css">
</head>
<body>
<?php include("includes/searchForm.php"); ?>
<br>
<?php include("includes/searchInBase.php"); ?>
<table border="1" style="width:300px">
	<thead>
		<tr>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Отчество</th>
			<th>Дата рождения</th>
			<th>Паспорт</th>
			<th>Адрес проживания</th>
			<th>Дата поступления</th>
			<th>Дата выписки</th>
			<th>Номер истории</th>
			<th>Отделение при поступлении</th>
			<th>Отделение при выписке</th>
			<th>Тип оказанной помощи</th>					
			<th>Заключительный диагноз</th>
			<th>Работа</th>
			<th>Город</th>
			<th>Телефон</th>
		</tr>
	</thead>
<tbody>
<?php
	// Use returned data (if any)
	//3. Использование возвращаемых данных
	$findresult=0;
	while ($row=mysqli_fetch_assoc($result))
	{
		$findresult++;
//Выводить данные каждого ряда
//var_dump($row);
//echo $row[4];
		echo "<tr>";
/*echo "<th>".$row["id"]."</th>";*/
		echo "<th>".$row["Surname"]."</th>";
		echo "<th>".$row["Name"]."</th>";
		echo "<th>".$row["Patronymic"]."</th>";
		echo "<th>".$row["DOB"]."</th>";
		echo "<th>".$row["Document"]."</th>";
  		echo "<th>".$row["ResidentialAddress"]."</th>";
  		echo "<th>".$row["DateInReceiver"]."</th>";
		echo "<th>".$row["DateOutReceiverHospital"]."</th>";
		echo "<th>".$row["HistoryNamber"]."</th>";
		echo "<th>".$row["DepartmentIn"]."</th>";
		echo "<th>".$row["DepartmentOut"]."</th>";
		echo "<th>".$row["TypeMedicalHelp"]."</th>";
		echo "<th>".$row["FinalDiagnosis"]."</th>";			
		echo "<th>".$row["WorkDescription"]."</th>";
		echo "<th>".$row["Sity"]."</th>";
		echo "<th>".$row["Phone"]."</th>";
	}
	echo '<br>Колличество найденных записей:'.$findresult;
?>
	</tr>
<tbody>
</table>
<?php 
	//Close database connection
	mysqli_close($connection);
?>
</body>
</html>
