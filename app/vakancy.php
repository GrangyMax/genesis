<?php
/*
Template Name: Вакансии
*/
?>
<?php get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
?>
<style>
span.wpcf7-not-valid-tip {
    position: relative;
}
</style>
<?php 
    $query = new WP_Query( array(
        'post_type' => 'klinika',
        'posts_per_page' => -1
    ) );
    $clinic_select = '';
    foreach ($query->posts as $key => $clinic) {
        $clinic_select .= '<option>'.get_the_title($clinic).'</option>';
    }
?>  


    
<section id="page-title" class="page-title-parallax page-title-dark skrollable skrollable-between" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/paralax/top.jpg); padding: 120px 0px; background-position: 0px -185.1742px;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px; background-size: cover;">

<div class="container clearfix">
<ol class="breadcrumb">
        <?php //bcn_display(); ?>
        </ol>
</div>

</section>
<!-- тайтл страницы    -->

<section id="content" style="margin-bottom: 0px;">

<div class="content-wrap pt-4">

    <div class="container clearfix">

        <div class="fancy-title title-border title-center ">
            <h1><?php the_title(); ?></h1>
         </div>

        <div class="col_three_fifth nobottommargin">
            <?php $query = new WP_Query( array(
                        'post_type' => 'vacancy',
                        'posts_per_page' => -1,
                    ) );
                    $first = true;
            foreach ($query->posts as $key => $vacancy) {
                ?>   
            <?php if(!$first){ ?>
            <div class="divider divider-short"><i class="icon-star3"></i></div>
            <?php } ?>
            <div class="fancy-title title-bottom-border">
                <h3><?php echo get_the_title($vacancy); ?></h3>
            </div>

            <p><?php the_field('куда', $vacancy->ID); ?></p>

            <div class="accordion accordion-bg clearfix">

                <div class="acctitle" style="display: none;"></div>
                <div class="acc_content clearfix" style="display: none;">
                </div>

                <div class="acctitle acctitlec"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Требования</div>
                <div class="acc_content clearfix" style="">
                    <ul class="iconlist iconlist-color nobottommargin">
                        <?php foreach (get_field('требования', $vacancy->ID) as $key => $value) { ?>
                            <li><i class="icon-ok"></i><?php echo $value['пункт'] ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Обязанности</div>
                <div class="acc_content clearfix" style="display: none;">
                    <ul class="iconlist iconlist-color nobottommargin">
                    <?php foreach (get_field('обязанности', $vacancy->ID) as $key => $value) { ?>
                        <li><i class="icon-plus-sign"></i><?php echo $value['пункт'] ?></li>
                    <?php } ?>
                    </ul>
                </div>

                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Что вы получите</div>
                <div class="acc_content clearfix" style="display: none;"><?php the_field('что_вы_получите', $vacancy->ID); ?></div>

            </div>
            <?php if(!$first){ ?>
                <a href="#" data-scrollto="#job-apply" class="button button-3d button-black nomargin bgorange">Отправить резюме</a>
            <?php }
            $first = false;
            ?>
            

            <?php } ?>
        </div>

        <div class="col_two_fifth nobottommargin col_last">
	
  <div id="job-apply" class="heading-block highlight-me">
                <h4>Контакты</h4><br>
				  <p>тел.: <a href="tel:+73652248310">+7 (3652) 248-310</a><br>
				  моб.: <a href="tel:+79787469633">+7 (978)746-96-33</a><br>
				  e-mai: <a href="mailto:genesis.otdel.kadrov@gmail.com">genesis.otdel.kadrov@gmail.com</a></p>
				  				  
				<p>Время работы: 09:00-16:00 (перерыв 13:00-14:00)</p>
            </div>


            <div id="job-apply" class="heading-block highlight-me">
                <h4 align="center">Отправить заявку</h4>
				<p align="center">Мы ответим Вам в рабочее время</p>
               
            </div>

            <div class="form-widget">

                <div class="form-result"></div>

                <!-- <form action="include/form.php" id="template-jobform" name="template-jobform" method="post" novalidate="novalidate"> -->
                <?php echo str_replace('{{list_clinic}}', $clinic_select, do_shortcode('[contact-form-7 id="36290" title="Заявка на вакансию"]')); ?>

            </div>

        </div>

    </div>


</div>

</section>

</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>