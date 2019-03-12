<?php include("../includes/includes.php"); ?>
<?php include("../includes/connection.php"); ?>
<?php 
	$base = file('base.csv');/*Присваиваем меременной значения из файла, переменная равна массиву, каждый элемент которого включает в себя строку  с данными о пациенте*/
	/*файл base.csv должен быть в правильной кодировке utf-8*/
	$baseAbmulance = array();/*многомерный массив где каздый элемент это  отдельное обращение пациента*/
	//массив для временной фильтрации данных
   	for ($i=0; $i <=count($base) ; $i++)
    { 
		$str=$base[$i];/* присваиваем строке данные об обращении пациента*/
		/*echo $str,"<hr><br>";*/
		//20+1-это число  элементов (19+1) в строке
		for ($j=0; $j <=20 ; $j++)
		{ 
			$baseAbmulance[$i]=explode(";",$str); /*создали многомерный массив, где каждый элемент равен одному обращению*/
		}
	/* echo "<pre>";
	 print_r($baseAbmulance[$i]);echo "<hr>";
	 echo "</pre>";	*/
	$none="-";
	$Surname=mysqli_real_escape_string($connection,$baseAbmulance[$i][4]);/*+*/ 
	$Name=mysqli_real_escape_string($connection,$baseAbmulance[$i][5]);/*+*/
	$Patronymic=mysqli_real_escape_string($connection,$baseAbmulance[$i][6]);/*+*/
	$DOB=mysqli_real_escape_string($connection,$baseAbmulance[$i][9]);/*+*/
	$Document=mysqli_real_escape_string($connection,$baseAbmulance[$i][14]);/*+*/
	$ResidentialAddress=mysqli_real_escape_string($connection,$baseAbmulance[$i][13]);/*+*/
	$DateInReceiver=mysqli_real_escape_string($connection,$baseAbmulance[$i][3]);/*+*/
	$DateOutReceiverHospital=mysqli_real_escape_string($connection,$none);
	$HistoryNamber=mysqli_real_escape_string($connection,$baseAbmulance[$i][0]);/*+*/
	$DepartmentIn=mysqli_real_escape_string($connection,$baseAbmulance[$i][7]);
	$DepartmentOut=mysqli_real_escape_string($connection,"$none");	
	$TypeMedicalHelp=mysqli_real_escape_string($connection,"$none");
	$FinalDiagnosis=mysqli_real_escape_string($connection,"$none");
	$WorkDescription=mysqli_real_escape_string($connection,$baseAbmulance[$i][16]);/*+*/
	$Sity=mysqli_real_escape_string($connection,$baseAbmulance[$i][11]);	/*+*/
	$Phone=mysqli_real_escape_string($connection,$baseAbmulance[$i][15]);	/*+*/
		// Выполнить запрос БД
		// Perform database query
		$query="INSERT INTO patient (Surname,Name,Patronymic,DOB,Document,ResidentialAddress,DateInReceiver,DateOutReceiverHospital,HistoryNamber,DepartmentIn,DepartmentOut,TypeMedicalHelp,FinalDiagnosis,WorkDescription,Sity,Phone) VALUES ('{$Surname}','{$Name}','{$Patronymic}','{$DOB}','{$Document}','{$ResidentialAddress}','{$DateInReceiver}','{$DateOutReceiverHospital}','{$HistoryNamber}','{$DepartmentIn}','{$DepartmentOut}','{$TypeMedicalHelp}','{$FinalDiagnosis}','{$WorkDescription}','{$Sity}','{$Phone}')"; 
		$result=mysqli_query($connection,$query);//Выполняем запрос к БД
		if ($result) {//проверяем успешность выполнения запроса
			//echo "+ ";
			//echo "Записи в БД успешно добавленны.";    
		}	
		else{
			//echo "$query"."<br>";
			die("<h1>Database query failed.<br>Запрос в Базу Данных не удался.</h1>".mysqli_error($connection));
		}
	}
	$i=$i+1;
echo "В БД добавленно $i записей.";
?>
<?php 
	//5. Закрываем соединение с БД
	//5. Close database connection
	mysqli_close($connection);
?>