<!DOCTYPE html>
<html>
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
		echo static_file('skin/default/skin.css');

        $username = get_login_username();
	?>
	<link rel="stylesheet" id="skin" href="" />
</head>

<body>
	<!-- 框架上，左两部分 -->
	<?php include_once VIEWS.'inc/header.php'; ?>
	<!-- end 框架上，左两部分 -->

<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
			</ul>
		</div>
		<!-- 更多左右箭头 -->
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
		</div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<!-- 主体内容 -->
			<iframe scrolling="yes" id="MyIframe" frameborder="0" src="<?php echo site_url('welcome/welcome_index');?>"></iframe>
			<!-- end 主体内容 -->
		</div>
	</div>
</section>


<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<!-- end 底部js -->
<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script> 
</body>
</html>