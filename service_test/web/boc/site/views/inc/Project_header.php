<div class="header">
	<a href="#"><div class="logos"></div></a>
	<div class="nav">
		<ul>
			<li><a <?php if($nav==14){echo "class='cur'";}?> href="<?php echo site_url('careteam'); ?>" style="width:90px;">省妇保专家团</a></li>
			<li><a <?php if($nav==15){echo "class='cur'";}?> href="<?php echo site_url('rooms'); ?>">月子房型</a></li>
			<li><a <?php if($nav==28){echo "class='cur'";}?> href="<?php echo site_url('dietray'); ?>">月子膳食</a></li>
			<li><a href="#">妈妈护理</a></li>
			<li><a href="#">新生儿护理</a></li>
			<li><a href="#">美妍中心</a></li>
			<li><a <?php if($nav==16){echo "class='cur'";}?>  href="<?php echo site_url('environment'); ?>">五星环境</a></li>
			<li><a <?php if($nav==39 || $nav==56 || $nav==65 ){echo "class='cur'";}?>   href="#">关于蜜月</a></li>
		</ul>
	</div>
</div>
<!-- mobile nav -->
<div class="mobilenav">
	<div class="w1400">
		<a href="#" class="logo f1">
			<img src="<?php echo static_file('new_web/img/index_logo.png'); ?>" alt="">
		</a>
		<div class="fr nav-btn">
			<span class="line line1"></span>
			<span class="line line2"></span>
			<span class="line line3"></span>
		</div>
	</div>
	<div class="sub-menu">
		<ul>
			<li>
				<span class="tit"><a href="<?php echo site_url('welcome'); ?>" style="color: black">首页</a></span>
			</li>
			<li><a class="tit" href="<?php echo site_url('careteam'); ?>">省妇保专家团</a></li>
			<li><a class="tit" href="<?php echo site_url('rooms'); ?>">月子房型</a></li>
			<li><a class="tit" href="<?php echo site_url('dietary'); ?>">月子膳食</a></li>
			<li><a class="tit" href="<?php //echo site_url('consult'); ?>">妈妈护理</a></li>
			<li><a class="tit" href="<?php //echo site_url('consult'); ?>">新生儿护理</a></li>
			<li><a class="tit" href="<?php //echo site_url('consult'); ?>">美妍中心</a></li>
			<li><a class="tit" href="<?php echo site_url('environment'); ?>">五星环境</a></li>
			<li><a class="tit" href="<?php //echo site_url('consult'); ?>">关于蜜月</a></li>
		</ul>
	</div>
</div>
<div class="mnav_clear" style="clear:both;"></div>
<!-- end mobile nav -->
<?php if(@$is_need == false):?>
<div class="banners" style="background-image: url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>);"></div>
<?php endif;?>
<div class="m-banners" style="background-image: url(<?php if (!empty($banner['photo1'])) echo UPLOAD_URL.tag_photo($banner['photo1']); else echo 'http://www.jxmycare.com/m/Public/project/images/expertbanner.jpg'?>);"></div>