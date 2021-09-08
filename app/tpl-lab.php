<?php 
/* Template name: Лаборатории */
get_header();
$title=get_the_title();
set_query_var('title', $title );
$subtitle=get_the_content();
set_query_var('subtitle', $subtitle );
?>
 		
<?php  get_template_part('parts/breadcrumbs'); ?> 
<script>const RUBLE = `<?=constant('RUBLE');?>`;</script>
        <section id="content">
		
            <div class="content-wrap pt-0 pb-0">

                <div class="container mt-0 p-0">

                    <section>   
                        <div class="lab-tabs tabs side-tabs tabs-bordered clearfix ui-tabs ui-corner-all ui-widget ui-widget-content"
                            id="tab-5">						
							
                            <input class="js-search-block-lab form-control form-control-lg p-4 mt-4 mb-4" type="text"
                                placeholder="Поиск анализа" />

                            <!-- <i class="icon-lab"></i> Анализы
                            <i class="icon-lab2"></i> Комплексы
                            <i class="icon-gift1"></i> Акции -->

                            <div class="service-tabs-block">
						
						 <div class="service-tab service-tab_root">
                                    <div class="service-tab__title">
																<!-- Button trigger modal -->
										<button type="button" class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">Информация для пациентов</button>
                                       
                                    </div>
                                </div>
																
									<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									 
										<div class="modal-content">
										
										
										  <div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel" style="text-align: center;">Информация для пациентов</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">×</span>
											</button>
										  </div>										  
										  
										<div class="modal-body">										
											<div style="padding: 15px 15px 15px 30px;">												
												
												<?php
													$postID = 52143;
													$args = array(
														'p' => $postID, // ID поста
														'post_type' => 'page'
														);
													$recent = new WP_Query($args);
													while ( $recent->have_posts() ) : $recent->the_post();											
														the_content(); 	
													endwhile; ?>
											</div>	
										</div>	
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="$.magnificPopup.close(); return false;" >Закрыть</button>
										</div>	
										
										</div>
									  </div>
									</div>

															
						
                                <div class="service-tab service-tab_root">
									
                                    <div class="service-tab__title" data-action="get_analyzes">
                                        <i class="icon-lab"></i> Анализы
                                        <div class="service-tab__arrow"><i class="icon-caret-down1"></i></div>
                                    </div>
                                    <div class="service-tab__content">
                                    <?php $terms = get_terms( [
                                            'taxonomy' => 'analizi_cat',
                                            'hide_empty' => true,
                                        ] ); 
                                        foreach ($terms as $key => $value) { ?>
                                        <div class="service-tab service-tab__service-single" data-action-id="<?php echo $value->term_id; ?>">
                                            <i style="color: <?php the_field('иконка', 'analizi_cat_'.$value->term_id); ?>" class="icon-lab"></i> <?php echo $value->name; ?>
                                        </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
								
                                <div class="service-tab service-tab_root">
								
                                    <div class="service-tab__title" data-action="get_kompleks">
                                        <i class="icon-lab2"></i> Комплексы
                                        <div class="service-tab__arrow"><i class="icon-caret-down1"></i></div>
                                    </div>
								
                                    <div class="service-tab__content">
                                        <?php $terms = get_terms( [
                                            'taxonomy' => 'kompleksi_cat',
                                            'hide_empty' => true,
                                        ] ); 
                                        foreach ($terms as $key => $value) { ?>
                                        <div class="service-tab service-tab__service-single" data-action-id="<?php echo $value->term_id; ?>">
                                            <i style="color: <?php the_field('иконка', 'kompleksi_cat_'.$value->term_id); ?>" class="icon-lab2"></i> <?php echo $value->name; ?>
                                        </div>
                                        <?php }
                                        ?>
                                    </div>
									
									
                                </div>
								<!--
                                <div class="service-tab service-tab_root">
                                    <div class="service-tab__title" data-action="get_saleslab">
                                        <i class="icon-gift1"></i> Акции
                                    </div>
                                </div>
								-->
                            </div>

                            <div class="tab-container toggle">
                                <div class="preloader-main" style="display: none"></div>
                                <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content"
                                    id="tabs-17" aria-labelledby="ui-id-37" role="tabpanel" aria-hidden="false">
                                    <div class="list-group blocks-lab">
                                    <?php 
                                    $args = array(
                                        'post_type'  => array('kompleks', 'analyzes'),
                                        'post_status'=> 'publish',
                                        'posts_per_page' => '10',
                                        'paged'          => 1
                                    );
                                    $query = new WP_Query( $args );
                                    if(count($query->posts)) {
                                        
                                        foreach ($query->posts as $key => $analiz) { ?>
                                        <a href="<?php echo get_the_permalink($analiz->ID); ?>"
                                            class="list-group-item list-group-item-action flex-column align-items-start block-lab pt-1">
                                            <div class="pr-2 pl-2">
                                                <div class="d-flex w-100 justify-content-between block-title-lab pt-3">
                                                    <h3 class="lab-tabs__title mb-2 text-blue">
                                                        <i class="block-title-lab"></i>
                                                        <?php echo get_the_title($analiz->ID); ?>
                                                    </h3>
											
                                                </div>
                                                <p class="mb-2 block-short-lab"><?php echo get_the_excerpt($analiz->ID); ?>
                                                </p>
                                            </div>
                                            <?php if(get_field('выезд_на_дом', $analiz->ID)) { ?><small class="iconlab-page"><i class="icon-car"></i> Возможен выезд на дом</small><?php } ?>
                                            <?php if(get_field('акция', $analiz->ID)) { ?><small class="iconlab-page-red"><i class="icon-gift"></i> Акция</small><?php } ?>
                                            <div class="lab-tabs__foot row p-2 pt-0 pb-0">
                                                <span class="col pt-1 pb-2">
                                                    Цена: 
                                                    <span class="lab-tabs__price"><?= format_price(get_field('price', $analiz->ID)); ?></span>
                                                </span>
                                                <span class="col-auto pt-1 pb-2">
                                                    <small class="lab-more">Подробнее</small>
                                                </span>
                                            </div>
                                        </a>
                                        <?php }     
                                    } ?>
                                    </div>
                                </div>
                                <div class="preloader-bottom"></div>
                            </div>

                            <div class="search-result-block" style="display: none">
                                <div class="preloader-main"></div>
                                <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content">
                                    <div class="list-group blocks-lab" style="display: none">

                                        
                                    </div>
                                </div>
                                <div class="preloader-bottom" style="display: none"></div>
                            </div>

                        </div>

                </div>
            </div>
    </div>
    <div class="container clearfix">

        <!-- Post Content
                    ============================================= -->


    </div>
    </section>

    </section>
<?php get_footer(); ?>