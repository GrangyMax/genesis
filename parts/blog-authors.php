<div class="widget clearfix widget-twitter-feed">
    <h4>Авторы</h4>
    <div id="recent-post-list-sidebar">
        <?php
        $zAuthors = get_posts(
            array(
                'post_type' => 'doctor',
                'showposts' => -1
            )
        );
        foreach ($zAuthors as $zAthr) {
            $zAcco = get_post_meta($zAthr->ID, 'acco', 1);
            if ($zAcco) {
                $zPosts = get_posts(array(
                    'post_type' => 'blog',
                    'showposts' => 1,
                    'author' => $zAcco
                ));
                if ($zPosts[0]->ID) {
                    $rang = get_post_meta($doctor[0]->ID, 'rang', 1);
        ?>
                    <div class="spost clearfix">
                        <div class="entry-image">
                            <a href="<?= site_url() . '/blog/?aid=' . $zAcco ?>" class=" nobg"><img src="<?= get_the_post_thumbnail_url($zAthr->ID) ?>" alt=""></a>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="<?= site_url() . '/blog/?aid=' . $zAcco ?>"><?= get_the_title($zAthr->ID) ?></a></h4>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>


    </div>

</div>