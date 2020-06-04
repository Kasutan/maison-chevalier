(function($) {

	$(".acf-block-deux-colonnes").filter(function(index, element){
		return index % 2 == 1; //index commence à zéro
	}).addClass("pair");


	$( document ).ready(function() {
	
			setTimeout(function(){ 
				var slider=$('#slider-pro-3-225 .sp-mask');
				console.log(slider);
				if(slider.length > 0 & window.Width() < 768) {
					var sliderHeight=$(slider).outerHeight();
					var newHeight=sliderHeight+140;
					slider.css('height',newHeight+'px');
				}

			}, 1000);
		
	});

})( jQuery );

