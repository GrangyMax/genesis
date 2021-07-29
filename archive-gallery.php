<?php get_header(); 

set_query_var('title', 'Фото и видео' );
get_template_part('parts/breadcrumbs'); ?>

      <section id="content gallery-g" style="margin-bottom: 0px;">

         <div class="content-wrap" style="padding: 10px;">
<!-- временно убираем фото из шаблона, оставляем только видео 
            <div class="container clearfix">
               <div class="fancy-title title-border title-center mt-3">
                  <h2>Фото клиники</h2>
               </div>
               <div id="posts" class="post-grid grid-container clearfix gallery-gg" data-layout="fitRows"
                  style="position: relative;">
                <?php 
                    $photos = get_posts(array('post_type' => 'gallery', "showposts" => -1, 'meta_key' => 'type', 'meta_value' => 'gallery'));
                    foreach ($photos as $photo) {
                    $thumb = get_the_post_thumbnail_url ($photo->ID, 'gallery_');
                ?>
                  <div class="entry clearfix" style="position: absolute; left: 0px; top: 0px;">
                     <div class="owl-item">
                        <div class="oc-item">
                           <div class="iportfolio">
                              <div class="portfolio-image">
                                 <a href="<?php echo $thumb; ?>"
                                    class="center-icon" data-lightbox="gallery-item">
                                    <img src="<?php echo $thumb; ?>"
                                       alt="<?=get_the_title($photo->ID)?>">
                                 </a>
                                 <div class="portfolio-overlay" data-lightbox="gallery">
                                 <?php
                                        unset($args, $attachments);
                                        $args = array(
                                            'order'          => 'DESC',
                                            'post_type'      => 'attachment',
                                            'post_parent'    => $photo->ID,
                                            'post_mime_type' => 'image',
                                            'post_status'    => null,
                                            'numberposts'    => -1,
                                        );
                                        $attachments = get_posts($args);
                                        if ($attachments) {
                                            foreach ($attachments as $k => $attachment) {
                                                $img = wp_get_attachment_url ($attachment->ID);;
                                ?>
                                    <a href="<?php echo $img; ?>"
                                       class="center-icon" data-lightbox="gallery-item"><i
                                          class="icon-line-stack-2"></i></a>
                                    <?php } } ?>

                                 </div>
                              </div>
                              <div class="portfolio-desc">
                                 <h3><a href="#"><?=get_the_title($photo->ID)?></a></h3>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
			-->
			
            <div class="container clearfix">
               <div class="fancy-title title-border title-center mt-3">
                <!-- <h2>Видео</h2> -->
               </div>
               <div id="posts" class="post-grid grid-container clearfix gallery-gg" data-layout="fitRows"
                  style="position: relative;">
                  <?php 
                    $photos = get_posts(array('post_type' => 'gallery', "showposts" => -1, 'meta_key' => 'type', 'meta_value' => 'video'));
                    foreach ($photos as $photo) {
                        $video = get_post_meta($photo->ID, 'video', 1);
                ?>
                  <div class="entry clearfix" style="position: absolute; left: 0px; top: 0px;">
                     <div class="owl-item">
                        <div class="oc-item">
                           <div class="iportfolio">
                              <div class="portfolio-image">
                                 <a href="#">
                                    <img src="<?=get_the_post_thumbnail_url($photo->ID, 'gallery_')?>"
                                       alt="Mac Sunglasses">
                                 </a>
                                 <div class="portfolio-overlay">
                                    <a href="<?=$video?>" class="center-icon"
                                       data-lightbox="iframe"><i class="icon-line-play"></i></a>
                                    <!--                       <a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
-->
                                 </div>
                              </div>
                              <div class="portfolio-desc portfolio-desc_video">
                                 <h3><a href="<?=$video?>"><?=get_the_title($photo->ID)?></a></h3>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                    <?php } ?>
               </div>
               <!-- Post Content
                                       ============================================= -->


            </div>

         </div>

      </section>
      <!-- #content end -->
<?php get_footer(); ?>