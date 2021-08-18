<?php $classes = get_query_var('classes'); ?>

<div class="<?php if($classes){ echo $classes; } else { echo 'widget widget-twitter-feed clearfix'; } ?>">
    <h4>Последние новости</h4>

    <div id="popular-post-list-sidebar">
    <?php
    $wBlog = get_posts(array('post_type' => 'news', 'showposts' => 3));
    foreach ($wBlog as $k => $wEntry) { 
    ?>                            
    <div class="spost clearfix">

        <div class="entry-c">
            <div class="entry-title">
                <h4><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></h4>
            </div>
            <ul class="entry-meta clearfix">
            <li><i class="icon-calendar3"></i> <?php echo get_the_date('d F Y', $wEntry); ?></li>
        </ul>
            <ul class="entry-meta">
                <!-- <li><i class="icon-comments-alt"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?> </li> -->
            </ul>
        </div>
    </div>
    <?php } ?>
    </div>
</div>