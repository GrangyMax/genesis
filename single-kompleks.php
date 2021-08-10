<?php get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
$price = get_post_meta(get_the_ID(), 'price', 1);
set_query_var('title', get_the_title() );
set_query_var('subtitle',  $price?$price.'&#8381;':''  );
get_template_part('parts/breadcrumbs'); ?>
<style>
span.wpcf7-not-valid-tip {
    position: relative;
}
</style>
      <section id="content">
         <div class="content-wrap mobile-usluga" style="padding-top: 15px;">
             <div class="container mt-0 p-0">
               <!-- Post Content
                     ============================================= -->
               <section>
                  <div class="content-text-uslugi">
                     <?php the_content(); ?>
                  </div>
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
            // var_dump(count($the_query->posts));
			$query = new WP_Query(array(
               'post_type' => 'klinika',
               'posts_per_page' => -1
            ));
			$clinic_select = '';			
            foreach ($query->posts as $clinic) {
               $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
               $clinic_select .= '<option value="'. $email .'">' . get_the_title($clinic) . '</option>';
			}
			
               ?>
          
			<section>
					<div class="uslugi-row">	
					  <div class="blocks">
						<!--<input class="js-search-block form-control form-control-lg p-4 mb-4" type="text" placeholder="Поиск услуги" />	-->				  
						 <div class="togglec block-head__shortname">                      			
																
										<?php  				
										foreach (get_field('услуги_и_анализы') as $key => $service) {																	
											
												$price = get_post_meta($service->ID, 'price', 1); ?>
												<a class="row" href="<?php the_permalink($service->ID);?>">									
													  <div class="col-lg-9">
														 <li><?=get_the_title($service->ID)?></li>
													  </div>
													
													  <div class="col-lg-3">										
														  <span style="float: right; font-size: 1rem;"> <?=$price?$price.'&#8381;':'Уточняйте' ?></span>
													  </div> 										  
												</a>						   
										<?php } ?>										
								
							</div>
						 </div>
					  </div>                
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
		
                    <?php 
					
					echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36239" title="Запись на прием(Услуга)" html_class="nobottommargin"]')); ?>
                  </div>
               </div>
            </div>

         </div>

      </section>
      <?php endwhile; endif; ?>
<?php get_footer(); ?>