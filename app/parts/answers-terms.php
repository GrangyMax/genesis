
<ul class="iconlist twitter-feed iconlist-blog-vrach">
            <?php 
            $terms = get_terms([
                'taxonomy' => 'acat',
                'hide_empty' => false,
            ]);
         ?>
         <?php foreach ($terms as $term) { ?>
        <li class="cat-item cat"><a href="<?php echo get_term_link($term) ?>"><i class="icon-long-arrow-alt-right"></i><?php echo $term->name; ?></a>
        </li>
    <?php } ?>
</ul>        
