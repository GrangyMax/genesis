
<?php get_header();
set_query_var('title', 'Отзывы');
set_query_var('subtitle', 'Отзывы наших пациентов о нас');
get_template_part('parts/breadcrumbs'); ?>
<!-- тайтл страницы -->


<?php 
$clinic_list = get_posts( array(	
	'post_type'   => 'klinika',
   'posts_per_page' => -1	
) );
   ?>


<div class="container clearfix">


   <!-- Post Content
                           ============================================= -->
   <div class="postcontent nobottommargin clearfix">
      <section>
         <div class="pt-3 pb-2" style="height: 100%; flex: 0 35%">
            <div class="form-group ">
               <?php /*
            <select id="inputState " class="form-control">
            <option selected="" disabled>Клиника</option>
            <option>Онколоия</option>
            <option>Многопрофильный центр</option>
            <option>Центр зрения</option>
            <option>Детская клиника</option>
            <option>Севастопольская клиника</option>
            </select>
        */ ?>
            </div>
         </div>
         <section class="review">
            <ul class="clearfix">
               <?php while (have_posts()) : the_post(); ?>
                  <li>
                     <div class="testimonial">
                        <p><strong><?php  echo get_field('clinic'); ?></strong></p>
                        <div class="testi-content">                         
                        <?php 
                           if (get_the_post_thumbnail_url($post)) {?>
                           <img src="<?php echo get_the_post_thumbnail_url($post, 'large') ?>" alt="<?php the_title(); ?>" class="review_image_archive">
                           
								   <?php  } the_content();  ?>

                           <div class="testi-meta">
                              <?php the_title(); ?>
                              <span><?php echo get_the_date('d F Y', $post->ID); ?></span>
                              
                           </div>
                           <?php if (get_post_meta($post->ID, 'answer', 1)) { ?>
                              <div class="otvet">
                                 <!-- <span><img src="/images/logo-mobile.png"></span> -->
                                 <?= get_post_meta($post->ID, 'answer', 1) ?>
                                 
                              </div>
                           <?php } ?>
                        </div>
                     </div>
                  </li>
               <?php endwhile; ?>
            </ul>
         </section>
      </section>
      <div class="entry clearfix lasts text-center">
         <?php wp_pagenavi(); ?>
      </div>

      <div class="container-fluid mb-5">
         <div class="col">
            <div class="fancy-title title-dotted-border">
               <h3>Оставить отзыв</h3>
            </div>
            <div class="form-widget" data-alert-type="inline">
               <div class="form-result"></div>
               <?php
			   if(isset($_POST['review'])){
				   $q = $_POST['review'];
               }
			   $review_id = false;
               if ($q['name'] && $q['email'] && $q['review']) {
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
                        $new_review = array(
                           'post_title' => "* Новый отзыв ({$q[name]}, {$q[email]})",
                           'post_content' => $q['review'],
                           'post_type' => 'reviews'
                        );
                        $review_id = wp_insert_post($new_review);
                        if ($review_id) {
                           update_post_meta($review_id, 'name', $q['name']);
                           update_post_meta($review_id, 'email', $q['email']);
                           update_post_meta($review_id, 'clinic',  $q['type']);
                           add_filter('wp_mail_from', create_function('', 'return "' . get_option('admin_email') . '";'));
                           add_filter('wp_mail_from_name', create_function('', 'return "Клиника Genesis";'));
                           $mTitle = "* Новый отзыв ({$q[name]}, {$q[email]})";
                           $mLink = get_damn_edit_post_link($review_id);
                           $mBody = "Чтобы одобрить или изменить этот отзыв - перейдите по следующей ссылке: {$siteurl}{$mLink}";
                           // wp_mail((get_option('admin_email')?get_option('admin_email'):'wgnss@mailinator.com'), $mTitle, $mBody);                                                            
                        }
                     }
                  }
               }
               ?>
               <?php if (!$review_id) { ?>
                  <form class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post" novalidate="novalidate">
                     <div class="form-process"></div>
                     <div class="form-group ">
                        <select id="inputState " name="review[type]" class="form-control valid">
                           <option selected="" disabled>Выберите клинику</option>                           
                              <?php
                               foreach ($clinic_list as $key => $clinic) {                       
                                   echo '<option>'.$clinic->post_title.' </option>';
                                } 
                              ?> 
                        </select>
                     </div>
                     <div class="col_half">
                        <label for="template-contactform-name">Имя <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="review[name]" value="" class="sm-form-control required valid">
                     </div>
                     <div class="col_half col_last">
                        <label for="template-contactform-email">Email <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="review[email]" value="" class="required email sm-form-control valid">
						<p id="result"></p>
                     </div>
                     <div class="clear"></div>
                     <div class="col_full">
                        <label for="template-contactform-message">Отзыв <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="review[review]" rows="6" cols="30"></textarea>
                     </div>
                     <div class="col_full hidden">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                     </div>
					 <div class="g-recaptcha" data-sitekey="6LdC7PkbAAAAAFzQ5XaCQrF-5nUlHxFXjdvvTZN7"></div>
                     <div class="col_full">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin bgorange">Оставить отзыв</button>
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

									  if (!validateEmail(email)) {		
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
                  <p>Ваш отзыв был принят и передан на рассмотрение.</p>
               <?php } ?>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>

      <!-- Posts
                              ============================================= -->
   </div><!-- .postcontent end -->

   <!-- Sidebar
                           ============================================= -->
   <div class="sidebar nobottommargin col_last clearfix">
      <div class="sidebar-widgets-wrap">
         <?php get_template_part('parts/news', 'latest'); ?>
      </div>
   </div>
</div><!-- .sidebar end -->

</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php get_footer(); ?>