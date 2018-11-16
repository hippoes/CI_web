<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
	<!-- project -->
	<div class="project dalshabet_html">
	<!-- header -->
		<?php 
			$is_need = true;
			include_once VIEWS.'inc/Project_header.php'; 
		?>
		<div class="banners" style="background-image: url(<?php if (!empty($banner['photo'])) echo UPLOAD_URL.tag_photo($banner['photo']) ?>);">
			<div class="banner_fixed">
				<div class="text_fixed">
					<p>BEAUTY MANAGEMENT</p>
					<h2>Hibaby蜜月美妍中心</h2>
					<div class="text_border"></div>
					<p>专业产康私人订制  让女人魅力重获新生</p>
				</div>
			</div>
		</div>
	<!-- end header -->
	

	<!-- content -->
		<div class="careteam">
			<div class="nutrition">
				<div class="dalshabet w1400">
					<!-- 美妍介绍 -->
					<div class="dalshabet_introduce">
						<div class="now f-cb">
			             	<a href="" style="color: #cb8441;">美妍中心</a>
			            </div>
			            <div class="wel-title">
							<h2>Beauty Management</h2>
							<i></i>
							<p>美妍中心</p>
						</div>
						<div class="service-font pc_font">
							<p><?php if (!empty($dalshabet_introduce['content'])) echo $dalshabet_introduce['content'] ?></p>
						</div>
						<div class="service-font mobile_font">
							<p><?php if (!empty($dalshabet_introduce['field1'])) echo $dalshabet_introduce['field1'] ?></p>
						</div>

						<!-- 四位一体 -->
						<div class="system">
							<div class="subtitle">
								<h2>四位一体产后美妍管理体系</h2>
							</div>
							<ul class="trends-list f-cb">
								<?php
								if(!empty($system)):
									foreach($system as $v):
								?>
								<li>
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									<p><?php if(!empty($v['title'])) echo $v['title']; ?></p>
								</li>
								<?php
									endforeach;
								endif;
								?>
							</ul>
						</div>

						<div class="intro_after">
							<p><?php if (!empty($dalshabet_introduce['outline'])) echo $dalshabet_introduce['outline'] ?></p>
						</div>
					</div>

					<!-- 妊娠期 -->
					<div class="preg">
						<div class="sub-title">
							<h2>妊娠期</h2>
							<i></i>
							<p><?php if (!empty($preg_introduce['title'])) echo $preg_introduce['title'] ?></p>
						</div>
						<div class="service-font">
							<p><?php if (!empty($preg_introduce['content'])) echo $preg_introduce['content'] ?></p>
						</div>
						<div class="preg_list">
							<ul>
								<?php
								if(!empty($preg_list)):
									foreach($preg_list as $v):
								?>
								<li class="preg_listli">
									<div class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<i></i>
										<div class="con_list">
											<?php
											if(!empty($v['outline'])):
												foreach($v['outline'] as $j):
											?>
											<span><?php if (!empty($j)) echo trim($j); ?></span>
											<?php
												endforeach;
											endif;
											?>
											<div class="clear"></div>
										</div>
									</div>
									<div class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</div>
								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="consultBtn">
							<a class="mainBtn">
								<div class="text">更多详情请点击咨询</div>
								<div class="hand">
									<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>
					
					<!-- 产褥期 -->
					<div class="perium">
						<div class="sub-title">
							<h2>产褥期</h2>
							<i></i>
							<p><?php if (!empty($preium_introduce['title'])) echo $preium_introduce['title'] ?></p>
						</div>
						<div class="service-font">
							<p><?php if (!empty($preium_introduce['content'])) echo $preium_introduce['content'] ?></p>
						</div>
						<div class="preg_list">
							<ul>
								<?php
								if(!empty($preium_list)):
									foreach($preium_list as $v):
								?>
								<li class="preg_listli">
									<div class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<i></i>
										<div class="con_list">
											<?php
											if(!empty($v['outline'])):
												foreach($v['outline'] as $j):
											?>
											<span><?php if (!empty($j)) echo trim($j); ?></span>
											<?php
												endforeach;
											endif;
											?>
											<div class="clear"></div>
										</div>
									</div>
									<div class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</div>
								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="consultBtn">
							<a class="mainBtn">
								<div class="text">更多详情请点击咨询</div>
								<div class="hand">
									<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>

					<!-- 产后调理 -->
					<div class="nursing">
						<div class="sub-title">
							<h2>产后调理</h2>
							<i></i>
							<p><?php if (!empty($nursing_introduce['title'])) echo $nursing_introduce['title'] ?></p>
						</div>
						<div class="service-font">
							<p><?php if (!empty($nursing_introduce['content'])) echo $nursing_introduce['content'] ?></p>
						</div>
						<div class="preg_list">
							<ul>
								<?php
								if(!empty($nursing_list)):
									foreach($nursing_list as $v):
								?>
								<li class="preg_listli">
									<div class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<i></i>
										<div class="con_list">
											<?php
											if(!empty($v['outline'])):
												foreach($v['outline'] as $j):
											?>
											<span><?php if (!empty($j)) echo trim($j); ?></span>
											<?php
												endforeach;
											endif;
											?>
											<div class="clear"></div>
										</div>
									</div>
									<div class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</div>
								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="consultBtn">
							<a class="mainBtn">
								<div class="text">更多详情请点击咨询</div>
								<div class="hand">
									<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>

					<!-- 盆底肌康复 -->
					<div class="recovery">
						<div class="sub-title">
							<h2>专业盆底康复</h2>
							<i></i>
							<p><?php if (!empty($recovery_introduce['title'])) echo $recovery_introduce['title'] ?></p>
						</div>
						<div class="service-font">
							<p><?php if (!empty($recovery_introduce['content'])) echo $recovery_introduce['content'] ?></p>
						</div>
						<div class="recovery_pics">
							<ul>
								<?php
								if(!empty($recovery_introduce['pics'])):
									foreach($recovery_introduce['pics'] as $v):
								?>
								<li class="pics">
									<img src="<?php if (!empty($v)) echo UPLOAD_URL.tag_photo($v) ?>" alt="<?php echo get_pic_alt($v) ?>">

								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="sub-title mobile_sub">
							<p><?php if (!empty($problem_introduce['title'])) echo $problem_introduce['title'] ?></p>
						</div>
						<div class="problem">
							<ul>
								<?php
								if(!empty($problem_lists)):
									foreach($problem_lists as $v):
								?>
								<li class="problem_listsli">
									<div class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</div>
									<div class="con">
										<p><?php if (!empty($v['title'])) echo $v['title'] ?></p>
									</div>
								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="service-font">
							<p><?php if (!empty($problem_introduce['content'])) echo $problem_introduce['content'] ?></p>
						</div>
						<div class="consultBtn">
							<a class="mainBtn">
								<div class="text">立即预约盆底康复项目</div>
								<div class="hand">
									<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>

					<!-- 孕产运动 -->
					<div class="movement">
						<div class="sub-title">
							<h2>孕产运动</h2>
							<i></i>
						</div>
						<div class="service-font pc_font">
							<p><?php if (!empty($movement_introduce['content'])) echo $movement_introduce['content'] ?></p>
						</div>
						<div class="service-font mobile_font">
							<p><?php if (!empty($movement_introduce['outline'])) echo $movement_introduce['outline'] ?></p>
						</div>
						<div class="movement_list">
							<ul>
								<?php
								if(!empty($movement_list)):
									foreach($movement_list as $v):
								?>
								<li class="preg_listli">
									<div class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<i></i>
										<div class="con_list">
											<?php
											if(!empty($v['outline'])):
												foreach($v['outline'] as $j):
											?>
											<span><?php if (!empty($j)) echo trim($j); ?></span>
											<?php
												endforeach;
											endif;
											?>
											<div class="clear"></div>
										</div>
									</div>
									<div class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</div>
								</li>
								<?php
									endforeach;
								endif;
								?>
								<div class="clear"></div>
							</ul>
						</div>
						<div class="expert_infos">
							<div class="pic">
								<img src="<?php if (!empty($expert_introduce['photo'])) echo UPLOAD_URL.tag_photo($expert_introduce['photo']) ?>" alt="<?php echo get_pic_alt($expert_introduce['photo']) ?>">
							</div>
							<div class="con">
								<h2><?php if (!empty($expert_introduce['title'])) echo $expert_introduce['title'] ?></h2>
								<i></i>
								<p class="sub-ptitle"><?php if (!empty($expert_introduce['outline'])) echo $expert_introduce['outline'] ?></p>
							
								<div class="expert-font">
									<p><?php if (!empty($expert_introduce['content'])) echo $expert_introduce['content'] ?></p>
								</div>
								<div class="consultBtn">
									<a class="mainBtn">
										<div class="text">在线预约孕产运动课程</div>
										<div class="hand">
											<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
										</div>
									</a>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mobile_consult">
							<div class="consultBtn">
								<a class="mainBtn">
									<div class="text">更多详情请点击咨询</div>
									<div class="hand">
										<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="dalshabetbg">
					<!-- 六大板块 -->
					<div class="six_model">
					 	<div class="w1400">
							<div class="sub-title">
								<p>六大板块全方位恢复</p>
							</div>
							<div class="six_box">
								<ul>
									<?php
									if(!empty($six_model)):
										foreach($six_model as $v):
									?>
									<li class="boxli">
										<div class="pic">
											<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
										</div>
										<div class="con">
											<p><?php if (!empty($v['title'])) echo $v['title'] ?></p>
										</div>
									</li>
									<?php
										endforeach;
									endif;
									?>
									<div class="clear"></div>
								</ul>
							</div>
							<div class="mobile_consult">
								<div class="consultBtn">
									<a class="mainBtn">
										<div class="text">更多详情请点击咨询</div>
										<div class="hand">
											<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="six_modelbg">
						<div class="modelbg">
							<div class="fixed_modelbg w1400" style="background-image:url(<?php if (!empty($six_modelbg['photo'])) echo UPLOAD_URL.tag_photo($six_modelbg['photo']) ?>);">
								<div class="will_do">
									<h2><?php if (!empty($six_modelbg['title'])) echo $six_modelbg['title'] ?></h2>
									<ul>
										<?php
										if(!empty($six_modelbg['outline'])):
											foreach($six_modelbg['outline'] as $v):
										?>
										<li class="will_dolists">
											<p><?php if (!empty($v)) echo $v ?></p>
										</li>
										<?php
											endforeach;
										endif;
										?>
									</ul>
								</div>
								<div class="rf_block">
									<ul>
										<?php
										if(!empty($rf_block)):
											foreach($rf_block as $k => $v):
										?>
										<li class="will_dolists <?php if (!empty($k)) echo 'circle'.$k ; else echo 'circle0' ?>">
											<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
											<p><?php if (!empty($v['field1'])) echo $v['field1'] ?></p>
										</li>
										<?php
											endforeach;
										endif;
										?>
										<div class="clear"></div>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- 产后康复 -->
					<div class="aboutDalshabet">
						<div class="dalshabet w1400">
							<div class="about">
								<div class="sub-title">
									<p>产后康复为何选Hibaby蜜月</p>
								</div>
								<ul>
									<?php
									if(!empty($change_lists)):
										foreach($change_lists as $v):
									?>
									<li>
										<div class="con">
											<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
											<i></i>
										</div>
										<div class="pic">
											<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
										</div>
										<div class="con_font">
											<p><?php if (!empty($v['outline'])) echo $v['outline'] ?></p>
										</div>
										<div class="con_title">
											<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										</div>
									</li>
									<?php
										endforeach;
									endif;
									?>
									<div class="clear"></div>
								</ul>
								<div class="mobile_consult">
									<div class="consultBtn">
										<a class="mainBtn">
											<div class="text">更多详情请点击咨询</div>
											<div class="hand">
												<img src="<?php echo static_file('new_web/images/hand.png'); ?>" alt="">
											</div>
										</a>
									</div>
								</div>
							</div>
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
			// 妊娠期
			maxheight($('.preg').find('li').find('.con'));
			// 产褥期
			maxheight($('.perium').find('li').find('.con'));
			// 产后调理
			maxheight($('.nursing').find('li').find('.con'));
			// 孕期运动
			maxheight($('.movement').find('li').find('.con'));
			// 产后康复
			maxheight($('.about').find('li').find('.con_font'));

			if($(this).width() <= 500){
				//将赋值元素高度设为auto
				$('.preg').find('li').find('.con').css('height','auto');
				$('.perium').find('li').find('.con').css('height','auto');
				$('.nursing').find('li').find('.con').css('height','auto');
				$('.movement').find('li').find('.con').css('height','auto');
				$('.about').find('li').find('.con_font').css('height','auto');
			}
		});

		$(window).resize(function(){
			//将赋值元素高度设为auto
			$('.preg').find('li').find('.con').css('height','auto');
			$('.perium').find('li').find('.con').css('height','auto');
			$('.nursing').find('li').find('.con').css('height','auto');
			$('.movement').find('li').find('.con').css('height','auto');
			$('.about').find('li').find('.con_font').css('height','auto');
			
			// 妊娠期
			maxheight($('.preg').find('li').find('.con'));
			// 产褥期
			maxheight($('.perium').find('li').find('.con'));
			// 产后调理
			maxheight($('.nursing').find('li').find('.con'));
			// 孕期运动
			maxheight($('.movement').find('li').find('.con'));
			// 产后康复
			maxheight($('.about').find('li').find('.con_font'));
			// alert($(this).width());
			if($(this).width() <= 500){
				//将赋值元素高度设为auto
				$('.preg').find('li').find('.con').css('height','auto');
				$('.perium').find('li').find('.con').css('height','auto');
				$('.nursing').find('li').find('.con').css('height','auto');
				$('.movement').find('li').find('.con').css('height','auto');
				$('.about').find('li').find('.con_font').css('height','auto');
			}
		});
	</script>
</body>
</html>