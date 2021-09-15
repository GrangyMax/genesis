<?php get_header();
if (have_posts()) : while (have_posts()) : the_post();
      set_query_var('title', get_the_title());
      set_query_var('subtitle',  get_field('адрес'));
      get_template_part('parts/breadcrumbs');
      include_once 'parts/service-search-block.php'; ?>
      <style>
         span.wpcf7-not-valid-tip {
            position: relative;
         }
      </style>

	  <!-- тайтл страницы -->
      <section id="content">
         <div class="modal fade" id="clinic_modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal_large">
               <div class="modal-body">
                  <div class="modal-content">
                     <div class="modal-header">
                        <i class="icon-et-map-pin"></i>
                        <h3 class="modal-title" id="myModalLabel">Расположение клиники</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <section class="clinic-map" id="modalMap" style="height: 300px"></section>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="content-wrap pt-0 pb-0">
            <div class="container mt-0 p-0">
               <div class="container clearfix container_nopadding pb-0 pt-4 p-0">
                  <div class="col_one_third">
                     <div class="feature-box fbox-plain">
                        <div class="fbox-icon">
                           <a><i class="icon-calendar21"></i></a>
                        </div>
                        <h3>График работы:</h3>
                        <p><?php the_field('график_работы') ?></p>
                     </div>
                  </div>
                  <div class="col_one_third">
                     <div class="feature-box fbox-plain">
                        <div class="fbox-icon">
                           <a><i class="icon-phone3"></i></a>
                        </div>
                        <h3>Номера телефонов:</h3>

                        <p>
                           <?php foreach (get_field('номера_телефонов') as $key => $value) { ?>
                              <a href="tel:<?php echo $value['номер_телефона'] ?>"><?php echo $value['номер_телефона'] ?></a> <br>
                           <?php } ?>
                        </p>
                     </div>
                  </div>
                  <div class="col_one_third col_last">
                     <div class="feature-box fbox-plain">
                        <div class="fbox-icon">
                           <a onclick="showModalBy(this)" class="single-klinik-link" data-placemark-coord="[<?php the_field('метка_широта') ?>, <?php the_field('метка_долгота') ?>]" data-placemark-hint="<?php the_title() ?>" data-placemark-text="<?php the_field('адрес') ?>"><i class="icon-location"></i></a>
                        </div>
                        <h3>Адрес:</h3>
                        <p><?php
						/*the_field('адрес');*/	 /*разбиваем поле с адресом на строки, чтобы вывести результат построчно*/	
							$adress = get_field('адрес');
							$town =  explode(",", $adress);							
							$street= strstr($adress, 'пр.');
							if (!$street){$street= strstr($adress, 'ул');}	
							if(isset($town[1]) && stripos($town[1], 'Мирное')) {$town[1] = ", ".$town[1].","; } else{ unset($town[1]); $town[0]= $town[0].","; }		
							if(isset($town[1])){ echo $town[0].$town[1]."<br>".$street;	} else { echo $town[0]."<br>".$street;	}
						?></p>
                        <a onclick="showModalBy(this)" id="klinik-link-maps" class="single-klinik-link" data-placemark-coord="[<?php the_field('метка_широта') ?>, <?php the_field('метка_долгота') ?>]" data-placemark-hint="<?php the_title() ?>" data-placemark-text="<?php the_field('адрес') ?>">
                           Показать на карте
                        </a>
                     </div>
                  </div>
               </div>
               <?php if ($slider = get_field('галерея')) { ?>
                  <div class="divider"><i class="icon-circle"></i></div>
				  <!--карусель начало -->
                  <div id="oc-images" class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="1" data-items-sm="3" data-items-lg="3" data-items-xl="3">
                     <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-224px, 0px, 0px); transition: all 0s ease 0s; width: 784px;" data-lightbox="gallery">
                           <?php foreach ($slider as $key => $slide) { ?>
                              <?php if ($slide['тип'] == 'Фото') { ?>
							  
                                 <div class="owl-item" style="width: 92px; margin-right: 20px;">
                                    <div class="oc-item2 oc-item-img"> <!-- добавил класс oc-item2, чтобы привести вертикальные и горизонтальные картинки к одному формату. До этого был класс .oc-item-->
                                       <a href="<?php echo $slide['фото']['url'] ?>" data-lightbox="gallery-item">									   
									   <img loading="lazy" src="<?php echo $slide['фото']['url'] ?>" alt="<?php echo $slide['фото']['alt'] ?>"></a>							  		
									   
                                    </div>
                                 </div>
								 
                              <?php } else {  ?>
                                 <div class="owl-item active" style="width: 92px; margin-right: 20px;">
                                    <div class="oc-item fluid-width-video-wrapper" style="padding-top: 66.65%;">
                                       <iframe src="<?php echo $slide['ссылка'] ?>" frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                 </div>
                           <?php }
                           } ?>
                        </div>
                     </div>
                     <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
                  </div>
				   <!--карусель конец -->
				  
				  
               <?php } ?>
               <div class="divider"><i class="icon-circle"></i></div>
			    <span class="scroll-up"></span>
				
               <section class="text_review"">
				<!--		
				<div class="text_review__background">
				</div>	
				-->	
                  <?php the_content(); ?>      		

               </section>
			
				<section class="read-button">
				
				<div>
					<?php include 'parts/read-more-button.php'; ?>	
				</div>
				</section>
			
               <section>	
			   
			       <div class="fancy-title title-border title-center mt-4">
                     <h2>Направления</h2>
                  </div>
				  
                  <div class="blocks">
                     <input class="js-search-block form-control form-control-lg p-4 mb-4" type="text" placeholder="Поиск услуги" />
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
                     $direct_select = '';
                     foreach (get_field('услуги') as $key => $serv) {
                        $direct_select .= '<option>' . $serv['направление']->post_title . '</option>';
                     ?>

                        <div class="block">
                           <div class="block-head">
                              <div class="toggle toggle-border tabs-uslugi">
                                 <div class="togglet block-head__title"><i class="toggle-closed icon-ok-circle"></i><i class="toggle-open icon-remove-circle block-head__title"></i><?php echo $serv['направление']->post_title; ?>
                                 </div>
                                 <div class="togglec block-head__shortname" style="display: none;">
                                    <?php
                                    echo service_list_start();
                                    foreach ($serv['услуги'] as $key => $value) { 
										if($value['услуга']->post_status == 'publish')// отображать только те услуги, которые опубликованы
										{
										   $title = $value['услуга']->post_title;
										   $price = $value['цена_новая'];										  
										   $price_repeat = $value['повторный_прием'];
										   $link = get_permalink($value['услуга']->ID);
										   $link .= '?from=' . get_the_ID();
										   echo service_row($title, $price, $price_repeat, $link);
										}
                                    }
                                    echo service_list_end();
                                    ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
                  <section>
                     <div class="fancy-title title-border title-center ">
                        <h2>Наши врачи</h2>
                     </div>
                     <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget owl-loaded owl-drag" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="3" data-items-lg="3">
                        <div class="owl-stage-outer">
                           <div class="owl-stage" style="transform: translate3d(-475px, 0px, 0px); transition: all 0.25s ease 0s; width: 3800px;">
                              <?php foreach (get_field('сотрудники') as $key => $doctor) {
                                 $rang = get_post_meta($doctor->ID, 'rang', 1);
                              ?>
                                 <div class="owl-item" style="width: 455px; margin-right: 20px;">
                                    <div class="oc-item">
									
										 <?php if ($doctor->post_status == 'publish'){ ?>
                                       <div class="iportfolio">
                                          <div class="portfolio-img-container portfolio-image">
                                             <a href="<?php the_permalink($doctor); ?>">
																							
												<img loading="lazy" src="<?php echo get_the_post_thumbnail_url($doctor, 'doctor-photo-1x') ?>" 
													srcset="<?php echo get_the_post_thumbnail_url($doctor, 'doctor-photo-1x')?> 1x,
													<?php echo get_the_post_thumbnail_url($doctor, 'doctor-photo-1.5x') ?> 1.5x,
													<?php echo get_the_post_thumbnail_url($doctor, 'doctor-photo-2x') ?> 2x"																														 
													 alt="<?php the_title(); ?>">													 
											 </a>
											 <!-- убираем кругляши по центру при наведении
                                             <div class="portfolio-overlay">
                                                <a href="<?php the_permalink($doctor); ?>" class="center-icon"><i class="icon-line-ellipsis"></i></a>
                                             </div> -->
                                          </div>
                                          <div class="portfolio-desc">
                                             <h3><a href="<?php the_permalink($doctor); ?>"><?php echo get_the_title($doctor); ?></h3>
                                             <span><?= $rang ?></span>
												
											 </a>
                                          </div>
                                       </div>
									    <?php } ?>
										 
									   
                                    </div>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                        <div class="clinic owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                     </div>
                  </section>
            </div>
         </div>
      </section>
      <?php get_template_part('parts/sales', 'block');  ?>
      <div class="container">
         <div class="fancy-title title-border title-center ">
            <h2>Оставить заявку</h2>
			<div style="display: none;">			
				<?php 
				$clinic_id = get_the_ID();
				?> 				
				<span class="clinicId" data-attr="<?=$clinic_id;?>"></span>		
				
			</div>
         </div>
      </div>
      <div id="contact-form-overlay" class="contact-form-overlay-clinic clearfix mt-5 mb-5">

         <div class="form-widget">

            <div class="form-result"></div>
			

            <!-- Contact Form
						============================================= -->
            <?php
            $email = get_field('email') ? get_field('email') : get_option('admin_email');
			
            echo str_replace('{{clinic_email}}', $email, str_replace('{{direct_list}}', $direct_select, str_replace('{{clinic_id}}', $clinic_id ,do_shortcode('[contact-form-7 id="36234" title="Запись на прием(Клиника)" html_class="nobottommargin"]')))); 
			
			?>
			<script>			
					var form_clink = document.getElementById('template-contactform-submit');
					form_clink.onclick = function() {				
					$clinicID = $('.clinicId').attr('data-attr');					
					ym(39014465, 'reachGoal', $clinicID); return true;
				}			
				
			</script>
		</div>
      </div>
      </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>