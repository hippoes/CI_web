<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- end 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">
	
	<!-- 检索表单 -->
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>

	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a href="javascript:;" onclick="admin_add('添加管理员','<?php echo site_url('admin/admin_add'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo $count;?></strong> 条</span> 
	</div>

	<!-- 表格数据 -->
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($admin_list)) :?>
				<?php foreach($admin_list as $v):?>	
				<tr class="text-c <?php echo 'tr'.$v['id']; ?>" >
					<td><input type="checkbox" value="<?php echo $v['id']; ?>" name=""></td>
					<td><?php echo $v['id']; ?></td>
					<td><?php echo $v['username']; ?></td>
					<td><?php echo $v['phone']; ?></td>
					<td><?php echo $v['email']; ?></td>
					<td><?php if($v['group_id']=='1'){echo '超级管理员';}else{echo "管理员";} ?></td>
					<td><?php echo date("Y-m-d H:i:s",$v['addtime'])?></td>
					<td class="td-status"><?php if($v['status']==1){echo '<span class="label label-success radius">已启用</span>';}elseif($v['status']==2){echo '<span class="label label-default radius">已禁用</span>';}?></td>
					<td class="td-manage">
						<a style="text-decoration:none" onClick="<?php if($v['status']==1){echo "admin_stop(this,'".$v['id']."')";}elseif($v['status']==2){echo "admin_start(this,'".$v['id']."')";}?>" href="javascript:;" title="停用"><i class="Hui-iconfont"><?php if($v['status']==1){echo "&#xe631;";}elseif($v['status']==2){echo "&#xe615;";}?></i></a> 
						<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo site_url('admin/admin_edit').'?id='.$v['id']; ?>','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo $v['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				<?php endforeach;?>
			<?php endif;?>
		</tbody>
	</table>
	<!-- 表格数据 -->

</div>
<!-- 内容 -->

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<?php
	echo static_file('lib/laypage/1.2/laypage.js');
	echo static_file('lib/My97DatePicker/WdatePicker.js');
?>

<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-批量删除*/
function datadel(){
	var len = $("table tbody").find('tr').length;
	var ids = ''
	$("table tbody").find('tr').each(function(){
		var id = $(this).find("input:checkbox:checked").val();

		if( id !== undefined){
			ids = ids+id+',';
		}
	})
	if(ids !== ''){
		ids = ids.substring(0,ids.length-1);

		layer.confirm('确认要删除吗？',function(index){
			//此处请求后台程序，下方是成功后的前台处理……
			var suburl = "<?php echo site_url('admin/admin_del');?>";
			$.ajax({
	            type: 'POST',
	            url: suburl,
	            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+ids,
	            success:function(msg){
	            	if(msg == '1'){
	            		var	id = ids.split(',');
	            		for(var i=0;i<id.length;i++){
		            		$("table tbody").find('.tr'+id[i]).remove();
	            		}
						layer.msg('已删除!',{icon:1,time:1000});
	            	}else{
	            		
						layer.msg('删除失败，请将管理员禁用后删除！',{icon:1,time:1500});
	            	}
	       		}
	       });
		});
	}else{
		layer.msg('请选择删除数据',{icon:1,time:1500});
	}
} 
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('admin/admin_del');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
            success:function(msg){
               if(msg == 1){
	               	$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else {
					layer.msg('删除失败，请将管理员禁用后删除！',{icon:1,time:1500});
				}
       		}
       });

	});
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('admin/change_status');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id+"&status=2",
            success:function(msg){
               if(msg){
	               	$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
				}else{
					layer.msg('停用失败！',{icon:1,time:1500});
				}
       		}
       });
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		//
		var suburl = "<?php echo site_url('admin/change_status');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id+"&status=1",
            success:function(msg){
               if(msg){
	               	$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!', {icon: 6,time:1000});
				}else{
					layer.msg('启用失败！',{icon:1,time:1500});
				}
       		}
       });
		
	});
}
</script>
</body>
</html>