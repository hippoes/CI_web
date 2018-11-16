<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
	    echo static_file('css/mycss.css');
	?>
</head>
<body>
<div class="message_bg pd-20">
	<div class="message_box">
		<div class="message_title"><span><?php if(!empty($template['title'])){ echo $template['title']; }?></span></div>
		<div class="message_time"><span><?php echo date('m-d',time());?></span></div>
		<div class="con">
			<div class="con_title"><p><?php if(!empty($message['first_data'])){ echo $message['first_data']; }?></p></div>

				<?php if(!empty($content)) :?>
					<?php foreach($content as $v):?>
					<div class="con_option">
						<span class="option_name"><?php if(!empty($v['keyword'])){ echo $v['keyword']."："; }?></span>
						<span class="option_content"><?php if(!empty($v['value'])){ echo $v['value']; }?></span>
					</div>
					<?php endforeach; ?>
				<?php endif;?>

			<!-- <div class="con_option">
				<span class="option_name">商品名称：</span>
				<span class="option_content">巧克力</span>
			</div>
			<div class="con_option">
				<span class="option_name">消费金额：</span>
				<span class="option_content">39.8元</span>
			</div>
			<div class="con_option">
				<span class="option_name">购买时间：</span>
				<span class="option_content">2014年9月22日</span>
			</div> -->
			<div class="con_remark"><p><?php if(!empty($message['remark_data'])){ echo $message['remark_data']; }?></p></div>
		</div>
		<?php if(!empty($message['redirect_url'])):?>
		<div class="message_detail">
			<a href="<?php if(!empty($message['redirect_url'])){ echo $message['redirect_url']; }?>">
				<span>详情</span>
				<b> > </b>
			</a>
		</div>
		<?php endif;?>
	</div>
</div>
	
<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>

</body>
</html>