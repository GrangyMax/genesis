<?php
/*
Template Name: secret_page
*/
?>
<?php get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
?>
<style>
span.wpcf7-not-valid-tip {
    position: relative;
}
</style>

   <table class="table">
<?php 

    $query = new WP_Query( array(
        'post_type' => 'doctor',
		//'post_status'=>'publish',
        'posts_per_page' => -1
    ) );   
  
 ?>
<?php 
/*список подписчиков*/
 // $user_subscribe = $wpdb->get_results( "SELECT id, email, name, surname FROM gnss_mb" );

/*парсинг документа с подписчиками 

$fh = fopen(__DIR__ . '/export.csv', "r");
fgetcsv($fh, 0, ';');
$i=0;

// массив, в который данные будут сохраняться
$data = [];
while (($row = fgetcsv($fh, 0, ';')) !== false) {
	$i++;
    list($email, $name, $surname, $id) = $row;

    $data[] = [
        'email' => $email,
        'name' => $name,
        'surname' => $surname,
		'id' => $i
    ];
}
$n=0;
foreach ($data as $row) {	
		if (filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {		
			$userdata = array(	
			'user_pass'       => 'yH6eoW65R#2#i^6ViZ0p#V2', // обязательно
			'user_login'      => $row['email'], // обязательно	
			'first_name'	   => $row['name'], 
			'user_email'      => $row['email'],	
			'role'            => 'site_subscriber' // (строка) роль пользователя		
			);
			
			if($row['id'] > 8000){			
				wp_insert_user( $userdata );				
				echo $row['id'] . '| Пользователь ' . $row['email'] . " создан <br>";		
				$n++;
			}		}	
}
echo "Создано " . $n . " пользователей <br>";	
 */ 
 ?>

</table>

<style>
.doctor_list td, th{
	padding: 10px;
}
</style>

<section id="content" class="container" style="padding: 30px;">
<h2>Список опубликованных врачей</h2>
<table border="1" class="doctor_list">
<thead>
	<tr>
		<th>№</th>
		<th>ФИО</th>
		<th>Статус</th>
		<th>Аккаунт</th>
		<th>Согласие</th>
	</tr>
</thead>
<tbody>
	<?php 	
	
	$i=0;
	$yes=0; 
	$yes_s=0;
	$no=0;
	
	 foreach ($query->posts as $doctor) {
		$akk = get_field('acco', $doctor->ID);
		$i++;
		if($akk  ==  160) {
			echo "<tr>";
			echo "<td>". $i. '</td> ' ;
			echo  '<td>'. get_the_title($doctor). '</td> ' ;
			echo  '<td>'. $doctor->post_status . '</td> ';
			$soglasie = get_field('soglasie', $doctor->ID);			
			echo  '<td>'. 
			
			$akk 
			
			. '</td> ';
			if($soglasie){
				echo  "<td style='background-color: lime;'> Согласен на обработку</td>";
				$yes++;				
				
			}
			else
			{ echo  "<td style='background-color: gold;'> Согласие не давал</td>";}
		  
	   echo "</tr>";	
		}
	
	
    }	
	//echo "<strong>Дали согласие ". $yes . " врача </strong><br>"; 
	

	
	?> 
</tbody>	
</tbody>	
</table>


</section>

</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>