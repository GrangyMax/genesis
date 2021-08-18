
<section id="content">
	<div class="content-wrap mobile-usluga pt-0 pb-0">
		<div class="container mt-5 p-0">
			<div class="entry clearfix search-page">
				<?php
				
				$search_result=array(
					"Услуги"=>array(),
					"Клиники"=>array(),
					"Врачи"=>array(),						
							
					//по многочисленным просьбам скрываю лишнюю информацию
					//"Направления"=>array(),	
					//"Блоги врачей"=>array(), 
					"Анализы"=>array(),
					//"Информационные страницы"=>array(),						
					//"Прочее"=>array()					
				);
								
				if (have_posts()) {
						
					/*-------------------Услуги ---------------*/
					
					while (have_posts()) : the_post();
										
						if ($post->post_type == 'service') {
							array_push($search_result["Услуги"], $post );													
						}
						elseif ($post->post_type == 'klinika') {
							array_push($search_result["Клиники"], $post );													
						}
												
						elseif ($post->post_type == 'doctor') {
							array_push($search_result["Врачи"], $post );													
						}	
						/*	по многочисленным просьбам скрываю лишнюю информацию
							elseif ($post->post_type == 'direction'){
								array_push($search_result["Направления"], $post );	
							}						
							elseif ($post->post_type == 'blog') {
								array_push($search_result["Блоги врачей"], $post );													
							}*/
							elseif ($post->post_type == 'analyzes') {
								array_push($search_result["Анализы"], $post );													
							}
						/*
							elseif ($post->post_type == 'page') {
								array_push($search_result["Информационные страницы"], $post );													
							}	
							else{
								array_push($search_result["Прочее"], $post );	
							}
						*/
					endwhile;			
							
					}	
				else{
					echo "<h4>По Вашему запросу ничего не найдено.</h4>";
				}		
				
				//обход сразу всего массива	
				
				if (have_posts()){
					
					echo "<h4 style='color: #6c757d; '>По запросу <i>&#171;". $_GET['s']."&#187;</i> мы нашли: </h4>";
					 
					foreach ($search_result as $key =>$value){
						if($search_result[$key])
						{
							echo "<h2 class='search-title-cat'><i class='icon-line-circle-check' style='color: #EF7F1A;'></i>&nbsp;".$key.": ".count($search_result[$key])."</h2>";	
						}

						foreach($value as $result){
							if ($result->post_type=="doctor"){
							 ?>										
									<div class="block-doc">										
										<a href="<?php echo get_permalink($result);?>"> 
										
										<img class="image_fade" srcset="<?php echo get_the_post_thumbnail_url($result, 'medium')?> 480w,
											 <?php echo get_the_post_thumbnail_url($result, 'large') ?> 800w,
												<?php echo get_the_post_thumbnail_url($result, 'full') ?> 1600w"																														 
													src="<?php echo get_the_post_thumbnail_url($result, 'full') ?>" alt="<?php the_title(); ?>">	
											
											<p><?php echo $result->post_title; ?></p>	</a>
											<span><?php echo get_post_meta($result->ID, 'rang', 1); ?></span>	<br>												
										</div>						
										
								<?php }								
							else if ($result->post_type=="klinika"){
									?>
									<div class="portfolio-item clinic-icon-search">										
										<a href="<?php echo get_permalink($result);?>"> 										
											<img class="image_fade" src="<?= get_the_post_thumbnail_url($result); ?>">												
											<p><?php echo $result->post_title; ?></p>	</a>																					
										</div>	
									
								<? }
							
							else {?>
								<div class="block-search-item">
									<a href="<?php echo get_permalink($result)?>"> 
									<p><?php echo $result->post_title ?></p></a>	
								</div>
							<?php }}	?>						
				<?php } } ?>
		</div>	
	</div>
	</div>
</section>

		