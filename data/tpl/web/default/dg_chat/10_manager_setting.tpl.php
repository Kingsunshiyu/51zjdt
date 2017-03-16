<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.modal-body{padding:10px;}
</style>
<div class="main">
<div class="panel-heading">	
  <div class="row-fluid">
	<div class="span8 control-group">
		<a class="btn btn-primary add_manager" href="javascript:">
			<i class="fa fa-plus"></i>添加管理员</a>
		</div>
	</div>
</div>
<div class="alert alert-info">
		【温馨提示】：只有管理员才可以创建直播间！
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
					<th style="width:65px;" align="center">头像</th>
					<th>昵称</th>
					<th>添加时间</th>
					<th style="width:170px;" align="center">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($records)) { foreach($records as $row) { ?>
				<tr>
					<td><img alt="" src="<?php  echo $row['avatar'];?>" width='auto' style="max-width:50px; max-height:50px;" height='auto'></td>
					<td><?php  echo $row['nickname'];?></td>
					<td><?php  echo date('Y/m/d H:i:s', $row['create_time']);?></td>
					<td data="<?php  echo $row['id'];?>">
					 <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="javascript:" onclick="return del(this)" title="删除"><i class="fa fa-times"></i></a>
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
						<h4>添加管理员</h4>
					</div>
					<div class="modal-body">
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword" value="" id="keyword" placeholder="请输入粉丝昵称/姓名">
                                                <span class="input-group-btn"><button type="button" class="btn btn-default" onclick="search_members();">搜索</button></span>
                                            </div>
                                        </div>
                                        <div id="module-menus" style="padding-top:5px;"><div style="max-height:500px;overflow:auto;min-width:750px;">
			<table class="table table-hover" style="min-width:750px;">
				<tbody id="search_list">  
				</tbody>
			</table>
				    </div></div>
				 </div>
					
				</form>
			</div>
		</div>
</div>
	
<script type="text/javascript">
function getRows(data){
	var html='';
	for(i=0;i<data.length;i++){
		html+='<tr>';
		html+='<td><img src="'+data[i].avatar+'" style="width:30px;height:30px;padding1px;border:1px solid #ccc"> '+data[i].nickname+'</td>';
		html+='<td></td>';
		html+='<td></td>';
		html+='<td style="width:80px;"><a href="javascript:;" onclick="select_member('+data[i].id+')">选择</a></td>';
	    html+='</tr>';
	}
	return html;
}
function search_members(){
	var keyword=$("#keyword").val();
	$("#search_list").empty();
	
	$.post(location.href,{keyword:keyword},function(result){
		var html=getRows(result.data);
		$("#search_list").append(html);
	});
}

function select_member(uid){
   $.post(location.href,{uid:uid},function(result){
	  location.href=location.href; 
   });	
}

function del(obj){
	var conf=confirm("确认删除吗？");
	var duid=$(obj).parents('td').attr('data');
	$.post(location.href,{del:true,duid:duid},function(result){
		  location.href=location.href; 
	   });
}
$(function(){
	$(".add_manager").click(function(){
		$('#module-info').modal('show');
	});
});

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>