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
		             	<a href="" style="color: #cb8441;">月子膳食</a>
		            </div>
		            <div class="wel-title">
						<h2>Nutrition Meal</h2>
						<i></i>
						<p>月子膳食</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($introduce['content'])) echo $introduce['content'] ?></p>
					</div>
					
					<div class="meal-list">
						<p class="pic">
							<img src="<?php if (!empty($features['photo'])) echo UPLOAD_URL.tag_photo($features['photo']) ?>" alt="<?php echo get_pic_alt($features['photo']) ?>">
						</p>
						<span class="con">
							<h2><?php if (!empty($features['title'])) echo $features['title'] ?></h2>
							<i></i>
							<?php
	                        if (!empty($features['outline'])):
	                            foreach ($features['outline'] as $k=>$v):
	                        ?>
							<p><?php if (!empty($v['0'])) echo $v['0'] ?></p>
							<span><?php if (!empty($v['1'])) echo $v['1'] ?></span>
							<?php
	                            endforeach;
	                        endif;
	                        ?>
							
						</span>
					</div>

					<div class="meal-title">
						<h2>月子餐四部曲：一排、二补、三调、四养</h2>
					</div>
					<div>
						<ul class="f-cb month-service-list">
							<?php
	                        if (!empty($dietary_lists)):
	                            foreach ($dietary_lists as $k=>$v):
	                        ?>
							<li>
								<div class="pic">
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
								</div>
								<div class="con">
									<p>
										<span style="font-size: 18px; color: rgb(38, 38, 38);">
											<strong><?php if (!empty($v['title'])) echo $v['title'] ?>：</strong>
										</span>
										<?php if (!empty($v['field1'])) echo $v['field1'] ?>
									</p>
									<p><br/></p>
									<p style="text-indent: 2em;">
										<?php if (!empty($v['content'])) echo $v['content'] ?>
									</p>
									<p><br/></p>
								</div>
							</li>
							<?php
	                            endforeach;
	                        endif;
	                        ?>
						</ul>
					</div>

					<div class="wel-title">
						<h2>Nutrition Evaluation</h2>
						<i></i>
						<p>营养评估</p>
					</div>
					<div class="nutritionbox">
						<p class="pic">
							<img src="<?php if (!empty($assessment['photo'])) echo UPLOAD_URL.tag_photo($assessment['photo']) ?>" alt="<?php echo get_pic_alt($assessment['photo']) ?>">
						</p>
						<span class="con">
							<div style="text-indent: 2em;">
				              <?php if (!empty($assessment['content'])) echo $assessment['content'] ?>
							</div>
						</span>
					</div>
				</div>


				<div class="kitchen">
					<div class="w1400">
						<div class="wel-title">
							<h2>Nutrition Kitchen</h2>
							<i></i>
							<p>月子厨房</p>
						</div>
						<div class="kitchen-list">
							<p class="pic">
								<img src="<?php if (!empty($kitchen['photo'])) echo UPLOAD_URL.tag_photo($kitchen['photo']) ?>" alt="<?php echo get_pic_alt($kitchen['photo']) ?>">
							</p>
							<span class="con">
								<h2> <?php if (!empty($kitchen['title'])) echo $kitchen['title'] ?></h2>
								<i></i>
								<?php
		                        if (!empty($kitchen['outline'])):
		                            foreach ($kitchen['outline'] as $v):
		                        ?>
								<p><?php if (!empty($v)) echo $v; ?></p>
								<?php
		                            endforeach;
		                        endif;
		                        ?>
							</span>
						</div>

						<div class="catering-list">
							<ul class="kitchen-list-ul1">
								<?php
		                        if (!empty($kitchen_lists)):
		                            foreach ($kitchen_lists as $v):
		                        ?>
								<li>
									<span class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<i></i>
										<div class="link">
											<?php if (!empty($v['content'])) echo $v['content'] ?>
										</div>
									</span>
									<p class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</p>
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

			var maxheight = 0;
			$(".month-service-list li").each(function(){
				if(maxheight < $(this).height()) maxheight = $(this).height();
			});
			$(".month-service-list li").css({"height": maxheight + "px"}); 
		});
	</script>
</body>
</html>