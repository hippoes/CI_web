<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 删除的用户
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- end 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">
	
	<!-- 分类搜索 -->
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>

	<!-- 表格操作 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="restore()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe66b;</i> 批量还原</a> 
		</span> 
		<span class="r">共有数据：<strong>88</strong> 条</span> 
	</div>

	<!-- 表格数据 -->
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="90">头像</th>
					<th width="100">用户名</th>
					<th width="40">性别</th>
					<th width="100">关注渠道</th>
					<th width="100">地址</th>
					<th width="130">关注时间</th>
					<th width="130">删除时间</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($del_userlist)) :?>
					<?php foreach($del_userlist as $v):?>	
					<tr class="text-c <?php echo 'tr'.$v['id']; ?>">
						<td><input type="checkbox" value="<?php echo $v['id']; ?>" name=""></td>
						<td><?php echo $v['id']; ?></td>
						<td><img src="<?php echo $v['headimgurl']; ?>" width='50px' height='50px'></td>
						<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','<?php echo site_url('member/show').'?id='.$v['id']; ?>','10001','400')"><?php if(!empty($v['nickname'])) echo $v['nickname']; else echo '符号'; ?></u></td>
						<td><?php if($v['sex']==1){echo '男';}elseif($v['sex']==2){echo '女';}else{echo '未知';} ?></td>
						<td><?php echo lang($v['subscribe_scene']); ?></td>
						<td class="text-l"><?php echo $v['country'].'/'.$v['province'].'/'.$v['city']; ?></td>
						<td><?php echo date('Y-m-d H:i:s',$v['subscribe_time']); ?></td>
						<td><?php echo date('Y-m-d H:i:s',$v['deltime']); ?></td>
						<td class="td-manage">
							<a style="text-decoration:none" href="javascript:;" onClick="member_huanyuan(this,'<?php echo $v['id']; ?>')" title="还原"><i class="Hui-iconfont">&#xe66b;</i></a> 
							<!-- <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $v['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a> -->
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

/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*用户-还原*/
function member_huanyuan(obj,id){
	layer.confirm('确认要还原吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var suburl = "<?php echo site_url('member/restore');?>";
		$.ajax({
            type: 'POST',
            url: suburl,
            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
            success:function(msg){
            	// alert(msg);
               if(msg){
					$(obj).parents("tr").remove();
					layer.msg('已还原!', {icon: 6,time:1000});
				}else{
					layer.msg('还原失败!',{icon:1,time:1500});
				}
       		}
        });
	});
}

/*用户-批量还原*/
function restore(){
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

		layer.confirm('确认要还原吗？',function(index){
			//此处请求后台程序，下方是成功后的前台处理……
			var suburl = "<?php echo site_url('member/restore');?>";
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
						layer.msg('已还原!',{icon:1,time:1000});
	            	}else{
	            		
						layer.msg('还原失败!',{icon:1,time:1500});
	            	}
	       		}
	       });
		});
	}else{
		layer.msg('请选择还原数据',{icon:1,time:1500});
	}
} 

</script> 
</body>
</html>