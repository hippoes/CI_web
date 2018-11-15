
(function(){

	// 数字递增
	var $dom = $(".topBottomText");
	count = $dom.attr("data-count");
	var $num  = $(".bgNum");
	// number_animate($num,count,4000);

	// 表单下拉选项
	var $rs = $(".titleSelect");
	$rs.click(function(){
		$rs.find("dd").slideToggle("fast");
	});
	$rs.find("dd li").click(function(){
		var text = $(this).text();
		$(".roomstype").text(text);
	})

	// 月子餐切换
	var $dt = $(".dietaryPic");
	var $dtli = $dt.find("li");
	

	setInterval(function(){
		var v = $dt.attr("data-value");
		var len = $dtli.length;
		v++; // 1,2,3
		if(v < len){
			$dtli.each(function(){
				$(this).removeClass("active");
				if($(this).attr('data-value') == v){
					$(this).addClass("active");
					$dt.attr("data-value",v);
				}
			});
		}else{
			v = 0;
			$dtli.each(function(){
				$(this).removeClass("active");
				if($(this).attr('data-value') == v){
					$(this).addClass("active");
					$dt.attr("data-value",v);
				}
			});
		}
		
	}, 3000);


})();

function communication(){
	// window.location.href = "http://kht.zoosnet.net/LR/Chatpre.aspx?id=KHT57171901&lng=cn";
	window.open("http://kht.zoosnet.net/LR/Chatpre.aspx?id=KHT57171901&lng=cn"); 
} 

// 数字递增函数处理
function number_animate($num,count,$speed){
	$({ number: $num}).animate({
	    number: count
 	},
  	{
    	duration: $speed, //完成时间
    	easing:'linear',//动画速度
    	//动画完成一步后执行的函数
    	step: function() {
    		number = Math.floor(this.number);
			if(isNaN(number)){
				number = '0';
			}
    		if(number < 10){
    			number = "000"+number;
    		}else if(number < 100){
    			number = "00"+number;
    		}else if(number < 1000){
    			number = "0"+number;
    		}
    		number = number.toString();
    		$num.eq(0).text(number.slice(0,1));
    		$num.eq(1).text(number.slice(1,2));
    		$num.eq(2).text(number.slice(2,3));
    		$num.eq(3).text(number.slice(3,4));
    	},
    	//动画完整完成后执行函数
    	complete: function() {
    		number = count.toString();
    		// alert(number);
     		$num.eq(0).text(number.slice(0,1));
    		$num.eq(1).text(number.slice(1,2));
    		$num.eq(2).text(number.slice(2,3));
    		$num.eq(3).text(number.slice(3,4));
    	}
  	});
}