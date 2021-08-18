<div class="widget widget-twitter-feed clearfix">
<?php 
            $terms = get_terms([
                'taxonomy' => 'bcat',
                'hide_empty' => false,
            ]);
         ?>
    <h4>Категории</h4>
    <ul class="iconlist twitter-feed iconlist-blog-vrach" data-username="envato" data-count="2">
        <?php foreach ($terms as $term) { ?>
            <li>
                <a href="<?php echo get_term_link($term) ?>">
                    <i class="icon-arrow-right1"></i><?php echo $term->name; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>