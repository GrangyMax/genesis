<?php

get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
$thumb = get_the_post_thumbnail_url();
if(!$thumb)$thumb = false;
?>
                        <!-- тайтл страницы -->
                        <section id="content" style="margin-bottom: 0px;">

                            <div class="content-wrap" style="padding: 10px;">
                
                                <div class="container clearfix">
                
                                    <!-- Post Content
                                    ============================================= -->
                                    <div class="postcontent nobottommargin clearfix mt-0 p-3" style="width: 100%; background-color: #f1f1f1; border: 1px solid #e5e5e5">
                
                                        <div class="single-post nobottommargin">
                
                                            <!-- Single Post
                                            ============================================= -->
                                            <div class="entry">               
                                             
                                                <h2><?php the_title(); ?></h2>                
                                                <!-- Entry Content
                                                ============================================= -->
                                                <div class="entry-content">                
                                                    <!-- Entry Image
                                                    ============================================= -->
                                                    <?php if($thumb){ ?>
                                                        <div class="entry-image alignleft">
                                                            <a><img src="<?php echo $thumb;?>" alt="<?php the_title(); ?>" style="width: 200px;"></a>
                                                        </div>
                                                    <?php } ?>
                                                   <!-- .entry-image end -->
														<p class="p-3 m-2"><?php the_excerpt(); ?>	</p>	
														<a href="<?=get_permalink()?>" class="more-link p-2">Перейти</a>	
                                                </div>
												
                                            </div><!-- .entry end -->
											
											 <div class="pricing-box pricing-extended clearfix pb-2">
													  <!-- clinic.description -->
													  <div class="pricing-desc">
													  
														 <div class="pricing-features">
															<div class="container clearfix pb-0 pt-4 p-0">
															   <div class="col_half">
																  <div class="feature-box fbox-plain">
																	 <div class="fbox-icon">
																		<a><i class="icon-calendar21"></i></a>
																	 </div>
																	 <h3>График работы:</h3>
																	 <p><?php the_field('график_работы', $clinic->ID); ?></p>
																  </div>
															   </div>
															   <div class="col_half col_last">
																  <div class="feature-box fbox-plain">
																	 <div class="fbox-icon">
																		<a><i class="icon-location"></i></a>
																	 </div>
																	 <h3>Адрес:</h3>
																	 <p><?php the_field('адрес'); ?></p>
																  </div>
															   </div>

															</div>
														 </div>
													  </div>
													  <!-- clinic.phones -->
													  <div class="pricing-action-area">
														 <div class="col-12">                        
															   <h4>Номера телефонов:</h4>                        
															<div class="phones__contact_tahonomy">
															   <?php foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) { ?>
																  <a href="tel:<?php echo $value['номер_телефона'] ?>"><?php echo $value['номер_телефона'] ?></a> <br>
															   <?php } ?>
															</div>
														 </div>
														 <div class="pricing-action phones__contact2 pt-2 mb-2">
															<a href="<?php the_permalink($clinic->ID); ?>" class="button-xlarge btn-block nomargin bgorange page-clinic-button">Страница клиники</a>
														 </div>
													  </div>
												</div>					
						</div>
                
                                    </div><!-- .postcontent end -->
                
                                    <!-- Sidebar
                                    ============================================= -->
                
                                </div>
                
                            </div>
                
                        </section>
      <?php endwhile; endif; ?>

<?php get_footer(); ?>