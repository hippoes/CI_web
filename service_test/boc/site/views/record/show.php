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
			<div class="con_title" style="<?php if(!empty($first_color)){echo 'color:'.$first_color; }?>"><p><?php if(!empty($message['first_data'])){ echo $message['first_data']; }?></p></div>

				<?php if(!empty($content)) :?>
					<?php foreach($content as $v):?>
					<div class="con_option">
						<span class="option_name"><?php if(!empty($v['keyword'])){ echo $v['keyword']."："; }?></span>
						<span class="option_content" style="<?php if(!empty($v['color'])){echo 'color:'.$v['color']; }?>"><?php if(!empty($v['value'])){ echo $v['value']; }?></span>
					</div>
					<?php endforeach; ?>
				<?php endif;?>

			<div class="con_remark" style="<?php if(!empty($remark_color)){echo 'color:'.$remark_color; }?>"><p><?php if(!empty($message['remark_data'])){ echo $message['remark_data']; }?></p></div>
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