<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<?php wp_head(); ?>
	<meta name="ahrefs-site-verification" content="a9cde989244ba3e22a3f21b5f612dae48c2a2c152c337451ee92f33b60bbe983">
	<script id="ymaps-api-loader" async></script>
</head>
<?php
$query = new WP_Query(array(
    'post_type' => 'klinika',
    'posts_per_page' => -1
));

$clinic_select = '';
foreach ($query->posts as $key => $clinic) {
    $email = get_field('email', $clinic) ? get_field('email', $clinic) : get_option('admin_email');
    $clinic_select .= '<option value="'. $email .'" class="chosen-select">' . get_the_title($clinic) . '</option>';
}
?>

<body data-loader="12" data-loader-color="#EF7F1A" class="stretched">
	
	<?php $header = maybe_unserialize(get_option('gnss_header')); ?>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="transparent-topbar dark">
			<div class="container clearfix">
			<div class="col_half nobottommargin clearfix">
					<div class="header-phones nobottommargin">						
						<div class="header-phones__main">
							<a href="tel:+79787325000" class="phone_header_desctop">
								<?php the_field('телефон_в_верхней_полоске', 'option'); ?>
								
							</a>	
							<a href="tel:+79787325000" class="phone_header_mobile">								
								<i class="icon-phone3"></i>&nbsp; +7 (978) 732 50 00
							</a>							
						</div>
					</div>
				</div>

				<div class="col_half nobottommargin text-md-right btn-zapis" style="position: absolute; margin-left: 590px">	
					<a href="#myModal1" data-lightbox="inline">
							<button class="btn btn-zapis">
								<span><img src="http://migrate.genesis82.ru/wp-content/uploads/2021/07/outline_calendar_today_white_24dp.png"
									style="width: 20px;  padding: 0px 3px 3px 0px;"></span>
								<span class="animated-text-button"></span>
							</button>
					</a>
				
				<!-- Modal -->
				<div class="container row clearfix">
				
					<div class="modal1 mfp-hide" id="myModal1">
						<!--<span class="close_link">X</span>
							<style>
								.close_link{
									width:25px;
									height: 25px;
									border: 1px solid #FFF;
									border-radius: 10%;
									position: absolute;
									transform: translate(550px, 0px);
									z-index: 100;
									text-align: center;
									color: #fff;
									
								}
							</style>-->
						<div class="block divcenter rounded shadow modal-frontpage">
							<div class="row nomargin clearfix">
							<!--<div style="background-color: var(--themecontrast); height: 20px; width: 100%; border-radius: 4px;"></div>-->
								<div>
								<ul class="nav nav-tabs nav-justified flex-column border-bottom-0 flex-md-row bgcolor rounded" role="tablist">
									<li class="nav-item">
										<a class="nav-link py-3 active" id="home-moving-tab" data-toggle="tab" href="#appointment" role="tab" aria-controls="appointment" aria-selected="true">Заявка на прием</a>
									</li>
									<li class="nav-item">
										<a class="nav-link py-3" id="office-moving-tab" data-toggle="tab" href="#callback" role="tab" aria-controls="callback" aria-selected="false">Обратный звонок</a>
									</li>
									<li class="nav-item">
										<a class="nav-link py-3" id="others-moving-tab" data-toggle="tab" href="#ask" role="tab" aria-controls="ask" aria-selected="false">Задать вопрос</a>
									</li>
								</ul>
								<div class="tab-content rounded  bg-white py-4 px-5">
									<div class="tab-pane fade show active" id="appointment" role="tabpanel" aria-labelledby="appointment-tab">
										<!-- <p class="mb-4">Введите ваши данные, место жительства, удобную для вас дату, необходимого специалиста, и мы организуем вам прием. Обязательно свяжемся с вами, для согласования деталей.</p> -->
										<div class="form-widget">
											<div class="form-result"></div>											
											<?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36216" title="Запись на прием(Главная)" html_class="row home-moving-form position-relative mb-0"]')); ?>
														
										</div>						
									</div>
									<div class="tab-pane fade" id="callback" role="tabpanel" aria-labelledby="callback-tab">
										<!-- <p class="mb-4">Оставьте ваши данные и мы свяжемся с вами, в течение нескольких минут, в рабочее время.</p>-->
										<div class="form-widget">
											<div class="form-result"></div>
											<?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36217" title="Обратный звонок(Главная)" html_class="row office-moving-form position-relative mb-0"]')); ?>
										</div>
									</div>
									<div class="tab-pane fade" id="ask" role="tabpanel" aria-labelledby="ask-tab">
										<div class="form-widget">
											<div class="form-result"></div>
											<?php echo str_replace('{{clinics_list}}', $clinic_select, do_shortcode('[contact-form-7 id="36218" title="Задать вопрос(Главная)" html_class="row others-moving-form position-relative mb-0"]')); ?>
										</div>
									</div>
										
								</div>	
																
								</div>								
							</div>							
						</div>
					</div>
				</div>
			</div>

		
				

				<div class="col_half fright dark col_last clearfix nobottommargin">

					<!-- Соцсети
					============================================= -->
					<div id="top-social">
						<ul>
							<li><a href="<?= $header['facebook'] ?>" class="si-facebook" target="_blank"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="<?= $header['twitter'] ?>" class="si-twitter" target="_blank"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
							<li><a href="<?= $header['youtube'] ?>" class="si-youtube" target="_blank"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
							<li><a href="<?= $header['instagram'] ?>" class="si-instagram" target="_blank"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="https://vk.com/clinic.genesis" class="si-vk" target="_blank"><span class="ts-icon"><i class="icon-vk"></i></span><span class="ts-text">В контакте</span></a></li>
							<li><a href="<?= $header['odnoklassniki'] ?>" class="si-rss" target="_blank"><span class="ts-icon"><i class="icon-odnoklassniki"></i></span><span class="ts-text">Одноклассники</span></a></li>
							<li class="bvi" title="Версия для слабовидящих">
							
																
								<a href="#" class="bvi-link-shortcode bvi-open">	
									<img src="/wp-content/uploads/2020/11/icon_41.png">
								</a>			
									
							</li>
						</ul>
						
					</div>

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Логотип
					============================================= -->
					<div id="logo">
						<a href="<?php echo site_url(); ?>" class="standard-logo" data-dark-logo="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" data-mobile-logo="<?php echo get_stylesheet_directory_uri() ?>/images/logo-mobile.png"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="Genesis Logo"></a>
						<a href="<?php echo site_url(); ?>" class="retina-logo" data-dark-logo="<?php echo get_stylesheet_directory_uri() ?>/images/logo@2x.png" data-mobile-logo="<?php echo get_stylesheet_directory_uri() ?>/images/logo-mobile@2x.png"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo@2x.png" alt="Genesis Logo"></a>
					</div><!-- #logo end -->

					<!-- Верхнее Меню
					============================================= -->
					<nav id="primary-menu" class="not-dark">

						<?php wp_nav_menu(array("theme_location" => "main", "container" => false)); ?>
							
					
						<!-- старый поиск
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="<?= site_url() . "/" ?>" method="get" class="search_form">
							
							<table class="search-el"><tr>
								<td><i class="icon-search-run icon-search3"></i></td>
								<td><input type="text" name="s" class="input-search form-control" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" placeholder="Введите запрос" autofocus></td>
								<td><input type="submit" value="Найти" class="search_button form-control"></td>
								</tr>
							</table>
							</form>
						</div> 
						
					</nav>
							
				</div>

			</div>

		</header><!-- #header end -->

		<?php /*include 'devtip-block.php';*/ ?>