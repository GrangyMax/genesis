<?php
foreach ($the_query->posts as $clinic){	
	switch ($clinic->ID) {
	// пишем для объекта клиники новое свойство - со значением номера очереди, например 1
	case 38798: // центр онкологии в мирном
		$clinic->queue = 1;											
		break;
	case 36183: // многопрофильный центр
		$clinic->queue = 2;											
		break;
	case 39508: // центр онкологии в севастополе
		$clinic->queue = 3;											
		break;
	case 39381: // центр онкологии в ялте
		$clinic->queue = 4;											
		break;	
	case 36315: // поликлиника в севастополе
		$clinic->queue = 5;											
		break;										
	default: // остальные случаи
		$clinic->queue = 10;																				
	}
}
// затем сортируем массив согласно этим номерам очереди 	
function cmp($a, $b){
return strcmp($a->queue, $b->queue);
}
//функция сортировки массива по пользовательской фукции
usort($the_query->posts, "cmp");

?>

