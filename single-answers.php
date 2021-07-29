<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php 
		set_query_var('title', get_the_title());
		
		get_template_part('parts/breadcrumbs'); ?>
        <!-- тайтл страницы -->
        <?php
        $answer = get_post_meta($post->ID, 'answer', 1);
        $doctor = get_post_meta($post->ID, 'doctor', 1);
        $user_info = get_userdata($doctor);
        $doctor = $user_info->user_level == 10 ? $post->post_author : $doctor;
        $doctor = get_posts(array(
            "post_type" => 'doctor',
            "showposts" => '1',
            "meta_key" => "acco",
            "meta_value" => $doctor
        ));
        if ($doctor[0]->ID) {
            $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
            $avatar = get_the_post_thumbnail_url($doctor[0]->ID, 'thumbnail');

            $doctor_url = get_permalink($doctor[0]->ID);
            $doctor = get_the_title($doctor[0]->ID);
        } else {
            $avatar = 'https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60';
            $doctor = '';
            $doctor_url = '#';
        }
        // var_dump($avatar);
        ?>
        <div class="container clearfix">
            <div class="postcontent nobottommargin clearfix">
                <section class="questions mt-3">
                    <ol class="commentlist clearfix">
                        <li class="comment even thread-even depth-1" id="li-comment-1">
                            <div id="comment-1" class="comment-wrap clearfix">
                                <div class="comment-meta">
                                    <div class="comment-author vcard">
                                        <span class="comment-avatar clearfix">
                                            <img alt="" src="https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60" class="avatar avatar-60 photo avatar-default" height="60" width="60"></span>
                                    </div>
                                </div>
                                <div class="comment-content clearfix">
                                    <div class="comment-author">Аноним<span><a><?php the_date('d F Y H:i'); ?></a></span></div>
                                    <p><?php the_content(); ?></p>
                                    <a class="comment-reply-link" href="#"></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <ul class="children">
                                <li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">
                                    <div id="comment-3" class="comment-wrap clearfix">
                                        <div class="comment-meta">
                                            <div class="comment-author vcard">
                                                <span class="comment-avatar clearfix">
                                                    <img alt="" src="<?= $avatar ?>" class="avatar avatar-40 photo" height="40" width="40"></span>
                                            </div>
                                        </div>
                                        <div class="comment-content clearfix">
                                            <div class="comment-author"><a href="<?= $doctor_url ?>" rel="external nofollow" class="url"><?= $doctor ?></a><span></span></div>
                                            <p><i><?= $answer ?></i></p>
                                            <a class="comment-reply-link" href="#"></a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ol>
                    <?php get_template_part('parts/answers', 'same'); ?>
                </section>
                <div class="container-fluid mb-5">
                    <div class="col">
                        <div class="fancy-title title-dotted-border">
                            <h3>Оставить вопрос</h3>
                        </div>
                        <div class="form-widget" data-alert-type="inline">
                            <div class="form-result"></div>
                            <?php get_template_part('parts/answers', 'new'); ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="sidebar nobottommargin col_last clearfix">
                <div class="sidebar-widgets-wrap">
                    <div class="widget widget-twitter-feed clearfix iconlist-blog-vrach">
                        <h4>Темы вопросов:</h4>
                        <?php get_template_part('parts/answers', 'terms'); ?>
                    </div>
                    <?php /* get_template_part('parts/news', 'latest'); */?>
                </div>
            </div><!-- .sidebar end -->
        </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>