<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
  white-space:normal;
}
</style>


<ul class="nav nav-tabs">
	<li <?php  if($_GPC['do'] =='' || $_GPC['do'] == 'topic_manage') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('topic_manage')?>">话题管理</a></li></ul>

<div class="main">
<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form  method="get" class="form-horizontal" role="form">				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">话题状态</label>
					<div class="col-sm-6 col-lg-8">
					<input type="hidden" name="c" value="site">
					<input type="hidden" name="a" value="entry">
					<input type="hidden" name="do" value="topic_manage">
					<input type="hidden" name="m" value="dg_chat">
						<select name="topic_status" class="form-control">
							<option value="" selected="selected">不限</option>
							<option value="-1"<?php  if('-1' == $_GPC['topic_status']) { ?> selected="selected"<?php  } ?>>被禁用</option>
							<option value="1"<?php  if('1' == $_GPC['topic_status']) { ?> selected="selected"<?php  } ?>>直播中</option>
							<option value="2"<?php  if('2' == $_GPC['topic_status']) { ?> selected="selected"<?php  } ?>>已结束</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">查询关键词</label>
					<div class="col-sm-6 col-lg-8">
						<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入话题名称或者房间名称或者创建人昵称">
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">	
			<div class="row-fluid">
				<div class="span8 control-group">
					共计 <?php  echo $total;?> 条数据
				</div>
			</div>
		</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th>话题</th>
					<th>话题类型</th>
					<th>主讲人</th>
					<th>直播状态</th>
					<th>评论弹幕</th>
					<th align="center">开始时间</th>
					<th align="center">创建时间</th>
					<th style="width:150px;">快捷操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($records)) { foreach($records as $row) { ?>
				<tr>
					<td><?php  echo $row['topic_name'];?></td>
					<td><?php  if($row['topic_type']=='public') { ?>公开<?php  } else if($row['topic_type']=='ticket') { ?>付费(￥<?php  echo $row['room_paymoney'];?>)<?php  } else { ?>加密(<?php  echo $row['room_password'];?>)<?php  } ?></td>
					<td><?php  echo $row['guest_name'];?></td>
					<td><?php  if($row['topic_status']==-1) { ?>被禁<?php  } else if($row['topic_status']==1) { ?>直播中<?php  } else { ?>已结束<?php  } ?></td>
					
					<td><?php  if($row['is_opendm']==1) { ?>已开启<?php  } else { ?>已关闭<?php  } ?></td>
					<td><?php  echo date('Y/m/d H:i:s', $row['begin_time']);?>
					<td><?php  echo date('Y/m/d H:i:s', $row['create_time']);?>
					<?php  if($row['end_time']>0) { ?>
					~<?php  echo date('Y/m/d H:i:s', $row['end_time']);?>
					<?php  } ?>
					</td>
					<td data="<?php  echo $row['id'];?>">
					 <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWebUrl('topic_add',array('topic_id'=>$row['id']))?>"  title="" data-original-title="编辑"><i class="fa fa-edit"></i></a>
					 <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="javascript:" onclick="return setItemStatus(this,'del')" title="删除"><i class="fa fa-times"></i></a>
					 <?php  if($row['topic_type']=='ticket') { ?>
					 <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWebUrl('topic_pay',array('topic_id'=>$row['id']))?>"  title="付费人员"><i class="fa fa-usd"></i></a>
					 <?php  } else { ?>
					 <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWebUrl('topic_joins',array('topic_id'=>$row['id']))?>"  title="参与人员"><i class="fa fa-signal"></i></a>
					 <?php  } ?>				
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
	</div>
	<?php  echo $pager;?>
</div>


<div class="modal fade" id="module-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width:800px;top:100px;">
			<div class="modal-content">
				<form action="./index.php?c=extension&a=module&do=info&" method="post" enctype="multipart/form-data" class="form-horizontal form" id="form-info">
					<input type="hidden" name="m" value=""/>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4>话题详情</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 话题名</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" name="room_name" id="room_name" value="" class="form-control">
							</div>
						</div>
						
					</div>
					
					<div class="modal-body">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 话题描述</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" name="room_desc" id="room_desc" value="" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="modal-body" id="body_status">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 话题状态</label>
							<div class="col-sm-9 col-xs-12">
								<input type="hidden" name="m_topic_id" id="m_topic_id">
								<select id='m_topic_status' class="form-control">
									<option value="-1">禁用</option>
									<option value="1">直播中</option>
									<option value="2">已结束</option>
								</select>
							</div>
						</div>
					</div>
					
					
					<div class="modal-body">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 虚拟人气</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" name="x_look_numbers" id="x_look_numbers" value="" class="form-control">
							</div>
						</div>
						
					</div>
					
					<div class="modal-body">
					<div class="form-group">
			 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">评论弹幕</label>
			            <div class="col-sm-9 col-xs-6">
							<div class="input-group">
								<label class="radio-inline">
			                	   <input type="radio" name="is_opendm" value="1">开启
				                </label>
				                <label class="radio-inline">
				                	<input type="radio" name="is_opendm" value="0">关闭
				                </label>    
							</div>
			            </div>
			              </div>
				   </div>
				
					
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btn_close" data-dismiss="modal">关闭</button>
						<button type="button" class="btn btn-danger" id="btn_edit" data-dismiss="modal">修改</button>
					</div>
				</form>
				
			</div>
		</div>
</div>
<script type="text/javascript">
function setItemStatus(obj,op){
	var row_id=$(obj).parents('td').attr('data');
	if(op=='del'){
		var conf=confirm("确认删除吗？删除后将不能恢复！");
		if(!conf){
			return false;
		}
		var data={};
		data.topic_id=row_id;
		data.op='del';
		$.post(location.href,data,function(result){
			 location.href=location.href;
		});
	}
	
	if(op=='edit'){
	   $.post(location.href,{id:row_id},function(result){
		   var room=result.data;
		   $("#room_desc").val(room[0].topic_desc);
		   $("#room_name").val(room[0].topic_name);
		   $("#x_look_numbers").val(room[0].x_look_numbers);
		   $("#m_topic_id").val(row_id);
		   if(room[0].topic_status==2){
			   $("#m_topic_status").html("<option value='2'>已结束</option>");
		   }else{
			   $("#m_topic_status").html("<option value='-1'>被禁用</option><option value='1'>直播中</option><option value='2'>已结束</option>");
		   }
		   $("#m_topic_status").val(room[0].topic_status);
		   
		   $("input[name='is_opendm'][value="+room[0].is_opendm+"]").attr("checked",true); 
	   });
	   $('#module-info').modal('show');
	}
	return false;
}

$(function(){
	$("#btn_edit").click(function(){
		var data={};
		data.topic_desc=$("#room_desc").val();
		data.topic_name=$("#room_name").val();
		data.topic_id=$("#m_topic_id").val();
		data.topic_status=$("#m_topic_status").val();
		data.x_look_numbers=$("#x_look_numbers").val();
		data.is_opendm= $('#input[name="is_opendm"]:checked').val();
		data.op="edit";
		$.post(location.href,data,function(result){
			 location.href=location.href;
		});
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>