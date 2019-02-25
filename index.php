<?php include("includes.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поиск</title>
</head>
<body>
<h1>Поиск ПАЦИЕНТОВ НАХОДИВШИХСЯ на лечении  в больнице за конкретный период</h1>
<form action="find.php" method="post">
	Введите данные о пациенте
	<br>
	<br>
	Фамилия Имя Отчество:
	<input type="text" name="fio" value="">
	<br>
	<!-- Период поиска, с 2004 по 2014 -->
	<input type="submit" value="Поиск" name="submit">
	<br>
</form>
</body>
</html>