<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
	<?php //include_once VIEWS.'inc/header.php'; ?>
	<!-- project -->
	<div class="project">
	<!-- header -->
		<?php include_once VIEWS.'inc/Project_header.php'; ?>
	<!-- end header -->
	
	<!-- content -->
		<div class="careteam">
			<div class="nutrition">
				<div class="w1400">
					<div class="now f-cb">
		             	<a href="<?php // echo site_url('delicate_service'); ?> " style="color: #7c7c7c;">专业团队</a>
		             	<a style="color: #cb8441;">专业医生团队</a>
		            </div>
		            <div class="f-cb team-top ab">
						<div class="intro f-cb">
							<p class="pic"><img src="<?php if (!empty($introduce['photo'])) echo UPLOAD_URL.tag_photo($introduce['photo']) ?>" alt="<?php echo $introduce['photo'] ?>"></p>
							<span class="con">
								<h2>
									<span class="bg"><img src="<?php if (!empty($introduce['icon1'])) echo UPLOAD_URL.tag_photo($introduce['icon1']) ?>" alt="<?php echo $introduce['icon1'] ?>"></span>
									专家医生
								</h2>
							</span>
							<span class="con">
								<div class="font">
									<p><?php if (!empty($introduce['content'])) echo $introduce['content'] ?></p>
								</div>
							</span>
						</div>
						<dl class="careteam-top-list f-cb">
							<?php
	                        if (!empty($expert_lists)):
	                        	$count = count($expert_lists)-1;
	                            foreach ($expert_lists as $k=>$v):
	                        ?>
		            		<dd data-id="<?php echo $v['id'] ?>">
								<div class="expert-pic">
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
								</div>
								<div class="expert-box">
									<div class="box-top">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<?php
				                        if (!empty($v['outline'])):
				                            foreach ($v['outline'] as $j):
				                        ?>
				                    	<p><?php if (!empty($j)) echo trim($j) ?></p>
										<?php
				                            endforeach;
				                        endif;
				                        ?>
									</div>
								</div>
								<div class="b-font"><?php if (!empty($v['content'])) echo $v['content'] ?></div>
							</dd>	
							<?php if($k < $count){ if($k%2 == 1){ echo "<dd id=\"separated\"></dd>"; }else{ echo "<dd id=\"separated2\"></dd>"; } } ?>
	                        <?php
	                            endforeach;
	                        endif;
	                        ?>
						</dl>
		            </div>
				</div>
			</div>
		</div>
		<!-- end content -->
		<?php include_once VIEWS.'inc/footer.php'; ?>
	</div>
	<!-- end project -->
	<?php
	    echo static_file('new_web/js/myjs.js');
	    echo static_file('new_web/css/projectmobile.css');
	?>
</body>
</html>