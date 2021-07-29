<?php get_header(); ?>
<?php get_template_part('parts/breadcrumbs'); ?>
                        <!-- тайтл страницы -->

                        <div class="container clearfix mt-5">

                           <!-- Post Content
                           ============================================= -->
                           <div class="postcontent nobottommargin clearfix">
            
                              <!-- Posts
                              ============================================= -->
                              <div id="posts" class="post-timeline clearfix">
            
                                 <div class="timeline-border"></div>
                                 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                 <div class="entry clearfix">
                                    <div class="entry-timeline">
                                       <?php the_date('d'); ?><span><?php echo get_the_date('M', $post); ?></span>
                                       <div class="timeline-divider"></div>
                                    </div>

                                    <div class="entry-title">
                                       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                       <!-- <li><a href="single-klinik.html"><i class="icon-hospital"></i> Онкологическая клиника</a></li> -->
                                       <li><i class="icon-folder-open"></i> <a href="#"><?php echo get_the_title(get_post_meta($post->ID, 'direction', 1)); ?></a></li>
                                       <!-- <li><a href="blog-single.html#comments"><i class="icon-comments"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></a></li> -->
                                    </ul>
                                    <div class="entry-content">
                                       <p>
                                           <?php the_excerpt(); ?>
                                       </p>
                                       <a href="<?php the_permalink(); ?>" class="more-link">Читать дальше</a>
                                    </div>
                                 </div>
                                 <?php endwhile; else : ?>
                                    <p>Записей нет.</p>
                                 <?php endif; ?>  
                                 
                                 <?php wp_pagenavi(); ?>
                              </div><!-- #posts end -->
            
                           </div><!-- .postcontent end -->
            
                           <!-- Sidebar
                           ============================================= -->
                           <div class="sidebar nobottommargin col_last clearfix">
                              <div class="sidebar-widgets-wrap">
                                 <?php get_template_part('parts/clinic', 'list'); ?>
                                 <?php get_template_part('parts/news', 'latest'); ?>
                              </div>

                              </div>
            
                           </div><!-- .sidebar end -->
            
                        </div>
<?php get_footer(); ?>