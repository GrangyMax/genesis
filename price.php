<?php
/*
    Template Name: .price
*/
?>
<?php get_header(); 
set_query_var('title', 'Направления услуг клиники' );
$subtitle="Цены, размещённые на сайте, не являются публичной офертой."."<br>"."Уточняйте стоимость у администратора или в контакт-центре.";
set_query_var('subtitle', $subtitle );   
get_template_part('parts/breadcrumbs'); 
include_once 'parts/service-search-block.php';?>          

      <section id="content">
         <div class="content-wrap pt-0 pb-0">

            <div class="container mt-0 p-0">

                <section>

                <div class="blocks">
                    <input class="js-search-block form-control form-control-lg p-4 mb-4" type="text"
                        placeholder="Поиск услуги" />
						
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
                        $directions = get_posts(array(
                            'post_type' => 'direction', 
                            'showposts' => -1
                        ));
                        foreach ($directions as $direction) {
                    ?> 
                        <div class="block">
                            <div class="block-head">
                                <div class="toggle toggle-border tabs-uslugi">
                                    <div class="togglet block-head__title"><i class="toggle-closed icon-ok-circle"></i><i
                                            class="toggle-open icon-remove-circle block-head__title"></i><?=get_the_title($direction->ID)?>
                                    </div>
                                    <div class="togglec block-head__shortname" style="display: none;">
                                        <?php 
                                            $services = get_posts(array(
                                                'post_type' => 'service', 
                                                'showposts' => -1,
                                                'meta_key' => 'parentem',
                                                'meta_value' => $direction->ID
                                            ));
                                            $specs = get_posts(array(
                                                'post_type' => 'specialisation', 
                                                'showposts' => -1,
                                                'meta_key' => 'parentem',
                                                'meta_value' => $direction->ID
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
												$price_repeat =  get_post_meta($service->ID, 'price_repeat', 1);
                                                $link = get_permalink($service->ID);
                                                echo service_row($title, $price,  $price_repeat, $link);
                                            }
                                            echo service_list_end();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>  
                </div>
            </div>
         </div>
      </section>

      </section>
<?php get_footer(); ?>
