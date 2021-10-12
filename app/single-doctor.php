<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); 

$exp = get_post_meta($post->ID, 'expi', 1);
$rang = get_post_meta($post->ID, 'rang', 1);
$level = get_post_meta($post->ID, 'leve', 1);
$link = get_post_meta($post->ID, 'link', 1);
$acco = get_post_meta($post->ID, 'acco', 1);

set_query_var('title', get_the_title() );
set_query_var('subtitle',  $rang );
get_template_part('parts/breadcrumbs');
include_once 'parts/service-search-block.php';
				
 ?>

         <section id="content" style="margin-bottom: 0px;">
            <div class="content-wrap" style="padding-top: 15px;">
               <div class="container clearfix">
                  <!-- Post Content
                     ============================================= -->
                  <div class="postcontent nobottommargin notopmargin clearfix mt-5">
                     <section>
                        <div class="col_two_fifth">
                           <div class="mobile-adaptation-doctor">
                     				<?php
								$size= getimagesize(get_the_post_thumbnail_url($post, 'doctor-photo-2x'));
								/*часть фотографий врачей очень маленького размера (300х398), при использовании 
								src set 2x они становятся еще меньше, поэтому добавил условие, которое определяет высоту фотографий
								и использует src set только для фотографий хорошего размера								
								*/
									if($size[1]<401){ ?>
										
										<img loading="lazy" src="<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-2x') ?>" 
										alt="<?php the_title(); ?>">
										
									<?php }									
										else{?>
											
										<img loading="lazy" src="<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1x') ?>" 
										srcset="<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1x')?> 1x,
											 <?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1.5x') ?> 1.5x,
											<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-2x') ?> 2x"																														 
										 alt="<?php the_title(); ?>">	
																			 
									   <?php 
									   }
                           $args = array(
                              'numberposts'	=> -1,
                              'post_type'		=> 'klinika',
                              'meta_query'	=> array(
                                  'relation'		=> 'OR',
                                  array(
                                      'key'		=> 'сотрудники',									 
                                      'compare'	=> 'LIKE',
                                      'value'	=>  ':"'. get_the_ID().'"', // id клиники
                                  ),
                              )
                          );
                          $the_query = new WP_Query( $args );
						 
                          foreach ($the_query->posts as $key => $value) { ?>      
                           <div class="feature-box fbox-small fbox-plain">
                              <div class="fbox-icon">
                                 <a href="<?php the_permalink($value); ?>"><i class="icon-location"></i></a>
                              </div>
								<a href="<?php the_permalink($value); ?>">
										 <h3 class="hoverdoctor" style="margin-bottom: 0">
											<?php echo get_the_title($value); ?>
										 </h3>										 
										<span>
											<?php /*the_field('адрес', $value->ID)  
											форматирование адреса, чтобы "ул" было с новой строки*/								 
											$adress = get_field('адрес', $value->ID);
											$town =  explode(",", $adress);	
											$street= strstr($adress, 'пр.');
											if (!$street){$street= strstr($adress, 'ул');}	
											if(stripos($town[1], 'Мирное')) {$town[1] = ", ".$town[1].","; } else{ unset($town[1]); $town[0]= $town[0].","; }		
											echo $town[0].$town[1]."<br>".$street;
											?>									
										</span>								 
								</a>
								<br>
									
								 <?php 																 
								 $worklist =  get_field('график_работы');
								// var_dump($timework);
								//после с графиком работы
								 if( have_rows('график_работы') ):
														
									while(have_rows('график_работы') ): the_row();
									 $timework= get_sub_field('Время_работы');											
											if ($value->ID ==  $timework["клиника"]) {	?>

													<span class="btn-link" style="cursor: pointer;" data-toggle="collapse" href="#a<?php echo $value->ID ?>" role="button" aria-expanded="false" aria-controls="#a<?php echo $value->ID ?>">
															График работы
													</span>	
											
												 <?php  foreach ($timework as $key => $grafic){
													if($key == "клиника") continue;									  
													if($grafic){?>
													<ul type='none'>												
														<div class="collapse" id="a<?php echo $timework["клиника"] ?>">
														  <div>
															<li style="border-bottom: 1px solid #e2e2e2; width: 50%;">
																<?php echo $key .': '.$grafic ?>
															</li>
														  </div>
														</div>
													</ul>													
													 <?php 	}
													} 										
											}																	
									endwhile;									
								endif;								 
								  ?> 
                           </div>
                           <?php } ?>
								   <!--<?php if(get_field('детский_врач')) { ?>
								   <div class="feature-box fbox-small fbox-plain">
									  <div class="fbox-icon">
										 <a><i class="icon-child"></i></a>
									  </div>
									  <h3>Детский врач</h3>
								   </div>
								   <?php } ?>
								   <?php if(get_field('взрослый_врач')) { ?>
								   <div class="feature-box fbox-small fbox-plain">
									  <div class="fbox-icon">
										 <a><i class="icon-line-head"></i></a>
									  </div>
									  <h3>Взрослый врач</h3>
								   </div>
								   <?php } ?>-->
                        </div>
                     </div>
                        <div class="col_three_fifth col_last">
                           <h3>
								<p class="opit-raboti"> <?=$level?>
									<?php if ($level){echo("<br>");} ?>
								  Опыт работы: <?=$exp?>
								</p>
                            							  
                           </h3>
                           <?php the_content(); ?>
                        </div>
                     </section>					 		 
					
                     <!-- .postcontent end -->
                  </div>
                  <!-- Sidebar
                     ============================================= -->
                  <?php 
                  set_query_var('classes', 'sidebar nobottommargin notopmargin col_last clearfix mt-5' );
                  get_template_part('parts/blog','latest-single-author'); 
				  
					/*.sidebar end */
					
				   /*вытащить услуги, где привязан текущий врач*/						 
						    $args_service = array(
                              'numberposts'	=> -1,
                              'post_type'		=> 'service',
                              'meta_query'	=> array(
                                  'relation'		=> 'OR',
                                  array(
                                      'key'		=> 'doctor_for_this_service',									 
                                      'compare'	=> 'LIKE',
                                      'value'	=>  ':"'. get_the_ID().'"', // id клиники
                                  ),
                              )
                          );  						  
						  $the_query_service = new WP_Query( $args_service );						
				  ?>
                 <?php if ($the_query_service->posts){ ?>	
				  <div class="divider"><i class="icon-circle"></i></div>				 
				  	<div class="container clearfix">					
						<!--<input class="js-search-block form-control form-control-lg p-4 mb-4" type="text" placeholder="Поиск услуги" />
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
						</div>-->
						
						  <div class="togglec block-head__shortname">						
						  <?php 
							  echo service_list_start();						  
							  foreach ($the_query_service->posts as $key => $service){
								$title = $service->post_title;	
								$price = get_post_meta($service->ID, 'price', 1);							
								$price_repeat = get_post_meta($service->ID, 'price_repeat', 1);
								$link = get_permalink($service->ID);
								echo service_row($title, $price, $price_repeat, $link);
							  }	
							  echo service_list_end();						  
						  ?>
                        
						  </div>
					</div>
					 <?php } ?>			   
                     <div class="divider"><i class="icon-circle"></i></div>
                     <div class="clear"></div>
                     <div class="postcontent container-fluid mt-4">
                        <div class="col">
                           <div class="fancy-title title-dotted-border">
                              <h3>Задать вопрос врачу</h3>
                           </div>
                           <div class="form-widget">
                              <div class="form-result"></div>
                              <?php
                            $q = $_POST['question'];
                            if ($q['name'] && $q['email'] && $q['question']) {
                                 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

                                    // Build POST request:
                                    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                                    $recaptcha_secret = GOG_API;
                                    $recaptcha_response = $_POST['recaptcha_response'];
                              
                                    // Make and decode POST request:
                                    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                                    $recaptcha = json_decode($recaptcha);
                              
                                    // Take action based on the score returned:
                                    if ($recaptcha->score >= 0.5 || !GOG_API) {
                                       // Verified - send email
                                   
								   
                                    $vrach = get_userdata($acco);
									$vrach_name = $vrach->first_name . $vrach->last_name;                                    
									if($vrach->user_nicename == 'admin_genesis'){
										$vrach_name = get_the_title($post->ID);
									}
                                   
                                    $new_answer = array(
                                          'post_title' => "* Новый вопрос ({$q[name]}, {$q[email]}) врачу ({$vrach_name})",
                                          'post_content' => $q['question'],
                                          'post_type' => 'answers'
                                    );
                                    $answer_id = wp_insert_post($new_answer);
									$multiple_to_recipients = array('klinikagenesis@yandex.ru');
									$date_create = current_time( 'mysql');	
                                    if ($answer_id) {
                                          update_post_meta($answer_id, 'name', $q['name']);
                                          update_post_meta($answer_id, 'email', $q['email']);
										  update_post_meta($answer_id, 'date_create', $date_create);	
                                          add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
                                          add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));                              
                                          $mTitle = "* Новый вопрос врачу ({$q[name]}, {$q[email]})";
										  $siteurl = get_site_url();
                                          $mLink = get_damn_edit_post_link($answer_id);                                         
										  $mBody = $q['question']. "\n\n\n".  "Чтобы ответить на этот вопрос - перейдите по следующей ссылке: {$siteurl}{$mLink}";		
                                          $userdata = get_userdata($acco);
											wp_mail($multiple_to_recipients, $mTitle, $mBody);
                                          global $wpdb;
                                          $rslt = $wpdb->insert(
                                             'gnss_mb',
                                             array( 
                                                'email' => $q['email'],
                                                'name' => $q['name']
                                             ),
                                             array( '%s', '%s' )   
                                          );                                    
                                     }                                            
                              }
                           }     
                        }    
                        ?>
                        <?php if (!$answer_id) {  ?>
                              <form class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post" novalidate="novalidate">
                                 <div class="form-process"></div>
                                 <div class="col_half">
                                    <label for="template-contactform-name">Имя <small>*</small></label>
                                    <input type="text" id="template-contactform-name" name="question[name]" value="" class="sm-form-control required valid">
                                 </div>
                                 <div class="col_half col_last">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" id="template-contactform-email" name="question[email]" value="" class="required email sm-form-control valid">
									 <p id="result"></p>
								 </div>
								
                                 <div class="clear"></div>
                                 <div class="col_full">
                                    <label for="template-contactform-message">Вопрос <small>*</small></label>
                                    <textarea class="required sm-form-control" id="template-contactform-message" name="question[question]" rows="6" cols="30"></textarea>
                                 </div>
                                 <div class="col_full hidden">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                                 </div>
                                 <div class="col_full">
                                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin bgorange">Задать вопрос</button>
                                 </div>
                                 <input type="hidden" name="prefix" value="template-contactform-">
                                 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">								 
								 <script>
									function validateEmail(email) {
									  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
									  return re.test(email);
									}									
									function validate() {
									  const $result = $("#result");
									  const email = $("#template-contactform-email").val();
									  $result.text("");
									  if (email && !validateEmail(email)) {		
										$result.text("Неверный формат email");
										$result.css("color", "red");
										$('#submit-button').attr('disabled','disabled');
										$('#submit-button').removeClass('bgorange');
									  }
									  else{
										 $('#submit-button').removeAttr('disabled');
										   $result.text("");
									  }
									  return false;
									}
									$("#template-contactform-email").on("blur", validate);

								</script>	
                              </form>
                                <?php } else { ?>
                                    <p class="alert-success p-2">Ваш вопрос поступил в обработку.</p>     
                                <?php } ?>
                           </div>
                        </div>
                     </div>
				  
               </div>
            </div>
         </section>
<?php endwhile; ?>
<?php get_footer(); ?>