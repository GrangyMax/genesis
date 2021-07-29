
<?php 

/*
    Template Name: header-2
*/



?>

<!DOCTYPE html>
<html dir="ltr" lang="ru-RU">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
	<!--<meta name="viewport" content="width=device-width">-->
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	<?php wp_head(); ?>
	<script type="text/javascript" charset="utf-8" id="ymaps-api-loader" src="https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&amp;amp;apikey=df578316-6785-45a9-beaa-8c9ad78839de"></script>

	<meta name="ahrefs-site-verification" content="a9cde989244ba3e22a3f21b5f612dae48c2a2c152c337451ee92f33b60bbe983">
	
</head>


<body data-loader="12" data-loader-color="#EF7F1A" class="stretched">
	<?php $header = maybe_unserialize(get_option('gnss_header')); ?>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="transparent-topbar dark">
		<?php
		include_once 'parts/template_switch.php';
	
		?>
			<div class="container clearfix">

				<div class="col_half nobottommargin clearfix">
					<div class="header-phones nobottommargin">
						<div class="header-phones__main">
							<a href="tel:+79787325000">
								<?php the_field('телефон_в_верхней_полоске', 'option'); ?>
							</a>
							<!-- <div class="header-phones__toggle"><span>&lsaquo;</span></div> -->
						</div>
						<!-- 
						<div class="header-phones__more">
							<div>
								<?php foreach ( get_field('дополнительные_телефоны', 'options') as $key => $value ) { ?>
								<a href="<?php echo $value['телефон'] ?>">
									<strong><?php echo $value['телефон'] ?></strong>
								</a>
								<?php } ?>
							</div>
						</div>
						-->
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
							<!--<div class="wrapper_search ">
							  <div class="search-box">
										<form action="<?= site_url() . "/" ?>" method="get" class="search_form">
											<!--<input type="text" name="s" class="input" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" placeholder="Введите поисковый запрос" >
										<input type="text" name="s" class="input" placeholder="Введите поисковый запрос" >
											 <div class="btn btn_search ">
												<i class="icon-search3"></i>
											 
											 </div>
										</form>
							  </div>
							</div> -->
				</div>

			</div>

		</header><!-- #header end -->

		<?php /*include 'devtip-block.php';*/ ?>