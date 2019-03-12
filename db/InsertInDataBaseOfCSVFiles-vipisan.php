<?php include("../includes/includes.php"); ?>
<?php include("../includes/connection.php"); ?>
<?php 
	$base = file('base_vipisan.csv');/*Присваиваем меременной значения из файла, переменная равна массиву, каждый элемент которого включает в себя строку  с данными о пациенте*/
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
	$HistoryNamber=mysqli_real_escape_string($connection,$baseAbmulance[$i][0]);/*+*/
	$DepartmentOut=mysqli_real_escape_string($connection,$baseAbmulance[$i][1]);	
	$DateInReceiver=mysqli_real_escape_string($connection,$baseAbmulance[$i][3]);/*+*/
	$DateOutReceiverHospital=mysqli_real_escape_string($connection,$baseAbmulance[$i][4]);
	$FinalDiagnosis=mysqli_real_escape_string($connection,$baseAbmulance[$i][5]);
		$query="INSERT INTO vipisan (HistoryNamber,DepartmentOut,DateInReceiver,DateOutReceiverHospital,FinalDiagnosis) VALUES ('{$HistoryNamber}','{$DepartmentOut}','{$DateInReceiver}','{$DateOutReceiverHospital}','{$FinalDiagnosis}')";
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
	//Close database connection
	mysqli_close($connection);
?>