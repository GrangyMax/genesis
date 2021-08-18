<?php get_header(); 
set_query_var('title', 'Поиск' );
set_query_var('subtitle',  $_GET['s'] );
get_template_part('parts/breadcrumbs'); 

//get_template_part('parts/loop', 'default'); 

get_template_part('parts/custom-search'); 
?>
        
        <section class="pb-5">
            <!--<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A684db4fb5ff6ffa001f4f4099536e519bbdf7642a1223a7b2ad97526dabc9312&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>-->
        </section>
<?php get_footer(); ?>