/* Animación del menu - scrollto */

$(function(){
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        	&& location.hostname == this.hostname) {
			var $target = $(this.hash);
			$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
});

/* Botón ir arriba */

$(document).ready(function(){
 
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});
 
});

/* Detectar la dirección del scroll  */

$(window).scroll(function() 
{
   console.log($(window).scrollTop());
   //cuando detecte un scroll mayor a 150 realizará el cambio de barras
   if ($(window).scrollTop() > 150) 
   {
      //añadimos clase barraFlotante y eliminamos la clase barraNormal
      $('.menu').addClass('barraFlotante');
      $('.menu').removeClass('barraNormal');  
   }
   else
   {
       //borramos la clase barraFlotante y añadimos la clase barraNormal
      $('.menu').removeClass('barraFlotante');  
      $('.menu').addClass('barraNormal');
   }
});






