<?php 
function parsingString($parsingDataFind)
{
$parsingDataFind=mb_strtoupper($parsingDataFind);
$fio=explode(" ",$parsingDataFind); 
$fioMod = array();
$zero="";
$j=0; 
for ($i=0; $i <=count($fio) ; $i++)
	{ 
		if ($fio[$i]!=$zero & $j<=2 ) 
		{
			$fioMod[$j]=$fio[$i];
			$j=$j+1;
		}
	}
return $fioMod;
}
?>
