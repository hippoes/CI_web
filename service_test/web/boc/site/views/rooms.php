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
		             	<a href="" style="color: #cb8441;">月子房型</a>
		            </div>
		            <div class="wel-title">
						<h2>Room type introduction</h2>
						<i></i>
						<p>月子房型</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($introduce['content'])) echo $introduce['content'] ?></p>
					</div>
					
					<ul class="rooms-list f-cb">

						<?php
                        if (!empty($rooms_lists)):
                            foreach ($rooms_lists as $k=>$v):
                        ?>
						<li class="ab">
							<div class="intros f-cb">
								<p class="pic">
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
								</p>
								<span class="con">
									<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
									<i></i>
									<div class="font">
										<?php if (!empty($v['content'])) echo $v['content'] ?>
									</div>
								</span>
							</div>
							<dl class="f-cb">
								<?php
		                        if (!empty($v['pics'])):
		                            foreach ($v['pics'] as $j):
		                        ?>
									<dd><img src="<?php if (!empty($j)) echo UPLOAD_URL.tag_photo($j) ?>" alt="<?php echo get_pic_alt($j) ?>"></dd>
								<?php
		                            endforeach;
		                        endif;
                        		?>
							</dl>
						</li>
						<?php
                            endforeach;
                        endif;
                        ?>

					</ul>
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
	<script>
		$(function()
		{
			$('.rooms-list li:even').addClass("even");
		});
	</script>
</body>
</html>