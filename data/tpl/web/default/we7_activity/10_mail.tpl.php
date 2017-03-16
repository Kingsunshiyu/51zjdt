<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'add') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tip', array( 'op' => 'add','aid'=>$aid));?>">添加</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tip', array( 'op' => 'display','aid'=>$aid));?>">管理</a></li>
	
</ul>
<?php  if($operation == 'add') { ?>
<div class="panel panel-default">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
	
		<h4>活动报名提醒邮件设置</h4>
		
			<div class="form-group">
				<label class="col-sm-1 control-label control-label">邮件地址：</label>
				<div class="col-sm-11">
					<input type="text" name="email" class="form-control" value="<?php  echo $item['email'];?>" />
						
				</div>
			</div>
			
			
			<div class="form-group">
				<label class="col-sm-1 control-label control-label"></label>
				<div class="col-sm-11">
				<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						
				</div>
			</div>
		
		
		
	</form>
</div>
<script type="text/javascript">
<!--
	kindeditor($('.richtext-clone'));
//-->
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main">
	<h4>&nbsp;&nbsp;&nbsp;活动报名提醒邮件设置</h4>
	<div style="padding:15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="min-width:150px;">邮件</th>
					
					
					
					
					<th style="text-align:right; min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
			 <?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['email'];?></td>
				
				
					
					<td style="text-align:right;width:300px">
				
						<a href="<?php  echo $this->createWebUrl('tip', array( 'id' => $item['id'],'op' => 'add'))?>" title="编辑" class="btn btn-small"><i class="glyphicon glyphicon-edit"></i>修改</a>
						<a href="<?php  echo $this->createWebUrl('tip', array( 'id' => $item['id'],'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-small"><i class="glyphicon glyphicon-remove"></i>删除</a>
					</td>
				</tr>
				<?php  } } ?> 
			</tbody>
			
		</table>
		
	</div>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>