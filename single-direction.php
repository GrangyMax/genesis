<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
      set_query_var('title', get_the_title());
      set_query_var('subtitle',  'Комплексную cтоимость услуг уточняйте в регистратуре');
      get_template_part('parts/breadcrumbs');
      include_once 'parts/service-search-block.php'; ?>
      <!-- тайтл страницы -->

      <section id="content">
         <div class="content-wrap mobile-usluga pt-0 pb-0">

            <div class="container mt-0 p-0">

               <section>
                  <!-- <div class="fancy-title title-border title-center mt-3">
                     <h2><?php the_title(); ?></h2>
                  </div> -->
				 <span class="scroll-up"></span>
                  <div class="text_review" style="height: 15em;">
				  <div class="text_review__background">
					</div>
					 <?php the_content(); ?>                  
                  </div>				  
				  <div>                    
                     <?php include 'parts/read-more-button.php'; ?>
                  </div>				  
                  <?php
                  $args = array(
                     'numberposts'   => -1,
                     'post_type'      => 'klinika',
                     'meta_query'   => array(
                        'relation'      => 'OR',
                        array(
                           'key'      => 'услуги_$_направление',
                           'compare'   => '=',
                           'value'      => get_the_ID(),
                        ),
                     )
                  );
                  $the_query = new WP_Query($args);
                  // var_dump(count($the_query->posts));

                  ?>
                  <section>
                     <div class="modal fade" id="clinic_modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                                             <br> <a href="tel:+79787325000">+7 (978) 732 50
                                                00</a></p>
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
                     <br><br>
                     <h2 class="mb-3">Где получить услуги этого направления?</h2>
                     <table class="table direction--clinics">
                        <tr>
                           <th>Клиника</th>
                           <th>Адрес</th>
                           <th>Контакты</th>
                        </tr>
                        <?php
                        $clinic_select =  '';
						//сортировка массива клиник согласно выбранному направлению
						if(get_the_ID() == 38828){// если ID направления - офтальмология						
								include_once 'parts/oftalmolog_queue.php';
						}							
						elseif(get_the_ID() == 289){ // если ID направления - онкология	
								include_once 'parts/onkolog_queue.php';								
						}
						
                        foreach ($the_query->posts as $clinic) {
						
                          $temp = get_field('email', $clinic);
                          $email = $temp ? $temp : get_option('admin_email');
                          $clinic_select .= '<option value="' . $email . '">' . get_the_title($clinic) . '</option>';
                          $title = get_the_title($clinic);
						  
							if($title == "Клиника Генезис (поликлиника в Севастополе)"){
								$title= "Клиника Генезис (отделение онкологии и гинекологии в Севастополе)"; 
							}
							
                          $link = get_permalink($clinic);
						  
                        ?>
                            <tr>
                              <td><a href="<?= $link ?>"><?= $title ?></a></td>
                              <td><?php the_field('адрес', $clinic->ID) ?></td>
                              <td>
                                 <a onclick="showModalBy(this)" class="contacts-usluga noborder" id="klinik-link-maps" data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID) ?>, <?php the_field('метка_долгота', $clinic->ID) ?>]" data-placemark-hint="<?php the_field('адрес', $clinic->ID) ?>" data-placemark-text="<?php the_field('адрес', $clinic->ID) ?>" data-schedule="<?php the_field('график_работы', $clinic->ID) ?>" data-address="<?php the_field('адрес', $clinic->ID) ?>" data-phones="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       $phones = [];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) $phones[] = $value['номер_телефона'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       echo implode(', ', $phones);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ?>">
                                    <span style="white-space: nowrap"><i class="icon-map-marker1 mr-1"></i>Контакты</span> клиники
                                 </a>
                              </td>
                           </tr>
                        <?php } ?>
                     </table>
                  </section>
                  <div class="blocks">
                     <input class="js-search-block form-control form-control-lg p-4 mb-4" type="text" placeholder="Поиск услуги" />
                     <div class="togglec block-head__shortname">
                        <?php
                        $services = get_posts(array(
                           'post_type' => 'service',
                           'showposts' => -1,
                           'meta_key' => 'parentem',
                           'meta_value' => get_the_ID()
                        ));
                        $specs = get_posts(array(
                           'post_type' => 'specialisation',
                           'showposts' => -1,
                           'meta_key' => 'parentem',
                           'meta_value' => get_the_ID()
                        ));
                        foreach ($specs as $key => $spec) {
                           $_services = get_posts(array(
                              'post_type' => 'service',
                              'showposts' => -1,
                              'meta_key' => 'parentem',
                              'meta_value' => $spec->ID
                           ));
                           if ($_services[0]->ID) {
                              $services = array_merge($services, $_services);
                           }
                        }
                        echo service_list_start();
                        foreach ($services as $service) {
                           $title = get_the_title($service->ID);
                           $price = get_post_meta($service->ID, 'price', 1);
                           $link = get_permalink($service->ID);
                           echo service_row($title, $price, $link);
                        }
                        echo service_list_end();
                        ?>
                     </div>
                  </div>
            </div>
         </div>
      </section>
      <section class="pb-5">
      </section>
      </section>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>