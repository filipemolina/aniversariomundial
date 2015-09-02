function Log(dados)
{
	for(foto in dados.data)
	{
		console.log(dados.data[foto]);
	}
}

jQuery(function(){

	// Retornar o jQuery para a sua utilização normal

	var $ = jQuery;

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