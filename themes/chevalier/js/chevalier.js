(function($) {

	$(".acf-block-deux-colonnes").filter(function(index, element){
		return index % 2 == 1; //index commence à zéro
	}).addClass("pair");


	$( document ).ready(function() {
	
				var slider=$('#slider-pro-3-225 .sp-mask');
				if(slider.length > 0 ) {
					console.log('ajustement hauteur');
					var sliderHeight=$(slider).outerHeight();
					var newHeight=sliderHeight+140;
					slider.css('height',newHeight+'px');
				}
		
	});

})( jQuery );

