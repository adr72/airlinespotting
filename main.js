$(document).ready(function(){
	var altura=$('#top').offset().top;
	$(window).on('scroll', function(){
		if($(window).scrollTop() > altura){
			$('.cabecera').addClass('cabecera_sticky');
			
		}else{
			$('.cabecera').removeClass('cabecera_sticky');
			
		}
	});

	$(window).on('scroll', function(){
		if($(window).scrollTop() > altura){
			$('#flecharriba').addClass('flechar_sticky');
		}else{
			$('#flecharriba').removeClass('flechar_sticky');
		}
	});
});