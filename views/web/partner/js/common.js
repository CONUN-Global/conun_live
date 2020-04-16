$(function(){
	var winWidth  = $( window ).width();
	var winHeight = $( window ).height();
	Re = winHeight - 60;
	$("#side").height(Re -1);
	$("#conts").height(Re - 61);
});

$(window).resize(function(){
	var winWidth  = $( window ).width();
	var winHeight = $( window ).height();
	Re = winHeight - 61;
	$("#side").height(Re -1);
	$("#conts").height(Re -61);
}).resize();



// 레이어 팝업용
function openLayer(targetID, options){
		var $layer = $('#'+targetID);
		var $close = $layer.find('.close');
		var width = $layer.outerWidth();
		var ypos = options.top;
		var xpos = options.left;
		var marginLeft = 0;
		
		var maskHeight = $(document).height(); 
        var maskWidth = $(window).width();

		if(xpos==undefined){
			xpos = '50%';
			marginLeft = -(width/2);
		}

		if(!$layer.is(':visible')){
			$layer.css({'top':ypos+'px','left':xpos,'margin-left':marginLeft})
				.show();
		}
		
		$('#mask').css({
            'width' : maskWidth,
            'height' : maskHeight
        });

		 $('#mask').fadeTo("fast", 0.5);



		$close.bind('click',function(){
			if($layer.is(':visible')){
				$layer.hide();
				$('#mask').hide();
				location.reload();

			}
			return false;
		});
}


// 유틸 팝업용
function utilLayer(targetID, options){
		var $layer = $('#'+targetID);
		var $close = $layer.find('.close');
		var width = $layer.outerWidth();
		var ypos = options.top;
		var xpos = options.left;
		var marginLeft = 0;
		
		var maskHeight = $(document).height(); 
        var maskWidth = $(window).width();

		if(xpos==undefined){
			xpos = '50%';
			marginLeft = -(width/2);
		}

		if(!$layer.is(':visible')){
			$layer.css({'top':ypos+'px','left':xpos,'margin-left':marginLeft})
				.show();
		}
		
		$('#mask').css({
            'width' : maskWidth,
            'height' : maskHeight
        });

		 $('#mask').fadeTo("fast", 0.5);



		$close.bind('click',function(){
			if($layer.is(':visible')){
				$layer.hide();
				$('#mask').hide();
				location.reload();

			}
			return false;
		});
}