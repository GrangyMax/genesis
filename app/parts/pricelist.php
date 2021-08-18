<?php /* Template Name: Прейскурант */ ?>

<?php get_header();
set_query_var('title', 'Прейскурант');
set_query_var('subtitle',  'Прейскурант клиники Генезис');
get_template_part('parts/breadcrumbs'); ?>

<div class="container license-page">
<div id="accordion">


<div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
           ООО "Клиника Генезис"
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
			<a href="/wp-content/uploads/2020/12/price_genesis-от-18.11.20.pdf" target="_blank" download>Скачать прейскурант ООО "Клиника Генезис"</a>
			
        </div>
      </div>
  </div>

<div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          ООО "Центр зрения "Генезис"
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
        	<a href="/wp-content/uploads/2020/12/Прейскурант-ООО-Центр-зрения-Генезис.pdf" target="_blank" download>Скачать прейскурант ООО "Центр зрения "Генезис"</a>
			
        </div>
      </div>
  </div>


<div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
           ООО "Центр клинической онкологии и гематологии"
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
        <a href="/wp-content/uploads/2020/12/Прейскурант-ООО-Центр-клинической-онкологии-и-гематологии.pdf" target="_blank" download>ООО "Центр клинической онкологии и гематологии"</a>
		
        </div>
      </div>
  </div>



</div>
</div>


    <br>
    <br>
    <br>

	
	
<?php get_footer(); ?>