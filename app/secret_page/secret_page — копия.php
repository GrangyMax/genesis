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

 $services = get_posts(array(
    'post_type' => 'service', 
    'showposts' => -1,
    'meta_key' => 'parentem',
    'meta_value' => 298
     ));
	 
	var_dump ( $services);
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

	

</tbody>	
</tbody>	
</table>


</section>

</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>