		<!-- Footer
		============================================= -->
		<footer id="footer" class="nobg noborder">

			<div class="container">

				<!-- Нижнее меню
				============================================= -->
				<div class="footer-widgets-wrap pt-0 pb-4 clearfix">

					<div class="row">

						<div class="col-lg-2 col-md-2 col-6">
							<div class="widget clearfix">

								<h4 class="ls0 mb-4 nott">Клиники</h4>

								<ul class="list-unstyled iconlist ml-0">
									<?php wp_nav_menu(array("theme_location" => "footerdocs", 'container' => false, 'items_wrap' => '%3$s' ))?>
								</ul>

							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-6">
							<div class="widget clearfix">

								<h4 class="ls0 mb-4 nott">Услуги</h4>

								<ul class="list-unstyled iconlist ml-0">
                                    <?php wp_nav_menu(array("theme_location" => "footerservices", 'container' => false, 'items_wrap' => '%3$s' ))?>
								</ul>

							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-6">
							<div class="widget clearfix">

								<h4 class="ls0 mb-4 nott">Информация</h4>
                                <ul class="list-unstyled iconlist ml-0">
								    <?php wp_nav_menu(array("theme_location" => "footerabout", 'container' => false, 'items_wrap' => '%3$s' ))?>
                                </ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-6">
							<div class="widget clearfix">

								<h4 class="ls0 mb-4 nott">Документы</h4>

								<ul class="list-unstyled iconlist ml-0">
									<?php wp_nav_menu(array("theme_location" => "footerdocuments", 'container' => false, 'items_wrap' => '%3$s' ))?>
								</ul>

							</div>
						</div>
						<div class="col-lg-4 col-md-4 text-md-right">
							<div class="widget clearfix">

								<h4 class="ls0 mb-4 nott">Контакты:</h4>

								<div>
								<div>									
									<!--class="mb-3"-->
									<span style="color: #999;">телефоны контактного центра:</span>
									<h4 style="margin:5px;"><a href="tel:+79787325000"><i class="icon-call mr-1" style="font-size: 18px;"></i> +7 (978) 732 50 00</a><br>
									<a href="tel:+73652604900"><i class="icon-call mr-1" style="font-size: 18px;"></i>+ 7 (3652) 604 900 </a><br></h4>
									<span style="color: #999;">вызов скорой помощи:</span><h4 style="margin:0px 0px 20px 0px;"><a href="tel:+7(978)7330303"><i class="icon-call mr-1" style="font-size: 18px;"></i> +7 (978) 733 03 03 </a></h4>	
									<address style="color: #999;">
										приёмная ООО "КЛИНИКА ГЕНЕЗИС":<br>
										<strong style="margin:5px;"><a href="mailto:genesis.priemnaya@gmail.com">genesis.priemnaya@gmail.com</a></strong>
										<h4 style="margin:5px;"><a href="tel:+73652248310"><i class="icon-call mr-1" style="font-size: 18px;"></i> +7 (3652) 248-310</a><br>
									</address>
									
								</div>
									
									<div class="d-flex justify-content-md-end">
										<a href="https://www.facebook.com/clinic.genesis" class="social-icon si-small si-facebook" title="Facebook">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>

										<a href="https://twitter.com/klinikagenesis" class="social-icon si-small si-twitter" title="twitter">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>

										<a href="https://www.youtube.com/channel/UCNLYuqHgoth7kA9wWliDEuQ" class="social-icon si-small si-youtube" title="youtube">
											<i class="icon-youtube"></i>
											<i class="icon-youtube"></i>
										</a>

										<a href="https://www.instagram.com/genesis_crimea/" class="social-icon si-small si-instagram" title="instagram">
											<i class="icon-instagram"></i>
											<i class="icon-instagram"></i>
										</a>

										<a href="https://vk.com/clinic.genesis" class="social-icon si-small si-vk" title="vk">
											<i class="icon-vk"></i>
											<i class="icon-vk"></i>
										</a>

										<a href="https://ok.ru/clinic.genesis" class="social-icon si-small si-rss" title="ok">
											<i class="icon-odnoklassniki"></i>
											<i class="icon-odnoklassniki"></i>
										</a>

									</div>
								</div>

							</div>
						</div>

					</div>

				</div>

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights" class="nobg">
				<?php get_the_ID(); ?>
					<div class="container clearfix">
						<div class="row justify-content-between align-items-center">
							<div class="col-md-6 text-black-50">
								Copyrights &copy; <?php echo date('Y'); ?>, Группа компаний «Генезис»
							</div>						
						</div>
					</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

    <?php wp_footer() ?>
	<script>
		jQuery('.home-date').datepicker({
			autoclose: true,
			startDate: "today",
			
		});


	</script>
<script defer src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
	<style>
		.wpcf7-form .input-group {
			flex-wrap: nowrap;
		}

		.wpcf7-form-control-wrap {
			width: 100%
		}

		span.wpcf7-not-valid-tip {
			color: #f00;
			font-size: 0.8em;
			font-weight: normal;
			display: block;
			position: absolute;
		}
	</style>
	
<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn-ru.bitrix24.ru/b16898172/crm/site_button/loader_1_khtx5u.js');
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(39014465, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39014465" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>