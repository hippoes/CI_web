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
		             	<a href="" style="color: #cb8441;">五星环境</a>
		            </div>
					
					<ul class="rooms-list f-cb">

						<?php
                        if (!empty($environment_list)):
                            foreach ($environment_list as $k=>$v):
                        ?>
						<li class="ab">
							<div class="intros f-cb">
								<p class="pic" style="background:url(<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>) no-repeat center"></p>
								<span class="con">
									<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
									<h3><?php if (!empty($v['field1'])) echo $v['field1'] ?></h3>
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
		<div class="footer02">
			<?php include_once VIEWS.'inc/footer.php'; ?>
		</div>
	</div>
	<!-- end project -->
	<?php
	    echo static_file('new_web/js/myjs.js');
	    echo static_file('new_web/css/projectmobile.css');
	    echo static_file('flexslider/flexslider.js');
	    echo static_file('flexslider/flexslider.css');
	?>
	<script>
		$(function()
		{
			$('.rooms-list li:even').addClass("even");


		});

		$(function(){
			$(window).load(function() {
				var location = window.location.href;
				var href= location+"";
				var href_part=href.split('?');	 
			    var num1=href_part[1];
			    $(".ab").each(function(i) {
			    	var _now=$(this);
			        var _shuzi=$(this).index();
				  	var tiao=_now.offset().top;
				  	var shu=$(".ab").index(_now);
				  	if(num1==_shuzi){
			            tiao=_now.offset().top-$('header').height();
			            $("html,body").stop().animate({"scrollTop":tiao}, 1000);
			        }
			    });
			})

			$('.rooms-list li:even').addClass("even");

			$('.rooms-list li').each(function(){
				var hei = $(this).find(".con").innerHeight();
				$(this).find('.pic').height(hei);
			})

			$(window).resize(function(){
				$('.rooms-list li').each(function(){
					var hei = $(this).find(".con").innerHeight();
					$(this).find('.pic').height(hei);
				})
			})
		});
	</script>
</body>
</html>