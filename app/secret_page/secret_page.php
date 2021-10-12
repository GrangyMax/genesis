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

.pagebreak {
    page-break-after: always;
}

.doctor_list td, th{
	padding: 10px;
}
</style>
<!--
	298 - гинекология и урология
	299 - Лечение бесплодия
	297 - Наблюдение беременности
	294 - Хирургия
	293 - Ортопедия
	51372 - Центр сна
	290 - Оториноларингология
	67 -Диагостика
	296 - Детская клиника
	289 - Онкология
	66 - Гастроэнтерология и эндоскопия
	295 - Терапия
	292 - Инсульстный центр	
 -->
 
<?php 
 $services = get_posts(array(
    'post_type' => 'service', 
    'showposts' => -1,
    'meta_key' => 'parentem',
    'meta_value' => 292
     ));
 ?>

<section id="content" class="container pagebreak" style="padding: 30px;">
<h2>Услуги и направления клиники онкологии в Мирном</h2>

<div class="pagebreak">
	<table border="1" class="doctor_list">
		<thead>		
			
		</thead>
		<tbody>
		<?php 
		
		$list_service_for_clinic = get_field('услуги', 38798); //вытаскивает услуги по ID клиники		
				
		$i=0;
		foreach ($list_service_for_clinic as $key => $serv){
			//echo "<h2>".$serv['направление']->post_title."</h2>";
			
		foreach($serv['услуги'] as $service => $value){
			$i++;
			echo "<tr>";
				echo "<td>". $i ."</td>";
				echo "<td width='600'>".$value['услуга']->post_title."</td>";
				echo "<td width='350'></td>";
			echo "</tr>";	
		}
			
		}
		?>
		</tbody>	
	</table>
</div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>