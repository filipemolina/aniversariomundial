<?php

	// Vetor que vai guardar todas as ofertas

	$ofertas = array();

	// Contador

	$i = 0;

	// Obter todas as ofertas

	$args = array(

		'post_type' => 'oferta',
		'post_status' => 'publish',
		'posts_per_page' => '-1'

	);

	// Rodar a query no Wordpress usando os argumentos acima
	
	$query = new WP_Query( $args );

	// Iterar pelos resultados

	if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

		// Gravar os dados dos campos personalizados em variáveis

		$ofertas[$i]['titulo'] = types_render_field('titulo');
		$ofertas[$i]['subtitulo'] = types_render_field('subtitulo');
		$ofertas[$i]['imagem'] = types_render_field('imagem', array('raw' => 'true'));
		$ofertas[$i]['largura'] = types_render_field('largura');
		$ofertas[$i]['altura'] = types_render_field('altura');

		// Incrementar o contador

		$i++;

	endwhile; endif;

?>

<!-- Banner de Ofertas -->

<div class="banner">

	<h2 class="rosa openSans">OFERTAS COM SABOR DE QUERO MAIS</h2>
	
	<div class="slider">
			
		<div class="fs_loader"></div>

		<?php // Iterar pelo vetor "$ofertas" e preencher os slides com as informações ?>

		<?php foreach($ofertas as $oferta): ?>

			<!-- Início do Slide -->

			<div class="slide">

				<!-- Foto do Produto -->

				<img 	src="<?php echo $oferta['imagem']; ?>"
						width="<?php echo $oferta['largura']; ?>" height="<?php echo $oferta['altura']; ?>"
						data-position="200,322" data-in="right" data-step="0" data-out="right" data-delay="0">

				<!-- Preço do Produto -->

				<div class="nome" data-position="510,500" data-in="right" data-step="0" data-out="down" data-delay="0">
					<div class="titulo openSans preta"><?php echo $oferta['titulo'] ?></div>
					<div class="subtitulo openSans preta"><?php echo $oferta['subtitulo'] ?></div>
				</div>
				
			</div>

			<!-- Fim do Slide -->

		<?php endforeach; ?>

	</div>

</div>