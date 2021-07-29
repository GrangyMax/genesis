<div class="accordion clearfix">
                <div class="ml-4">
                    <h3>Похожие вопросы:</h3>
                </div>
                <div class="acctitle1" style="display: none;"></div>
                <?php 
                $first = true;
                $questions = get_posts(array('post_type' => 'answers', 'showposts' => 5, 'orderby' => 'rand', 'exclude' => $post->ID));
                foreach ($questions as $key => $qstn) { ?>
                <div class="acctitle1 <?php if($first){ echo 'none-border'; $first = false; } ?>">
                    <a href="<?=get_permalink($qstn->ID)?>">
                        <i class="acc-closed icon-line-circle-plus"></i>
                        <i class="acc-open icon-line-circle-check color"></i>
                        <?=get_the_title($qstn->ID)?>
                    </a>
                </div>
                <?php } ?>
</div>