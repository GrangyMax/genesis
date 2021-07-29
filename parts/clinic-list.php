<div class="widget widget-twitter-feed clearfix">
    <h4>Новости клиник:</h4>
    <ul class="iconlist twitter-feed iconlist-blog-vrach" data-username="envato" data-count="2">
    <?php 
        $query = new WP_Query( array(
            'post_type' => 'klinika',
            'posts_per_page' => -1
        ) );
        $clinic_select = '';
        foreach ($query->posts as $key => $clinic) {
    ?>        
        <li><a href="<?php the_permalink($clinic); ?>"><i class="icon-arrow-right1"></i><?php echo get_the_title($clinic); ?></a></li>
        <?php } ?>
    </ul>            
</div>