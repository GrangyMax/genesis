<?php get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
$price = get_post_meta(get_the_ID(), 'price', 1);
set_query_var('title', get_the_title() );
if ($price)
		{if(!stristr($price, '₽')){
				$price= $price .' &#8381;'; /*добавляем значек рубля, если цена больше нуля и значек рубля не в вставляли в админку*/				
		}
	}

/*set_query_var('subtitle',  $price?$price.'&#8381;':''  );*/

set_query_var('subtitle',  $price); 
get_template_part('parts/breadcrumbs'); ?>
<style>
span.wpcf7-not-valid-tip {
    position: relative;
}
</style>
      <section id="content" style="margin-bottom: 0px;">
         <div class="content-wrap mobile-usluga" style="padding-top: 15px;">
            <div class="container clearfix">
               <!-- Post Content
                     ============================================= -->
               <section>			
                    <div class="text_review">
						<?php the_content(); ?>					 
					</div>
               </section>
			   
			   <section class="read-button">					
					 <?php include 'parts/read-more-button.php'; ?>					
			   </section>			   
               <?php             
			   
					$args = array(
						'numberposts'	=> -1,
						'post_type'		=> 'klinika',
						
						'meta_query'	=> array(
							'relation'		=> 'OR',
							array(
								'key'		=> 'услуги_$_услуги_$_услуга',
								'compare'	=> '=',
								'value'		=> get_the_ID(),						
							),					
						)
					);
					$the_query = new WP_Query( $args ); 			
			/* нужно получить id направления текущей услуги, и затем проверить, относится ли данная услуга 
			 к направлению - офтальмологии*/
			
			//получить все услуги, у которых направление - офтальмология (38828)
			$service_oft = get_posts(array(
                           'post_type' => 'service',
                           'showposts' => -1,
                           'meta_key' => 'parentem',
                           'meta_value' => 38828, 
                        ));							
			//получить все услуги, у которых направление - онкология (289)
			$service_onk = get_posts(array(
                           'post_type' => 'service',
                           'showposts' => -1,
                           'meta_key' => 'parentem',
                           'meta_value' => 289, 
                        ));		
					//проверить, входит ли данная услуга, в список тех, у которых направление - центр зрения 
			foreach ( $service_oft  as $oft )
			{
				if($oft->ID == get_the_ID()) { $is_oftalmolog = true; }			
			}	
				
			foreach ( $service_onk  as $onk )
			{ 
				if($onk->ID == get_the_ID())	{$is_onkolog = true;}			
			}	
		
               ?>
               <section>
                  <div class="modal fade" id="clinic_modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     style="display: none;" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-body">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <i class="icon-et-map-pin"></i>
                                 <h4 class="modal-title" id="myModalLabel">Контакты клиники</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                 <p>
                                    <div class="feature-box fbox-plain">
                                       <div class="fbox-icon">
                                          <a href="#"><i class="icon-calendar21"></i></a>
                                       </div>
                                       <h3>График работы:</h3>
                                       <p class="modal__schedule-block">Пн. – вс.: 8:00 - 21:00</p>
                                    </div>
                                 </p>
                                 <hr>

                                 <p>
                                    <div class="feature-box fbox-plain">
                                       <div class="fbox-icon">
                                          <a href="#"><i class="icon-phone3"></i></a>
                                       </div>
                                       <h3>Номера телефонов:</h3>
                                       <p class="modal__phones-block"><a href="tel:+73652604900">+7 (3652) 604 900</a>
                                          <br> <a href="tel:+79787325000">+7 (978) 732 50 00</a></p>
                                    </div>
                                 </p>
                                 <hr>

                                 <p>
                                    <div class="feature-box fbox-plain">
                                       <div class="fbox-icon">
                                          <a href="#"><i class="icon-location"></i></a>
                                       </div>
                                       <h3>Адрес:</h3>
                                       <p class="modal__address-block">г.Симферополь, ул.Семашко, 4-А</p>
                                    </div>
                                 </p>
                                 <section class="clinic-map" id="modalMap" style="height: 300px"></section>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
				  	  
					if($is_onkolog){
						include_once 'parts/onkolog_queue.php';
					}
					
					if($is_oftalmolog){					
						
						include_once 'parts/oftalmolog_queue.php';
					}
				  ?>
                <h2 class="mt-4">Цены и места предоставления услуги  <span style="color: #0969A2; "> &#171;<?php echo get_the_title() ?>&#187;</span></h2>
				                
                <!--  <div class="accordion accordion-bg clearfix accordion-usluga" <?=$accordion_state?>>-->
				<?php  foreach ($the_query->posts as $clinic){  
								$clinic_select =  '';								
								   $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
								   $clinic_select .= '<option value="'. $email .'">' . get_the_title($clinic) . '</option>';
								   $clinic_select_form .= '<option value="'.  get_the_title($clinic) .'" class="chosen-select">' . get_the_title($clinic) . '</option>';
				?>
			<div class="block">
				<div class="block-head">
					<div class="toggle toggle-border tabs-uslugi">
															
							 <div class="togglet block-head__title">
							 
							 
								<i class="toggle-closed icon-ok-circle"></i>
								<i class="toggle-open icon-remove-circle block-head__title" style="padding: 2px 15px;"></i>
								<!-- <div style="display: inline-block; color: #0969A2;">	-->
								<div style="display: inline-block;">	
									<?php echo get_the_title($clinic); ?> 
								</div>
									<?php						
									  // console_log('------клиника-------');
									  $services = array_map(function ($v) {
										 return $v['услуги'];
									  }, get_field('услуги', $clinic->ID));
									  $services = array_merge(...$services);
									  $services = array_filter($services, function ($v) {
										 return $v['услуга']->ID == get_the_ID();
									  });

									  $services_unique = [];

									  $is_unique = true;
									  foreach($services as $service) {
										 /*console_log("{$service['услуга']->ID}");*/
										 foreach($services_unique as $service_u) {
											/*console_log("__{$service['услуга']->ID} == {$service_u['услуга']->ID}");
											console_log("__*{$service['цена_новая']} == {$service_u['цена_новая']}");*/
											if ($service['услуга']->ID == $service_u['услуга']->ID) {
											  /* console_log("____not_unique");*/
											   $is_unique = false;
											   break;
											}
										 }

										 if ($is_unique) {
											// console_log("added");
											$services_unique[] = $service;
										 }
									  }
								?>
								
								<div class="service_address_row">	<!--адрес клиники-->							
									<?php echo the_field('адрес', $clinic->ID);?>
								</div>
								
								<div class="service_price_klinic"> <!--цена услуги клиники-->
									 <?php 
									 foreach ($services_unique as $v) {
										echo format_price($v['цена_новая']);
										}   
									?>
								</div>
								 
								
							 </div>
																
							   <div class="togglec block-head__shortname" style="display: none; padding: 0 15px 15px 36px">	<!--блок с контактами -->
							   
									<div class="service_contact_block">
										<div class="service_button_contacts">
										<a onclick="showModalBy(this)" id="klinik-link-maps" class="contacts-usluga" data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID) ?>, 
										   <?php the_field('метка_долгота', $clinic->ID) ?>]"
										   data-placemark-hint="<?php the_field('адрес', $clinic->ID ) ?>"
										   data-placemark-text="<?php the_field('адрес', $clinic->ID ) ?>"
										   data-schedule="<?php the_field('график_работы', $clinic->ID ) ?>"
										   data-address="<?php the_field('адрес', $clinic->ID ) ?>"
										   data-phones="<?php $phones = []; 
										   foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) $phones[] = $value['номер_телефона']; 
										   echo implode(', ', $phones);
										   ?>">
										   <i class="icon-map-marker1 mr-1"></i>
											Контакты клиники
										</a>
										</div>
										<div class="service_link_clinic">
											<a href="<?= get_permalink($clinic->ID) ?>" class="more-link">Страница клиники →</a>
										</div>
									</div> 
									
								</div>
														
					</div>
				</div>
			</div>
			 <? } ?>
               </section>
			   
			   <?php if(get_field('doctor_for_this_service')) {  ?> <!-- если поле с врачами заполнено, тогда выводим блок с врачами--> 
			    <section>
                     <div class="fancy-title title-border title-center">
                        <h2>Наши врачи</h2>
                     </div>
                     <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget owl-loaded owl-drag" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="3" data-items-lg="3">
                        <div class="owl-stage-outer">
                           <div class="owl-stage" style="transform: translate3d(-475px, 0px, 0px); transition: all 0.25s ease 0s; width: 3800px;">
                              <?php foreach (get_field('doctor_for_this_service') as $key => $doctor) {
                                 $rang = get_post_meta($doctor->ID, 'rang', 1);
                              ?>
                                 <div class="owl-item" style="width: 455px; margin-right: 20px;">
                                    <div class="oc-item">
									
									
								 <?php if ($doctor->post_status == 'publish'){ ?>
                                       <div class="iportfolio">									   
                                          <div class="portfolio-img-container portfolio-image">
                                             <a href="<?php the_permalink($doctor); ?>">
                                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($doctor, 'doctor') ?>" alt="Врач клиники Генезис">
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
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                     </div>
                  </section>
				  
				  <?php } ?>
				  			  
				
			    <div class="container">
					 <div class="fancy-title title-border title-center ">
							<h2>Оставить заявку</h2>
						</div>
				</div>
			   
               <div id="contact-form-overlay" class="contact-form-overlay-clinic clearfix mt-5 mb-5">
                  <div class="form-widget">
                     <div class="form-result"></div>
                     <!-- Contact Form
      ============================================= -->
	  
                    <?php echo str_replace('{{clinics_list}}', $clinic_select_form, do_shortcode('[contact-form-7 id="36239" title="Запись на прием(Услуга)" html_class="nobottommargin"]')); ?>
                  </div>
               </div>
			  	   
			   
            </div>

         </div>

      </section>
      <?php endwhile; endif; ?>
<?php get_footer(); ?>