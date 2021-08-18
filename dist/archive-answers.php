<?php get_header();
?>
<!-- тайтл страницы -->
<?php get_template_part('parts/breadcrumbs'); ?>
<!-- тайтл страницы -->

<div class="container clearfix">

   <!-- Post Content
                           ============================================= -->
   <div class="postcontent nobottommargin clearfix">
      <section class="questions mt-3">
         <div class="accordion clearfix">
            <?php
            $first = true;
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <div class="acctitle1 <?php if ($first) {
                                             echo 'none-border';
                                             $first = false;
                                          } ?>"> <a href="<?php the_permalink(); ?>"><i class="acc-closed icon-line-circle-plus"></i><i class="acc-open icon-line-circle-check color"></i><?php the_title(); ?></a>
                  </div>
               <?php endwhile;
            else : ?>
               <p>Записей нет.</p>
            <?php endif; ?>
         </div>
         <div class="entry clearfix lasts">
            <?php wp_pagenavi(); ?>
         </div>
      </section>
      <div class="container-fluid mb-5">
         <div class="col">
            <div class="fancy-title title-dotted-border">
               <h3>Оставить вопрос</h3>
            </div>
            <div class="form-widget" data-alert-type="inline">
               <div class="form-result"></div>
               <?php get_template_part('parts/answers', 'new'); ?>
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

         <div class="widget widget-twitter-feed clearfix iconlist-blog-vrach">

            <h4>Темы вопросов:</h4>

            <?php get_template_part('parts/answers', 'terms'); ?>
         </div>


      </div>

   </div>

</div><!-- .sidebar end -->

</div>

<?php get_footer(); ?>