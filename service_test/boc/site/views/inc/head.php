<?php
	$sysheader = get_title();
	if(empty($header['title'])){
		$header['title'] = $sysheader['web_name'];
	}elseif(empty($header['tags'])){
		$header['tags'] = $sysheader['web_keyword'];
	}elseif(empty($header['intro'])){
		$header['intro'] = $sysheader['web_description'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="zh-CN" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />

	<meta name="keywords" content="<?php if (!empty($header['tags'])) echo $header['tags'] ?>" />
	<meta name="description" content="<?php if (!empty($header['intro'])) echo $header['intro'] ?>" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />

	<title><?php if (!empty($header['title'])) echo $header['title'] ?></title>
	<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
	<LINK rel="Bookmark" href="<?php echo GLOBAL_URL ?>favicon.ico" >
	<LINK rel="Shortcut Icon" href="<?php echo GLOBAL_URL ?>favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="lib/html5.js"></script>`
	<script type="text/javascript" src="lib/respond.min.js"></script>
	<script type="text/javascript" src="lib/PIE_IE678.js"></script>
	<![endif]-->
	<?php
		echo static_file('css/H-ui.min.css');
		echo static_file('css/H-ui.admin.css');
		echo static_file('css/style.css');
		echo static_file('lib/Hui-iconfont/1.0.1/iconfont.css');

	?>
	<!--[if IE 6]>
	<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<script>
		var STATIC_URL = "<?php echo STATIC_URL ?>";
		var GLOBAL_URL = "<?php echo GLOBAL_URL ?>";
		var UPLOAD_URL = "<?php echo UPLOAD_URL ?>";
		var SITE_URL   = "<?php echo site_url() ?>";
	</script>


