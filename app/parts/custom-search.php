
<section id="content">
	<div class="content-wrap mobile-usluga pt-0 pb-0">
		<div class="content-wrap pt-0 pb-0 front-page">
			<div class="container clearfix search-page">
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
					echo "<h4>По Вашему запросу ничего не найдено. Возможно Вас заинтересует: </h4>";
					?>
				<div class="content-wrap pt-4 front-page">
					<div class="container ">
					<?php
						$p_directions = get_posts( array(
							'post_type'   => 'popular_direction',
							'showposts' => -1	
						) );
					?>
							
							<div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="20" 
							data-nav="true" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="5" 
							data-loop="false" data-animate-in="fadeInRight" data-speed="700" data-animate-out="fadeOutLeft" data-autoplay="5000"  >				
										<?php foreach (array_chunk($p_directions , 2)  as $p_direction) {								
											$p_direction_img_0 = get_the_post_thumbnail_url($p_direction[0]);
											$p_direction_title_0 = $p_direction[0]->post_title; 
											$link_direction_0 = get_field('link_direction', $p_direction[0]);  
											$p_direction_img_1 = get_the_post_thumbnail_url($p_direction[1]);	
											$p_direction_title_1 = $p_direction[1]->post_title; 
											$link_direction_1 = get_field('link_direction', $p_direction[1]);  								
										?>
											<div class="oc-item">									
														<div class="clearfix mb-4">										
																		<a href="<?php echo $link_direction_0 ?>">																																
																			<div class="portfolio-image">
																				<img loading="lazy"
																					src="<?php echo $p_direction_img_0; ?> "
																					style="width: auto; height: 120px; margin: 0 auto;">
																			</div>																
																			<div class="portfolio-desc">
																				<h3 style="text-align: center;">
																				<?php echo $p_direction_title_0; ?>
																				</h3>
																			</div>
																		</a>
														</div>  											
											
														<div class="clearfix">												
																		<a href="<?php echo $link_direction_1 ?>">																
																				<div class="portfolio-image">
																					<img loading="lazy"
																						src="<?php echo $p_direction_img_1; ?> "
																						style="width: auto; height: 120px; margin: 0 auto;">
																				</div>																	
																				<div class="portfolio-desc">
																					<h3 style="text-align: center;">
																					<?php echo $p_direction_title_1; ?>
																					</h3>
																				</div>
																		</a>
														</div> 	
												</div>
															
											<?php  } ?>
							</div>          
						<div class="owl-dots disabled"></div>
						</div>
					</div>
					<?php
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

		