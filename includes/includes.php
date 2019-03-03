<?php 
function parsingString($parsingDataFind)
{
//эта функция принимает в себя строку со словами разделенными пробелами, убирает пробелы, и  возвращает массив со словами
/*эта функция для разбора входящей строки на ФИО,  в функцию прилетает строка, а функция возвращает ФИО в массиве*/
/*echo "<hr>";*/
/*для начала приведем все символы в верхний регистр*/

$parsingDataFind=mb_strtoupper($parsingDataFind);

//далее  надо разобрать строку на ФИО
$fio=explode(" ",$parsingDataFind); /* fio включает в себя  массив с фио и пустыми элементами(которые появятся  если сделать два пробела), от которых избавимся ниже*/

$fioMod = array();//массив с готовым результатом
$zero="";
$j=0; 
for ($i=0; $i <=count($fio) ; $i++) //
	{ 
		if ($fio[$i]!=$zero & $j<=2 ) /*условие $j<=2 пропускает не больше 3-рех слов (ФИО)*/
		{
			$fioMod[$j]=$fio[$i];
			$j=$j+1;
		}
	}
return $fioMod;
}
?>
