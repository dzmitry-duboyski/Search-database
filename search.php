<?php include("includes/includes.php"); ?>
<?php include("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Результат поиска:</title>
	<link rel="stylesheet" href="css/styly.css">
	<link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="icons/android-chrome-192x192.png" sizes="192x192">
</head>
<body >
	<div class="wrapper">
		<div class="maincontent">
			<div class="container">
				<div class="table__container">
					<?php include("includes/searchForm.php"); ?>
					<br>
					<?php include("includes/searchInBase.php"); ?>
					<table class="table" border="1">
						<thead>
							<tr class="table__tr">
								<th class="table__th">Фамилия</th>
								<th class="table__th">Имя</th>
								<th class="table__th">Отчество</th>
								<th class="table__th">Дата рождения</th>
								<th class="table__th">Паспорт</th>
								<th class="table__th">Адрес проживания</th>
								<th class="table__th">Дата поступления</th>
								<th class="table__th">Дата выписки</th>
								<th class="table__th">Номер истории</th>
								<th class="table__th">Отделение при поступлении</th>
								<th class="table__th">Отделение при выписке</th>
								<th class="table__th">Тип оказанной помощи</th>					
								<th class="table__th">Заключительный диагноз</th>
								<th class="table__th">Работа</th>
								<th class="table__th">Город</th>
								<th class="table__th">Телефон</th>
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
							'<br>'
							?>
						</tr>
						<tbody>
						</table>
						<?php 
						//Close database connection
						mysqli_close($connection);
						?></div>
				</div>
			</div>
		</div>
	</body>
	</html>
