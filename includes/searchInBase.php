<?php 
	if (isset($_POST["submit"]))
	{
		$fio=$_POST["fio"];
		$fio=mysqli_real_escape_string($connection,$fio);/*экранирование*/
		$fio=parsingString($fio);
		echo 'Результаты поиска по запросу: ',"${fio[0]}",' ',"${fio[1]}",' ',"${fio[2]}";
	}
?>
<?php
//запрос БД
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