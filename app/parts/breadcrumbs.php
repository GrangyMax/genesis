<?php $title    = get_query_var('title'); ?>
<?php $subtitle = get_query_var('subtitle'); ?>
<section id="page-title">
    <div class="container clearfix">
        <?php if($title) { ?><h1><?=$title?></h1><?php } ?>
        <?php if($subtitle) { ?><span><?=$subtitle?></span><?php } ?>
        
        <ol class="breadcrumb">
        <?php bcn_display(); ?>
        </ol>
    </div>
</section>