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
      <section id="content" style="margin-bottom: 0px;">
         <div class="content-wrap mobile-usluga" style="padding-top: 15px;">
            <div class="container clearfix">
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
                  <div class="blocks">
                     <input class="js-search-block form-control form-control-lg p-4 mb-4" type="text"
                        placeholder="Поиск услуги" />
                     <div class="togglec block-head__shortname">
                        <div class="row uslugi-row" style="margin-left: 15px;">
                                <?php
                                foreach (get_field('услуги_и_анализы') as $key => $service) {
                                 $price = get_post_meta($service->ID, 'price', 1); ?>
                           <a class="row" href="<?php the_permalink($service->ID);?>">
                              <div class="col-lg-9">
                                 <li><?=get_the_title($service->ID)?></li>
                              </div>
                              <!-- <div class="col-lg-3">
                              Цена:
                              <i class="price-usluga-single"><?=$price?$price.'р':'Уточняйте' ?></i></div> -->
                           </a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="accordion accordion-bg clearfix accordion-usluga">
                    <?php 
                         $clinic_select =  '';
                        foreach ($the_query->posts as $clinic) { 
                           $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
                           $clinic_select .= '<option value="'. $email .'">' . get_the_title($clinic) . '</option>';
                        ?>
                     <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                           class="acc-open icon-remove-circle"></i><?php echo get_the_title($clinic); ?></div>
                     <div class="acc_content clearfix" style="display: none;">
                        <div class="blocks-uslugi">
                            <?php 
                                foreach (get_field('услуги', $clinic->ID) as $value) {
                                    foreach ($value['услуги'] as $v) {
                                        if($v['услуга']->ID != get_the_ID()) continue;
                                        ?>
                           <div class="row uslugi-row font-uslugi mb-3">
                              <div class="col-lg-9"><?php echo $v['услуга']->post_title; ?></div>
                              <div class="col-lg-3"><i class="price-usluga-single"><?php echo $v['цена_новая'] ? $v['цена_новая'].'р':''; ?></i><i
                                    class="price-usluga-single low-price"><?php echo $v['цена_старая']?$v['цена_старая'].'р':'' ?></i></div>
                           </div>
                           <? } } ?>
                        </div>
                        <a onclick="showModalBy(this)" class="contacts-usluga"
                           data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID) ?>, <?php the_field('метка_долгота', $clinic->ID) ?>]"
                           data-placemark-hint="<?php the_field('адрес', $clinic->ID ) ?>"
                           data-placemark-text="<?php the_field('адрес', $clinic->ID ) ?>"
                           data-schedule="<?php the_field('график_работы', $clinic->ID ) ?>"
                           data-address="<?php the_field('адрес', $clinic->ID ) ?>"
                           data-phones="<?php 
                           $phones = []; 
                           foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) $phones[] = $value['номер_телефона']; 
                           echo implode(', ', $phones);
                           ?>">
                           <i class="icon-map-marker1 mr-1"></i>Контакты клиники
                        </a>
                     </div>
                     <? } ?>
                  </div>
               </section>

               <div id="contact-form-overlay" class="contact-form-overlay-clinic clearfix mt-5 mb-5">

                  <div class="form-widget">

                     <div class="form-result"></div>

                     <!-- Contact Form
      ============================================= -->
                    <?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36239" title="Запись на прием(Услуга)" html_class="nobottommargin"]')); ?>
                  </div>
               </div>
            </div>

         </div>

      </section>
      <?php endwhile; endif; ?>
<?php get_footer(); ?>