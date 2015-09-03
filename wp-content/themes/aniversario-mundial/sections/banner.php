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

		// A variável 'preco' será tratada antes de ir para o vetor

		$preco = types_render_field('preco');

		// Retorna uma parte da string de preço, começando na posição 0 e terminando na posição onde se encontra a vírgula

		$ofertas[$i]['reais'] = substr($preco, 0, strpos($preco, ','));

		// Retorna uma parte da string de preço, começando uma posição depois de onde se encontra a vírgula

		$ofertas[$i]['centavos'] = substr($preco, strpos($preco, ',') + 1);


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
						width="307" height="200"
						data-position="270,482" data-in="right" data-step="0" data-out="right" data-delay="0">

				<!-- Preço do Produto -->

				<div class="preco" data-position="270,872" data-in="right" data-step="0" data-out="right" data-delay="0">

					<div class="valor">
						<div class="small">R$</div>
						<div class="reais"><?php echo $oferta['reais']; ?></div>
						<div class="virgula">,</div>
						<div class="centavos"><?php echo $oferta['centavos']; ?></div>
						<div style="clear: both;"></div>
					</div>

				</div>

				<div class="nome" data-position="510,500" data-in="right" data-step="0" data-out="right" data-delay="0">
					<div class="titulo openSans preta"><?php echo $oferta['titulo'] ?></div>
					<div class="subtitulo openSans preta"><?php echo $oferta['subtitulo'] ?></div>
				</div>
				
			</div>

			<!-- Fim do Slide -->

		<?php endforeach; ?>

	</div>

</div>