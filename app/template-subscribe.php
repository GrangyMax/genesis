<?php
/*
    Template Name: .subscribe
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
set_query_var('title', get_the_title());
// set_query_var('subtitle',  $_GET['s'] );
get_template_part('parts/breadcrumbs');  ?>
<section id="content" style="margin-bottom: 0px;">
         <div class="content-wrap mobile-usluga" style="padding-top: 15px;">
            <div class="container clearfix">
               <!-- Post Content
                     ============================================= -->
               
                              <section>
                  
<?php
		
			
    if (md5($_POST['email'].'wag1') == $_POST['_key']) {
		
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			
		$res = $wpdb->update( 'gnss_mb',
                array( 
                    'name' => $_POST['_name'],
                    'surname' => $_POST['surname']
                ),
                array( 'email' => $_POST['email'] ),
                array( '%s', '%s'),
                array( '%s' )
            );  	
			
		$userdata = array(	
			'user_pass'       => 'yH6eoW65R#2#i^6ViZ0p#V2', // обязательно
			'user_login'      => $_POST['email'], // обязательно	
			'first_name'	   => $_POST['_name'], 
			'last_name'       => $_POST['surname'],
			'user_email'      => $_POST['email'],	
			'role'            => 'site_subscriber' // (строка) роль пользователя
		
		);		
		wp_insert_user( $userdata );
		echo "<p>Вы успешно подписались на новостную рассылку.</p>";
	}	
	else{
		
		echo "<p>Неправильно указан e-mail адрес.</p>";
	}
			
?>
	
<?php            
    } elseif ($_POST['email']) {
            global $wpdb;
            $rslt = $wpdb->insert(
                'gnss_mb',
                array( 
                    'email' => $_POST['email']
                ),
                array( '%s' )   
            );              
            $key = md5($_POST['email'].'wag1');
?>
<div id="contact-form-overlay" class="contact-form-overlay-clinic clearfix mt-5 mb-5">

    <form class="row home-moving-form position-relative mb-0" action="<?=site_url().'/subscribe/'?>" method="post">
    <div class="col_half">
        <label for="template-contactform-email">Имя <small>*</small></label>
        <input type="text" name="_name" value="" size="40" class="required email sm-form-control valid" id="template-contactform-email" aria-required="true" aria-invalid="false" placeholder="Имя">
    </div>
    <div class="col_half col_last">
        <label for="template-contactform-email">Фамилия <small>*</small></label>
        <input type="text" name="surname" value="" size="40" class="required email sm-form-control valid" id="template-contactform-email" aria-required="true" aria-invalid="false" placeholder="Фамилия">
    </div>
	  <div class="form-group">
<!--
	<div class="form-check">
		<span class="wpcf7-form-control-wrap">
			<span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required">
			
				<input type="checkbox" value="&nbsp;Я даю согласие на обработку и хранение моих персональных данных." required>
				<span class="wpcf7-list-item-label">&nbsp;Я даю согласие на обработку и хранение моих персональных данных.</span>
			
			</span>
		</span>
		
	</div>	
	-->
		<div class="form-check">
			<span class="wpcf7-form-control-wrap">
				<span class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required">
					<input type="checkbox" class="wpcf7-list-item-label form-check-input" id="exampleCheck1"
					style="opacity: 1; 
					border: 1px solid #ddd !important;
					display: inline-block;
					vertical-align: middle;
					width: 1.25em;
					height: 1.25em;
					padding: .1em;
					margin-right: .5em;
					line-height: 1;
					text-align: center;
					border-radius: .25em; ">
					<label class="wpcf7-list-item-label" for="exampleCheck1" style="margin: 3px 0px 0px 10px;">Я даю согласие на обработку и хранение моих персональных данных.</label>
				
				</span>
			</span>
		
		</div>

	</div>		
        <input type="hidden" name="email" value="<?=$_POST['email']?>">
        <input type="hidden" name="_key" value="<?=$key?>">
        <input type="submit" class="wpcf7-form-control wpcf7-submit btn bgorange text-white t500 btn-block py-2 mt-2" value="Сохранить">
    </form>
  </div>
<?php
    } else {
        echo "<p>Что-то не так. Попробуйте снова.</p>"; 
    }
?>
                </section>
                <!-- /#content -->

            

            </div>
            <!-- /.main-body -->

        </div>
        <!-- /#main -->

        </section>
    <!-- /#wrapper -->
    <?php endwhile; endif; ?>
<?php get_footer(); ?>