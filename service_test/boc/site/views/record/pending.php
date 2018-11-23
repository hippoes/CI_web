<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 消息管理 <span class="c-gray en">&gt;</span> 待发送消息列表 
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
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、id、模板标题" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜消息</button>
	</div>-->

	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a href="javascript:;" onclick="message_add('添加列表','<?php echo site_url('record/add');?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加列表</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo $count;?></strong> 条</span>
	</div>

	<!-- 表格数据 -->
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="50">ID</th>
					<th width="90">模板标题</th>
					<th width="150">用户列表</th>
					<th width="60">用户数量</th>
					<th width="150">添加时间</th>
					<th width="70">状态</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($message)) :?>
					<?php foreach($message as $v):?>	
					<tr class="text-c <?php echo 'tr'.$v['id']; ?>">
						<td><input type="checkbox" value="<?php if(!empty($v['id'])){ echo $v['id'];} ?>" name=""></td>
						<td><?php if(!empty($v['id'])){ echo $v['id'];} ?></td>
						<td><u style="cursor:pointer" class="text-primary" onclick="message_show('消息预览','<?php echo site_url('record/show').'?id='.$v['id'].'&template_id='.$v['template_id']; ?>','10001','400')"><?php if(!empty($v['template_title'])){ echo $v['template_title'];}?></u></td>
						<td class="text-l"><?php if(!empty($v['sub_usernames'])){ echo $v['sub_usernames'];}?></td>
						<td class="text-c"><?php if(!empty($v['count_ids'])){ echo $v['count_ids'];}else{echo '0';}?></td>
						<td><?php echo date('Y-m-d H:i:s',$v['addtime']); ?></td>
						<td class="td-status"><span class="label label-default radius">待发送</span></td>
						<td class="td-manage">
							<a style="text-decoration:none" onClick="message_send(this,'<?php echo $v['id']; ?>')" href="javascript:;" title="消息发送"><i class="Hui-iconfont">&#xe603;</i></a>

							<a title="编辑" href="javascript:;" onclick="message_edit('消息编辑','<?php echo site_url('record/edit').'?id='.$v['id'];?>','<?php echo $v['id']; ?>','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							
							<a title="删除" href="javascript:;" onclick="message_del(this,'<?php echo $v['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a> 
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
		  {"orderable":false,"aTargets":[0]}// 制定列不参与排序
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
/*消息-添加*/
function message_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*消息-查看*/
function message_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*消息-发送*/
function message_send(obj,id){
	layer.confirm('确认要发送吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        var suburl = "<?php echo site_url('record/message_send');?>";
        $.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
            success:function(msg){
                // alert(msg);

                if(msg == 'true'){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="已发送"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发送</span>');
                    $(obj).remove();
                    layer.msg('已发送!',{icon: 1,time:1000});
                }else {
                    // layer.msg('发送失败!',{icon: 5,time:1000});
                }
            }
        });




		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="已发送"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发送</span>');
		$(obj).remove();
        layer.msg('已发送!',{icon: 1,time:1000});
        // layer.msg('发送失败!',{icon: 5,time:1000});
	});
}

/*消息-编辑*/
function message_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*消息-删除*/
function message_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('record/pendmessage_del');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
            success:function(msg){
               if(msg == 1){
	               	$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else {
					layer.msg('删除失败，请联系管理员！',{icon:1,time:1500});
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
			var suburl = "<?php echo site_url('record/pendmessage_del');?>";
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
	            		
						layer.msg('删除失败，请联系管理员！',{icon:1,time:1500});
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