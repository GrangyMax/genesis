<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part('parts/breadcrumbs'); ?>
    <section id="content" style="margin-bottom: 0px;">
        <div class="content-wrap single-blog123  ">
            <div class="container clearfix">
                <div class="postcontent nobottommargin clearfix">
                    <div class="single-post nobottommargin">
                        <div class="entry clearfix">
                            <div class="entry-title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> <?php the_date('d F Y'); ?></li>
                                <li><i class="icon-folder-open"></i> <a href="#"><?php echo get_the_title(get_post_meta(get_the_ID(), 'direction', 1)); ?></a></li>
                                <!-- <li><a href="#"><i class="icon-comments"></i> <?php // echo  get_comments_number() ?> коментариев</a></li> -->
                            </ul>
                            <div class="entry-image">
                                <?php if(get_the_post_thumbnail_url()) { ?>
										
									<img loading="lazy" class="image-blogstart" srcset="<?php echo get_the_post_thumbnail_url($post, 'medium')?> 480w,
											 <?php echo get_the_post_thumbnail_url($post, 'large') ?> 800w,
											 <?php echo get_the_post_thumbnail_url($post, 'full') ?> 1600w"								
									 src="<?php echo get_the_post_thumbnail_url($post, 'full') ?>" alt="<?php the_title(); ?>">
									
                                <?php } ?>
                            </div>
                            <div class="entry-content notopmargin">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="post-navigation clearfix">
                            <?php
                            $prev_post = get_previous_post();
                            // var_dump($prev_post);
                            if( ! empty($prev_post) ){
                                ?>
                                <div class="col_half nobottommargin">
                                    <a href="<?php echo get_permalink( $prev_post ); ?>">⇐ <?php echo esc_html($prev_post->post_title); ?></a>
                                </div>
                                <?php
                            }
                            ?>
                            
                            <?php
                            $next_post = get_next_post();
                            // var_dump($next_post);
                            if( ! empty($next_post) ){
                                ?>
                                 <div class="col_half col_last tright nobottommargin">
                                    <a href="<?php echo get_permalink( $next_post ); ?>"><?php echo esc_html($next_post->post_title); ?> ⇒</a>
                                </div>
                                <?php
                            }
                            ?>
                           
                        </div>
                        <!-- <div id="comments" class="clearfix">
                            <h3 id="comments-title"><span><?php // echo get_comments_number() ?></span> комментариев</h3>
                            <div id="respond" class="clearfix">
                                <h3>Комментарии <span>закрыты.</span></h3>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin col_last clearfix">
                    <div class="sidebar-widgets-wrap single-blog12">
                    <?php get_template_part('parts/news', 'latest'); ?>
                    </div>

                </div><!-- .sidebar end -->

            </div>

        </div>

    </section>
<?php endwhile; else : ?>
    <p>Записей нет.</p>
<?php endif; ?>         
<?php get_footer(); ?>