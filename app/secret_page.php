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
<?php 
    $query = new WP_Query( array(
        'post_type' => 'doctor',
		//'post_status'=>'publish',
        'posts_per_page' => -1
    ) );
   
   
?>  

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
		$i++; 
		echo "<tr>";
			echo "<td>". $i. '</td> ' ;
			echo  '<td>'. get_the_title($doctor). '</td> ' ;
			echo  '<td>'. $doctor->post_status . '</td> ';
			$soglasie = get_field('soglasie', $doctor->ID);
			if($soglasie){
				echo  "<td style='background-color: lime;'> Согласен на обработку</td>";
				$yes++;				
				
			}
			else
			{echo  "<td style='background-color: gold;'> Согласие не давал</td>";}
		  
	   echo "</tr>";
	
    }	
	echo "<strong>Дали согласие ". $yes . " врача </strong><br>"; 
	
	?> 
</tbody>	
</tbody>	
</table>


</section>

</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>