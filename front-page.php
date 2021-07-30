<?php 

get_header();
if (have_posts()) : while (have_posts()) : the_post();

$query = new WP_Query(array(
    'post_type' => 'klinika',
    'posts_per_page' => -1
));

$clinic_select = '';
foreach ($query->posts as $key => $clinic) {
    $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
    $clinic_select .= '<option value="'. $email .'" class="chosen-select">' . get_the_title($clinic) . '</option>';
	$clinic_select_form .= '<option value="'.  get_the_title($clinic) .'" class="chosen-select">' . get_the_title($clinic) . '</option>';
}
?>

<section id="slider" class="slider-element bgcolor clearfix" style="height: auto; padding: 60px 0; background: url('<?php the_field('фон') ?>') no-repeat center center / 100% 100%;">
    <!--Scroll Down Button-->
    <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow">
        <i class="icon-angle-down infinite animated fadeInDown" style="animation-duration: 1s;"></i>
    </a>
    <div class="container" style="z-index: 2">
        <div class="center">
            <h1 class="text-white h2 t600 mb-2 title-desctop"><?php the_field('заголовок') ?></h1>
			<h2 class="text-white h2 t600 mb-2 title-mobile">
				<?php 
					$general_title = get_field('заголовок');
					$general_title1 =  explode("-", $general_title);
					echo $general_title1[0]."- <br>".$general_title1[1];				
				?>
			</h2>
            <p class="text-white-50"><?php the_field('подзаголовок') ?>
			<br>(оказываются услуги и по ОМС)</p>
			
        </div>
        <div class="row topmargin justify-content-end clearfix">
            <div class="col-lg-6">
                <ul class="nav nav-tabs nav-justified flex-column border-bottom-0 flex-md-row bgcolor mt-4" role="tablist">
                    <li class="nav-item text-white">
                        <a class="nav-link py-3 active" id="home-moving-tab" data-toggle="tab" href="#appointment" role="tab" aria-controls="appointment" aria-selected="true">Заявка на прием</a>
                    </li>
                    <li class="nav-item text-white">
                        <a class="nav-link py-3" id="office-moving-tab" data-toggle="tab" href="#callback" role="tab" aria-controls="callback" aria-selected="false">Обратный звонок</a>
                    </li>
                    <li class="nav-item text-white">
                        <a class="nav-link py-3" id="others-moving-tab" data-toggle="tab" href="#ask" role="tab" aria-controls="ask" aria-selected="false">Задать вопрос</a>
                    </li>
                </ul>
                <div class="tab-content rounded-bottom shadow bg-white py-4 px-5">
                    <div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
                        <!-- <p class="mb-4">Введите ваши данные, место жительства, удобную для вас дату, необходимого специалиста, и мы организуем вам прием. Обязательно свяжемся с вами, для согласования деталей.</p> -->
                        <div class="form-widget">
                            <div class="form-result"></div>
							
                            <?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36216" title="Запись на прием(Главная)" html_class="row home-moving-form position-relative mb-0"]')); ?>
							 			
                        </div>						
                    </div>
                    <div class="tab-pane fade" id="callback" role="tabpanel" aria-labelledby="callback-tab">
                        <!-- <p class="mb-4">Оставьте ваши данные и мы свяжемся с вами, в течение нескольких минут, в рабочее время.</p>-->
                        <div class="form-widget">
                            <div class="form-result"></div>
                            <?php echo str_replace('{{clinics_list}}', $clinic_select_form, do_shortcode('[contact-form-7 id="36217" title="Обратный звонок(Главная)" html_class="row office-moving-form position-relative mb-0"]')); ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ask" role="tabpanel" aria-labelledby="ask-tab">
                        <div class="form-widget">
                            <div class="form-result"></div>
                            <?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36218" title="Задать вопрос(Главная)" html_class="row others-moving-form position-relative mb-0"]')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-flex flex-wrap justify-content-center">
                <img loading="lazy" src="<?php the_field('дополнительное_изображение') ?>" alt="Genesis" class="d-flex align-self-end ml-5 mt-3">
            </div>
        </div>
    </div>
    <div class="svg-separator">
        <div>
            <div class="bg-white" style="height: 150px"></div>
        </div>
    </div>
</section>
<section id="content">
<div class="content-wrap pt-0 pb-0 front-page">
    <div class="container clearfix mb-50">
        <div class="fancy-title title-border title-center ">
            <h2>Наши локации</h2>
        </div>
        <!-- Фильтр
        ============================================= -->
        <ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">
            <li class="activeFilter"><a href="#" data-filter="*">Все</a></li>
            <?php $terms = get_terms( [
                'taxonomy' => 'locations',
                'hide_empty' => true,
            ] ); 
            foreach ($terms as $key => $value) { ?>
               <li><a href="#" data-filter=".<?php echo $value->term_id; ?>"><?php echo $value->name; ?></a></li>
            <?php }
            ?>
        </ul>
        <div class="clear"></div>
        <div id="portfolio" class="portfolio grid-container portfolio-4 mb-5 clearfix row-clinic-opacity" data-layout="fitRows" style="position: relative;">
            <?php $query = new WP_Query( array(
                        'post_type' => 'klinika'
                    ) );
            foreach ($query->posts as $key => $value) {
                $terms = wp_get_post_terms( $value->ID, 'locations');
                // var_dump($terms);
                ?>        
            <article class="portfolio-item <?php foreach ($terms as $term) echo $term->term_id.' '; ?> simferopol">
                <div class="portfolio-image">
                    <a href="<?php the_permalink($value); ?>">
                        <!--						
						<img loading="lazy" src="<?php echo get_the_post_thumbnail_url($value, 'medium') ?>" alt="<?php echo get_the_title($value); ?>"
										 srcset="<?php echo get_the_post_thumbnail_url($value, 'medium') ?> 1x, 
												 <?php echo get_the_post_thumbnail_url($value, 'full') ?> 2x">				
							-->		
						<img src="<?php echo get_the_post_thumbnail_url($value) ?>" alt="<?php echo get_the_title($value); ?>">
																				  							
                    </a>
                </div>
                <div class="portfolio-desc">
                    <h3><a href="<?php the_permalink($value); ?>"><?php echo get_the_title($value); ?></a></h3>
                    <span><?php /*the_field('адрес', $value->ID) */ 
					$adress = get_field('адрес', $value->ID);
					$town =  explode(",", $adress);
					$street= strstr($adress, 'пр.');
					if (!$street){$street= strstr($adress, 'ул');}	
					if(stripos($town[1], 'Мирное')) {$town[1] = ", ".$town[1].","; } else{ unset($town[1]); $town[0]= $town[0].","; }		
 					echo $town[0].$town[1]."<br>".$street;
					
					?></span>
                </div>
            </article>
            <?php } ?>
        </div>

    </div>
	
    <!--Последние новости
============================================= -->

 <div class="content-wrap pt-0 pb-0 front-page">

			 <div class="clearfix">
					  <div class="container ">
						<div class="fancy-title title-border title-center">
							<h2>Последние новости</h2>
						</div>
							<?php echo do_shortcode('[ocpc-post-carousel id=39963]'); ?>					
					  </div>
		  </div>
				<div class="container clearfix">
					<a href="<?=get_post_type_archive_link('news')?>" class="more-link fright">Все новости &rarr;</a>  
			  </div>   
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
                        // var_dump($doctor[0]->ID);
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
						 <a href="<?php echo get_the_post_thumbnail_url($wEntry->ID);?>"
							data-lightbox="image">
														
							 <img loading="lazy" class="image_fade" src="<?php echo get_the_post_thumbnail_url($wEntry->ID, 'medium') ?>" alt="<?php the_title(); ?>"
										 srcset="<?php echo get_the_post_thumbnail_url($wEntry->ID, 'medium') ?> 1x, 
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
							<?php echo do_shortcode('[ocpc-post-carousel id=39964]'); ?>					
					  </div>
		  </div>
				<div class="container clearfix">
					<a href="<?=get_post_type_archive_link('reviews')?>" class="more-link fright">Все отзывы &rarr;</a>  
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
                <form id="widget-subscribe-form2" action="<?=site_url().'/subscribe/'?>" method="post" class="nobottommargin">
                    <div class="input-group input-group-lg divcenter" style="max-width:600px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon-email2"></i></div>
                        </div>
                        <input type="email" name="email" class="form-control required email" placeholder="Введите ваш E-mail">
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

    <div class="section p-0 dark mt-0 mb-0 front-page-video" style="background: linear-gradient(to right, rgba(var(--themecontrastrgb),0.2), rgba(var(--themecontrastrgb),0.9)), url('<?php the_field('фон_видео'); ?>') no-repeat center center / cover; min-height: 400px">
        <div class="container">
            <div class="row justify-content-between mb-4" style="padding: 100px 0 160px;">
                <div class="col-lg-5 col-md-6 offset-lg-1 pt-3">
                    <a href="<?php the_field('ссылка_на_видеоyoutube'); ?>" data-lightbox="iframe" class="play-video ml-3"><i class="icon-play" style="color: #EF7F1A"></i></a>
                </div>
                <div class="col-lg-5 col-md-6 mb-0 mb-md-5 bgray">
				<div class="custom-content">
                    <?php the_field('текст'); ?>
                 
                    <div class="d-flex">
                        <ul class="col-12 iconlist">
						 <h3 class="mb-2 text-white"><?php the_field('заголовок_списка1'); ?> </h3>
                            <?php foreach (get_field('колонка_1') as $key => $value) { ?>
                                <li class="my-2"><i class="icon-line-circle-check t300"></i> <span><?php echo $value['пункт'] ?></span></li>
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
            <path style="fill:#FFF;" d="M-.5,288.5s297-175,792-97,599,52,671,25v143H-.5Z" transform="translate(1 -171.47)"/></svg>
    </div>

</div>

</section><!-- #content end -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>