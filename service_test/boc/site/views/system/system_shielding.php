<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置  
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- end 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">

	<!-- 文本框 -->
	<div>
		<textarea class="textarea" style="width:98%; height:300px; resize:none">她妈|它妈|他妈|你妈|去死|贱人|1090tv|10jil|21世纪中国基金会|2c8|3p|4kkasi|64惨案|64惨剧|64学生运动|64运动|64运动民國|89惨案|89惨剧|89学生运动|89运动|adult|asiangirl|avxiu|av女|awoodong|A片|bbagoori|bbagury|bdsm|binya|bitch|bozy|bunsec|bunsek|byuntae|B样|fa轮|fuck|ＦｕｃΚ|gay|hrichina|jiangzemin|j女|kgirls|kmovie|lihongzhi|MAKELOVE|NND|nude|petish|playbog|playboy|playbozi|pleybog|pleyboy|q奸|realxx|s2x|sex|shit|sorasex|tmb|TMD|tm的|tongxinglian|triangleboy|UltraSurf|unixbox|ustibet|voa</textarea>
	</div>
	<div class="mt-20 text-c">
		<button name="system-base-save" id="system-base-save" class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button>
	</div>
</div>
<!-- end 内容 -->

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<?php
	echo static_file('lib/laypage/1.2/laypage.js');
	echo static_file('js/H-ui.admin.system.js');
?>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>