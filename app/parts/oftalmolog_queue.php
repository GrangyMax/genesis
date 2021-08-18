<?php
foreach ($the_query->posts as $clinic){	
	switch ($clinic->ID) {
	// пишем для объекта клиники новое свойство - со значением номера очереди, например 1
	case 36238: // центр зрения на киевской
		$clinic->queue = 1;											
		break;
	case 38875: // центр зрения, оптика
		$clinic->queue = 2;											
		break;
	case 36183: // многопрофильный центр
		$clinic->queue = 3;											
		break;
	case 38762: // детская клиника
		$clinic->queue = 4;											
		break;	
	case 38664: // поликлиника в мирном
		$clinic->queue = 5;											
		break;										
	default: // остальные случаи
		$clinic->queue = 10;																				
	}
}
// затем сортируем массив согласно этим номерам очереди и дальше как обычно выводим	
function cmp($a, $b){
return strcmp($a->queue, $b->queue);
}
//функция сортировки массива по пользовательской фукции
usort($the_query->posts, "cmp");

?>

