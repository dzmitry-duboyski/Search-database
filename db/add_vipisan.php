<?php include("../includes/includes.php"); ?>
<?php include("../includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> отделения выписки + добавление диагнозов + дата выписки </title>
</head>
<body>
<?php 
		$queryVipisan="SELECT * FROM vipisan ";
		$resultVipisan=mysqli_query($connection,$queryVipisan);
		if(!$resultVipisan){
			die("Database qery failed");
		}
?>
<?php 
set_time_limit(0);
while ($row=mysqli_fetch_assoc($resultVipisan)) {
	$DateInReceiverVipisan=$row["DateInReceiver"];
    $HistoryNumberVipisan=$row["HistoryNamber"];
    $FinalDiagnosisVipisan=$row["FinalDiagnosis"];
    $DateOutReceiverHospitalVipisan=$row["DateOutReceiverHospital"];
    $TypeMedicalHelp="Стационар";
    $DepartmentOut=$row["DepartmentOut"];
    	if($DepartmentOut==1){$DepartmentOut="КАРДИОЛОГИЯ";}
    	if($DepartmentOut==2){$DepartmentOut="1 ХИРУРГИЯ";}
    	if($DepartmentOut==3){$DepartmentOut="2 ХИРУРГИЯ";}
    	if($DepartmentOut==4){$DepartmentOut="НЕВРОЛОГИЯ";}
    	if($DepartmentOut==5){$DepartmentOut="ТРАВМАТОЛОГИЯ";}
    	if($DepartmentOut==6){$DepartmentOut="РЕАНИМАЦИЯ";}
    	if($DepartmentOut==100){$DepartmentOut="БОЛЬНИЦА";}
						$query="UPDATE patient SET HistoryNamber='{$HistoryNumberVipisan}', DepartmentOut='{$DepartmentOut}', FinalDiagnosis='{$FinalDiagnosisVipisan}', DateOutReceiverHospital='{$DateOutReceiverHospitalVipisan}', TypeMedicalHelp='{$TypeMedicalHelp}' WHERE DateInReceiver='$DateInReceiverVipisan' AND HistoryNamber='$HistoryNumberVipisan'";
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
							echo "<pre>";
							var_dump($result);
							echo "</pre><br>";
						}
}
 ?>
<?php mysqli_free_result($resultVipisan); ?>
<?php mysqli_close($connection); ?>
</body>
</html>
