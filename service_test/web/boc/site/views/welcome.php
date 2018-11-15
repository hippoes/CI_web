<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    <div class="z-index">
		<!----------------------------轮播------------------------------>
    	<div class="wel-banner">
	    	<ul class="swiper-wrapper">
				<?php
                if(!empty($banners)):
                    foreach($banners as $v):
                ?>
	    		<li class="swiper-slide">
	    			<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
	    				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
	    			</a>
	    		</li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
	    	<div class="swiper-pagination btn01"></div>
	    </div>
		
		<!----------------------------手机端蜜月视频------------------------------>
		<div class="container mhoneymoon">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="news_center dynamic_video">
						<div class="demo_tab">
							<img src="<?php echo static_file('new_web/images/news_laba2.png'); ?>" alt="" class="news_laba">
							<b>蜜月视频</b>
							<em></em>
							<i>Hibaby Video</i>
							<div class="select_btn">
								<small class="left"><img src="<?php echo static_file('new_web/images/left.png'); ?>" alt=""></small>
								<small class="right"><img src="<?php echo static_file('new_web/images/right.png'); ?>" alt=""></small>
							</div>
						</div>
						<!-- <ul class="swiper-wrapper">
							<?php
							if(!empty($dynamic_video)):
								foreach($dynamic_video as $v):
							?>
							<li class="swiper-slide">
								<div class="news_center_img">
									<img src="<?php echo static_file('new_web/images/video_pay.png'); ?>" alt="" class="video_pay">
									<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</a>
								</div>
								<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<span><?php if (!empty($v['title'])) echo $v['title']; ?></span>
								</a>
							</li>
							<?php
								endforeach;
							endif;
							?>
						</ul> -->
						<ul>
							<li class="myvideo">
								<video id="video" controls="controls" width="100%">
								    <source src="<?php echo static_file('new_web/video/miyuewebm.webm'); ?>" type='video/mp4'>
									<p>您的浏览器不支持该视频资源请访问………查看</p>
								</video>
								<span>听冯仑说南昌Hibaby蜜月母婴健康中心</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------服务------------------------------>
		<div class="container server">
			<div class="row">
				<div class="col-xs-12">
					<div class="server_box">
						<div class="left_box">
							<?php
							if(!empty($server_box[0])):
							?>
							<div class="sbox_f1 first">
								<a href="<?php if (!empty($server_box[0]['link'])) echo $server_box[0]['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<div class="pic">
										<img src="<?php if (!empty($server_box[0]['photo'])) echo UPLOAD_URL.tag_photo($server_box[0]['photo']) ?>" alt="<?php echo get_pic_alt($server_box[0]['photo']) ?>">
										<p style="color:#08b5b0;"><?php if (!empty($server_box[0]['title'])) echo $server_box[0]['title']; ?></p>
										<div class="bg ico03">
											<span class="add"></span>
										</div>
									</div>
								</a>
							</div>
							<?php
							endif;
							?>
							<?php
							if(!empty($server_box[1])):
							?>
							<div class="sbox_f1 second">
								<a href="<?php if (!empty($server_box[1]['link'])) echo $server_box[1]['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<div class="pic">
										<img  class="photos" src="<?php if (!empty($server_box[1]['photo'])) echo UPLOAD_URL.tag_photo($server_box[1]['photo']) ?>" alt="<?php echo get_pic_alt($server_box[1]['photo']) ?>">
										<img class="mphotos" src="<?php if (!empty($server_box[1]['photo1'])) echo UPLOAD_URL.tag_photo($server_box[1]['photo1']) ?>" alt="<?php echo get_pic_alt($server_box[1]['photo1']) ?>">
										<p style="color:#b07033;"><?php if (!empty($server_box[1]['title'])) echo $server_box[1]['title']; ?></p>
										<div class="bg ico04">
											<span class="add"></span>
										</div>
									</div>
								</a>
							</div>
							<?php
							endif;
							?>
						</div>
						<div class="right_box">
							<?php
							if(!empty($server_box[2])):
							?>
							<div class="sbox_f2">
								<a href="<?php if (!empty($server_box[2]['link'])) echo $server_box[2]['link']; else echo "javascript:void(0);"; ?>" target="_blank">
								   <div class="pic">
										<img src="<?php if (!empty($server_box[2]['photo'])) echo UPLOAD_URL.tag_photo($server_box[2]['photo']) ?>" alt="<?php echo get_pic_alt($server_box[2]['photo']) ?>">
										<p style="color:#08b5b0;"><?php if (!empty($server_box[2]['title'])) echo $server_box[2]['title']; ?></p>
										<div class="bg ico03">
											<span class="add"></span>
										</div>
									</div> 
								</a>
							</div>
							<?php
							endif;
							?>
							<?php
							if(!empty($server_box[3])):
							?>
							<div class="sbox_f2">
								<a href="<?php if (!empty($server_box[3]['link'])) echo $server_box[3]['link']; else echo "javascript:void(0);"; ?>" target="_blank">
								   <div class="pic">
										<img src="<?php if (!empty($server_box[3]['photo'])) echo UPLOAD_URL.tag_photo($server_box[3]['photo']) ?>" alt="<?php echo get_pic_alt($server_box[3]['photo']) ?>">
										<p style="color:#FE6150;"><?php if (!empty($server_box[3]['title'])) echo $server_box[3]['title']; ?></p>
										<div class="bg ico01">
											<span class="add"></span>
										</div>
									</div> 
								</a>
							</div>
							<?php
							endif;
							?>
							<?php
							if(!empty($server_box[4])):
							?>
							<div class="sbox_f1">
								<a href="<?php if (!empty($server_box[4]['link'])) echo $server_box[4]['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<div class="pic">
										<img src="<?php if (!empty($server_box[4]['photo'])) echo UPLOAD_URL.tag_photo($server_box[4]['photo']) ?>" alt="<?php echo get_pic_alt($server_box[4]['photo']) ?>">
										<p style="color:#FF6634;"><?php if (!empty($server_box[4]['title'])) echo $server_box[4]['title']; ?></p>
										<div class="bg ico05">
											<span class="add"></span>
										</div>
									</div>
								</a>
							</div>
							<?php
							endif;
							?>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------品质------------------------------>
		<div class="container quality">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<div class="quality_nr">
						<div class="demo_tab">
							<img src="<?php echo static_file('new_web/images/news_laba3.png'); ?>" alt="" class="news_laba">
							<b>品质</b>
							<em></em>
							<i>QUALITY</i>
							<div class="select_btn">
								<small class="left"><img src="<?php echo static_file('new_web/images/left.png'); ?>" alt=""></small>
								<small class="right"><img src="<?php echo static_file('new_web/images/right.png'); ?>" alt=""></small>
							</div>
						</div>
						<div class="quality_img">
							<ul class="quality_ul">
								<?php
								if(!empty($quality)):
									foreach($quality as $k=>$v):
								?>
								<li class="items" data-and="<?php if (!empty($k)) echo $k; else echo '0'; ?>">
									<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>" target="_blank">
										<b></b>
										<div class="quality_img_text">
											<strong><?php if (!empty($v['title'])) echo $v['title']; ?></strong>
											<span><?php if (!empty($v['content'])) echo $v['content']; ?></span>
										</div>
									</a>
								</li>
								<?php
									endforeach;
								endif;
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="order">
						<form name="booking1" action="http://localhost/web/www.jxmycare.com/userinfos.php" method="post" onsubmit="return validateForm('booking1')">
							<div class="order_nr">
								<input  type="hidden" name="action" value="Hibaby01">
								<b>预约参观通道</b>
								<ul>
									<li>
										<i>姓<span class="f2-padding"></span>名：</i>
										<input name="realname" type="text" placeholder="" value="" required="required">
									</li>
									<li>
										<i>联系电话：</i>
										<input name="phone" type="text" placeholder="" value="" required="required">
									</li>
									<li>
										<i>微信号：</i>
										<input name="wxname" type="text" placeholder="" value="">
									</li>
									<li>
										<i>预产期：</i>
										<input name="expected" type="date" placeholder="" value="" required="required">
									</li>
								</ul>
								<button type="submit">立即预约看房</button>
								<div class="ewm">
									<img src="<?php echo static_file('new_web/images/ewm.jpg'); ?>" alt="" class="ewm">
									<span>Hibaby蜜月官方微信</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		

		
		<!----------------------------专家医生------------------------------>
		<div class="container expert">
			<div class="row">
				<div class="parent_title">
					<b>Professional Team</b>
					<i></i>
					<span>专家团队</span>
				</div>
				<div class="col-xs-12 padding_none">
					<div class="expert_nav">
						<ul class="">
							<li class="active">
								<i class="ico ico_1"></i>
								<span>专家医生</span>
							</li>
							<li class="">
								<i class="ico ico_2"></i>
								<span>护理团队</span>
							</li>
							<li class="">
								<i class="ico ico_3"></i>
								<span>美妍中心</span>
							</li>
							<li class="">
								<i class="ico ico_4"></i>
								<span>餐饮团队</span>
							</li>
							<li class="">
								<i class="ico ico_5"></i>
								<span>客服顾问</span>
							</li>
							<li class="">
								<i class="ico ico_7"></i>
								<span>房务团队</span>
							</li>
							<li class="">
								<i class="ico ico_8"></i>
								<span>安保后勤</span>
							</li>
						</ul>
						<div class="navpagination">
							<div class="navbutton-prev"></div>
							<div class="navbutton-next"></div>
						</div>
					</div>
					<div class="expert_nr">
						<?php
						if(!empty($team_list)):
							foreach($team_list as $k=>$v):
						?>		
						<div <?php if($k == 0){echo "class='expert_li block'";}else{echo "class='expert_li'";}?>>
							<b><img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>"></b>
							<div class="expert_li_nr">
								<strong><em><img src="<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>" alt="<?php echo get_pic_alt($v['icon']) ?>"></em><?php if (!empty($v['title'])) echo $v['title']; ?></strong>
								<?php if (!empty($v['content'])) echo $v['content']; ?>
								<i><a href="#">ReadMore</a></i>
							</div>
						</div>
						<?php
							endforeach;
						endif;
						?>
						
					</div>
				</div>
			</div>
		</div>
		
		
		<!----------------------------内容------------------------------>
		<div class="container index_news">
			<div class="row">
				<div class="col-xs-12 col-sm-6 honeymoon_box">
					<div class="news_center honeymoon">
						<div class="demo_tab">
							<img src="<?php echo static_file('new_web/images/news_laba.png'); ?>" alt="" class="news_laba">
							<b>蜜月动态</b>
							<em></em>
							<i>NEWS CENTER</i>
							<div class="select_btn">
								<small class="left"><img src="<?php echo static_file('new_web/images/left.png'); ?>" alt=""></small>
								<small class="right"><img src="<?php echo static_file('new_web/images/right.png'); ?>" alt=""></small>
							</div>
						</div>
						<ul class="swiper-wrapper">
							<?php
							if(!empty($honeymoon)):
								foreach($honeymoon as $v):
							?>
							<li class="swiper-slide">
								<div class="news_center_img">
									<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</a>
								</div>
								<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<span><?php if (!empty($v['title'])) echo $v['title']; ?></span>
								</a>
							</li>
						<?php
							endforeach;
						endif;
						?>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="news_center dynamic_video">
						<div class="demo_tab">
							<img src="<?php echo static_file('new_web/images/news_laba2.png'); ?>" alt="" class="news_laba">
							<b>蜜月视频</b>
							<em></em>
							<i>Hibaby Video</i>
							<div class="select_btn">
								<small class="left"><img src="<?php echo static_file('new_web/images/left.png'); ?>" alt=""></small>
								<small class="right"><img src="<?php echo static_file('new_web/images/right.png'); ?>" alt=""></small>
							</div>
						</div>
						<!-- <ul class="swiper-wrapper"> -->
							<!-- <?php
							if(!empty($dynamic_video)):
								foreach($dynamic_video as $v):
							?>
							<li class="swiper-slide">
								<div class="news_center_img">
									<img src="<?php echo static_file('new_web/images/video_pay.png'); ?>" alt="" class="video_pay">
									<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</a>
								</div>
								<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<span><?php if (!empty($v['title'])) echo $v['title']; ?></span>
								</a>
							</li>
							<?php
								endforeach;
							endif;
							?> -->
						<!-- </ul>	 -->
						<ul class="miyuevideo">
							<li class="myvideo">
								<video id="video1" controls="controls" width="100%">
								    <source src="<?php echo static_file('new_web/video/miyuewebm.webm'); ?>" type='video/mp4'>
									<p>您的浏览器不支持该视频资源请访问………查看</p>
								</video>
								<span>听冯仑说南昌Hibaby蜜月母婴健康中心</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------环境介绍------------------------------>
		<div class="container environment" >
			<div class="row">
				<div class="col-xs-12">
					<div class="parent_title">
						<b>Environment</b>
						<i></i>
						<span>环境介绍</span>
					</div>
					<div class="environment_text">
						<?php if (!empty($environment_txt['content'])) echo $environment_txt['content'] ?>
					</div>

					<div class="wel-environment-list">
						<ul class="swiper-wrapper f-cb">
							<?php
							if (!empty($environment_list)):
								foreach ($environment_list as $v):
							?>
							<li class="swiper-slide">
								<a class="box" href="<?php if(!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);" ?>" target="_blank">
									<p class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</p>
									<p class="font"><?php if (!empty($v['title'])) echo $v['title'] ?></p>
								</a>
							</li>
							<?php
								endforeach;
							endif;
							?>
						</ul>
						<div class="swiper-button-next next1"></div>
						<div class="swiper-button-prev prev1"></div>
					</div>

				</div>
			</div>
		</div>
		
		
		<!----------------------------手机端蜜月动态------------------------------>
		<div class="container mhoneymoon">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="news_center honeymoon">
						<div class="demo_tab">
							<img src="<?php echo static_file('new_web/images/news_laba.png'); ?>" alt="" class="news_laba">
							<b>蜜月动态</b>
							<em></em>
							<i>NEWS CENTER</i>
							<div class="select_btn">
								<small class="left"><img src="<?php echo static_file('new_web/images/left.png'); ?>" alt=""></small>
								<small class="right"><img src="<?php echo static_file('new_web/images/right.png'); ?>" alt=""></small>
							</div>
						</div>
						<ul class="swiper-wrapper">
							<?php
							if(!empty($honeymoon)):
								foreach($honeymoon as $v):
							?>
							<li class="swiper-slide">
								<div class="news_center_img">
									<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</a>
								</div>
								<a href="<?php if (!empty($v['link'])) echo $v['link']; else echo "javascript:void(0);"; ?>" target="_blank">
									<span><?php if (!empty($v['title'])) echo $v['title']; ?></span>
								</a>
							</li>
						<?php
							endforeach;
						endif;
						?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------温馨提示------------------------------>
		<div class="container prompt">
			<div class="row">
				<div class="col-xs-12">
					<div class="parent_title">
						<b>Wram prompt</b>
						<i></i>
						<span>温馨提示</span>
					</div>
					<div class="prompt_box">
						<p>
						参观即送200元韩式通乳券
						<br>
						<font>户型紧，限定需要提前3-6个月</font> 
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------快速预约通道------------------------------>
		<div class="container booking">
			<div class="row">
				<div class="col-xs-12">
					<div class="parent_title">
						<b>Booking channel</b>
						<i></i>
						<span>快速预约通道</span>
					</div>
					<div class="fast_formbox">

						<form name="booking2" action="http://localhost/web/www.jxmycare.com/userinfos.php" method="post" onsubmit="return validateForm('booking2')">
							<div class="fast-f1">
								<input  type="hidden" name="action" value="Hibaby02">
								<label class="f1-left">
									<input class='selectType' type="radio" name='way' checked="true" value="package">
									<span>套餐咨询</span>
								</label>
								<label>
									<input class='selectType' type="radio" name='way' value="visit">
									<span>预约参观</span>
								</label>
							</div>
							<div class="fast-f2">
								<span class="f2-left">姓<span class="f2-padding"></span>名</span>
								<span class="f2-right">
									<input type="text" name="realname" placeholder="*必填" value="" required="required">
								</span>
								<span class="f2-left">电<span class="f2-padding"></span>话</span>
								<span class="f2-right">
									<input type="text" name="phone" placeholder="*必填" value="" required="required">
								</span>
								<span class="f2-left">邮<span class="f2-padding"></span>箱</span>
								<span class="f2-right">
									<input type="email" name="email" value="">
								</span>
								<span class="f2-left">预产期</span>
								<span class="f2-right">
									<input type="date" name="expected" value="" required="required">
								</span>
								<span class="f2-left">备<span class="f2-padding"></span>注</span>
								<span class="f2-right">
									<input type="text" name="realnote" value="">
								</span>
							</div>
							<div class="fast-button">
								<input type="submit" value="提交" style="cursor: pointer;">
							</div>
						</form>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------合作伙伴------------------------------>
		<div class="container parent">
			<div class="row">
				<div class="col-xs-12">
					<div class="parent_title">
						<b>Professional Team</b>
						<i></i>
						<span>合作伙伴</span>
					</div>
					<div class="parent_img">
						<?php if(!empty($cooperation)):?>
						<img src="<?php if (!empty($cooperation['photo'])) echo UPLOAD_URL.tag_photo($cooperation['photo']) ?>" alt="<?php echo get_pic_alt($cooperation['photo']) ?>">
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
		
    </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
<?php
    echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
    echo static_file('new_web/js/myjs.js');
    echo static_file('new_web/css/iconfont.css');
?>
<script>

function validateForm(FormName) {
    var realname = document.forms[FormName]["realname"].value;
    var phone = document.forms[FormName]["phone"].value;
    var expected = document.forms[FormName]["expected"].value;

    if(realname == '' || realname == null){ alert("请输入名字"); }

    if(phone == '' || phone == null){
    	alert("请输入手机号码");
    }else{
    	if(!checkTel(phone)){ alert("电话号码格式错误！"); return false; }
    }

    if(expected == '' || expected == null){
    	alert("请输入预产期");
    }else{
		if(!checkExpect(expected)){ alert("您的预产期选择有误！"); return false; }
    }
    if(FormName == 'booking2'){
    	var email = document.forms['booking2']["email"].value;
    	if(email !== ''){
    		if(!checkEmail(email)){ alert("邮箱格式错误！"); return false; }
    	}
    }
}

function checkTel(value) { 
	var isMob=/^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|14[012356789][0-9]{8}|15[012356789][0-9]{8}|7[012356789][0-9]{8}|18[02356789][0-9]{8}|19[012356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
	var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
	if(isPhone.test(value) || isMob.test(value)){
		return true;
	}else{
		return false;
	}
}

function checkExpect(expected){
	var newDay = new Date();
	var timer = Date.parse(newDay)/1000; // 当前时间

	var t = expected+" 00:00:00"; 
	var T = new Date(t);
	var etimer = Date.parse(T)/1000; // 所选预产期时间
	if(etimer <= timer){
		return false;
	}else{
		return true;
	}
}

function checkEmail(email){
	var isemail = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
	if(isemail.test(email)){
		return true;
	}else{
		return false;
	}
}	


$(function(){
	//banner
	var swiper = new Swiper('.wel-banner', {
        pagination: '.btn01',
        paginationClickable: true,
        speed:2000,
        autoplay:5000,
        loop:true,
        autoplayDisableOnInteraction:false,
    });
	
	var hlen = $(".honeymoon").find("li").length;
	
	if(hlen > 1)
	{
		//dynamic 动态模块--honeymoon
		var swiper = new Swiper('.honeymoon', {
			paginationClickable: true,
			spaceBetween:30,
			speed:2000,
			// autoplay:6000,
			nextButton: '.honeymoon .right',
			prevButton: '.honeymoon .left',
			loop:true,
			autoplayDisableOnInteraction:false,
		});
	}
	
	// var vlen = $(".dynamic_video").find("li").length;
	
	// if(vlen > 0)
	// {
	// 	//dynamic 动态模块--dynamic_video
	// 	var swiper = new Swiper('.dynamic_video', {
	// 		paginationClickable: true,
	// 		spaceBetween:30,
	// 		speed:2000,
	// 		// autoplay:6000,
	// 		nextButton: '.dynamic_video .right',
	// 		prevButton: '.dynamic_video .left',
	// 		loop:true,
	// 		autoplayDisableOnInteraction:false,
	// 	});
	// }
	
	//environment
	var swiper1 = new Swiper('.wel-environment-list', {
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween:35,
        nextButton: '.next1',
        prevButton: '.prev1',
        loop:true,
        breakpoints:{
        	680:{
        		slidesPerView:1,
				spaceBetween:25,
        	}
        }
    });
})
</script>
</body>
</html>