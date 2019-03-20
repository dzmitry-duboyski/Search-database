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
					<div class="searchForm searchForm__center ">
						<a href="index.php" class="searchForm__btn">На главную</a>
						<h1 class="searchForm__title">Поиск пациентов</h1>
						<form action="search.php" method="post" class="form">
							<div class="form__data">Введите данные о пациенте:</div>
							<input type="text" name="fio" placeholder="Фамилия Имя Отчество" class="form__input" required>
							<input type="submit" value="Поиск" name="submit" class="form__submit">
						</form>
					</div>
					<br>
					<?php include("includes/searchInBase.php"); ?>
					<table class="table" border="1">
						<thead>
							<tr class="table__tr">
								<th class="table__th">Фамилия</th>
								<th class="table__th">Имя</th>
								<th class="table__th">Отчество</th>
								<th class="table__th">Дата рождения</th>
								<th class="table__th">Дата поступления</th>
								<th class="table__th">Дата выписки</th>
								<th class="table__th">Отделение при выписке</th>
								<th class="table__th">Тип оказанной помощи</th>					
								<th class="table__th">Подробнее</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$findresult=0;
							while ($row=mysqli_fetch_assoc($result))
							{
								$findresult++;
								echo "<tr>";
								echo "<td>".$row["Surname"]."</td>";
								echo "<td>".$row["Name"]."</td>";
								echo "<td>".$row["Patronymic"]."</td>";
								echo "<td>".$row["DOB"]."</td>";
								echo "<td>".$row["DateInReceiver"]."</td>";
								echo "<td>".$row["DateOutReceiverHospital"]."</td>";
								echo "<td>".$row["DepartmentOut"]."</td>";
								echo "<td>".$row["TypeMedicalHelp"]."</td>";
								echo "<td>"."<a href='#win1' class='btn'>Подробнее</a>"."</td>";
							?>
							<?php include("includes/info.php"); ?>
							<?php
							/*	echo "<td>"."<a href='#' onclick= \"javascript: alert( '";
								echo "ФИО: ".$row["Surname"]." ".$row["Name"]." ".$row["Patronymic"]."\\r\\n";
								echo "ДАТА РОЖДЕНИЯ: ".$row["DOB"]."\\r\\n";
								echo "ПАСПОРТ: ".$row["Document"]."\\r\\n";
								echo "АДРЕС: ".$row["ResidentialAddress"]."\\r\\n";
								echo "ТЕЛЕФОН: ".$row["Phone"]."\\r\\n";
								echo "НОМЕР ИСТОРИИ: №".$row["HistoryNamber"]."\\r\\n";
								echo "ЗАКЛЮЧИТЕЛЬНЫЙ ДИАГНОЗ: ".$row["FinalDiagnosis"]."\\r\\n";
								echo "ПОСТУПИЛ: ".$row["DateInReceiver"]." в ".$row["DepartmentIn"]."\\r\\n";
								echo "ВЫПИСАЛСЯ: ".$row["DateOutReceiverHospital"]." из ".$row["DepartmentOut"]."\\r\\n";
								echo "' )\">Подробнее</a></td>";*/
							}
							echo '<br>Колличество найденных записей:'.$findresult;
							'<br>'
							?>
						</tr>
						<tbody>
						</table>
						<?php mysqli_close($connection);?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
