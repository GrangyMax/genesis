<?php get_header(); ?>
<?php get_template_part('parts/breadcrumbs'); ?>
<?php 
    global $post;
    $bDoctor = get_posts(array(
        'post_type' => 'doctor',
        'showposts' => 1,
        'meta_key' => 'acco',
        'meta_value' => $post->post_author
    ));
    $doctor_url = $bDoctor[0]->ID ? get_permalink($bDoctor[0]->ID) : NULL ; 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
    $doctor = get_posts(array(
        "post_type" => 'doctor',
        "showposts" => '1',
        "meta_key" => "acco",
        "meta_value" => $post->post_author
    ));
    $doc = $doctor[0]->ID;
	
    if ($doctor[0]->ID) {
		$rang = get_post_meta($doctor[0]->ID, 'rang', 1);
        $doctor = get_the_title($doctor[0]->ID);     
	  
    } else {
        $first_name = get_the_author_meta('first_name');
        $last_name = get_the_author_meta('last_name');      
        $doctor = $first_name.' '.$last_name;
    }
    $thumb = get_the_post_thumbnail_url();
    if(!$thumb)$thumb = false;
?>
<?php 
    $category = wp_get_object_terms($post->ID, 'bcat');
    $category = $category[0] ? $category[0]->name : 'Без категории' ;
?>
<section id="content" style="margin-bottom: 0px;">

<div class="content-wrap single-blog123  ">

   <div class="container clearfix">

      <!-- Post Content
                           ============================================= -->
      <div class="postcontent nobottommargin clearfix">

         <div class="single-post nobottommargin">

            <!-- Single Post
                                   ============================================= -->
            <div class="entry clearfix">

               <!-- Entry Title
                                       ============================================= -->
               <div class="entry-title">
                  <h1><?php the_title(); ?></h1>
               </div><!-- .entry-title end -->

               <!-- Entry Meta
                                       ============================================= -->
               <ul class="entry-meta clearfix">
                  <li><i class="icon-calendar3"></i> <?php the_date('j F Y'); ?></li>
                  <li><a href="<?=get_permalink($doc)?>"><i class="icon-user"></i> <?=$doctor?></a></li>
                  <li><i class="icon-folder-open"></i> <a><?=$category?></a></li>
                  <!-- <li><a href="#"><i class="icon-comments"></i> <?php // comments_number('Комментариев нет', '1 комментарий', '% коммент.'); ?></a></li> -->
               </ul><!-- .entry-meta end -->

               <!-- Entry Image
                                       ============================================= -->
            
			   
               <div class="entry-content notopmargin">
                    <?php the_content(); ?>
               </div>
            </div>

            <!-- Post Navigation
                                   ============================================= -->
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

            </div><!-- .post-navigation end -->
            <!-- <div id="comments" class="clearfix">
                <h3 id="comments-title"><span><?php // echo  get_comments_number() ?></span> комментариев</h3>
                <div id="respond" class="clearfix">
                    <h3>Комментарии <span>закрыты.</span></h3>
                </div>
            </div> -->

         </div>

      </div><!-- .postcontent end -->

      <!-- Sidebar
                           ============================================= -->
      <div class="sidebar nobottommargin col_last clearfix">
         <div class="sidebar-widgets-wrap single-blog12">

            <div class="widget clearfix widget-twitter-feed">
               <h2>Автор:</h2>

               <div id="recent-post-list-sidebar">


                  <div class="spost clearfix single-blog1">
                     <div class="row">
                        <div class="col">
                           <div class="entry-image">
                              <a href="<?=site_url().'/blog/?aid='.$post->post_author?>" class="nobg"><img loading="lazy"
                                    src="<?=get_the_post_thumbnail_url($doc)?>"
                                    alt=""></a>
                           </div>
                        </div>
                        <div class="col">
                           <div class="entry-c">
                              <div class="entry-title">
                                 <h4><a href="<?=site_url().'/blog/?aid='.$post->post_author?>"><?= $doctor ?></a></h4>
								 <ul class="entry-meta clearfix"><li><? echo $rang; ?></li></ul>
                              </div>
                           </div>
                        </div>
                     </div>


                  </div>
               </div>

            </div>
            <?php get_template_part('parts/blog', 'latest'); ?>
         </div>

      </div><!-- .sidebar end -->

   </div>

</div>

</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>