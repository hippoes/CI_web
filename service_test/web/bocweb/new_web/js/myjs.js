$(function()
{
	//**** 手机端导航 ****
	$(".mobilenav .nav-btn").on('click', function() {
		var _this = $(this);
        if (!$(this).hasClass('hover')) {
            $(this).addClass('hover');
            $(this).children('.line1').stop().transition({rotate: 45}, 300);
            $(this).children('.line2').stop().fadeOut(300);
            $(this).children('.line3').stop().transition({rotate: -45}, 300,function(){
                _this.addClass('active');
            });
            $(this).parent().next('.sub-menu').stop().fadeIn();
            $("body,html").addClass('ovh');
        }else{
            $(this).removeClass('hover');
            $(this).removeClass('active');
            $(this).children('.line1').stop().transition({rotate: 0}, 300);
            $(this).children('.line2').stop().fadeIn(300);
            $(this).children('.line3').stop().transition({rotate: 0}, 300);
            $(this).parent().next('.sub-menu').stop().fadeOut();
            $("body,html").removeClass('ovh');
        }
    });
	
	$(".mobilenav .sub-menu .sub-tit").on('click', function() {
		if ($(this).siblings('.sec-list').is(':hidden')){
			$(this).addClass('on');
			$(this).siblings('.sec-list').stop().slideDown();
			$(this).parent().siblings('li').children('.sec-list').stop().slideUp().siblings('.tit').removeClass('on');
		}else{
			$(this).removeClass('on');
			$(this).siblings('.sec-list').stop().slideUp();
		}
	});
	
	
	
//**** 品质切换 ****
	var $quality_ul = $(".quality_ul");
	var $items = $quality_ul.find(".items");
	$items.eq(0).addClass("active");
	var $active = $quality_ul.find(".active");
	var data = $active.attr('data-and');
	var $left = $(".quality").find(".left");
	var $right = $(".quality").find(".right");

	//next
	$right.click(function()
	{
		data++;
		if( data >= $items.length){
			data = 0;
		}
		myswitch($quality_ul,$items,data);
	});
	//prev
	$left.click(function()
	{
		data--;
		if( data < 0){
			data = $items.length - 1;
		}
		myswitch($quality_ul,$items,data);
	});

	//修改css类 
	function myswitch($dom,$secondom,$data){

		$dom.find('.active').removeClass('active');
		$secondom.each(function()
		{
			if($(this).attr('data-and') == $data){
				$(this).addClass('active');
			};
		})
	}
});


/**
 * [maxheight 改变元素高度和同级元素最高的相等]
 * @param  {[num]} $prevnum [元素中的前几个节点] 例如：'3' 
 * @param  {[string]} $dom [改变元素的节点] 例如：'.prenatal-list li' 
 * @return {[type]}      [改变li的高度为最高元素高度]
 */
function maxheight($dom,$prevnum,$num){
	var maxheight = 0;
	var index = 0;
	var num = $num;
	var padding_top = $($dom).css('padding-top');
	var padding_bottom = $($dom).css('padding-bottom');

	$($dom).each(function(){
		if($prevnum){
			if(index < $prevnum){
				if(maxheight < $(this).height()) maxheight = $(this).height();
			}
		}else{
			if(maxheight < $(this).height()) maxheight = $(this).height();
		}
		
		index++;
	});

	maxheight = parseInt(padding_top)+parseInt(padding_bottom)+parseInt(maxheight);
	
	if($prevnum){
		$($dom).each(function(){
			if(num < $prevnum){
				$(this).css({"height": maxheight + "px"});
			}
			num++;
		})
	}else{
		$($dom).css({"height": maxheight + "px"}); 
	}
}



