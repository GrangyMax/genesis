<?php

define("GOG_API", false);

define("RUBLE", ' &#8381;');
function format_price($price)
{
	if ($price == '0') return 'Уточните';

	if ($price) {
		if (!stristr($price, '₽')) {
			return $price . constant('RUBLE'); /*добавляем значек рублм если цена больше нуля и значек рубля не в вставляли в админку*/
		}
	}
	$price_rexexp = "/^\d+(\s?\-\s?\d+)?$/";
	if (!preg_match($price_rexexp, $price))
		return $price ? $price : 'Уточняйте';
	$price_parts = explode('-', $price);
	$res_parts = [];
	foreach ($price_parts as $part) {
		$new_part = '';
		$part_len = strlen($part);
		for ($i = $part_len - 1; $i > -1; $i--) {
			if (($part_len - $i) % 3 != 0) {
				$new_part .= $part[$i];
			} else {
				$new_part .= $part[$i] . ' ';
			}
		}
		$res_parts[] = trim(strrev($new_part));
		$res_parts[] = trim(strrev($new_part)) . constant('RUBLE');
	}
	return "<span class=\"format-price\">" . implode(' &ndash; ', $res_parts) . "</span>";
}

include_once 'includes/bitrix.php';
include_once 'includes/ajax-responses.php';

function my_scripts_method()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.js', array(), '', true);
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');
/*
подключение рекапчи
function add_google_recapcha() {
	wp_enqueue_script( 'recapcha', 'https://www.google.com/recaptcha/api.js');
}
add_action( 'wp_enqueue_scripts', 'add_google_recapcha' );
*/
function load_style_script()
{
	// wp_enqueue_script('scripts.js', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '', true);
	wp_enqueue_script('plugins.js', get_stylesheet_directory_uri() . '/js/plugins.js', array(), '', true);
	wp_enqueue_script('datepicker.js', get_stylesheet_directory_uri() . '/js/components/datepicker.js', array(), '', true);		
	wp_enqueue_script('functions.js', get_stylesheet_directory_uri() . '/js/functions.js?v=6', array(), '', true);	
	wp_enqueue_script('create-map.js', get_stylesheet_directory_uri() . '/js/create-map.js?v=1', array(), '', true);
	wp_enqueue_script('contact-map.js', get_stylesheet_directory_uri() . '/js/contact-map.js?v=2', array(), '', true);	
	if (is_page('license')) {
		wp_enqueue_script('license-page.js', get_stylesheet_directory_uri() . '/js/license-page.js', array(), '', true);
	}
	if (is_page('39277')) { //лицензии
		wp_enqueue_script('license-page.js', get_stylesheet_directory_uri() . '/js/license-page.js', array(), '', true);
	}
	if (is_page(37701)) {
		wp_enqueue_script('search.js', get_stylesheet_directory_uri() . '/js/lab-search-and-microfixes.js', array(), '', true);
	}

	wp_enqueue_style('gfonts.css', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700');
	wp_enqueue_style('bootstrap.min.css', get_stylesheet_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css?v=3');
	wp_enqueue_style('dark.css', get_stylesheet_directory_uri() . '/css/dark.css');
	wp_enqueue_style('font-icons.css', get_stylesheet_directory_uri() . '/css/font-icons.css');
	wp_enqueue_style('animate.css', get_stylesheet_directory_uri() . '/css/animate.css');
	wp_enqueue_style('magnific-popup.css', get_stylesheet_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/css/custom.css?v=25');
	wp_enqueue_style('responsive.css', get_stylesheet_directory_uri() . '/css/responsive.css?v=26');
	wp_enqueue_style('fonts.css', get_stylesheet_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('datepicker.css', get_stylesheet_directory_uri() . '/css/components/datepicker.css');
	wp_enqueue_style('devtip-block.css', get_stylesheet_directory_uri() . '/css/devtip-block.css');
	wp_enqueue_style('license-page.css', get_stylesheet_directory_uri() . '/css/license-page.css');
	
}

// Загружаем стили и скрипты
add_action('wp_enqueue_scripts', 'load_style_script');
add_filter('use_block_editor_for_post_type', '__return_false');

function atg_menu_classes($classes, $item, $args)
{
	if ($args->theme_location == 'footerabout' || ($args->theme_location == 'footerservices') || ($args->theme_location == 'footerdocs') || ($args->theme_location == 'footerdocuments')) {
		$classes[] = 'mb-2';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

add_action('init', 'genesis_create_post_type');
function genesis_create_post_type()
{
	$labels12 = array(
		'name' => 'Новости',
		'singular_name' => 'Новость',
		'add_new' => 'Добавить новость',
		'add_new_item' => 'Добавить новую новость',
		'edit_item' => 'Редактировать новость',
		'new_item' => 'Создание новости',
		'view_item' => 'Перейти к новости',
		'parent_item_colon' => ''
	);
	$args120 = array(
		'labels' => $labels12,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'has_archive' => true,
		'rewrite' => array('slug' => 'news'),
		'supports' => array('title', 'editor', 'author', 'thumbnail')
	);
	register_post_type('news', $args120);
}

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// filter
function my_posts_where($where)
{
	$where = str_replace('услуги_$', 'услуги_%', str_replace("meta_key = 'услуги_$", "meta_key LIKE 'услуги_%", $where));
	return $where;
}
add_filter('posts_where', 'my_posts_where');

function genesis_navigation()
{
	register_nav_menus(array(
		"main" => "Главное меню, новый сайт",
		"footerdocs" => "Подвал - Подразделения",
		"footerservices" => "Подвал - Услуги",
		"footerabout" => "Подвал - Информация",
		"footerdocuments" => "Подвал - Документы",
	));
}
add_action('init', 'genesis_navigation', 99);
function get_doctor_clinics($doc_id)
{
	if (!$doc_id) return false;
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'klinika',
		'meta_query'	=> array(
			'relation'		=> 'OR',
			array(
				'key'		=> 'сотрудники',
				'compare'	=> 'LIKE',
				'value'		=> ':"'. $doc_id .'"',
			),
		)
	);
	$the_query = new WP_Query($args);
	if (count($the_query->posts)) {
		$ids = array();
		foreach ($the_query->posts as $key => $value) {
			$ids[] = $value->ID;
		}
		return $ids;
	}
	return false;
}


// Порядок постов в поиске

add_filter('pre_get_posts', function ($query) {

	if ($query->is_search && !is_admin()) :
		$query->set('post_type', ['service', 'analyzes', 'kompleks', 'doctor', 'post', 'news', 'answers', 'reviews']);
	endif;

	return $query;
});

//function __search_by_title_only($search, &$wp_query)
function __search_by_title_only($search, $wp_query)
{
	global $wpdb;
	if (empty($search)) {
		return $search; // skip processing - no search term in query
	}
	$q = $wp_query->query_vars;
	$n = !empty($q['exact']) ? '' : '%';
	$search =
		$searchand = '';
	foreach ((array)$q['search_terms'] as $term) {
		$term = esc_sql($wpdb->esc_like($term));
		$search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}
	if (!empty($search)) {
		$search = " AND ({$search}) ";
		if (!is_user_logged_in())
			$search .= " AND ($wpdb->posts.post_password = '') ";
	}
	return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);

add_filter('posts_orderby', function ($order) {

	if (!is_admin()) :

		if (is_search() && is_main_query()) :

			global $wpdb;
			$order = "FIELD( post_type, 'service', 'analyzes', 'kompleks', 'doctor', 'post', 'news', 'answers', 'reviews' ), {$wpdb->posts}.post_modified DESC";
		endif;

		// Disable this filter for future queries!
		remove_filter(current_filter(), __FUNCTION__);
	endif;

	return $order;
});



/* Оповещения об опубликованном отзывы или вопросе */

function email_client($post_ID, $post, $update)
{
	if ($post->post_status == "publish") {
		$type = get_post_type($post_ID);
		if ($type == 'answers') {
			$email = get_post_meta($post_ID, 'email');
			// add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
			add_filter('wp_mail_from_name', create_function('', 'return "Клиника Genesis";'));
			$res = wp_mail($email, "Вопросы GENESIS: Ваш вопрос опубликован", 'Ссылка на запись: ' . get_permalink($post_ID));
		} else if ($type == 'reviews') {
			$email = get_post_meta($post_ID, 'email');
			// add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
			add_filter('wp_mail_from_name', create_function('', 'return "Клиника Genesis";'));
			$res = wp_mail($email, "Отзывы GENESIS: Ваш отзыв опубликован", 'Ссылка на отзывы: ' . get_post_type_archive_link('reviews'));
		}
		// var_dump($res);
		// var_dump($type);
		// die();
	}
	return $post_ID;
}
add_action('save_post', 'email_client', 10, 3);

// ОТКЛЮЧЕНИЕ АВТОМАТИЧЕСКОГО ФОРМАТРИРОВАНИЯ СТАТЕЙ
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// Функция для удаления дубликатов из массива (сравнение коллбэком)
function array_uunique(array $array, callable $comparator): array
{
	$unique_array = [];
	do {
		$element = array_shift($array);
		$unique_array[] = $element;

		$array = array_udiff(
			$array,
			[$element],
			$comparator
		);
	} while (count($array) > 0);

	return $unique_array;
}

// JS console.log
function console_log($message)
{
	echo "<script>console.log(`$message`)</script>";
}


/*устанавливаем список типов для поиска по сайту*/
function SearchFilter($query)
{
	if ($query->is_search) {

		$query->set('post_type', array(
			'klinika',
			'direction',
			'service',
			'doctor',
			'analyzes',
			'blog',
			'page'
		));
	}
	return $query;
}

if (!is_admin()) {
	add_filter('pre_get_posts', 'SearchFilter');
}

// Поддержка Open Graph в WordPress

function add_opengraph_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function insert_fb_in_head() {
    global $post;
    if ( !is_singular())
        return;
    echo '<meta property="fb:admins" content="Ваш ID в Facebook" />';
    echo '<meta property="og:title" content="' . get_the_title() . '" />';
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />';
    if(!has_post_thumbnail( $post->ID )) {
        $default_image = "http://migrate.genesis82.ru/wp-content/uploads/2020/11/clinic-logo.png";
        echo '<meta property="og:image" content="' . $default_image . '" />';
    } else {
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '" />';
    }
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

//пагинация на странице отзывов (по 10 штук)
function my_post_count_queries( $query ) {
  if (!is_admin() && $query->is_main_query()){
    if(is_post_type_archive('reviews')){ 
       $query->set('posts_per_page', 10);	
    }
  }
}
add_action( 'pre_get_posts', 'my_post_count_queries' );

	add_image_size( 'doctor-photo-1x', 317, 477, 1 );
	add_image_size( 'doctor-photo-1.5x', 475, 715, 1 );
	add_image_size( 'doctor-photo-2x', 634, 954, 1 );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'category-thumb' => 'doctor-photo',
	) );
}

