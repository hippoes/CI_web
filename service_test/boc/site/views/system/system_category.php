<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 栏目管理 
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- end 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20 text-c">

	<!-- 检索 -->
	<div class="text-c">
		<input type="text" name="" id="" placeholder="栏目名称、id" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>

	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a class="btn btn-primary radius" onclick="system_category_add('添加资讯','<?php echo site_url('system/category_add'); ?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a>
		</span> 
		<span class="r">共有数据：<strong>54</strong> 条</span> 
	</div>

	<!-- 表格数据 -->
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">排序</th>
					<th>栏目名称</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>1</td>
					<td>1</td>
					<td class="text-l">一级栏目</td>
					<td class="f-14">
						<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','<?php echo site_url('system/category_add'); ?>','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a title="删除" href="javascript:;" onclick="article_category_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>2</td>
					<td>2</td>
					<td class="text-l">&nbsp;&nbsp;├&nbsp;二级栏目</td>
					<td class="f-14">
						<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','<?php echo site_url('system/category_add'); ?>','2','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a title="删除" href="javascript:;" onclick="article_category_del(this,'2')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>3</td>
					<td>3</td>
					<td class="text-l">&nbsp;&nbsp;├&nbsp;二级栏目</td>
					<td class="f-14">
						<a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','<?php echo site_url('system/category_add'); ?>','3','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a title="删除" href="javascript:;" onclick="system-category_del(this,'3')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- 表格数据 -->
</div>
<!-- end 内容 -->

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<?php
	echo static_file('lib/laypage/1.2/laypage.js');
	echo static_file('lib/My97DatePicker/WdatePicker.js');
	echo static_file('lib/datatables/1.10.0/jquery.dataTables.min.js');
?>

<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
	]
});
/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script>
</body>
</html>