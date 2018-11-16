<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
    <!-- project -->
    <div class="project">
    <!-- header -->
        <?php include_once VIEWS.'inc/Project_header.php'; ?>
    <!-- end header -->

    	<div class="news-info w1400">
    		<div class="now f-cb">
    			<a href="<?php echo site_url('about'); ?> ">关于Hibaby</a>
    			<a href="<?php echo site_url('about'); ?> ">活动资讯</a>
    			<a href="#" style="color: #cb8441;"><?php if(!empty($type_name)) echo $type_name ?></a>
    		</div>
    		<div class="news-info-box">
    			<div class="title">
	    			<h2>
	    				<?php if (!empty($info['title'])) echo $info['title'] ?>
	    				<span class="time fr">Date : <?php echo date("Y-m-d",$info['timeline']) ?></span>
	    			</h2>
    			</div>

    			<div class="new_content">
                <?php if (!empty($info['content'])) echo $info['content'] ?>
                </div>
				<div class="bdsharebuttonbox f-cb">
					<span class="fl">分享到：</span>
					<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
					<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
					<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
					<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
					<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				</div>
				<div class="info-bot f-cb">
					<span class="con fl">
						<p>上一篇：<?php if (!empty($info['prev_id'])): ?><a href="<?php echo site_url('news/info/'.$info['prev_id']) ?>"><?php if (!empty($info['prev_title'])) echo $info['prev_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
						<p>下一篇：<?php if (!empty($info['next_id'])): ?><a href="<?php echo site_url('news/info/'.$info['next_id']) ?>"><?php if (!empty($info['next_title'])) echo $info['next_title'] ?></a><?php else: echo "<a href=\"javascript:;\">无</a>"; endif; ?></p>
					</span>
					<!-- <a href="<?php echo site_url('about/'.$info['ctype']); ?>" class="fr return">返回列表</a> -->
					<a href="<?php echo site_url('about'); ?>" class="fr return">返回列表</a>
				</div>
    		</div>
    	</div>
     </div>
    <?php include_once VIEWS.'inc/footer.php'; ?>
<?php
	echo static_file('share.js');
	echo static_file('web/js/main.js');
	echo static_file('swiper/swiper.min.js');
    echo static_file('swiper/swiper.css');
    echo static_file('new_web/css/projectmobile.css');
?>
<script>
	$(function(){

	})
</script>
</body>
</html>