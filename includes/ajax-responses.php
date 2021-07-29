<?php 


add_action('wp_ajax_get_analyzes', 'get_analyzes');
add_action('wp_ajax_nopriv_get_analyzes', 'get_analyzes');

add_action('wp_ajax_get_kompleks', 'get_kompleks');
add_action('wp_ajax_nopriv_get_kompleks', 'get_kompleks');

add_action('wp_ajax_get_saleslab', 'get_saleslab');
add_action('wp_ajax_nopriv_get_saleslab', 'get_saleslab');

add_action('wp_ajax_lab_search', 'lab_search');
add_action('wp_ajax_nopriv_lab_search', 'lab_search');

add_action('wp_ajax_labs_start', 'labs_start');
add_action('wp_ajax_nopriv_labs_start', 'labs_start');

function get_analyzes() {
    $count = $_POST['count'];
    // if(empty($count)) exit();
    $args = array(
        'post_type'  => 'analyzes',
        'post_status'=> 'publish',
        'posts_per_page' => '10',
        'paged'          => $count
    );
    if($_POST['id']) $args['tax_query'] = array(
		array(
			'taxonomy' => 'analizi_cat',
			'field'    => 'id',
			'terms'    => $_POST['id']
		)
    );
    $response = array();
    $query = new WP_Query( $args );
    if(count($query->posts)) {
        
        foreach ($query->posts as $key => $analiz) {
            $response[] = new ResponseObj($analiz);
        }
        
    }
    echo json_encode($response);
    exit();
}

function get_kompleks() {
    $count = $_POST['count'];
    // if(empty($count)) exit();
    $args = array(
        'post_type'  => 'kompleks',
        'post_status'=> 'publish',
        'posts_per_page' => '10',
        'paged'          => $count
    );
    if($_POST['id']) $args['tax_query'] = array(
		array(
			'taxonomy' => 'kompleksi_cat',
			'field'    => 'id',
			'terms'    => $_POST['id']
		)
    );
    $response = array();
    $query = new WP_Query( $args );
    if(count($query->posts)) {
        
        foreach ($query->posts as $key => $analiz) {
            $response[] = new ResponseObj($analiz);
        }
        
    }
    echo json_encode($response);
    exit();
}
function lab_search() {
    $count = $_POST['count'];
    $search = $_POST['search'];
    // if(empty($count)) exit();
    $args = array(
        'post_type'  => array('kompleks', 'analyzes'),
        'post_status'=> 'publish',
        'posts_per_page' => '10',
        'paged'          => $count,
        's'              => $search
    );
    $query = new WP_Query( $args );
    $response = array();
    if(count($query->posts)) {
        foreach ($query->posts as $key => $analiz) {
            $response[] = new ResponseObj($analiz);
        }
    }
    echo json_encode($response);
    exit();
}
function get_saleslab() {
    $count = $_POST['count'];
    // if(empty($count)) exit();
    $args = array(
        'post_type'  => array('kompleks', 'analyzes'),
        'post_status'=> 'publish',
        'posts_per_page' => '10',
        'paged'          => $count,
        'meta_query' => array(
            array(
                'key'     => 'акция',
                'value'   => '1',
                'compare' => '='
            )
        )
    );
    $query = new WP_Query( $args );
    $response = array();
    if(count($query->posts)) {
        foreach ($query->posts as $key => $analiz) {
            $response[] = new ResponseObj($analiz);
        }
    }
    echo json_encode($response);
    exit();
}

function labs_start() {
    $count = $_POST['count'];
    // if(empty($count)) exit();
    $args = array(
        'post_type'  => array('kompleks', 'analyzes'),
        'post_status'=> 'publish',
        'posts_per_page' => '10',
        'paged'          => $count
    );
    $response = array();
    $query = new WP_Query( $args );
    if(count($query->posts)) {
        
        foreach ($query->posts as $key => $analiz) {
            $response[] = new ResponseObj($analiz);
        }
        
    }
    echo json_encode($response);
    exit();
}


class ResponseObj {
    function __construct($post)
    {
        $this->price = (int)get_field('price', $post->ID);
        $this->title = $post->post_title;
        $this->description = get_the_excerpt($post->ID);
        $this->serviceLink = get_the_permalink($post->ID);
        $this->isHomeVisit = (boolean)get_field('выезд_на_дом', $post->ID);
        $this->isStock = (boolean)get_field('акция', $post->ID);
    }
}

