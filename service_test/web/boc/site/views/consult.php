<!DOCTYPE html>
<html class="" style="font-size:170px;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="zh-CN" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="keywords" content="<?php if (!empty($header['tags'])) echo $header['tags'] ?>" />
	<meta name="description" content="<?php if (!empty($header['intro'])) echo $header['intro'] ?>" />
	<meta name="author" content="Hibaby母婴健康中心" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<title><?php if (!empty($header['title'])) echo $header['title'] ?></title>
	<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
	<script>
		var STATIC_URL = "<?php echo STATIC_URL ?>";
		var GLOBAL_URL = "<?php echo GLOBAL_URL ?>";
		var UPLOAD_URL = "<?php echo UPLOAD_URL ?>";
		var SITE_URL   = "<?php echo site_url() ?>";
	</script>
	<?php
		echo static_file('web/css/project.css');
		echo static_file('web/css/mobile_project.css');
		
		echo static_file('new_web/js/jquery-2.1.4.min.js');
	?>
	<script>
		// 设置页面字体大小
		!(function(doc, win) {    
		    var docEle = doc.documentElement,
		    evt = "onorientationchange" in window ? "orientationchange" : "resize",
		    fn = function() {            
		        var width = docEle.clientWidth;
		        if(width < 1200 && width >320){
		     		width && (docEle.style.fontSize = 40 * (width / 320) + "px");
		        }
		     };
		    win.addEventListener(evt, fn, false);
		    doc.addEventListener("DOMContentLoaded", fn, false);
		 
		}(document, window));

		window.resize(function(){
			if($(this).width() < 1200){
				// 设置页面字体大小
				!(function(doc, win) {    
				    var docEle = doc.documentElement,
				    evt = "onorientationchange" in window ? "orientationchange" : "resize",
				    fn = function() {            
				        var width = docEle.clientWidth;
				        if(width < 1200 && width >320){
				     		width && (docEle.style.fontSize = 40 * (width / 320) + "px");
				        }
				     };
				    win.addEventListener(evt, fn, false);
				    doc.addEventListener("DOMContentLoaded", fn, false);
				 
				}(document, window));	
			}else{
				width && (docEle.style.fontSize = "170px");
			}
				
		});
			}
	</script>
</head>
<body class="pc">
	<div class="project">
		<div class="header"	style="background-image: url('http://localhost/www.jxmycare.com/web/bocweb/project/img/web/banner.jpg')"></div>
		<div class="main">
			
			<div class="header_fixed">
				<div class="pc_logo">
					<a href="http://www.jjeezz.com/"><img src="<?php echo static_file('project/img/web/logo.png'); ?>" alt=""></a>
				</div>
				<div class="pc_home">
					<a href="http://www.jjeezz.com/"><img src="<?php echo static_file('project/img/web/home.png'); ?>" alt="">
					<span style="color:#666;font-size:0.12rem;">首页</span></a>
				</div>
				<div class="clear"></div>
			</div>
			

			<div class="roomsPlace">
				<div class="titlePlace">多种房型为您找到家的感觉</div>
				<div class="textPlace">
					<p>Hibaby杰爱从新生儿健康护理、新生儿早期智力开发、营养饮食、入住环境、产后护理、产后身形恢复、生活护理等七项搭配出多种套餐，满足不同客户的个性化需求。</p>
				</div>
				<div class="roomsList">
					<ul>
						<li>
							<div class="pic">
								<img src="<?php echo static_file('project/img/web/house01.jpg'); ?>" alt="">
							</div>
						</li>
						<li>
							<div class="pic">
								<img src="<?php echo static_file('project/img/web/house02.jpg'); ?>" alt="">
							</div>
						</li>
						<li>
							<div class="pic">
								<img src="<?php echo static_file('project/img/web/house03.jpg'); ?>" alt="">
							</div>
						</li>
						<li>
							<div class="pic">
								<img src="<?php echo static_file('project/img/web/house04.jpg'); ?>" alt="">
							</div>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="pcConsultBtn">
					<a class="pcMainBtn" onclick="communication();">
						<div class="text">咨询套餐价格</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="mergePlace">
			<div class="main">
				<div class="prizePlace">
					<div class="titlePlace">Hibaby杰爱备受大家青睐</div>
					<div class="textPlace">为什么Hibaby 杰爱能为这么多家庭提供科学专业的月子服务？</div>
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/prize.png'); ?>" alt="">
					</div>
					<div class="pcConsultBtn">
						<a class="pcMainBtn" onclick="communication();">
							<div class="text">我家也需要</div>
							<div class="hand">
								<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
							</div>
						</a>
					</div>
				</div>
				
				<div class="inputPlace">
					<div class="inputDetail">
						<div class="detailBox">
							<div class="boxTitle">
								<p>我坐月子的费用计算</p>
							</div>
							<div class="inputModel">
								<input class="inputtitle title lf" placeholder="月子周期" type="text">
								<dl class="titleSelect">
									<dt class="roomstype">7-10天</dt>
									<dd>
										<ul>
											<li onclick="communication();"><a href="javascript:;">7-10天</a></li>
											<li onclick="communication();"><a href="javascript:;">28天</a></li>
											<li onclick="communication();"><a href="javascript:;">36天</a></li>
											<li onclick="communication();"><a href="javascript:;">42天</a></li>
										</ul>
									</dd>
								</dl>
							</div>
							<div class="inputModel">
								<input class="inputtitle lf" type="text" placeholder="称呼">
							</div>
							<div class="inputModel">
								<input class="inputtitle lf" type="text" placeholder="接受费用明细的手机号">
							</div>
							<div class="consultBtn">
								<a href="javascript:;" onclick="communication();" class="mainBtn inputBtn">
									<div class="text">计算坐月子费用</div>
									<div class="hand">
										<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>	
		</div>
		
		<div class="main">
			<div class="esPlace">
				<div class="titlePlace">环境安全优雅安心坐月子</div>
				<div class="emModel">
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/fuyou.jpg'); ?>" alt="">
					</div>
					<div class="con">
						<div class="emName">妇幼店</div>
						<i></i>
						<div class="emIntroduce">
							<p>地处王禹卿私家庭院，市中心独栋花园别墅，安静的绿茵氧吧，市妇幼保健院、市第二人民医院近在咫尺，古典气息与现代文化相结合的理想休养之处。</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="emModel">
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/binhu.jpg'); ?>" alt="">
					</div>
					<div class="con">
						<div class="emName">滨湖店</div>
						<i></i>
						<div class="emIntroduce">
							<p>毗邻市人民医院，7000 平米智能家居专属定制套房，高达60%的园林软景绿化面积，让妈妈和宝宝静享这度假般的蜜月旅行。</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="sciencePlace">
			<div class="main">
				<div class="titlePlace">科学专业坐月子源自专注月子服务10年</div>
				<div class="textPlace">
					<p>Hibaby杰爱月子中心成立于2008年2月，是锡城首家专业月子护理机构，国家五星级母婴保健服务认证机构成立至今，已经形成了一套完善的月子服务体系，并发展成为集优生优育咨询、孕期保健、新生儿保健、月子护理、月子营养调理及产后康复等服务于一体的母婴健康中心。</p>
				</div>
				<div class="picList">
					<ul>
						<li class="pic">
							<img src="<?php echo static_file('project/img/web/service01.jpg'); ?>" alt="">
						</li>
						<li class="pic">
							<img src="<?php echo static_file('project/img/web/service02.jpg'); ?>" alt="">
						</li>
						<li class="pic">
							<img src="<?php echo static_file('project/img/web/service03.jpg'); ?>" alt="">
						</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="expert">
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/expert.jpg'); ?>" alt="">
					</div>
					<div class="con">
						<div class="titlePlace">科学专业坐月子来自深入研究40载</div>
						<div class="textPlace">
							<p>无锡市妇幼保健院原副院长，无锡优生优育协会副会长，自副院长岗位退休后，于2008 年3 月创办无锡首家专业月子护理机构------杰爱月子护理中心，旨在以行动改变老一代传统坐月子习惯，让产褥期保健专业化、科学化，弥补了当时无锡乃至江苏省母婴专业护理机构空白。</p>
							<p>童玉瑛女士长期从事妇幼保健工作，在产科临床、优生优育、妇儿保健、女性心理咨询及医院行政管理方面工作近四十年。并在《中国妇幼保健》、《中国医院管理》等省级以上杂志发表论文10 多篇。</p>
						</div>
						<div class="pcConsultBtn">
							<a class="pcMainBtn" onclick="communication();">
								<div class="text">咨询专家问题</div>
								<div class="hand">
									<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="babyPlace">
				<div class="titlePlace">宝宝健康成长来自10重360度全方位健康保障</div>
				<div class="textPlace">
					<p>从入住到返家，针对宝宝特殊情况的个性化护理方案，全程配有响应系统</p>
				</div>
				<div class="picPlace">
					<div class="pic_lf">
						<div class="pic">
							<img src="<?php echo static_file('project/img/web/baby01.png'); ?>" alt="">
						</div>
					</div>
					<div class="pic_rf">
						<div class="pic">
							<img src="<?php echo static_file('project/img/web/baby02.jpg'); ?>" alt="">
						</div>
						<div class="pcConsultBtn">
							<a class="pcMainBtn" onclick="communication();">
								<div class="text">咨询套餐中的宝宝服务内容</div>
								<div class="hand">
									<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
								</div>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<div class="dietaryPlace">
			<div class="main">
				<div class="titlePlace">科学搭配专业烹饪月子餐，营养可口</div>
				<div class="textPlace">
					<p>结合现代营养学与传统食疗，分3 大阶段，10 大步骤16 道工序层层把控。</p>
				</div>
				<div class="process">
					<div class="bg">
						<img src="<?php echo static_file('project/img/web/dietarybg.png'); ?>" alt="">
						<div class="dietaryPic" data-value="0">
							<ul>
								<li class="dtPic active" data-value="0">
									<img src="<?php echo static_file('project/img/web/dietary01.jpg'); ?>" alt="">
								</li>
								<li class="dtPic" data-value="1">
									<img src="<?php echo static_file('project/img/web/dietary02.jpg'); ?>" alt="">
								</li>
								<li class="dtPic" data-value="2">
									<img src="<?php echo static_file('project/img/web/dietary03.jpg'); ?>" alt="">
								</li>
								<div class="clear"></div>
							</ul>
							<div class="pcConsultBtn">
								<a class="pcMainBtn" onclick="communication();">
									<div class="text">免费试吃月子餐</div>
									<div class="hand">
										<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
									</div>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="servicePlace">
				<div class="titlePlace">N对1全方位贵族式管家服务，热情贴心</div>
				<div class="textPlace">
					<p>定制妈妈和宝宝月子全程服务</p>
				</div>
				<div class="picPlace">
					<div class="serviceText span01">
						专属<br>管家
					</div>
					<div class="serviceText span02">
						母婴<br>护理
					</div>
					<div class="serviceText span03">
						中医<br>调理
					</div>
					<div class="serviceText span04">
						月子<br>膳食
					</div>
					<div class="serviceText span05">
						产后<br>修复
					</div>
					<div class="serviceText span06">
						私密<br>管理
					</div>
					<div class="serviceText span07">
						乳房<br>管理
					</div>
				</div>
				<div class="pcConsultBtn">
					<a class="pcMainBtn" onclick="communication();">
						<div class="text">咨询服务详情</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="power">
			<div class="main">
				<div class="titlePlace">荣誉源于实力专业可信赖</div>
				<div class="textPlace">
					<p>荣获全国星级保健服务机构5 星级认证，专业实力有保障。</p>
				</div>
				<div class="picPlace">
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/power.png'); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
		
		<div class="main">
			<div class="brandPcPlace">
				<div class="pic">
					<img src="<?php echo static_file('project/img/web/brand.jpg'); ?>" alt="">
				</div>
				<div class="pcConsultBtn">
					<a class="pcMainBtn" onclick="communication();">
						<div class="text">咨询大家坐月子的经历</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="commentPlace">
			<div class="main">
				<div class="commentDetail">
					<ul>
						<li class="pic">
							<img src="<?php echo static_file('project/img/web/comment01.jpg'); ?>" alt="">
							<div class="pcConsultBtn">
								<a class="pcMainBtn" onclick="communication();">
									<div class="text">立即查看宝妈同款套餐详情及价格</div>
									<div class="hand">
										<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
									</div>
								</a>
							</div>
						</li>
						<li class="pic">
							<img src="<?php echo static_file('project/img/web/comment02.jpg'); ?>" alt="">
							<div class="pcConsultBtn">
								<a class="pcMainBtn" onclick="communication();">
									<div class="text">立即查看宝妈同款套餐详情及价格</div>
									<div class="hand">
										<img src="<?php echo static_file('project/img/web/btnhand.png'); ?>" alt="">
									</div>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="main">
			<div class="lastPlace">
				<div class="contentPlace">
					<div class="pic">
						<img src="<?php echo static_file('project/img/web/footer.jpg'); ?>" alt="">
					</div>
					<div class="address">
						<a href="">
							<div class="footer_logo">
								<img src="<?php echo static_file('project/img/web/footer_logo.png'); ?>" alt="">
							</div>
						</a>
						<div class="con">
							<p class="title">Hibaby杰爱母婴健康中心</p>
							<p class="title">——专注月子服务10 年</p>
							<p>联系电话：0510--85880101</p>
							<p>滨湖店地址：高浪西路202 号</p>
							<p>妇幼店地址：中山路177 号梁溪饭店3 号、5 号楼别墅</p>
							<p>苏ICP08118722 号-1</p>
							<p>无锡杰爱母婴护理服务有限公司</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>

	</div>

	<?php
		echo static_file('web/js/project.js');
	?>
<script>
	// $width = $(this).width();
	$width = $(".picPlace").width();
	$fontWidth = $(".serviceText").width()/2;
	// $(".picPlace .span01").css("left",$width/3.75);
	// $(".picPlace .span02").css("left",$width/4.25);
	// $(".picPlace .span03").css("left",$width/2.9);
	// $(".picPlace .span04").css("left",$width/2/6*6.4);
	// $(".picPlace .span05").css("left",$width/2/3*4.3);
	// $(".picPlace .span06").css("left",$width/2/3*4.95);
	// $(".picPlace .span07").css("left",$width/2/3*4.75);
</script>
</body>
</html>