

<?php 

/*
    Template Name: .сontact
*/

?>


<?php 
get_header();
set_query_var('title', 'Контакты');
get_template_part('parts/breadcrumbs'); ?>
<style>
   span.wpcf7-not-valid-tip {
      position: relative;
   }
</style>
<script defer type="text/javascript" charset="utf-8" id="ymaps-api-loader" src="https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&amp;amp;apikey=df578316-6785-45a9-beaa-8c9ad78839de"></script>
<section id="content" style="margin-bottom: 0px;">
   <div class="content-wrap mobile-usluga contact__1" style="padding-top: 15px;">
      <div class="container clearfix">
         <section id="contacts-map" class="d-none d-md-block" style="height: 450px; margin-bottom: 3em;">
            <!-- карта -->
         </section>
         <!-- Post Content
                     ============================================= -->
         <section>
            <?php
            $query = new WP_Query(array(
               'post_type' => 'klinika',
               'posts_per_page' => -1
            ));
            $clinic_select = '';
            foreach ($query->posts as $key => $clinic) {
               $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
               $clinic_select .= '<option value="'. $email .'">' . get_the_title($clinic) . '</option>';
			   $clinic_select_form .= '<option value="'.  get_the_title($clinic) .'" class="chosen-select">' . get_the_title($clinic) . '</option>';
            ?>
               <!-- STOP: new template -->
               <div class="pricing-box pricing-extended bottommargin clearfix" data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID); ?>, <?php the_field('метка_долгота', $clinic->ID); ?>]" data-placemark-text="<?php the_field('адрес', $clinic->ID); ?>" data-placemark-hint="<?php echo get_the_title($clinic); ?>" data-placemark-image-src="<?php echo get_stylesheet_directory_uri(); ?>/images/clinic-logo.png">
                  <!-- clinic.description -->
                  <div class="pricing-desc">
                     <div class="pricing-title">
                        <a href="<?php echo get_post_permalink($clinic); ?>"><h3><?php echo the_field('юр-наим', $clinic->ID); ?></h3></a>
                     </div>
					  <div class="ogrn pricing-title">
					   <div class="feature-box" style="padding: 0;">
                        <p>ОГРН: <?php the_field('огрн', $clinic->ID); ?></p>
						 </div>
                     </div>
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
                                 <p><?php the_field('юридический_адрес', $clinic->ID); ?></p>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
                  <!-- clinic.phones -->
                  <div class="pricing-action-area">
                     <div class="col-12">
                        <div class="feature-box fbox-plain contact__nomer mb-2">
                           <div class="fbox-icon">
                              <a><i class="icon-phone3"></i></a>
                           </div>
                           <h3>Номера телефонов:</h3>
                        </div>
                        <div class="phones__contact mb-2">
                           <?php foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) { ?>
                              <a href="tel:<?php echo $value['номер_телефона'] ?>"><?php echo $value['номер_телефона'] ?></a> <br>
                           <?php } ?>
                        </div>

                     </div>
                     <div class="pricing-action phones__contact2">
                        <a href="<?php the_permalink($clinic->ID); ?>" class="button-xlarge btn-block nomargin bgorange page-clinic-button">Страница клиники</a>
                     </div>
                  </div>
               </div>

            <?php } ?>
         </section>
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
               <?php echo str_replace('{{clinics_list}}', $clinic_select_form, do_shortcode('[contact-form-7 id="36233" title="Запись на прием(Контакты)" html_class="nobottommargin"]')); ?>
            </div>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>