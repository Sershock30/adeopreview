
var slider=$('.content');
var sig =$('#btn-next');
var ant =$('#btn-prev');
var go = 1;

$('.content section:last').insertBefore('.content section:first');
slider.css('margin-left', '-'+100+'%');

function moverD(){
	slider.animate({marginLeft:'-'+200+'%'},1000, function(){
		$('.content section:first').insertAfter('.content section:last');
		slider.css('margin-left', '-'+100+'%');
	});
}

sig.on('click',function(){
	moverD();
});

function moverIzq(){
	slider.animate({marginLeft: 0},1000, function(){
		$('.content section:last').insertBefore('.content section:first');
		slider.css('margin-left', '-'+100+'%');
	});
}

ant.on('click', function(){
	moverIzq();
});

function hideloader(){
	document.getElementById("c-spinner").style.display = "none";
}

// setInterval(function(){
// 	moverD();
// },10000);

// function autoslide(){
// 	if (go === 1) {

// 	}
// }


// $('#c-slider').mouseover(function(){
// 	go = 0;
// });

// $('#c-slider').mouseout(function(){
// 	go = 1;
// });

// slider.mouseenter(function{

// }).mouseleave(function(){

// });
