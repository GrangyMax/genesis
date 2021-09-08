<?php 

/*
    Template Name: .general
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();
?>
<section id="slider" class="slider-element slider-parallax slider-background">
    <div id="oc-slider" class="owl-carousel carousel-widget" data-margin="0" data-items="1" data-pagi="true"
        data-loop="true" data-animate-in="fadeInRight" data-speed="700" data-animate-out="fadeOutLeft"
        data-autoplay="5000">
        <?php
    $sliders = get_posts( array(
        'post_type'   => 'slider',
        'showposts' => -1	
    ) );
foreach ($sliders as $slider) {
	$slider_img_url = get_the_post_thumbnail_url($slider);	
	$slider_content = $slider->post_content;
	$slider_title = $slider->post_title;	
	$slider_link = get_field('link', $slider);  	
?>
        <div class="back-image">
            <div class="container" style="padding:1em 10px;">
                <div class="row">
                    <!--строка сетки-->
                    <!--столбец 1-->
                    <div class="col-md-8">
                        <h1 class="h1-title-slider"><?php echo $slider_title ?></h1>
                        <div class="content-slider">
                            <?php echo $slider_content; ?>
                        </div>
                        <br>
						<a href="<?php echo $slider_link; ?>">
							<button type="button" class="slider-button btn btn-warning">Перейти</button>
						</a>
                    </div>
                    <!--столбец 2-->
                    <div class="col-md-4">
                        <div class="img-slider">
                            <img src="<?php echo $slider_img_url ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section id="content">
    <div class="content-wrap pt-0 pb-0 front-page">
        <div class="container ">
        <?php
        $p_directions = get_posts( array(
            'post_type'   => 'popular_direction',
            'showposts' => -1	
        ) );
?>
            <div class="fancy-title title-border title-center ">
                <h2>Направления</h2>
            </div>		
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
        <?php include_once 'parts/service-search-block.php';?>
        <div class="container mt-0 p-0">
            <div class="blocks">
                <input class="js-search-block form-control form-control-lg p-4 mb-4" type="text"
                    placeholder="Поиск услуги" />
	
                <div class="row container legend-row">
                    <div class="legend-row__block">
                        <div class="legend-row__first-visit-icon">
                        </div>
                        <div class="legend-row__text">
							<p> - Первичный прием </p>
						</div>						
                    </div>					
                    <div class="legend-row__block">
                        <div class="legend-row__last-visit-icon">
                        </div>
						<div class="legend-row__text">
							<p> - Повторный прием</p>
						</div>
                    </div>
                </div>		
                <?php 
                        $directions = get_posts(array(
                            'post_type' => 'direction', 
                            'showposts' => -1
                        ));
                        foreach ($directions as $direction) {
                    ?>
                <div class="block">
                    <div class="block-head">
                        <div class="toggle toggle-border tabs-uslugi">
                            <div class="togglet block-head__title"><i class="toggle-closed icon-ok-circle"></i><i
                                    class="toggle-open icon-remove-circle block-head__title"></i><?=get_the_title($direction->ID)?>
                            </div>
                            <div class="togglec block-head__shortname" style="display: none; padding: 0px 15px 15px 15px;">
                                <?php 
                                            $services = get_posts(array(
                                                'post_type' => 'service', 
                                                'showposts' => -1,
                                                'meta_key' => 'parentem',
                                                'meta_value' => $direction->ID
                                            ));
                                            $specs = get_posts(array(
                                                'post_type' => 'specialisation', 
                                                'showposts' => -1,
                                                'meta_key' => 'parentem',
                                                'meta_value' => $direction->ID
                                            ));
                                            foreach ($specs as $key => $spec) {
                                                $_services = get_posts(array(
                                                    'post_type' => 'service', 
                                                    'showposts' => -1,
                                                    'meta_key' => 'parentem',
                                                    'meta_value' => $spec->ID
                                                ));
                                                if ($_services[0]->ID) {
                                                    $services = array_merge($services, $_services);
                                                }
                                            }
                                            echo service_list_start();
                                            foreach ($services as $service) {
                                                $title = get_the_title($service->ID);
                                                $price = get_post_meta($service->ID, 'price', 1);
												$price_repeat = get_post_meta($service->ID, 'price_repeat', 1);
                                                $link = get_permalink($service->ID);
                                                echo service_row($title, $price, $price_repeat, $link );
                                            }
                                            echo service_list_end();
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

   

<!-- блок c данными для формирования карты -->  

<div class="container clearfix">
            <div class="fancy-title title-border title-center ">
                <h2 class="title-adress-frontend">Адреса наших клиник</h2>
            </div>
              <section id="contacts-map" class="d-none d-md-block" style="height: 450px; margin-bottom: 3em; background-image: url(https://xn----7sbkiambaglcj1ag7d.xn--p1ai/wp-content/uploads/2021/08/Screenshot_17-2.jpg); ">
                <?php
            $query = new WP_Query(array(
               'post_type' => 'klinika',
               'posts_per_page' => -1
            ));
            $clinic_select = ''; 	
            foreach ($query->posts as $key => $clinic) {
               $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
               $clinic_select .= '<option value="'. $email .'">' . get_the_title($clinic) . '</option>';
            ?>   
                <div class="pricing-box" style="border:0;" data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID); ?>, 
					<?php the_field('метка_долгота', $clinic->ID); ?>]"
                    data-placemark-address="<?php the_field('адрес', $clinic->ID); ?>"
                    data-placemark-hint="<?php echo get_the_title($clinic); ?>"
                    data-placemark-image-src="<?php echo get_stylesheet_directory_uri(); ?>/images/clinic-logo.png"      

                    data-placemark-url="<?php echo get_permalink($clinic->ID); ?>"
                    data-placemark-timework="<?php the_field('график_работы', $clinic->ID); ?>"
                    data-placemark-phone="
                            <?php foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) { ?>
                                    <a href='tel:<?php echo $value['номер_телефона'] ?>'><?php echo $value['номер_телефона'] ?></a> <br>
                            <?php } ?>"                    
                    >
                    
                </div>

                <?php } ?>

            </section>
        </div>
<!-- блок c данными для формирования карты --> 
        <!--Последние новости
============================================= -->
        <div class="content-wrap pt-0 pb-0 front-page front-page_news">
            <div class="clearfix">
                <div class="container ">
                    <div class="fancy-title title-border title-center">
                        <h2>Последние новости</h2>
                    </div>						
                    <?php/* echo do_shortcode('[ocpc-post-carousel id=39963]'); */?>					
					    <?php
							$news_list = get_posts( array(
								'post_type'   => 'news',
								'showposts' => 10,
								'orderby'     => 'date',
								'order'       => 'DESC',								
								));
						?>
				<!--================================== карусель с новостями =============================================== -->
					<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget owl-loaded owl-drag"
							data-margin="0" data-nav="true" data-pagi="true" data-margin="20" data-items-xs="1" data-items-sm="1"
							data-items-lg="2" data-items-xl="3">
							<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(-475px, 0px, 0px); transition: all 0.25s ease 0s; width: 3800px;">
						
									<?php foreach ($news_list as $news_item) {
											$news_img_md = get_the_post_thumbnail_url($news_item, 'medium');
											$news_img_lg = get_the_post_thumbnail_url($news_item, 'full');			
											$news_title = get_the_title($news_item); 
											$news_link = get_permalink($news_item);  
											$news_date = get_the_date('j F, Y', $news_item); 
											$news_excerpt = wp_trim_words(get_the_excerpt($news_item), 20, '...' );
									?>											
										<div class="owl-item">
												<div class="oc-item">
													<div class="iportfolio p-1 m-1">														
														<div class="portfolio-image">
															<a href="<?php echo $news_link;  ?>" class="d-inline-block">
																<img width="1200" class="wp-post-image frontpage-img-news" loading="lazy"
																src="<?php echo $news_img_md; ?>" 
																srcset="<? echo $news_img_md; ?> 1x, 
																<? echo $news_img_lg; ?> 2x	">
															</a>	
														</div>	
														<div class="pb-1 pt-1">
															<div class="portfolio-title front-page-news-title">
																<a href="<?php echo $news_link;  ?>">
																	<h3>
																		<?php echo $news_title; ?>
																	</h3>
																</a>
															</div>															
															<div class="portfolio-date frontpage-date-news">
																<span>
																	<?php echo $news_date; ?>
																</span>
															</div>
															
															<div class="portfolio-desc">
																<blockquote>
																	<?php echo $news_excerpt; ?>
																</blockquote>
															</div>															
														</div>														
													</div>
												</div>
										</div>      
										<?php  } ?>									
								 </div>
						</div>
				<!--================================== карусель с новостями  конец =============================================== -->

                </div>
                <div class="container clearfix">
                    <a href="<?=get_post_type_archive_link('news')?>" class="more-link mt-3 fright">Все новости &rarr;</a>
                </div>
            </div>
			 <div class="clear"></div>
        </div>

        <!-- Популярное в блоге
============================================= -->

        <div class="frontpage-blogs-doctor container clearfix">
            <div class="fancy-title title-border title-center">
                <h2>Популярное в блоге</h2>
            </div>
            <div id="home-recent-news">
                <?php
                    $wBlog = get_posts(array( 'post_status'=> 'publish', 'post_type' => 'blog', 'showposts' => 3));					
                    foreach ($wBlog as $k => $wEntry) {                         
                        $doctor = get_posts(array(
                            "post_type" => 'doctor',
                            "showposts" => '1',
                            "meta_key" => "acco",
                            "meta_value" => $wEntry->post_author
                        ));                       
                        $doc = $doctor[0]->ID;						
                        if ($doc) {
                            $doctor = get_the_title($doc);
                            $rang = get_post_meta($doc, 'rang', 1);
                        } else {
                            $first_name = get_the_author_meta('first_name', $wEntry->post_author);
                            $last_name = get_the_author_meta('last_name', $wEntry->post_author);      
                            $doctor = $first_name.' '.$last_name;
                        }
                ?>
                <div class="entry">
                    <div class="entry-image frontpage-img-blog">
                        <a href="<?php echo get_the_post_thumbnail_url($wEntry->ID);?>" data-lightbox="image">

                            <img loading="lazy" class="image_fade"
                                src="<?php echo get_the_post_thumbnail_url($wEntry->ID, 'medium') ?>"
                                alt="<?php the_title(); ?>" srcset="<?php echo get_the_post_thumbnail_url($wEntry->ID, 'medium') ?> 1x, 
												 <?php echo get_the_post_thumbnail_url($wEntry->ID, 'full') ?> 2x">

                    </div>
                    <div class="entry-c frontpage-content-blog">
                        <div class="entry-title">
                            <h4><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></h4>
                        </div>
                        <div class="entry-content ">
                            <p><?=get_excerpt_by_id($wEntry->ID)?></p>
                        </div>
                        <ul class="entry-meta">
                            <li><a href="<?=get_permalink($doc)?>"><i class="icon-user-md"></i><?=$doctor?></a></li>
                            <!-- <li><i class="icon-line2-eye"></i> 763256</li> -->
                        </ul>
                    </div>
                </div>
                <?php } ?>

                <a href="<?=get_post_type_archive_link('blog')?>" class="more-link fright">Читать блог &rarr;</a>
            </div>
            <div class="clear"></div>
        </div>


        <!-- Отзывы пациентов
============================================= -->
        <div class="content-wrap pt-0 pb-0 front-page">
            <div class="clearfix">
                <div class="container ">
                    <div class="fancy-title title-border title-center">
                        <h2>Отзывы пациентов</h2>
                    </div>                   
				   <!--================================== карусель с отзывами =============================================== -->
					<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget owl-loaded owl-drag"
							data-margin="0" data-nav="true" data-pagi="true" data-margin="20" data-items-xs="1" data-items-sm="1"
							data-items-lg="2" data-items-xl="3">
							<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(-475px, 0px, 0px); transition: all 0.25s ease 0s; width: 3800px;">
								<?php
									$reviews_list = get_posts( array(
										'post_type'   => 'reviews',
										'showposts' => 10,
										'orderby'     => 'date',
										'order'       => 'DESC',								
										));
									foreach ($reviews_list as $rewiew_item) {
											$reviews_link = get_permalink($rewiew_item);
											$reviews_img = get_the_post_thumbnail_url($rewiew_item);
											if (!$reviews_img){$reviews_img = null;}
											$reviews_title = get_the_title($rewiew_item); 
											$reviews_date = get_the_date('j F, Y', $rewiew_item);
											$reviews_excerpt = wp_trim_words(get_the_excerpt($rewiew_item), 18, '...' );											
										?>	
									
										<div class="owl-item">
												<div class="oc-item">
													<div class="iportfolio p-1 m-1">
														<div class="review_contaoner pb-1 pt-1">
															<div class="review-image">															
																<?php if($reviews_img){ ?>
																	<a href="<?php echo $reviews_link; ?>" class="d-inline-block">																
																		<img class= "wp-post-image" loading="lazy" src="<?php echo  $reviews_img; ?>">																																				
																	</a>	
																<?php } ?>															
															</div>	
															<div class="meta_data">														
																<div class="reviews-title">
																	<a href="<?php echo $reviews_link; ?>">
																		<h3>
																			<?php echo $reviews_title;  ?>
																		</h3>
																	</a>
																</div>																	
																<div class="frontpage-reviews-date">
																	<span>
																		<?php echo $reviews_date; ?>
																	</span>
																</div>															
															</div>															
														</div>	
															<div class="reviews-desc">
																<blockquote>
																	<em><p>
																	<?php echo $reviews_excerpt;  ?>
																		</p>
																	</em>
																</blockquote>
															</div>														
													</div>
												</div>
										</div>      
										<?php  } ?>
									
								 </div>
						</div>
				<!--================================== карусель с отзывами  конец =============================================== -->				   				  				   
                </div>
            </div>
            <div class="container clearfix">
                <a href="<?=get_post_type_archive_link('reviews')?>" class="more-link mt-3 fright">Все отзывы &rarr;</a>
            </div>
        </div>
        <!-- Акции
============================================= -->
        <?php get_template_part('parts/sales', 'block');   ?>
        <!-- Подписка
============================================= -->

        <div class="section nobottommargin">
            <div class="container clearfix">
                <div class="heading-block center">
                    <h3>Подпишитесь на <span>новости</span></h3>
                    <span>И узнавайте первыми об акциях и новинках наших клиник</span>
                </div>
                <div class="subscribe-widget">
                    <div class="widget-subscribe-form-result"></div>
                    <form id="widget-subscribe-form2" action="<?=site_url().'/subscribe/'?>" method="post"
                        class="nobottommargin">
                        <div class="input-group input-group-lg divcenter" style="max-width:600px;">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="icon-email2"></i></div>
                            </div>
                            <input type="email" name="email" class="form-control required email"
                                placeholder="Введите ваш E-mail">
                            <div class="input-group-append">
                                <button class="btn bgorange text-white t500" type="submit">Подписаться</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- Видео
============================================= -->
        <div class="clear"></div>
        <div class="section p-0 dark mt-0 mb-0 front-page-video"
            style="background: linear-gradient(to right, rgba(var(--themecontrastrgb),0.2), rgba(var(--themecontrastrgb),0.9)), url('<?php the_field('фон_видео'); ?>') no-repeat center center / cover; min-height: 400px">
            <div class="container">
                <div class="row justify-content-between mb-4" style="padding: 100px 0 160px;">
                    <div class="col-lg-5 col-md-6 offset-lg-1 pt-3">
                        <a href="<?php the_field('ссылка_на_видеоyoutube'); ?>" data-lightbox="iframe"
                            class="play-video ml-3"><i class="icon-play" style="color: #000"></i></a>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-0 mb-md-5 bgray">
                        <div class="custom-content">
                            <?php the_field('текст'); ?>
                            <div class="d-flex">
                                <ul class="col-12 iconlist">
                                    <h3 class="mb-2 text-white"><?php the_field('заголовок_списка1'); ?> </h3>
                                    <?php foreach (get_field('колонка_1') as $key => $value) { ?>
                                    <li class="my-2"><i class="icon-line-circle-check t300"></i>
                                        <span><?php echo $value['пункт'] ?></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <!-- убрал вторую колонку 
                        <ul class="col-6 iconlist">
						 <h3 class="mb-2 text-white"><?php the_field('Заголовок_списка_2'); ?>
                            <?php foreach (get_field('колонка_2') as $key => $value) { ?>
                            <li class="my-2"><i class="icon-line-circle-check t300"></i> <span class="pl-2"><?php echo $value['пункт'] ?></span></li>
                            <?php } ?>
                        </ul>
						-->
                            </div><br>
                            <div style="clear: both;">
                                <p><?php the_field('поле_для_текста_внизу_списка'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <svg class="svg-curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1463 188.03">
                <path style="fill:#FFF;" d="M-.5,288.5s297-175,792-97,599,52,671,25v143H-.5Z"
                    transform="translate(1 -171.47)" />
            </svg>
        </div>
    </div>
    </div>
</section><!-- #content end -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>