
<?php $post_id = get_the_ID();
$sales = get_field('список_акций', $post_id);
if($sales):
?>
<div class="container clearfix">
         <div class="fancy-title title-border title-center" style="margin-top: 50px;">
            <h2>Акции</h2>
         </div>
         <?php  
          foreach ($sales as $key => $sale_id) {    
         ?>
         <div class="col_one_third">
            <div class="feature-box center media-box fbox-bg">
               <div class="fbox-media">
                  <img src="<?php echo get_the_post_thumbnail_url($sale_id); ?>" alt="<?php echo get_the_title($sale_id); ?>">
               </div>
               <div class="fbox-desc">
                  <h3><?php echo get_the_title($sale_id); ?><span class="subtitle"><?php echo get_the_excerpt($sale_id); ?></span></h3>
                  <p><a href="<?php the_permalink($sale_id); ?>" class="btn bgorange text-white t500">Подробнее</a></p>
               </div>
            </div>
         </div>
         <?php  } ?>
         <div class="clear"></div>
      </div>
<?php endif; ?>