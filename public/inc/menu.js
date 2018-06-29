$(document).ready(main);

var count = 1;

function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle();

		if(count == 1){
			$('nav').animate({
				left: '0'
			});
			count = 0;
		} else {
			count = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});
};
