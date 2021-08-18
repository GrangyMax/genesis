<?php $classes = get_query_var('classes'); 
	$wBlog = get_posts(array('post_type' => 'blog', 'showposts' => 5, 'author'=>$post->post_author ));
	$title="Статьи автора";
	if (!$wBlog){
		$wBlog = get_posts(array('post_type' => 'blog', 'showposts' => 3 ));
		$title="Популярное в блоге";
	}
	/*echo get_the_author( $post->post_author);  выводим логин врача (debug)*/
	
	
	?>

<div class="<?php if($classes){ echo $classes; } else { echo 'widget widget-twitter-feed clearfix'; } ?>">
    <h3><?php echo $title; ?></h3>

    <div id="popular-post-list-sidebar">

    <?php		
    foreach ($wBlog as $k => $wEntry) { 
    ?>                            
    <div class="spost clearfix">

        <div class="entry-c">
            <div class="entry-title">
                <h4><a href="<?=get_permalink($wEntry->ID)?>"><?=get_the_title($wEntry->ID)?></a></h4>
            </div>
            <div class="entry-meta clearfix my-2">
            <li style="nomargin nopadding"><i class="icon-calendar3"></i> <?php echo get_the_date('d F Y', $wEntry); ?></li>
        </div>
            <ul class="entry-meta">
                <!-- <li><i class="icon-comments-alt"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?> </li> -->
            </ul>
        </div>
    </div>
    <?php } ?>
    </div>
</div> 
