<!DOCTYPE html>
<html class="" style="font-size: 170.667px;">
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
		
		echo static_file('new_web/js/jquery-2.1.4.min.js');
	?>
	<script>
		// 设置页面字体大小
		(function() { 
			var rootHtml = $("html"); 
			var rootResize = function() { 
				var fontSize = $(window).width() < 640 ? $(window).width() /375*100 : 170; 
				rootHtml.css("font-size", fontSize); 
			} 
			rootResize(); 
			$(window).resize(function() { rootResize(); }); 
		})();
	</script>
</head>
<body class="mobile">
	<div class="main">
		<div class="topbar">
			<div class="pic" style="position:relative;">
				<img src="<?php echo static_file('project/img/001.jpg'); ?>"  onclick="communication();" alt="">
			</div>
			<a href="http://www.jjeezz.com"><div class="logo"></div></a>
		</div>
		<div class="topPlace">
			<div class="topDetail">
				<p class="topTitle" style="color:#333;">专注月子及产后康复<br>服务10年</p>
			</div>
			<div class="topFour">
				<div class="pic">
					<img src="<?php echo static_file('project/img/002.png'); ?>" alt="">
				</div>
			</div>
			<div class="topBottomText" data-count="2000">
				<p>10年来已为超过 
				<span class="bgNum">2</span>
				<span class="bgNum">0</span>
				<span class="bgNum">0</span>
				<span class="bgNum">0</span>
				组家庭<br>提供科学专业的月子服务</p>
			</div>
		</div>

		<div class="roomPlace">
			<div class="titlePlace">多种房型为您找到家的感觉</div>
			<div class="roomsText">
				<p>Hibaby杰爱从新生儿健康护理、新生儿早期智力开发、营养饮食、入住环境、产后护理、产后身形恢复、生活护理等七项搭配出多种套餐，满足不同客户的个性化需求。</p>
			</div>
			<div class="roomPic">
				<dic class="pic">
					<img src="<?php echo static_file('project/img/003.jpg'); ?>" alt="">
				</dic>
			</div>
			<div class="consultBtn">
				<a href="javascript:;" onclick="communication();" class="mainBtn">
					<div class="text">咨询套餐价格</div>
					<div class="hand">
						<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
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
						<input class="inputtitle title lf" type="text" placeholder="月子周期">
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
		
		<div class="emPlace">
			<div class="emDetail">
				<div class="titlePlace">环境安全优雅安心坐月子</div>
				<div class="titleName">
					妇幼店
				</div>
				<div class="emtext">地处王禹卿私家庭院，市中心独栋花园别墅，安静的绿茵氧吧，市妇幼保健院、市第二人民医院近在咫尺，古典气息与现代文化相结合的理想休养之处。</div>
				<div class="pic">
					<img src="<?php echo static_file('project/img/004.jpg'); ?>" alt="">
				</div>

				<div class="titleName">
					滨湖店
				</div>
				<div class="emtext">毗邻市人民医院，7000平米智能家居专属定制套房，高达60%的园林软景绿化面积，让妈妈和宝宝静享这度假般的蜜月旅行。</div>
				<div class="pic">
					<img src="<?php echo static_file('project/img/006.jpg'); ?>" alt="">
				</div>
			</div>
		</div>

		<div class="prizePlace">
			<div class="titlePlace">Hibaby杰爱备受大家青睐</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/007.jpg'); ?>" alt="">
			</div>
			<div class="prizeTitle">为什么Hibaby杰爱能为</div>
			<div class="prizeText">这么多家庭提供科学专业的月子服务？</div>

			<div class="consultBtn">
				<a href="javascript:;" onclick="communication();" class="mainBtn">
					<div class="text">我家也需要</div>
					<div class="hand">
						<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
					</div>
				</a>
			</div>
		</div>
		
		<div class="sciencePlace">
			<div class="titlePlace">科学专业坐月子<br>源自专注月子服务10年</div>
			<div class="scienceText">Hibaby杰爱月子中心成立于2008年2月，是锡城首家专业月子护理机构，国家五星级母婴保健服务认证机构。成立至今，已经形成了一套完善的月子服务体系，并发展成为集优生优育咨询、孕期保健、新生儿保健、月子护理、月子营养调理及产后康复等服务于一体的母婴健康中心。</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/008.jpg'); ?>" alt="">
			</div>
		</div>

		<div class="rsPlace">
			<div class="rsDetail">
				<div class="titlePlace">科学专业坐月子<br>来自深入研究40载</div>
				<div class="rsText">无锡市妇幼保健院原副院长，无锡优生优育协会副会长，自副院长岗位退休后，于2008年3月创办无锡首家专业月子护理机构------杰爱月子护理中心，旨在以行动改变老一代传统坐月子习惯，让产褥期保健专业化、科学化，弥补了当时无锡乃至江苏省母婴专业护理机构空白。</div>
				<div class="pic">
					<img src="<?php echo static_file('project/img/009.jpg'); ?>" alt="">
				</div>
				<div class="rsBtnText">童玉瑛女士长期从事妇幼保健工作，在产科临床、优生优育、妇儿保健、女性心理咨询及医院行政管理方面工作近四十年。并在《中国妇幼保健》、《中国医院管理》等省级以上杂志发表论文10 多篇。</div>
				<div class="consultBtn">
					<a href="javascript:;" onclick="communication();" class="mainBtn">
						<div class="text">咨询专家问题</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>
		
		<div class="bbPlace">
			<div class="titlePlace">宝宝健康成长来自<br/>10重360度全方位健康保障</div>
			<div class="bbText">从入住到返家，针对宝宝特殊情况的个性化护理方案，全程配有响应系统</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/010.png'); ?>" alt="">
			</div>
			<div class="consultBtn">
				<a href="javascript:;" onclick="communication();" class="mainBtn">
					<div class="text">咨询套餐中的宝宝服务内容</div>
					<div class="hand">
						<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
					</div>
				</a>
			</div>
		</div>
		
		<div class="dtPlace">
			<div class="titlePlace">科学搭配<br/>专业烹饪月子餐，营养可口</div>
			<div class="dtText">结合现代营养学与传统食疗，分3大阶段，10大步骤16道工序层层把控。</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/011.png'); ?>" alt="">
			</div>
			<div class="dietaryPic" data-value="0">
				<ul>
					<li class="dtPic active" data-value="0">
						<img src="<?php echo static_file('project/img/012.jpg'); ?>" alt="">
					</li>
					<li class="dtPic" data-value="1">
						<img src="<?php echo static_file('project/img/018.png'); ?>" alt="">
					</li>
					<li class="dtPic" data-value="2">
						<img src="<?php echo static_file('project/img/019.png'); ?>" alt="">
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="consultBtn">
				<a href="javascript:;" onclick="communication();" class="mainBtn">
					<div class="text">免费试吃月子餐</div>
					<div class="hand">
						<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
					</div>
				</a>
			</div>
		</div>
		
		<div class="svPlace">
			<div class="titlePlace">N对1全方位<br/>贵族式管家服务，热情贴心</div>
			<div class="svText">定制妈妈和宝宝月子全程服务</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/013.png'); ?>" alt="">
			</div>
			<div class="consultBtn">
				<a href="javascript:;" onclick="communication();" class="mainBtn">
					<div class="text">咨询服务详情</div>
					<div class="hand">
						<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
					</div>
				</a>
			</div>
		</div>

		<div class="powerPlace">
			<div class="titlePlace">荣誉源于实力专业可信赖</div>
			<div class="powerText">荣获全国星级保健服务机构5星级认证，专业实力有保障。</div>
			<div class="pic">
				<img src="<?php echo static_file('project/img/014.jpg'); ?>" alt="">
			</div>
		</div>
		<div class="brand">
			<div class="brandPlace">
				<div class="bdDetail">
					<div class="brandPic">
						<img src="<?php echo static_file('project/img/015.jpg'); ?>" alt="">
					</div>
					<div class="consultBtn">
						<a href="javascript:;" onclick="communication();" class="mainBtn">
							<div class="text">咨询大家坐月子的经历</div>
							<div class="hand">
								<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="cmPlace">
			<div class="cmModel">
				<div class="cmModelPic">
					<img src="<?php echo static_file('project/img/016.jpg'); ?>" alt="">
				</div>
				<div class="brandBtn">
					<a href="javascript:;" onclick="communication();" class="mainBdBtn">
						<div class="text">立即查看宝妈同款套餐详情及价格</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>

			<div class="cmModel">
				<div class="cmModelPic">
					<img src="<?php echo static_file('project/img/016.jpg'); ?>" alt="">
				</div>
				<div class="brandBtn">
					<a href="javascript:;" onclick="communication();" class="mainBdBtn">
						<div class="text">立即查看宝妈同款套餐详情及价格</div>
						<div class="hand">
							<img src="<?php echo static_file('project/img/hand.png'); ?>" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>
		
		<div class="footer">
			<div class="bottomModel">Hibaby杰爱母婴健康中心</div>
			<div class="bottomModel">——专注月子服务10 年</div>
			<div class="bottomModel">联系电话：0510--85880101</div>
			<div class="bottomModel">滨湖店地址：高浪西路202 号</div>
			<div class="bottomModel">妇幼店地址：中山路177 号梁溪饭店3 号、5 号楼别墅</div>
			<div class="bottomModel">苏ICP08118722 号-1 号</div>
			<div class="bottomModel">无锡杰爱母婴护理服务有限公司</div>
		</div>

		<div class="bottomFloat">
			<div class="bfModel">
				<span class="bfIcon">
					<img src="<?php echo static_file('project/img/tel.png'); ?>" alt="">
				</span>
				<a href="tel:0510--85880101">电话咨询</a>
			</div>
			<div class="bfModel" style="background-color:#fbb03b;">
				<span class="bfIcon">
					<img src="<?php echo static_file('project/img/money.png'); ?>" alt="">
				</span>
				<a href="#">价格咨询</a>
			</div>
			<div class="bfModel">
				<span class="bfIcon">
					<img src="<?php echo static_file('project/img/message.png'); ?>" alt="">
				</span>
				<a href="#">套餐咨询</a>
			</div>
		</div>

	</div>
	<?php
		echo static_file('web/js/project.js');
	?>
<script>
	
</script>
</body>
</html>