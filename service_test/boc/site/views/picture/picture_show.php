<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
		echo static_file("lib/lightbox2/2.8.1/css/lightbox.css");
	?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 图片展示 
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">
	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l"> 
			<a href="javascript:;" onclick="edit()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6df;</i> 编辑</a> 
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
		</span> 
		<span class="r">共有数据：<strong>54</strong> 条</span> 
	</div>

	<!-- 图片列表 -->
	<div class="portfolio-content">
		<ul class="cl portfolio-area">
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/keting.jpg');?>" data-lightbox="gallery" data-title="客厅1"><img src="<?php echo static_file('img/Thumb/keting.jpg');?>"></a></div>
					<div class="textbox">客厅 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox "><a href="<?php echo static_file('img/big/keting2.jpg');?>" data-lightbox="gallery" data-title="客厅2"><img src="<?php echo static_file('img/Thumb/keting2.jpg');?>"></a></div>
					<div class="textbox">客厅 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/keting3.jpg');?>" data-lightbox="gallery" data-title="客厅3"><img src="<?php echo static_file('img/Thumb/keting3.jpg');?>"></a></div>
					<div class="textbox">客厅 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/keting4.jpg');?>" data-lightbox="gallery" data-title="客厅4"><img src="<?php echo static_file('img/Thumb/keting4.jpg');?>"></a></div>
					<div class="textbox">客厅 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/chufang.jpg');?>" data-lightbox="gallery" data-title="厨房"><img src="<?php echo static_file('img/Thumb/chufang.jpg');?>"></a></div>
					<div class="textbox">厨房 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/shufang.jpg');?>" data-lightbox="gallery" data-title="书房"><img src="<?php echo static_file('img/Thumb/shufang.jpg');?>"></a></div>
					<div class="textbox">书房 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/woshi.jpg');?>" data-lightbox="gallery" data-title="卧室"><img src="<?php echo static_file('img/Thumb/woshi.jpg');?>"></a></div>
					<div class="textbox">卧室 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/weishengjian.jpg');?>" data-lightbox="gallery" data-title="卫生间1"><img src="<?php echo static_file('img/Thumb/weishengjian.jpg');?>"></a></div>
					<div class="textbox">卫生间1 </div>
				</div>
			</li>
			<li class="item">
				<div class="portfoliobox">
					<input class="checkbox" name="" type="checkbox" value="">
					<div class="picbox"><a href="<?php echo static_file('img/big/weishengjian2.jpg');?>" data-lightbox="gallery" data-title="卫生间2"><img src="<?php echo static_file('img/Thumb/weishengjian2.jpg');?>"></a></div>
					<div class="textbox">卫生间2 </div>
				</div>
			</li>
		</ul>
	</div>
	<!-- end 图片列表 -->
</div>
<!-- end 内容 -->

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<?php
	echo static_file('lib/lightbox2/2.8.1/js/lightbox-plus-jquery.min.js');
?>

<script type="text/javascript">
$(function(){
	$.Huihover(".portfolio-area li");
});
</script>
</body>
</html>