<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 消息模板  <span class="c-gray en">&gt;</span> 模板管理
 
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- end 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">

	<!-- 分类搜索 -->
	<!--<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>-->

	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a href="javascript:;" onclick="member_add('添加模板','<?php echo site_url('template/add');?>','','410')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加模板</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo $count;?></strong> 条</span>
	</div>

	<!-- 表格数据 -->
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="60">ID</th>
					<th width="120">标题</th>
					<th width="100">模板id</th>
					<th width="120">行业</th>
					<th width="130">详细内容</th>
					<th width="100">创建时间</th>
					<th width="50">调用次数</th>
					<th width="50">状态</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($template_list)) :?>
					<?php foreach($template_list as $v):?>	
					<tr class="text-c <?php if(!empty($v['id'])){  echo 'tr'.$v['id'];} ?>">
						<td><input type="checkbox" value="<?php if(!empty($v['id'])){  echo $v['id'];} ?>" name=""></td>
						<td><?php if(!empty($v['id'])){ echo $v['id'];} ?></td>
						<td title="<?php if(!empty($v['title'])){ echo $v['title'];} ?>"><?php if(!empty($v['title'])){ echo $v['title'];} ?></td>
						<td title="<?php if(!empty($v['template_id'])){ echo $v['template_id'];} ?>"><?php if(!empty($v['template_id'])){ echo msubstr($v['template_id'],0,10);} ?></td>
						<td><?php if(!empty($v['industry'])){ echo $v['industry'];} ?></td>
						<td class="text-l"><?php if(!empty($v['content'])){ echo $v['content'];} ?></td>
						<td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
						<td><?php if(!empty($v['use_times'])){ echo $v['use_times'];}else{echo '0';} ?></td>
						<td class="td-status"><?php if($v['status']==1){echo '<span class="label label-success radius">已启用</span>';}elseif($v['status']==2){echo '<span class="label label-default radius">已禁用</span>';}?>
						</td>

						<td class="td-manage">							
							<a style="text-decoration:none" onClick="<?php if($v['status']==1){echo "member_stop(this,'".$v['id']."')";}elseif($v['status']==2){echo "member_start(this,'".$v['id']."')";}?>" href="javascript:;" title="停用"><i class="Hui-iconfont"><?php if($v['status']==1){echo "&#xe631;";}elseif($v['status']==2){echo "&#xe615;";}?></i>
							</a> 

							<a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo site_url('template/edit').'?id='.$v['id'];?>','4','','410')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>
							</a>
							<a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $v['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php endif?>
			</tbody>
		</table>
	</div>
	<!-- end 表格数据 -->
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
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('template/change_status');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id+"&status=2",
            success:function(msg){
               if(msg){
	               	$(obj).parents("tr").find(".td-manage").prepend('<a onClick="member_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已停用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
				}else{
					layer.msg('停用失败！',{icon:1,time:1500});
				}
       		}
       });
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('template/change_status');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id+"&status=1",
            success:function(msg){
               if(msg){
	               	$(obj).parents("tr").find(".td-manage").prepend('<a onClick="member_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
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
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('template/member_del');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
            success:function(msg){
            	// alert(msg);
               if(msg == 1){
	               	$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else {
					layer.msg('删除失败，请将模板禁用后删除！',{icon:1,time:1500});
				}
       		}
       });
	});
}

/*用户-批量删除*/
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
			var suburl = "<?php echo site_url('template/member_del');?>";
			$.ajax({
	            type: 'POST',
	            url: suburl,
	            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+ids,
	            success:function(msg){
            	// alert(msg);
	            	if(msg == '1'){
	            		var	id = ids.split(',');
	            		for(var i=0;i<id.length;i++){
		            		$("table tbody").find('.tr'+id[i]).remove();
	            		}
						layer.msg('已删除!',{icon:1,time:1000});
	            	}else{
	            		
						layer.msg('删除失败，请将模板禁用后删除！',{icon:1,time:1500});
	            	}
	       		}
	       });
		});
	}else{
		layer.msg('请选择删除数据',{icon:1,time:1500});
	}
} 

</script> 
</body>
</html>