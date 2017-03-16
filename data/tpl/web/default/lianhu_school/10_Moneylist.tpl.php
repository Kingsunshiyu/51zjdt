<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li>
		<a href="<?php  echo $this->createWebUrl('money');?>">收款项目列表</a>
	</li>
	<li class="active" >
		<a >记录</a>
	</li> 
</ul>
<div class='main'>
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:10%">名称</th>
					<th style="width:5%">金额</th>
					<th style="width:10%">添加时间</th>
					<th style="width:10%">学生名</th>
					<th style="width:10%">支付人</th>
					<th style="width:5%">状态</th>
				</tr>
			</thead>			
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><?php  echo $row['limit_name'];?></td>
						<td><?php  echo $row['limit_much'];?></td>
						<td><?php  echo date("Y-m-d H:i:s",$row['addtime'])?></td>
						<td><?php  echo $row['student_name'];?></td>
						<td><?php  echo $row['nickname'];?></td>
						<td><?php  if($row['status']==1) { ?>已支付<?php  } else { ?>未支付<?php  } ?></td>
					</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>	
</div>