<div class="pricing-box" style="border:0;" data-placemark-coord="[<?php the_field('метка_широта', $clinic->ID); ?>, 
					<?php the_field('метка_долгота', $clinic->ID); ?>]"
                    data-placemark-address="<?php the_field('адрес', $clinic->ID); ?>"
                    data-placemark-hint="<?php echo get_the_title($clinic); ?>"
                    data-placemark-image-src="<?php echo get_stylesheet_directory_uri(); ?>/images/clinic-logo.png"      

                    data-placemark-url="<?php echo get_permalink($clinic->ID); ?>"
                    data-placemark-timework="<?php the_field('график_работы', $clinic->ID); ?>"
                    data-placemark-phone="
                            <?php foreach (get_field('номера_телефонов', $clinic->ID) as $key => $value) { ?>
                                    <a href='tel:<?php echo $value['номер_телефона'] ?>'><?php echo $value['номер_телефона'] ?></a> <br>
                            <?php } ?>"                    
                    >
                    
                </div>