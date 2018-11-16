<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=mfcUG5KnImyU6dUg0CRR9rZeLO9ijvXF"></script>
	<script>
		
	</script>
</head>
<body>
	<!-- project -->
	<div class="project">
	<!-- header -->
		<?php include_once VIEWS.'inc/Project_header.php'; ?>
	<!-- end header -->
	
	<!-- content -->
		<div class="about">
			<div class="nutrition">
				<div class="w1400">
					<div class="now f-cb">
		             	<a href="" style="color: #cb8441;">关于Hibaby</a>
		            </div>

		            <!-- 品牌介绍 -->
		            <div class="wel-title">
						<h2>Introduction</h2>
						<i></i>
						<p>品牌介绍</p>
					</div>
					<div class="service-font">
						<p><?php if (!empty($about_introduce['content'])) echo $about_introduce['content'] ?></p>
					</div>
					
					<!-- Hibaby 家族 -->
		    		<div class="ab-city ab">
		    			<div class="wel-title">
							<h2>Hibaby Family</h2>
							<i></i>
							<p>Hibaby 家族</p>
						</div>
					    <div class="city-box">
					    	<ul class="f-cb">
		                        <?php
		                        if (!empty($plan_list)):
		                            foreach ($plan_list as $v):
		                        ?>
					    		<li>
					    			<a href="<?php if(!empty($v['field1'])) echo $v['field1']; else echo "javascript:void(0);"; ?>" target="_blank">
						    			<p class="pic">
						    				<img src="<?php if (!empty($v['photo'])) echo UPLOAD_URL.tag_photo($v['photo']) ?>" alt="<?php echo get_pic_alt($v['photo']) ?>">
						    				<span class="bg"></span>
						    			</p>
						    			<span class="con">
						    				<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
						    				<i></i>
						    				<div class="font"><?php if (!empty($v['content'])) echo $v['content'] ?></div>
						    			</span>
					    			</a>
					    		</li>
		                        <?php
		                            endforeach;
		                        endif;
		                        ?>
		                        <?php if ($plan_count>6): ?>
					    		<li class="read-ajax">
					    			<p class="pic">
					    				<img src="<?php echo static_file('web/img/wel52.jpg'); ?> " alt="">
					    				<span class="bg"></span>
					    			</p>
					    			<span class="con">
					    				<p class="add"></p>
					    				<p class="more">Read MORE</p>
					    			</span>
					    		</li>
		                        <?php endif; ?>
					    	</ul>
					    </div>
		    		</div>

					<!-- 企业文化 -->
			    	<div class="ab-culture">
			    		<div class="wel-title">
					    	<h2>Culture</h2>
					    	<i></i>
					    	<p>品牌文化</p>
					    </div>
					    <div class="w1125 ab-culture-top f-cb">
					    	<div class="fl box">
					    		<h2><?php if (!empty($culture[0]['title'])) echo $culture[0]['title']  ?></h2>
					    		<i></i>
			                    <?php
			                    if (count($culture[0]['arr'])<=1):
			                    ?>
					    		<p><?php if (isset($culture[0]['arr'][0])) echo $culture[0]['arr'][0] ?></p>
			                    <?php else: ?>
			                        <div class="box-h">
			                            <div class="culturn-center-list">
			                                <ul class="swiper-wrapper">
			                                    <?php foreach ($culture[0]['arr'] as $v): ?>
			                                    <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
			                                    <?php endforeach; ?>
			                                </ul>
			                                <div class="swiper-pagination"></div>
			                            </div>
			                        </div>
			                    <?php endif; ?>
					    	</div>
					    	<div class="fr box">
					    		<h2><?php if (!empty($culture[2]['title'])) echo $culture[2]['title']  ?></h2>
					    		<i></i>
			                    <?php
			                    if (count($culture[2]['arr'])<=1):
			                    ?>
			                    <p><?php if (isset($culture[2]['arr'][0])) echo $culture[2]['arr'][0] ?></p>
			                    <?php else: ?>
			                        <div class="box-h">
			                            <div class="culturn-center-list">
			                                <ul class="swiper-wrapper">
			                                    <?php foreach ($culture[2]['arr'] as $v): ?>
			                                        <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
			                                    <?php endforeach; ?>
			                                </ul>
			                                <div class="swiper-pagination"></div>
			                            </div>
			                        </div>
			                    <?php endif; ?>
					    	</div>
					    	<div class="fl culturn-center">
					    		<h2><?php if (!empty($culture[1]['title'])) echo $culture[1]['title']  ?></h2>
					    		<i></i>
			                    <?php
			                    if (count($culture[1]['arr'])<=1):
			                    ?>
			                    <p><?php if (isset($culture[1]['arr'][0])) echo $culture[1]['arr'][0] ?></p>
			                    <?php else: ?>
			                        <div class="box-h">
			                            <div class="culturn-center-list">
			                                <ul class="swiper-wrapper">
			                                    <?php foreach ($culture[1]['arr'] as $v): ?>
			                                        <li class="swiper-slide"><?php if (!empty($v)) echo $v ?></li>
			                                    <?php endforeach; ?>
			                                </ul>
			                                <div class="swiper-pagination"></div>
			                            </div>
			                        </div>
			                    <?php endif; ?>
					    	</div>
					    </div>
			    	</div>

					<!-- 蜜月简介 -->
					<div class="wel-title">
						<h2>About Hibaby</h2>
						<i></i>
						<p>蜜月简介</p>
					</div>
					<div class="miyue-font">
						<p><?php if (!empty($miyue_introduce['content'])) echo $miyue_introduce['content'] ?></p>
						<div class="pic">
						    <img src="<?php if (!empty($miyue_introduce['photo'])) echo UPLOAD_URL.tag_photo($miyue_introduce['photo']) ?>" alt="<?php echo get_pic_alt($miyue_introduce['photo']) ?>">
						</div>
						<p><?php if (!empty($miyue_pics['content'])) echo $miyue_pics['content'] ?></p>
					</div>
					<div class="miyue-list">
						<ul>
							<?php
	                        if (!empty($miyue_pics['pics'])):
	                            foreach ($miyue_pics['pics'] as $k=>$v):
	                        ?>
							<li>
								<img src="<?php if (!empty($v)) echo UPLOAD_URL.tag_photo($v) ?>" alt="<?php echo get_pic_alt($v) ?>">
							</li>
							<?php
	                            endforeach;
	                        endif;
	                        ?>
						</ul>
					</div>

					<!-- 活动资讯 -->
					<?php
					if (!empty($news_array)):
					?>
					<div class="news">
						<div class="wel-title">
							<h2>Event nformation</h2>
							<i></i>
							<p>活动资讯</p>
						</div>
						<div class="news-list">
			                <ul class="swiper-wrapper slides">
			                    <?php
			                    if (!empty($news_array)):
			                        foreach ($news_array as $k => $v):
			                            if($k>=1){
			                                $class="ico0".($k+1+1);
			                            }else{
			                                $class="ico0".($k+1);
			                            }   
			                    ?>
			                    <li class="swiper-slide <?php if($k==0){ echo 'cur';}elseif($k==3){ echo 'last';} ?>" data-type="<?php echo $v['id']; ?>">

			                        <a href="javascript:;" onclick="ajax_page(<?php echo $v['id']; ?>);" page-data="<?php if(!empty($page)){ echo $page; }?>">
			                        <!-- <a href="<?php echo site_url('news/index/'.$v['id']); ?> "> -->
			                            <span class="<?php echo $class ?>"><?php if (!empty($v['title'])) echo $v['title'] ?></span>
			                        </a>
			                    </li>
			                    <?php
			                        endforeach;
			                    endif;
			                    ?>
			                </ul>
			            </div>
			            <div class="news-box-list">
			                <?php
			                if (empty($list)):
			                    echo "<div class='no_info' align='center'>暂无信息！</div>";
			                else:
			                ?>
			                <ul class="f-cb">
			                    <?php foreach ($list as $v): ?>
			                        <li>
			                            <a href="<?php echo site_url('news/info/'.$v['id']); ?> " target="_blank">
			                                <h2 class="fl"><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
			                                <span class="fr"><?php echo date("Y-m-d",$v['timeline']) ?></span>
			                            </a>
			                        </li>
			                    <?php endforeach; ?>
			                </ul>
			                <?php
			                endif;
			                ?>
			            </div>
			            <?php if(!empty($pages)): ?>
			    		<!-- <div class="page on" page-data="<?php echo $page;?>">
			                <?php echo $pages ?>
			    		</div> -->
			    		
			            <?php endif; ?>
		            </div>
		            <?php endif;?>
					
					<div class="page on">
						<div class="pageination Mpage2"></div>
						<div class="pageination Mpage3"></div>
						<div class="pageination Mpage4"></div>
						<div class="pageination Mpage5"></div>
					</div>

					<!-- 联系我们 -->
					<div class="wel-title">
						<h2>Contact us</h2>
						<i></i>
						<p>联系我们</p>
					</div>
					<div class="contact_us">
						<div class="map_us" id='map_us'></div>
						<div class="other_us">
							<ul>
								<?php
		                        if (!empty($other_us)):
		                            foreach ($other_us as $v):
		                        ?>
								<li>
									<div class="pic">
										<img src="<?php if (!empty($v['icon'])) echo UPLOAD_URL.tag_photo($v['icon']) ?>" alt="<?php echo get_pic_alt($v['icon']) ?>">
									</div>
									<div class="con">
										<h2><?php if (!empty($v['title'])) echo $v['title'] ?></h2>
										<span><?php if (!empty($v['outline'])) echo $v['outline'] ?></span>
									</div>
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
		<div class="footer">
			<?php include_once VIEWS.'inc/footer.php'; ?>
		</div>
	</div>
	<!-- end project -->
	<?php
	    echo static_file('new_web/js/myjs.js');
	    echo static_file('new_web/js/jquery.pagination.js');
	    echo static_file('new_web/css/pagination.css');
	    echo static_file('new_web/css/projectmobile.css');
		echo static_file('swiper/swiper.min.js');
	    echo static_file('swiper/swiper.css');
	?>
	<!-- 百度地图 -->
	<script type="text/javascript">
	    //创建和初始化地图函数：
	    function initMap(){
	        createMap();//创建地图
	        setMapEvent();//设置地图事件
	        addMapControl();//向地图添加控件
	    }
	    
	    //创建地图函数：
	    function createMap(){
	        var map = new BMap.Map("map_us");//在百度地图容器中创建一个地图
	        var point = new BMap.Point(<?php if(!empty($map_setting['field1'])){ echo trim($map_setting['field1']); } else{ echo "115.941882,28.719096"; } ?>);//定义一个中心点坐标
	        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
			//设置弹出框
			var marker = new BMap.Marker(point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
	 		<?php
	 		if(!empty($map_setting)){
	 		?>
	 		var sContent =
				"<h4 style='margin:0 0 5px 0;padding:0.2em 0'><?php if(!empty($map_setting['title'])){ echo $map_setting['title']; } ?></h4>" + 
				"<img style='float:right;margin:4px' id='imgDemo' src='<?php if(!empty($map_setting['photo'])){ echo UPLOAD_URL.tag_photo($map_setting['photo']); } ?>' width='139' height='104' title='<?php if(!empty($map_setting['title'])){ echo $map_setting['title']; } ?>'/>" + 
				"<p style='margin:0;line-height:1.5;font-size:13px;'><?php if(!empty($map_setting['outline'])){ echo $map_setting['outline']; } ?></p>" + 
				"</div>";
	 		<?php
	 		}else{
	 		?>
		 		var sContent =
				"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>江西蜜月母婴护理中心</h4>" + 
				"<img style='float:right;margin:4px' id='imgDemo' src='http://www.qdhibaby.com/upload/2017/10/23/15087608771212p1pdp.jpg' width='139' height='104' title='江西蜜月母婴护理中心'/>" + 
				"<p style='margin:0;line-height:1.5;font-size:13px;'>地址：南昌市青山湖区湖滨东路2222号(青山湖万科)</p>" + 
				"</div>";
	 		<?php	
	 		}
	 		?>

			var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象 
			map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口
			marker.addEventListener("click", function(){          
			   this.openInfoWindow(infoWindow);
			   //图片加载完毕重绘infowindow
			   document.getElementById('imgDemo').onload = function (){
				   infoWindow.redraw();   //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
			   }
			});
	        window.map = map;//将map变量存储在全局
			}
	    
	    //地图事件设置函数：
	    function setMapEvent(){
	        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
	        //map.enableScrollWheelZoom();//启用地图滚轮放大缩小
	        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
	        map.enableKeyboard();//启用键盘上下左右键移动地图
	        
	    }
	    
	    //地图控件添加函数：
	    function addMapControl(){
	        //向地图中添加缩放控件
		var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
		map.addControl(ctrl_nav);
	       
	        //向地图中添加比例尺控件
		var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
		map.addControl(ctrl_sca);
	    }
	    //鼠标单击事件函数
	    function showInfo(e){
			// window.location.href="http://www.baidu.com";
		}
		
	    initMap();//创建和初始化地图
		//鼠标单击事件
		map.addEventListener("click", showInfo);
		
		
	</script>
	<!-- end 百度地图 -->

<script>
	$(function(){
		var $totalData = <?php if(!empty($count)){ echo $count; }?>;
		var $showData = <?php if(!empty($limit)){ echo $limit; }?>;
		var $page = <?php if(!empty($page)){ echo $page; }?>;

		get_page(".Mpage2",$totalData,$showData,$page);

		




		// 家族展示
        var len = $('.city-box li').size();
	    $('.city-box li').each(function(){
			var index = $(this).index();
			if (index % 4 == 2) {
				$(this).addClass("on");
			}
			if (index % 4 == 3) {
				$(this).addClass("cur");
			}
			if (index % 2 == 1){
				$(this).addClass("int");
			}
			if (len - index == 2) {
				$(this).addClass("append");
			}else{
				$(this).removeClass("append");
			}
		});

        // 品牌文化
        var swiper = new Swiper('.culturn-center-list', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        direction: 'vertical',
	        slidesPerView:4,
	        speed:800,
	        autoplay:13000,
	        loop:true,
	        slidesPerGroup:4,
	        autoplayDisableOnInteraction:false,
	    });

        // 活动资讯
		var swiper1 = new Swiper('.news-list', {
	        slidesPerView: 4,
	        paginationClickable: true,
	        spaceBetween:35,
	        nextButton: '.next1',
	        prevButton: '.prev1',
	        loop:true,
	        breakpoints:{
	        	767:{
	        		slidesPerView:2,
					spaceBetween:25,
					onSlideChangeEnd:function(){
				      	$(".news-list ul").hover(function(){
					    	$(this).find(".swiper-slide-active").next().find("a").css("border-radius","0 35px 35px 0");
					    },function(){
					    	$(this).find(".swiper-slide-active").find("a").css("border-radius","35px 0 0 35px");
					    });
				    }
	        	},
	        	375:{
	        		slidesPerView:1,
					spaceBetween:25,
	        	}
	        },
	        onSlideChangeEnd:function(){
		      	$(".news-list ul").hover(function(){
			    	$(this).find(".swiper-slide-active").next().next().next().find("a").css("border-radius","0 35px 35px 0");
			    },function(){
			    	$(this).find(".swiper-slide-active").find("a").css("border-radius","35px 0 0 35px");
			    	$(this).find(".swiper-slide-active").next().find("a").css("border-radius","0");
			    	$(this).find(".swiper-slide-active").next().next().find("a").css("border-radius","0");
			    });
		    }
	    });
		
		// 点击切换资讯列表
		$(".news-list ul li").click(function(){
			$(".news-list ul li").removeClass("cur");
			var len = $(".news-list ul li").length;
			var type = $(this).attr("data-type");
			for(var i=0;i<len;i++){
				if($(".news-list ul li").eq(i).attr("data-type")==type){
					$(".news-list ul li").eq(i).addClass("cur");
				}	
			}
			// alert(type);
		});
	    $(".news-list").hover(function(){
	    	$(this).find(".swiper-slide-active").next().next().next().find("a").css("border-radius","0 35px 35px 0");
	    },function(){

	    });
})

// 分页事件
function get_page($dom,$totalData,$showData,$page){
	$($dom).pagination({
		totalData: $totalData,
		showData: $showData,
		current: $page,
		count:2,
	    jump: true,
	    isHide: false,
	    prevContent: '上一页',
	    nextContent: '下一页',
	    callback: function (api) {
	    	var ajax_url = "<?php echo site_url_ajax('about/newsinfos'); ?>"; // ajax
	        var page = api.getCurrent(); // 当前页面值
	        var type = $(".news-list ul").find(".cur").attr("data-type"); // 列表类型
	        $.ajax({
                url: ajax_url,
                cache: false,
                data: {type:type,page:page},
                dataType: 'html',
                success: function (html) {
                  	var data = JSON.parse(html);
                  	var list = data.list;
                  	var len = list.length;
                  	var newhtml = '';
					
                  	for(var i=0;i<len;i++){
                  		var url = "<?php echo site_url('news/info'); ?>";
                  		url = url.replace('.html','/'+list[i]['id']+'.html');
						var timer = timestampToTime(list[i]['timeline']);
						
                  		newhtml += '<li><a href="'+url+'"><h2 class=\"fl\">'+list[i]['title']+'</h2><span class=\"fr\">'+timer+'</span></a></li>';
                  	}
                  	if(newhtml !== ''){
                  		$(".news-box-list ul").empty().append(newhtml);
                  		$(".news-list ul").find(".cur").find("a").attr("page-data",page);
                  	}else{
                  		newhtml = "<div class='no_info' align='center'>暂无信息！</div>";
                  		$(".news-box-list ul").empty().append(newhtml);
                  	}
                }
            });
	    }
	}); 
}

// 活动资讯列表内容切换
function ajax_page(type){
	var ajax_url = "<?php echo site_url_ajax('about/newsinfos'); ?>";
	//var page = $(".news-list ul").find(".cur").find("a").attr("page-data"); // 类型的存放当前页数
	var length = $(".news-list ul li").length;
	for(var i=0;i<length;i++){
		if($(".news-list ul li").eq(i).attr("data-type") == type){
			var page = $(".news-list ul li").eq(i).find("a").attr("page-data");
		}
	}
	// alert(page);
	$.ajax({
        url: ajax_url,
        cache: false,
        data: {type:type,page:page},
        dataType: 'html',
        success: function (html) {
          	var data = JSON.parse(html);
          	// var pages = data.pages;
          	// var page = data.page;
          	// var maxpage = data.maxpage;
          	var list = data.list;
          	var len = list.length;

          	var count = data.count;
          	var limit = data.limit;
          	var page = data.page;

          	var newhtml = '';
			// $(".news-list").attr("page-data",page);
			// $(".news-list").attr("maxpage-data",maxpage);
			
          	for(var i=0;i<len;i++){
          		var url = "<?php echo site_url('news/info'); ?>";
          		url = url.replace('.html','/'+list[i]['id']+'.html');
				
				var timer = timestampToTime(list[i]['timeline']);
				
          		newhtml += '<li><a href="'+url+'"><h2 class=\"fl\">'+list[i]['title']+'</h2><span class=\"fr\">'+timer+'</span></a></li>';
          	}
          	// alert(count);
          	if(newhtml !== ''){
          		$(".news-box-list ul").empty().append(newhtml);
          		var $dom = $(".Mpage"+type);
          		var $totalData = count;
          		var $showData = limit;
          		var $page = page;
          		$(".Mpage2").css("display","none");
          		$(".Mpage3").css("display","none");
          		$(".Mpage4").css("display","none");
          		$(".Mpage5").css("display","none");
          		get_page($dom,$totalData,$showData,$page);
          		$(".page").css("display","block");
          	}else{
          		newhtml = "<div class='no_info' align='center'>暂无信息！</div>";
          		$(".news-box-list ul").empty().append(newhtml);
          		$(".page").css("display","none");
          	}
        }
    });

	return false;
}

// 时间戳转换
function timestampToTime(timestamp) {
	var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
	Y = date.getFullYear() + '-';
	M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
	D = date.getDate() + ' ';
	h = date.getHours() + ':';
	m = date.getMinutes() + ':';
	s = date.getSeconds();
	return Y+M+D;
}
</script>
</body>
</html>