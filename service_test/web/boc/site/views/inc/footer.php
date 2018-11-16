<?php
?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="footer_logo">
                    <img src="<?php echo static_file('new_web/images/logo.png'); ?>" alt="">
                </div>
            </div>
            <div class="col-xs-12 footer_ul">
                <ul>
                    <li><b>Hibaby特色</b></li>
                    <li><a href="#">省妇保专家团</a></li>
                    <li><a href="#">专业团队</a></li>
                    <li><a href="#">五星环境</a></li>
                    <li><a href="#">月子膳食</a></li>
                </ul>
                <ul>
                    <li><b>精致月子服务</b></li>
                    <li><a href="#">妈妈护理</a></li>
                    <li><a href="#">宝宝护理</a></li>
                    <li><a href="#">特有服务</a></li>
                    <li><a href="#">蜜妈课堂</a></li>
                    <li><a href="#">定制满月party</a></li>
                </ul>
                <ul>
                    <li><b>月子房型</b></li>
                    <li><a href="#">私享单间</a></li>
                    <li><a href="#">暖阳单间</a></li>
                    <li><a href="#">经典套房</a></li>
                    <li><a href="#">奢享套房</a></li>
                    <li><a href="#">奢享复式套房</a></li>
                </ul>
                <ul>
                    <li><b>美妍中心</b></li>
                    <li><a href="#">妊娠期</a></li>
                    <li><a href="#">产褥期</a></li>
                    <li><a href="#">产后调理</a></li>
                    <li><a href="#">孕产运动</a></li>
                    <li><a href="#">专业盆底康复</a></li>
                </ul>
                <ul>
                    <li><b>关于Hibaby</b></li>
                    <li><a href="#">Hibaby品牌</a></li>
                    <li><a href="#">蜜月简介</a></li>
                    <li><a href="#">品牌文化</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
                <ul class="footer_contact">
                    <li><b>联系我们</b></li>
                    <li><span>地址：江西省南昌市青山湖区湖滨东路2222号</span></li>
                    <li><span>网址：http://www.jxmycare.com</span></li>
                    <li><span>预约咨询电话：400-800-9619</span></li>
                </ul>
                <div class="footer_ewm">
                    <img src="<?php echo static_file('new_web/images/ewm.jpg'); ?>" alt="" class="ewm">
                    <i>微信公众号</i>
                </div>
                <div class="copyright">
                   Copyright 2018  江西蜜月母婴健康产业发展有限公司版权所有 赣ICP备16005596号-1
                </div>
            </div>
			<div class="col-xs-12 mfooter">
                <div class="did">
                   <ul>
                       <li class="ico01 qq">
                            <a href="#">
                                <span class="bg"></span>
                                <span class="pic"></span>
                                <span class="border"></span>
                            </a>
                       </li>
                       <li class="ico02">
                            <a href="#">
                                <span class="bg"></span>
                                <span class="pic"></span>
                                <span class="border"></span>
                            </a>
                       </li>
                       <li class="ico03 weixin bb">
                            <a href="#">
                                <span class="bg"></span>
                                <span class="pic"></span>
                                <span class="border"></span>
                            </a>
                       </li>
                       <li class="ico05 telephone bb">
                            <a href="#">
                                <span class="bg"></span>
                                <span class="pic"></span>
                                <span class="border"></span>
                            </a>
                       </li>
                       <li class="ico06 top oo">
                            <a href="#">
                                <span class="bg"></span>
                                <span class="pic"></span>
                                <span class="border"></span>
                            </a>
                       </li>
                   </ul>
                </div>
                <div class="clear"></div>
                <p class="addressd">
                    <span>地址：江西省南昌市青山湖区湖滨东路2222号</span>
                    <span>网址：http://www.jxmycare.com/</span>
                    <span>预约咨询电话：400-800-9619</span>
                </p>
                <p class="addressd" style="border:none;">
                    <span>Copyright 2018  江西蜜月母婴健康产业发展有限公司</span>
                    <span>www.jxmycare.com 版权所有</span>
                    <span>赣ICP备16005596号-1</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
	
	$('.did li.top').on('click',function(){
		$('html,body').stop().animate({scrollTop:0},1000)
	})
})
</script>
