$(document).ready(function () {
   /*********************专家医生-标题切换*******************************/
   $(".expert .expert_nav ul li").each( function(index){
       var liode = $(this);
       $(this).click( function(){
           $(".expert_nr .expert_li.block").removeClass("block");
           $(".expert_nav ul li.active").removeClass("active");
           $(".expert_li").eq(index).addClass("block");
           liode.addClass("active");
       });
   });
   var posleft = parseInt($(".expert_nav ul").css("left"));
   
   $(".navbutton-next").click(function()
   {
	   if(posleft <= -300){
		   posleft = 0;
	   }else{
		   posleft = posleft - 50; 
	   }
	   $(".expert_nav ul").animate({left : posleft+'%'});
   });
   $(".navbutton-prev").click(function()
   {
	   if(posleft >= 0){
		   posleft = -300;
	   }else{
		   posleft = posleft + 50; 
	   }
	   $(".expert_nav ul").animate({left : posleft+'%'});
   });
   
   
	$('.flex-right li.top').on('click',function(){
		$('html,body').stop().animate({scrollTop:0},1000)
	})
   
});