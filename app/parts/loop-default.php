<section id="content">
    <div class="content-wrap mobile-usluga pt-0 pb-0">
        <div class="container mt-5 p-0">
            <div class="entry clearfix search-page">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			 				  
				  
                <div class="entry-c">
                    <div class="entry-title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <?php /* <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> <?php echo get_the_date('d F, h:i'); ?> </li>
                        <!-- <li><i class="icon-comments"></i> Комментариев нет
                                </li> -->

                    </ul> */?>
                    <div class="entry-content">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <?php endwhile; else : ?>
                    <p>Записей нет.</p>
                <?php endif; ?>  
            </div>
            <?php wp_pagenavi(); ?>

        </div>
    </div>
</section>