<section id="content">
    <div class="content-wrap mobile-usluga pt-0 pb-0">
        <div class="container mt-5 p-0">
            <div class="entry clearfix search-page">
			 <?php $i=0; ?>   
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			
			?>
			
			 				  
				  <table class="table" border=0">				
				 <tr>
				
				 <td align="center" style="border: 0; ">
					
							<div class="entry-c" style="width: 50%;  ">
								<div class="entry-title">					
									<h2 style="font-size: 32px;">					
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>						
									</h2>
									
								</div>    
								<div class="entry-content">
									<p style="font-style: italic; font-size: 16px; color: #888888;"><?php the_excerpt(); ?></p>
								</div>					
								<?php /* <ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?php echo get_the_date('d F, h:i'); ?> </li>
									<!-- <li><i class="icon-comments"></i> Комментариев нет
											</li> -->

								</ul> */?>	
								
								
							</div>
							<div> <!--<img src="http://migrate.genesis82.ru/wp-content/uploads/2020/10/Group-3.png" width="25">-->
							<img src="http://migrate.genesis82.ru/wp-content/uploads/2020/10/Group-3.png" width="25">
							</div>
					
				</td>
				</tr>
	
				</table>
				
				
				
				
                <?php endwhile; else : ?>
                    <p>Записей нет.</p>
                <?php endif; ?>  
				
							
		
            </div>
            <?php wp_pagenavi(); ?>

        </div>
    </div>
</section>