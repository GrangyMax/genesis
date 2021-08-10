<?php 
get_header();

set_query_var('title', 'Наши врачи' );
/*set_query_var('subtitle', '' );*/
get_template_part('parts/breadcrumbs'); ?>
<?php query_posts('post_type=doctor&showposts=-1&orderby=menu_order&order=ASC'); 	

//$bez_foto=array();							  
?>
	
      <section id="content">	  
         <div class="container mt-3 mb-5">
            <div class="container-fluid bg-light pb-4">
               <div class="row align-items-center justify-content-center">
                  <div class="col-md-3 pt-3">
                     <div class="form-group ">
                        <select id="specDropdown" class="form-control">
                            <option selected="">Специализация</option>
                            <?php
                            $specs_ids = array();
                            $specs = get_posts(array(
                                'post_type' => 'direction',
                                'showposts' => -1
                            ));
                            foreach ($specs as $_spec) { 
                                $specs_ids[] = $_spec->ID;
                            ?>
                            <option><?=get_the_title($_spec->ID)?></option>
                            <?php } ?>  
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3 pt-3">
                     <div class="form-group">
                        <select id="clinicDropdown" class="form-control">
                           <option selected="">Полный список</option>
                           <?php 
                           $array = array();
						
                              $query = new WP_Query( array(
                                    'post_type' => 'klinika',
                                    'posts_per_page' => -1
                              ) );
                              foreach ($query->posts as $key => $clinic) {
                                 $array[] =  $clinic->ID;					
                           ?>    
                           <option><?php echo get_the_title($clinic); ?> (<?php the_field('адрес', $clinic->ID);?>)</option> 
                              <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4 pt-3">
                     <div class="form-group">
                        <input type="text" class="form-control" id="surnameTextField" aria-describedby="emailHelp"
                           placeholder="Фамилия" />
                     </div>
                  </div>
                  <!-- <div class="col-md-2">
                     <button type="button" id="findDoctorButton"
                        class="btn btn-block bgorange color-white-text">Поиск</button>
                  </div> -->
               </div>
            </div>
            <?php // var_dump( $specs_ids ); ?>
            <div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows" style="position: relative;">

               <!-- 
                     Врачи получают новые атрибуты:
                     - data-spec=id_spec
                     - data-clinic=id_clinic

                     Предполагается что в БД у врачей имеются поля специализации и принадлежность клинике.
                     Также предполагается что БД без избыточности данных и специализация и клиника являются внешними ключами.
                  -->
                <?php while ( have_posts() ) : the_post();
                $clinics = get_doctor_clinics(get_the_ID());
               //  var_dump(array_search($clinics, $array));
                
                ?>
                <?php $spec = get_post_meta($post->ID, 'spec', 1); 
                $rang = get_post_meta($post->ID, 'rang', 1);
               //  var_dump( array_search($spec, $specs_ids));

               $clin_ids = [];
			   if(is_array ($clinics)){
				   foreach ($clinics as $clin_id) {
					  $clin_id_found = array_search($clin_id, $array);
					  if ($clin_id_found === false) continue;
					  $clin_ids[] = array_search($clin_id, $array) + 1;
				   }
			   }
               $clinics_str = implode(',', $clin_ids);
                ?>
                <div class="entry clearfix vrach-block" data-spec="<?php echo array_search($spec, $specs_ids) !== false ? array_search($spec, $specs_ids) + 1 : ''; ?>" data-clinic="<?=$clinics_str?>"
                    style="position: absolute; left: 0px; top: 0px;">
                    <div class="owl-item">
                        <div class="oc-item">
                            <div class="iportfolio">
                            <div class="portfolio-img-container portfolio-image">
                                <a href="<?php the_permalink(); ?>">													
												
									<img loading="lazy" src="<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1x') ?>" 
									srcset="<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1x')?> 1x,
											 <?php echo get_the_post_thumbnail_url($post, 'doctor-photo-1.5x') ?> 1.5x,
											<?php echo get_the_post_thumbnail_url($post, 'doctor-photo-2x') ?> 2x"																														 
										 alt="<?php the_title(); ?>">										
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span><?=$rang?></span>
								
                            </div>
                            </div>
                        </div>
                    </div>
                </div>									 
               <?php endwhile; ?>	
            </div>
         </div>
		 
      </section>   
	
							
<?php 	
get_footer(); ?>