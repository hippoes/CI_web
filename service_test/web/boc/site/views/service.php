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
		             	<a href="" style="color: #cb8441;">精致月子服务</a>
		            </div>
					<div class="wel-title">
						<h2>Hibaby Characteristic</h2>
						<i></i>
						<p>特有服务</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($server_introduce['content'])) echo $server_introduce['content'] ?></p>
					</div>
					<!-- 副标题 01 -->
					<div class="vice-title">
						<h2><?php if (!empty($server_introduce['outline1'][0])) echo trim($server_introduce['outline1'][0]) ?></h2>
						<div class="vice-font">
							<?php if (!empty($server_introduce['outline1'][1])) echo trim($server_introduce['outline1'][1]) ?>
						</div>
					</div>
					<!-- 专家护航列表 -->
					<div class="sexpert-list">
						<ul class="professional-list f-cb">
							<?php
							if(!empty($protect_list)):
								foreach($protect_list as $v):
							?>
							<li>
								<div class="expert-circle" href="javascript:;">
									<p class="pic">
										<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
									</p>
								</div>
								<div class="expert-title"><?php if (!empty($v['title'])) echo $v['title'] ?></div>
							</li>
							<?php
								endforeach;
							endif;
							?>
						</ul>
					</div>
					<!-- 副标题 02 -->
					<div class="vice-title">
						<h2><?php if (!empty($server_introduce['outline2'][0])) echo $server_introduce['outline2'][0] ?></h2>
						<div class="vice-font">
							<?php if (!empty($server_introduce['outline2'][1])) echo $server_introduce['outline2'][1] ?>
						</div>
					</div>
				</div>
				<!-- 智能环保列表 -->
				<div class="smart-list">
					<ul class="green-smart-list f-cb">
						<?php
						if(!empty($smart_list)):
							foreach($smart_list as $v):
						?>
						<li>
							<a href="javascript:;">
								<img class="tit" src="<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>" alt="<?php echo get_pic_alt($v['icon']) ?>">
								<h2><?php if(!empty($v['title'])) echo $v['title']; ?></h2>
								<p><?php if(!empty($v['outline'])) echo $v['outline']; ?></p>
								<img class="pic" src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
							</a>
						</li>
						<?php
							endforeach;
						endif;
						?>
					</ul>
				</div>
				<!-- 产前服务 -->
				<div class="w1400">
					<div class="wel-title">
						<h2>Prenatal Service</h2>
						<i></i>
						<p>产前服务</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($prenatal_introduce['content'])) echo $prenatal_introduce['content'] ?></p>
					</div>
					<!-- 产前服务列表 -->
					<div class="prenatal-list">
						<ul class="f-cb">
							<?php
							if(!empty($prenatal_list)):
								foreach($prenatal_list as $v):
							?>
							<li>
								<p class="pic">
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
								</p>
								<span class="con f-cb">
									<h2><?php if(!empty($v['title'])) echo $v['title']; ?></h2>
									<i></i>
									<div class="font"><a href="javascript:;"></a></div>
									<?php 
									if(!empty($v['outline'])):
										foreach($v['outline'] as $vv):
									?>
									<div class="link"><?php if(!empty($vv)) echo trim($vv); ?></div>
									<?php
										endforeach;
									endif;
									?>
								</span>
							</li>
							<?php
								endforeach;
							endif;
							?>
						</ul>
					</div>
					
					<!-- 妈妈服务 -->
					<div class="wel-title">
						<h2>Postpartum Service</h2>
						<i></i>
						<p>妈妈服务</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($mom_introduce['content'])) echo $mom_introduce['content'] ?></p>
					</div>
					<div class="mum_service-list">
						<ul class="f-cb">
							<?php
							if(!empty($mom_textlist)):
								foreach($mom_textlist as $v):
							?>
							<li>
								<h2><?php if(!empty($v['title'])) echo $v['title']; ?></h2>
								<i></i>
								<p><?php if(!empty($v['content'])) echo $v['content']; ?></p>
							</li>
							<?php
								endforeach;
							endif;
							?>
							<li>
								<p class="pic">
									<img src="<?php if (!empty($mom_piclist['photo'])) echo UPLOAD_URL.tag_photo($mom_piclist['photo']) ?>" alt="<?php echo get_pic_alt($mom_piclist['photo']) ?>">
								</p>
								<span class="con">
									<h2><?php if(!empty($mom_piclist['title'])) echo $mom_piclist['title']; ?></h2>
									<i></i>
									<?php
									if(!empty($mom_piclist['outline'])):
										foreach($mom_piclist['outline'] as $v):
									?>
									<p><?php if(!empty($v)) echo trim($v); ?></p>
									<?
										endforeach;
									endif;
									?>
								</span>
							</li>
						</ul>
					</div>
				</div>
				
			</div>	

			<div class="server-bg">
				<div class="trends w1400">
					<div class="wel-title">
						<h2>Mother Class</h2>
						<i></i>
						<p>蜜妈课堂</p>
					</div>
					<div class="service-font">
						<p><?php if(!empty($class_introduce['content'])) echo $class_introduce['content']; ?></p>
					</div>
					<ul class="trends-list f-cb">
						
						<?php
						if(!empty($class_list)):
							foreach($class_list as $v):
						?>
						<li>
							<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
							<p><?php if(!empty($v['title'])) echo $v['title']; ?></p>
						</li>
						<?
							endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
			<div class="server-bg">
				<div class="baby w1400">
					<div class="wel-title">
						<h2>Baby Service</h2>
						<i></i>
						<p>宝宝服务</p>
					</div>
					<div class="service-font">
						<p><?php if(!empty($baby_introduce['content'])) echo $baby_introduce['content']; ?></p>
					</div>
					<ul class="baby_list f-cb">

						<?php
						if(!empty($baby_list)):
							foreach($baby_list as $v):
						?>
						<li>
							<div class="baby_service">
								<h2 style="background: url(<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>) no-repeat left center">
								<?php if(!empty($v['title'])) echo $v['title']; ?>
								</h2>
								<?php
								if(!empty($v['outline'])):
									foreach($v['outline'] as $vv):
								?>
								<p><?php if(!empty($vv)) echo $vv; ?></p>
								<?
									endforeach;
								endif;
								?>
								<div class="pic">
									<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
								</div>
							</div>
						</li>
						<?
							endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
			
			<div class="nutrition">
				<div class="w1400">
					<div class="wel-title">
						<h2>Full moon Party</h2>
						<i></i>
						<p>满月party</p>
					</div>
					<div class="service-font">
						<p><?php if(!empty($party_infos['outline'])) echo $party_infos['outline']; ?></p>
					</div>
					<div class="party-pics">
						<ul class="pics">
							<?php
							if(!empty($party_infos['pics'])):
								foreach($party_infos['pics'] as $v):
							?>
							<li>
								<img src="<?php if (!empty($v)) echo UPLOAD_URL.tag_photo($v) ?>" alt="<?php echo get_pic_alt($v) ?>">
							</li>
							<?
								endforeach;
							endif;
							?>
						</ul>
					</div>
					<div class="clear"></div>
					<div class="party-font">
						<p><?php if(!empty($party_infos['content'])) echo $party_infos['content']; ?></p>
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

			
		});
		$(window).load(function(){
			maxheight(".prenatal-list li");
			maxheight(".mum_service-list li",3);
			maxheight(".baby_list li");
		});
	</script>
</body>
</html>