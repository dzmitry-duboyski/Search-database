<?php include("../includes.php"); ?>
<?php include("../connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> отделения выписки + добавление диагнозов + дата выписки </title>
</head>
<body>
<?php 
/*	необходимо из таблицы "vipisan" добавить значениея полей "DepartmentOut" и "FinalDiagnosis" в таблицу "patient"
	при условии что  дата выписки и номер истории одинаковые.*/
/*цыкл перебираем таблицу vipisan
		ищу есть ли в таблице patient ячейка которая соответствует моим требованиям
			добавляю даные  в нужные мне поля
			при ошибкке вывожу сообщение */

		/*$query="SELECT * FROM patient WHERE HistoryNamber='100' and DateInReceiver='05.01.2009'";*/
		$queryVipisan="SELECT * FROM vipisan "; /*WHERE HistoryNamber='100'*/
		$resultVipisan=mysqli_query($connection,$queryVipisan);
		if(!$resultVipisan){
			die("Database qery failed");
		}
?>
<?php 
set_time_limit(1000); /*убирает  ограничение выполнения скрипта по времени*/
$progress=0;
while ($row=mysqli_fetch_assoc($resultVipisan)) {
	
	$progress++;
	echo "$progress"." ";
	

	/*$progress++;
	echo "|";
	if($progress==20){
	$progress=0;
	echo "<br>";
	}*/
	$DateInReceiverVipisan=$row["DateInReceiver"];
    $HistoryNumberVipisan=$row["HistoryNamber"];
    $FinalDiagnosisVipisan=$row["FinalDiagnosis"];
    $DateOutReceiverHospitalVipisan=$row["DateOutReceiverHospital"];	

						$query="UPDATE patient2 SET HistoryNamber='{$HistoryNumberVipisan}', DepartmentOut='{$DateOutReceiverHospitalVipisan}', FinalDiagnosis='{$FinalDiagnosisVipisan}', DateOutReceiverHospital='{$DateOutReceiverHospitalVipisan}' WHERE DateInReceiver='$DateInReceiverVipisan' AND HistoryNamber='$HistoryNumberVipisan'";
						$result=mysqli_query($connection,$query);//Выполняем запрос к БД
						if ($result) {//проверяем успешность выполнения запроса
							//echo "+ ";
							/*echo "Записи в БД успешно обновленны.";  
									echo "<br> var_dump ";
									var_dump($result);
									echo "</pre>"; */ 
						}	
						else{
							echo "eror<br>";
							#die("Database query failed.<br>Запрос в Базу Данных не удался.".mysqli_error($connection));
									echo "<pre>";
									var_dump($result);
									echo "</pre><br>";

						}

}
 ?>
<?php 
mysqli_free_result($resultVipisan);
 ?>
<?php 
	//Close database connection
	mysqli_close($connection);
?>
</body>
</html>
