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
	// echo static_file('bootstrap/css/bootstrap.css');
	// echo static_file('web/css/reset.css');
	// echo static_file('web/css/style.css');
	// echo static_file('web/css/mobile.css');


	// echo static_file('jquery-1.11.3.js');
	// echo static_file('jquery.easing.1.3.js');
	// echo static_file('jquery.transit.js');
	// echo static_file('html5.js');
	// echo static_file('bocfe.js');
	// echo static_file('plug.preload.js');
	
	echo static_file('data/need/laydate.css');
	echo static_file('data/laydate.js');
	
	echo static_file('new_web/css/bootstrap.min.css');
	echo static_file('new_web/css/style.css');
	echo static_file('new_web/css/styles.css');
	echo static_file('new_web/css/mobiles.css');
	
	echo static_file('new_web/js/jquery-2.1.4.min.js');
	echo static_file('new_web/js/bootstrap.min.js');
	echo static_file('new_web/js/hammer.js');
	echo static_file('new_web/js/jquery.hammer.js');
	echo static_file('new_web/js/style.js');
	echo static_file('jquery.transit.js');

	
?>