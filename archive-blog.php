<?php get_header(); ?>
<?php 
if($_GET['aid']) {
$doctor = $_GET['aid'] ? "&author={$_GET[aid]}" : NULL ; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('post_type=blog&posts_per_page='.get_option('posts_per_page').'&paged='.$paged.$doctor); 
$blogTitleBox = get_posts(array(
    'post_type' => 'doctor',
    'showposts' => 1,
    'meta_key' => 'acco',
    'meta_value' => $_GET['aid']
));
$docBlogTitle  = get_the_title($blogTitleBox[0]->ID);
}
?>
<?php 
set_query_var('title', $docBlogTitle ? $docBlogTitle : 'Блоги' );
get_template_part('parts/breadcrumbs'); ?>
      <div class="container clearfix mt-5 mb-5">
         <div class="postcontent nobottommargin clearfix">
            <div id="posts" class="small-thumbs">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php 
                $doctor = get_posts(array(
                    "post_type" => 'doctor',
                    "showposts" => '1',
                    "meta_key" => "acco",
                    "meta_value" => $post->post_author
                ));
                $doc = $doctor[0]->ID;
                if ($doctor[0]->ID) {
                    $doctor = get_the_title($doctor[0]->ID);
                    $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
                } else {
                    $first_name = get_the_author_meta('first_name');
                    $last_name = get_the_author_meta('last_name');      
                    $doctor = $first_name.' '.$last_name;
                }

                $category = wp_get_object_terms($post->ID, 'bcat');
                $category = $category[0] ? $category[0]->name : 'Без категории' ;
                /*$thumb = the_post_thumbnail_url();*/
				$thumb =  get_the_post_thumbnail_url($post,'large');
                if(!$thumb)$thumb = '/wp-content/uploads/2012/10/ART_5622.jpg';
				
            ?>
               <div class="entry clearfix">
                  <div class="entry-image">
                     <a href="<?php echo $thumb;?>"
                        data-lightbox="image"><img loading="lazy" class="image_fade"
                           src="<?php echo $thumb;?>"
                           alt=""></a>
                  </div>
                  <div class="entry-c">
                     <div class="entry-title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                     </div>
                     <ul class="entry-meta clearfix p-0">
                        <li><i class="icon-calendar3"></i> <?php echo get_the_date('j M Y'); ?></li>
                        <li><a href="<?=get_permalink($doc)?>"><i class="icon-user"></i> <?=$doctor?></a></li>
                        <li><i class="icon-folder-open"></i> <a><?=$category?></a></li>
                        <!-- <li><a href="single-blog.html#comments"><i class="icon-comments"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></a></li> -->
                     </ul>
                     <div class="entry-content mbottom4 mt-0">
                        <p><?php the_excerpt(); ?>
							<br>
							<?php get_the_excerpt();?>
						</p>
                        <a href="<?=get_permalink()?>" class="more-link">Читать далее</a>
                     </div>
					 <hr>
                  </div>
               </div>
               <?php endwhile; ?>
               <?php wp_pagenavi(); ?>
            </div>
         </div>
         <div class="sidebar nobottommargin col_last clearfix">
            <div class="sidebar-widgets-wrap">
               <?php get_template_part('parts/blog', 'terms'); ?>
               <?php get_template_part('parts/blog', 'latest'); ?>
               <?php get_template_part('parts/blog', 'authors'); ?>
            </div>
         </div>
      </div>
   </div>
<?php get_footer(); ?>