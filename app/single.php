<?php

get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
set_query_var('title', get_the_title() );
// set_query_var('subtitle',  $price?$price.'&#8381;':''  );
get_template_part('parts/breadcrumbs'); 
$thumb = get_the_post_thumbnail_url();
if(!$thumb)$thumb = false;
?>
                        <!-- тайтл страницы -->
                        <section id="content" style="margin-bottom: 0px;">

                            <div class="content-wrap pb-0">
                
                                <div class="container clearfix">
                
                                    <!-- Post Content
                                    ============================================= -->
                                    <div class="postcontent nobottommargin clearfix mt-0" style="width: 100%;">
                
                                        <div class="single-post nobottommargin">
                
                                            <!-- Single Post
                                            ============================================= -->
                                            <div class="entry clearfix">
                
                                                <!-- Entry Title
                                                ============================================= -->
                                                <!-- <div class="entry-title">
                                                    <h2><?php the_title(); ?></h2>
                                                </div>.entry-title end -->
                
                                                <!-- Entry Meta
                                                ============================================= -->
                                                <?php /* <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i> <?php the_date('d F Y'); ?></li>
                                                    <!-- <li><a><i class="icon-comments"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></a></li> -->
                                                </ul> <!-- .entry-meta end --> */ ?>
                
                                                <!-- Entry Content
                                                ============================================= -->
                                                <div class="entry-content notopmargin">
                
                                                    <!-- Entry Image
                                                    ============================================= -->
                                                    <?php if($thumb){ ?>
                                                        <div class="entry-image alignleft">
                                                            <a><img src="<?php echo $thumb;?>" alt="<?php the_title(); ?>" class="obrezka2"></a>
                                                        </div>
                                                    <?php } ?>
                                                   <!-- .entry-image end -->
                                                    <?php the_content(); ?>
                                                    <!-- Post Single - Content End -->
                                             
                                                    <!-- Tag Cloud
                                                    ============================================= -->
                                                </div>
                                            </div><!-- .entry end -->
                
                                            <!-- Post Navigation
                                            ============================================= -->
               
                                            <!-- Post Author Info
                                            ============================================= -->
                
                                        </div>
                
                                    </div><!-- .postcontent end -->
                
                                    <!-- Sidebar
                                    ============================================= -->
                
                                </div>
                
                            </div>
                
                        </section>
      <?php endwhile; endif; ?>

<?php get_footer(); ?>