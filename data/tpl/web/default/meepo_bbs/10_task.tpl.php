<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  echo $actives['view'];?>><a href="<?php  echo $this->createWebUrl('task')?>"><span>浏览全部任务</span></a></li>
	<li <?php  if($_GPC['op']=='add') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('task',array('op'=>'add'))?>">添加新任务</a></li>
	<?php  if(!empty($taskid)) { ?>
	<li <?php  if($_GPC['op']=='edit') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('task',array('op'=>'edit'))?>">编辑任务</a></li>
	<?php  } ?>
</ul>

<div class="main">
<div class="panel panel-default">
	<div class="alert alert-success">
		通过有奖任务，您可以实现引导站内的新人更好的完善自己的头像、资料和发表信息；还可以实现在节日期间给用户发送积分；用户定期领取积分红包等各种任务。有奖任务可以带动用户更容易的融入到站内的气氛中来。
		
	</div>
	<div class="panel-body">
		<form method="post" action="" class="form-horizontal form">
		
<?php  if($_GET['op']=='edit' || $_GET['op']=='add') { ?>
	
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务名</label>
			<div class="col-sm-9">
				<input name="name" class="form-control" value="<?php  echo $thevalue['name'];?>" type="text">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务图片</label>
			<div class="col-sm-9">
				<?php  echo tpl_form_field_image('image',$thevalue['image'])?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务说明</label>
			<div class="col-sm-9">
				<?php  echo tpl_ueditor('note', $thevalue['note']);?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务奖励积分</label>
			<div class="col-sm-9">
				<input name="credit" class="form-control" value="<?php  echo $thevalue['credit'];?>" type="text">
				<br>设置用户完成该有奖任务后可以获得的积分奖励。为0，则不奖励积分。
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务完成数限制</label>
			<div class="col-sm-9">
				<input name="maxnum" class="form-control" value="<?php  echo $thevalue['maxnum'];?>" type="text">
				<br>设置该有奖任务最多可完成多少人次。超过该人次后，该有奖任务将自动失效。为0，则不限制。
		<?php  if($thevalue['num']) { ?><br><b>目前该有奖任务已经完成 <?php  echo $thevalue['num'];?> 人次</b>。<?php  } ?>
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务处理PHP脚本</label>
			<div class="col-sm-9">
				./source/task/
				<input name="filename" class="form-control" value="<?php  echo $thevalue['filename'];?>" type="text">
				<br>不能包含路径，程序脚本必须存放于 ./source/task/ 目录中
				<br>本功能为高级应用，有奖任务脚本的编写，需要您懂一定PHP知识。
				<br>请参考系统自带的有奖任务脚本 ./source/task/sample.php 中的说明来编写。
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有效性</label>
			<div class="col-sm-9">
				<input type="radio" name="available" value="1" <?php  echo $availables['1'];?>>有效 <input type="radio" name="available" value="0" <?php  echo $availables['0'];?>>无效
				
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">有奖任务日期</label>
			<div class="col-sm-9">
				<?php  echo tpl_form_field_daterange('time',$thevalue['time'],true)?>
				<br>设置该有奖任务结束的日期。为空为永久有效。
			</div>
		</div>
		
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户重复执行周期</label>
			<div class="col-sm-4">
				<select name="nexttype" onchange="show_nexttime(this.value);" class="form-control">
				<option value="">不重复</option>
				<option value="day" <?php  echo $nexttypearr['day'];?>>每天</option>
				<option value="hour" <?php  echo $nexttypearr['hour'];?>>整点</option>
				<option value="time" <?php  echo $nexttypearr['time'];?>>间隔指定时间</option>
				</select>
				
				
			</div>
		</div>
		
		<div class="form-group" id="nexttime"  style="display:<?php  echo $nextimestyle;?>;">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">间隔** 秒后可重复执行</label>
			<div class="col-sm-4">
				<span >
					 <input type="text" name="nexttime" class="form-control" value="<?php  echo $thevalue['nexttime'];?>" size="10">
				</span>
			</div>
		</div>
		<script>
		function show_nexttime(type) {
			if(type == 'time') {
				document.getElementById("nexttime").style.display ='';
			} else {
				document.getElementById("nexttime").style.display ='none';
			}
		}
		</script>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">优先顺序</label>
			<div class="col-sm-9">
				<input type="text" name="displayorder" value="<?php  echo $thevalue['displayorder'];?>" class="form-control"><br>数字越小，排序越靠前，优先级越高
			</div>
			
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9">
				<input type="submit" name="tasksubmit" value="提交" class="btn btn-default">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
			
		</div>
	</div>
<?php  } else { ?>
	<table class="table">
	<tr>
		<th width="80">图片</th>
		<th>有奖任务名/有奖任务脚本</th>
		<th>积分奖励</th>
		<th>有效期</th>
		<th>操作</th>
	</tr>
	
	<?php  if(is_array($list)) { foreach($list as $task) { ?>
	<tr>
		<td><img src="<?php  echo $task['image'];?>" width="60" height="60"></td>
		<td><?php  echo $task['name'];?><br><?php  echo $task['filename'];?></td>
		<td><?php  echo $task['credit'];?></td>
		<td><?php  if($task['available']) { ?><?php  echo $task['starttime'];?><br><?php  echo $task['endtime'];?><?php  } else { ?>无效<?php  } ?></td>
		<td><a class="btn btn-default" href="<?php  echo $this->createWebUrl('task',array('op'=>'edit','taskid'=>$task['taskid']))?>">编辑</a>
		&nbsp;<a class="btn btn-default" href="<?php  echo $this->createWebUrl('task',array('op'=>'delete','taskid'=>$task['taskid']))?>">删除</a>
		</td>
	</tr>
	<?php  } } ?>
	
	<tr>
		<a class="btn btn-default" href="<?php  echo $this->createWebUrl('task',array('op'=>'one'))?>">一键导入现有任务</a>
		<span style="color:red;float:right;">导入后，请认证完善相关任务</span>
	</tr>
	</table>
	
<?php  } ?>
	</div>
	</form>

</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>