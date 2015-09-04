<?php  

	// Hashtag que será usada para pesquisar as fotos no Instagram (sem o '#')

	$hashTag = 'mundial';

?>

<footer>
	
	<div class="linha-preta"></div>

	<div class="container">
		<div class="social col-md-3">
			<a class="facebook_footer" href="#"></a>
			<a class="twitter_footer" href="#"></a>
			<a class="instagram_footer" href="#"></a>
		</div>
		<div class="copyright col-md-6">
			<p>SUPERMERCADOS MUNDIAL LTDA &copy; 2015 - TODOS OS DIREITOS RESERVADOS.</p>
		</div>
		<div class="logo_footer col-md-3"><img src="<?php bloginfo('template_url'); ?>/img/menu/logo.png" alt=""></div>
	</div>
</footer>


	
	<?php wp_footer(); ?>
	
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- FractionSlider -->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.fractionslider.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>

	<script src="https://api.instagram.com/v1/tags/<?php echo $hashTag; ?>/media/recent?client_id=5e3ffdba6bf04f0a8840a7ce98e57223&callback=Log"></script>

	<!-- Script necessário para se obter o botão Subscribe do Youtube -->
	<script src="https://apis.google.com/js/platform.js"></script>

	<!-- Script necessário para se obtero botão de Follow do Instagram -->
	<script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="//x.instagramfollowbutton.com/follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>

</body>
</html>

