// Retornar o jQuery para a sua utilização normal

var $ = jQuery;

// Atualizar as fotos mais recentes com a hashtag do aniversário mundial

function Log(dados)
{

	var url = '';

	for (var i = 0; i < 5; i++) {
		
		url = dados.data[i].images.standard_resolution.url;
		
		$('div.fotos .container-fluid .row').append('<div class="foto"><img class="img-responsive" src="'+url+'" alt=""></div>');

	};
}

jQuery(function(){	

	$('.slider').fractionSlider({
		'fullWidth': 			true,
		'controls': 			true, 
		'pager': 				false,
		'responsive': 			true,
		'dimensions': 			"1170,685",
	    'increase': 			false,
		'pauseOnHover': 		false,
		//'slideEndAnimation': 	true
	});

});