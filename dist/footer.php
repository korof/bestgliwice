<?php
/**
 * bestgliwice template for displaying the footer
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */
?>
<?php /*
				<ul class="footer-widgets"><?php
					if ( function_exists( 'dynamic_sidebar' ) ) :
						dynamic_sidebar( 'footer-sidebar' );
					endif; ?>
				</ul>
				*/ ?>
			
			<footer class="footer cf" data-aload>
				<header>
					<h2>SKONTAKTUJ SIĘ</h2>
					<h3>Z NAMI</h3>
				</header>
				<div class="cf">
					<div class="col footer__icon icon__maps">
						Stowarzyszenie Studentów BEST Gliwice
						<br>
						Pszyczyńska 85/13 <br>
						Gliwice 44-100
					</div>

					<div class="col footer__icon icon__phone">
						+48 32 237 10 30 <br>
						+48 32 237 10 50 <br>
					</div>

					<div class="col footer__icon icon__mail">
						info@bestgliwice.pl
					</div>

					<div class="col footer_tekst">
						Zainteresowaliśmy Cię i masz do nas sprawę? Zostaw wiadomoś Z racji, że jesteśmy studentami i nie zawsze  możemy by w  naszym biurze polecamy kontakt mailowy.
					</div>
				</div>

				<div class="footer__social">
					<a href="http://facebook.com/BESTgliwice"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="20px" height="20px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
<g id="facebook_2_" enable-background="new    ">
	<g id="facebook_1_">
		<g>
			<path d="M36.963,22.048c0.092-3.345-0.525-8.003,0.516-9.593c1.901-2.911,9.496-2.154,9.496-2.154s0-6.612,0-10.303
				c-11.982,0-15.904-0.501-20.016,3.675c-3.658,3.715-3.771,11.011-4.072,18.375h-5.872V32.12h5.938
				c-0.002,10.504,0.003,22.016,0,31.884c4.462,0,13.954,0,13.954,0v-32.01c0,0,5.173,0,8.042,0
				c0.626-3.385,1.236-6.036,2.088-9.947L36.963,22.048L36.963,22.048z"/>
		</g>
	</g>
</g>
</svg></a>
					<a href="http://youtube.com/BESTgliwice"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="20px" height="20px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
<g id="youtube_1_" enable-background="new    ">
	<g id="youtube">
		<g>
			<path d="M54.15,10.031l-20.9-0.019l-21.718,0.019c-5.433,0-11.534,3.626-11.534,8.944v26.474c0,5.316,6.101,8.559,11.534,8.559
				H54.15c5.432,0,9.834-3.242,9.834-8.559V18.976C63.984,13.657,59.582,10.031,54.15,10.031z M27.856,42.205L27.73,22.044
				l14.03,10.168L27.856,42.205z"/>
		</g>
	</g>
</g>
</svg></a>
				</div>
			</footer>

		</div>
		<div class="tri_bg"></div>
		<div class="global-footer__nav_bestorg">
			<img data-aload="<?php echo get_template_directory_uri(); ?>/images/BEST_signature_long.svg" alt="BEST" style="width: 170px;"> 
		</div>
		<div class="global-footer__nav_copy">BEST Gliwice © <?php echo date("Y"); ?></div>
		<script>
			function aload(a){"use strict";a=a||window.document.querySelectorAll("[data-aload]"),void 0===a.length&&(a=[a]);var b,c=0,d=a.length;for(c;d>c;c+=1)b=a[c],b["LINK"!==b.tagName?"src":"href"]=b.getAttribute("data-aload"),b.removeAttribute("data-aload");return a}
		</script>
		<?php wp_footer(); ?>
	</body>
</html>