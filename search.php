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
								<th class="table__th">№ Истории</th>
								<th class="table__th">Фамилия</th>
								<th class="table__th">Имя</th>
								<th class="table__th">Отчество</th>
								<th class="table__th">Дата рождения</th>
								<th class="table__th">Дата поступления</th>
								<th class="table__th">Дата выписки</th>
								<th class="table__th">Отделение при выписке</th>
								<th class="table__th">Тип оказанной помощи</th>					
							</tr>
						</thead>
						<tbody>
							<?php
							$findresult=0;
							while ($row=mysqli_fetch_assoc($result))
							{
								$findresult++;
								echo "<tr>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["HistoryNamber"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["Surname"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["Name"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["Patronymic"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["DOB"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["DateInReceiver"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["DateOutReceiverHospital"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["DepartmentOut"]."</a>"."</td>";
								echo "<td>"."<a href='#win".$findresult."' class='btn'>".$row["TypeMedicalHelp"]."</a>"."</td>";
							?>
							<?php include("includes/info.php"); ?>
							<?php
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
<!-- 		<footer class="footer">
			Create by 
				<a class="developer-link" href="https://t.me/Dzmitry_Dubovsky">
					<img class="telegram-ico" height="17px" src="icons/telegram-app.png">
					-Dubovski Dzmitry  
				</a>
					and
				<a class="developer-link" href="https://github.com/HL-Dz">
					<img class="telegram-ico" height="17px" src="icons/telegram-app.png">
					-Hlushak Dzmitry
				</a>
			</footer> -->			


			</div>

		</div>
	</body>
</html>
