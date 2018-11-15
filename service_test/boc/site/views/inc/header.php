<!-- 头部结构 -->
<header class="Hui-header cl"> 
	<a class="Hui-logo l" title="H-ui.admin v2.3" href="<?php echo site_url('welcome'); ?>">H-ui.admin</a> 
	<a class="Hui-logo-m l" href="/" title="H-ui.admin">H-ui</a> 
	<span class="Hui-subtitle l">V2.3</span>
	<nav class="mainnav cl" id="Hui-nav">
		<ul>
			<li class="dropDown dropDown_click"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
				<ul class="dropDown-menu radius box-shadow">
					<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
					<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
					<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
					<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<ul class="Hui-userbar">
		<li>超级管理员</li>
		<li class="dropDown dropDown_hover">
			<a href="#" class="dropDown_A"><?php if(!empty($username)){echo $username;}else{echo 'admin';}?><i class="Hui-iconfont">&#xe6d5;</i></a>
			<ul class="dropDown-menu radius box-shadow">
				<li><a href="#">个人信息</a></li>
				<li><a href="#">切换账户</a></li>
				<li><a href="<?php echo site_url('login/login_out');?>">退出</a></li>
			</ul>
		</li>
		<li id="Hui-msg"> 
			<a href="#" title="消息">
				<span class="badge badge-danger">1</span>
				<i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i>
			</a> 
		</li>
		<li id="Hui-skin" class="dropDown right dropDown_hover">
			<a href="javascript:;" title="换肤">
				<i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i>
			</a>
			<ul class="dropDown-menu radius box-shadow">
				<li>
					<a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a>
				</li>
				<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
				<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
				<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
				<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
				<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
			</ul>
		</li>
	</ul>
	<a aria-hidden="false" class="Hui-nav-toggle" href="#"></a> 
</header>
<!-- end 头部结构 -->

<!-- 左侧结构 -->
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<!--<dl id="menu-article">
			<dt>
				<i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('article'); ?>" href="javascript:void(0)">资讯管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt>
				<i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('picture/index'); ?>" href="javascript:void(0)">图片管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt>
				<i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('product/index'); ?>" href="javascript:void(0)">品牌管理</a></li>
					<li><a _href="<?php echo site_url('product/category'); ?>" href="javascript:void(0)">分类管理</a></li>
					<li><a _href="<?php echo site_url('product/product_list'); ?>" href="javascript:void(0)">产品管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-page">
			<dt><i class="Hui-iconfont">&#xe626;</i> 页面管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="page-home.html" href="javascript:void(0)">首页管理</a></li>
					<li><a _href="page-flinks.html" href="javascript:void(0)">友情链接</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt>
				<i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="http://h-ui.duoshuo.com/admin/" href="javascript:;">评论列表</a></li>
					<li><a _href="feedback-list.html" href="javascript:void(0)">意见反馈</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-order">
			<dt><i class="Hui-iconfont">&#xe63a;</i> 财务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="order-list.html" href="javascript:void(0)">订单列表</a></li>
					<li><a _href="recharge-list.html" href="javascript:void(0)">充值管理</a></li>
					<li><a _href="invoice-list.html" href="javascript:void(0)">发票管理</a></li>
				</ul>
			</dd>
		</dl>-->
		<dl id="menu-member">
			<dt>
				<i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('member'); ?>" href="javascript:;">会员列表</a></li>
					<li><a _href="<?php echo site_url('member/del'); ?>" href="javascript:;">删除的会员</a></li>
					<!-- <li><a _href="member-level.html" href="javascript:;">等级管理</a></li> -->
					<!-- <li><a _href="member-scoreoperation.html" href="javascript:;">积分管理</a></li> -->
					<li><a _href="<?php echo site_url('member/browse'); ?>" href="javascript:void(0)">浏览记录</a></li>
					<!-- <li><a _href="member-record-download.html" href="javascript:void(0)">下载记录</a></li> -->
					<!-- <li><a _href="member-record-share.html" href="javascript:void(0)">分享记录</a></li> -->
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt>
				<i class="Hui-iconfont">&#xe622;</i> 消息模板<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('template'); ?>" href="javascript:void(0)">模板列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt>
				<i class="Hui-iconfont">&#xe616;</i> 消息管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('record/pending'); ?>" href="javascript:void(0)">待发送列表</a></li>
					<li><a _href="<?php echo site_url('record/history'); ?>" href="javascript:void(0)">已发送列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt>
				<i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<!-- <li><a _href="<?php echo site_url('admin/index'); ?>" href="javascript:void(0)">角色管理</a></li> -->
					<!-- <li><a _href="<?php echo site_url('admin/permission'); ?>" href="javascript:void(0)">权限管理</a></li> -->
					<li><a _href="<?php echo site_url('admin/admin_list'); ?>" href="javascript:void(0)">管理员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-tongji">
			<dt>
				<i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="charts-1.html" href="javascript:void(0)">折线图</a></li>
					<li><a _href="charts-2.html" href="javascript:void(0)">时间轴折线图</a></li>
					<li><a _href="charts-3.html" href="javascript:void(0)">区域图</a></li>
					<li><a _href="charts-4.html" href="javascript:void(0)">柱状图</a></li>
					<li><a _href="charts-5.html" href="javascript:void(0)">饼状图</a></li>
					<li><a _href="charts-6.html" href="javascript:void(0)">3D柱状图</a></li>
					<li><a _href="charts-7.html" href="javascript:void(0)">3D饼状图</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt>
				<i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
			</dt>
			<dd>
				<ul>
					<li><a _href="<?php echo site_url('system/index'); ?>" href="javascript:void(0)">系统设置</a></li>
					<li><a _href="<?php echo site_url('system/category'); ?>" href="javascript:void(0)">栏目管理</a></li>
					<li><a _href="<?php echo site_url('system/data'); ?>" href="javascript:void(0)">数据字典</a></li>
					<li><a _href="<?php echo site_url('system/shielding'); ?>" href="javascript:void(0)">屏蔽词</a></li>
					<li><a _href="<?php echo site_url('system/log'); ?>" href="javascript:void(0)">系统日志</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>

<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!-- end 左侧结构