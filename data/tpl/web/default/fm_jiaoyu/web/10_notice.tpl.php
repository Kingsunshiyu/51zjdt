<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
 <style>
.cLine {
    overflow: hidden;
    padding: 5px 0;
  color:#000000;
}
.alert {
padding: 8px 35px 0 10px;
text-shadow: none;
-webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
background-color: #f9edbe;
border: 1px solid #f0c36d;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
color: #333333;
margin-top: 5px;
}
.alert p {
margin: 0 0 10px;
display: block;
}
.alert .bold{
font-weight:bold;
}
 </style>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/main.css"/>
<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" /> 
<div class="cLine">
    <div class="alert">
    <p><span class="bold">说明：</span>
   请慎用群发功能<br/>
   <strong><font color='red'>特别提醒: 群发功能带有广告信息会导致帐号停用</font></strong>
    </p>
    </div>
</div>
<?php  if($operation == 'display') { ?>	
<div class="panel panel-info">
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li <?php  if(($_GPC['op'] == 'display')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>">班级通知</a>
			</li >		
			<li <?php  if(($_GPC['op'] == 'display1')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display1', 'schoolid' => $schoolid))?>">校园群发</a>
			</li >
			<li <?php  if(($_GPC['op'] == 'display2')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display2', 'schoolid' => $schoolid))?>">作业管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display3')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display3', 'schoolid' => $schoolid))?>">请假管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display4')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>">对话班主任</a>
			</li>			
		</ul>
		<div class="form-group">
			<a class="btn btn-primary btn-sm" href="<?php  echo $this->createWebUrl('notice', array('op' => 'post', 'type' =>1, 'schoolid' => $schoolid))?>">发布通知</a>
			<div class="form-group inline-form" style="display: inline-block;">
				<form accept-charset="UTF-8" action="./index.php" class="form-inline" id="diandanbao/table_search" method="get" role="form">
					<div style="margin:0;padding:0;display:inline">
					<input name="utf8" type="hidden" value="✓"></div>
					<input type="hidden" name="c" value="site" />
					<input type="hidden" name="a" value="entry" />
					<input type="hidden" name="m" value="fm_jiaoyu" />
					<input type="hidden" name="do" value="notice" />
					<input type="hidden" name="op" value="display" />
					<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
					<div class="form-group">
						<label class="sr-only" for="q_name">标题(标题关键字)</label>
						<input class="form-control" id="keyword" name="keyword" placeholder="标题(标题关键字)" type="search">
					</div>
					 <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 80px;">按班级</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="bj_id" class="form-control">
								<option value="">请选择班级搜索</option>
								<?php  if(is_array($bjlist)) { foreach($bjlist as $row) { ?>
								<option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
								<?php  } } ?>
							</select>
						</div>										
					</div>
					<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">					
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th style="width:60px">发自</th>
					<th style="width:200px;">标题</th>
					<th style="width:500px;">摘要</th>
					<th style="width:80px;">是否有图</th>
					<th style="width:180px;">发布时间</th>
					<th style="width:100px;">班级</th>
					<!-- <th style="width:100px;">科目</th> -->
					<th style="width:100px;">老师</th>
					<th style="width:150px; text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td>
					<?php  if($item['ismobile'] == 1) { ?>
						<span class="label label-info"><i class="fa fa-desktop"></i></span>
					<?php  } else { ?>
						<span class="label label-success"><i class="fa fa-weixin"></i></span>
					<?php  } ?>	
					</td>
					<td>
						<?php  echo $item['title'];?>
					</td>
					<td style="overflow:hidden;">
						<span class="label label-success"><i class="fa fa-rss"></i></span>&nbsp;<?php  if(!empty($item['outurl'])) { ?><span class="label label-info">外部链接</span><?php  } else { ?><?php  echo $item['content'];?><?php  } ?>
					</td>					
					<td>
					<?php  $picarr = iunserializer($item['picarr']);?>
						<?php  if(!empty($picarr['p1'])) { ?><span class="label label-success">有</span><?php  } else { ?>
						<span class="label label-danger">无</span><?php  } ?>
					</td>					
					<td>
						<span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['createtime'])?></span>
					</td>
					<td>
						<?php  echo $item['bjname'];?>
					</td>
<!-- 					<td>
						<?php  echo $item['kmname'];?>
					</td> -->					
					<td>
						<?php  if(empty($item['tname'])) { ?><span class="label label-success"><i class="fa fa-wechat"></i></span>&nbsp;无<?php  } else { ?>&nbsp;
						<span class="label label-warning"><?php  echo $item['tname'];?></span><?php  } ?>
					</td>					
					<td style="text-align:right; position:relative;">
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display5', 'notice_id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">发送记录</a>&nbsp;-&nbsp;
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'postb', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">查看</a>&nbsp;-&nbsp;
						<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'delete1', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="删除">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
<?php  echo $pager;?>
<?php  } else if($operation == 'display1') { ?>
<div class="panel panel-info">
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li <?php  if(($_GPC['op'] == 'display')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>">班级通知</a>
			</li >		
			<li <?php  if(($_GPC['op'] == 'display1')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display1', 'schoolid' => $schoolid))?>">校园群发</a>
			</li >
			<li <?php  if(($_GPC['op'] == 'display2')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display2', 'schoolid' => $schoolid))?>">作业管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display3')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display3', 'schoolid' => $schoolid))?>">请假管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display4')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>">对话班主任</a>
			</li>			
		</ul>
		<div class="form-group">
			<a class="btn btn-primary btn-sm" href="<?php  echo $this->createWebUrl('notice', array('op' => 'post', 'type' =>2, 'schoolid' => $schoolid))?>">创建群发</a>
			<div class="form-group inline-form" style="display: inline-block;">
				<form accept-charset="UTF-8" action="./index.php" class="form-inline" id="diandanbao/table_search" method="get" role="form">
					<div style="margin:0;padding:0;display:inline">
					<input name="utf8" type="hidden" value="✓"></div>
					<input type="hidden" name="c" value="site" />
					<input type="hidden" name="a" value="entry" />
					<input type="hidden" name="m" value="fm_jiaoyu" />
					<input type="hidden" name="do" value="notice" />
					<input type="hidden" name="op" value="display1" />
					<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
					<div class="form-group">
						<label class="sr-only" for="q_name">标题(标题关键字)</label>
						<input class="form-control" id="keyword" name="keyword" placeholder="标题(标题关键字)" type="search">
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;">按接收对象</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="group" class="form-control">
								<option value="">请选择接受对象</option>
								<option value="1">全体师生</option>
								<option value="2">全体教员</option>
								<option value="3">家长学生</option>
							</select>
						</div>										
					</div>
					<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">					
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th style="width:60px">发自</th>
					<th style="width:200px;">标题</th>
					<th style="width:500px;">摘要</th>
					<th style="width:80px;">是否有图</th>
					<th style="width:180px;">发布时间</th>
					<th style="width:100px;">接收对象</th>
					<!-- <th style="width:100px;">科目</th> -->
					<th style="width:100px;">老师</th>
					<th style="width:150px; text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td>
					<?php  if($item['ismobile'] == 1) { ?>
						<span class="label label-info"><i class="fa fa-desktop"></i></span>
					<?php  } else { ?>
						<span class="label label-success"><i class="fa fa-weixin"></i></span>
					<?php  } ?>	
					</td>
					<td>
						<?php  echo $item['title'];?>
					</td>
					<td style="overflow:hidden;">
						<span class="label label-success"><i class="fa fa-rss"></i></span>&nbsp;<?php  if(!empty($item['outurl'])) { ?><span class="label label-info">外部链接</span><?php  } else { ?><?php  echo $item['content'];?><?php  } ?>
					</td>					
					<td>
						<?php  $picarr = iunserializer($item['picarr']);?>
						<?php  if(!empty($picarr['p1'])) { ?><span class="label label-success">有</span><?php  } else { ?>
						<span class="label label-danger">无</span><?php  } ?>
					</td>					
					<td>
						<span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['createtime'])?></span>
					</td>
					<td>
						<?php  if($item['groupid'] == 1) { ?>全体师生<?php  } else if($item['groupid'] == 2) { ?>全体教师<?php  } else if($item['groupid'] == 3) { ?>家长学生<?php  } ?>
					</td>
<!-- 					<td>
						<?php  echo $item['kmname'];?>
					</td> -->					
					<td>
						<?php  if(empty($item['tname'])) { ?><span class="label label-success"><i class="fa fa-wechat"></i></span>&nbsp;无<?php  } else { ?>&nbsp;
						<span class="label label-warning"><?php  echo $item['tname'];?></span><?php  } ?>
					</td>					
					<td style="text-align:right; position:relative;">
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display5', 'notice_id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">发送记录</a>&nbsp;-&nbsp;
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'postb', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">查看</a>&nbsp;-&nbsp;
						<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'delete1', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="删除">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
<?php  echo $pager;?>
<?php  } else if($operation == 'display2') { ?>
<div class="panel panel-info">
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li <?php  if(($_GPC['op'] == 'display')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>">班级通知</a>
			</li >		
			<li <?php  if(($_GPC['op'] == 'display1')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display1', 'schoolid' => $schoolid))?>">校园群发</a>
			</li >
			<li <?php  if(($_GPC['op'] == 'display2')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display2', 'schoolid' => $schoolid))?>">作业管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display3')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display3', 'schoolid' => $schoolid))?>">请假管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display4')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>">对话班主任</a>
			</li>			
		</ul>
		<div class="form-group">
			<a class="btn btn-primary btn-sm" href="<?php  echo $this->createWebUrl('notice', array('op' => 'post', 'type' =>3, 'schoolid' => $schoolid))?>">发布作业</a>
			<div class="form-group inline-form" style="display: inline-block;">
				<form accept-charset="UTF-8" action="./index.php" class="form-inline" id="diandanbao/table_search" method="get" role="form">
					<div style="margin:0;padding:0;display:inline">
					<input name="utf8" type="hidden" value="✓"></div>
					<input type="hidden" name="c" value="site" />
					<input type="hidden" name="a" value="entry" />
					<input type="hidden" name="m" value="fm_jiaoyu" />
					<input type="hidden" name="do" value="notice" />
					<input type="hidden" name="op" value="display2" />
					<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
					<div class="form-group">
						<label class="sr-only" for="q_name">标题(标题关键字)</label>
						<input class="form-control" id="keyword" name="keyword" placeholder="标题(标题关键字)" type="search">
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;">按班级</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="bj_id" class="form-control">
								<option value="">请选择班级搜索</option>
								<?php  if(is_array($bjlist)) { foreach($bjlist as $row) { ?>
								<option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
								<?php  } } ?>
							</select>							
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;margin-left: 50px;">按科目</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-left:15px;" name="km_id" class="form-control">
								<option value="">请选择科目搜索</option>
								<?php  if(is_array($kmlist)) { foreach($kmlist as $row) { ?>
								<option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['km_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
								<?php  } } ?>
							</select>						
						</div>
					</div>
					<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">					
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th style="width:60px">发自</th>
					<th style="width:200px;">标题</th>
					<th style="width:500px;">摘要</th>
					<th style="width:80px;">是否有图</th>
					<th style="width:180px;">发布时间</th>
					<th style="width:100px;">班级</th>
					<th style="width:100px;">科目</th>
					<th style="width:100px;">老师</th>
					<th style="width:170px; text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td>
					<?php  if($item['ismobile'] == 1) { ?>
						<span class="label label-info"><i class="fa fa-desktop"></i></span>
					<?php  } else { ?>
						<span class="label label-success"><i class="fa fa-weixin"></i></span>
					<?php  } ?>	
					</td>
					<td>
						<?php  echo $item['title'];?>
					</td>
					<td style="overflow:hidden;">
						<span class="label label-success"><i class="fa fa-rss"></i></span>&nbsp;<?php  if(!empty($item['outurl'])) { ?><span class="label label-info">外部链接</span><?php  } else { ?><?php  echo $item['content'];?><?php  } ?>
					</td>					
					<td>
						<?php  $picarr = iunserializer($item['picarr']);?>
						<?php  if(!empty($picarr['p1'])) { ?><span class="label label-success">有</span><?php  } else { ?>
						<span class="label label-danger">无</span><?php  } ?>
					</td>					
					<td>
						<span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['createtime'])?></span>
					</td>
					<td>
						<?php  echo $item['bjname'];?>
					</td>
					<td>
						<?php  echo $item['kmname'];?>
					</td>					
					<td>
						<?php  if(empty($item['tname'])) { ?><span class="label label-success"><i class="fa fa-wechat"></i></span>&nbsp;无<?php  } else { ?>&nbsp;
						<span class="label label-warning"><?php  echo $item['tname'];?></span><?php  } ?>
					</td>					
					<td style="text-align:right; position:relative;">
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display5', 'notice_id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">发送记录</a>&nbsp;-&nbsp;
						<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'postb', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="查看">查看</a>&nbsp;-&nbsp;
						<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'delete1', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="删除">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
<?php  echo $pager;?>
<?php  } else if($operation == 'display3') { ?>
<div class="panel panel-info">
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li <?php  if(($_GPC['op'] == 'display')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>">班级通知</a>
			</li >		
			<li <?php  if(($_GPC['op'] == 'display1')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display1', 'schoolid' => $schoolid))?>">校园群发</a>
			</li >
			<li <?php  if(($_GPC['op'] == 'display2')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display2', 'schoolid' => $schoolid))?>">作业管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display3')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display3', 'schoolid' => $schoolid))?>">请假管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display4')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>">对话班主任</a>
			</li>			
		</ul>
		<div class="form-group">
			<div class="form-group inline-form" style="display: inline-block;">
				<form accept-charset="UTF-8" action="./index.php" class="form-inline" id="diandanbao/table_search" method="get" role="form">
					<div style="margin:0;padding:0;display:inline">
					<input name="utf8" type="hidden" value="✓"></div>
					<input type="hidden" name="c" value="site" />
					<input type="hidden" name="a" value="entry" />
					<input type="hidden" name="m" value="fm_jiaoyu" />
					<input type="hidden" name="do" value="notice" />
					<input type="hidden" name="op" value="display3" />
					<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;">按班级</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="bj_id" class="form-control">
								<option value="">请选择班级搜索</option>
								<?php  if(is_array($bjlist)) { foreach($bjlist as $row) { ?>
								<option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
								<?php  } } ?>
							</select>							
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;margin-left: 50px;">按类型</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-left:15px;" name="leixing" class="form-control">
								<option value="">按事由搜索</option>
								<option value="事假">事假</option>
								<option value="病假">病假</option>
								<option value="其他">其他</option>
							</select>						
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;margin-left: 50px;">按分类</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-left:15px;" name="fenlei" class="form-control">
								<option value="">按分类搜索</option>
								<option value="1">教师请假</option>
								<option value="2">学生请假</option>
							</select>						
						</div>
					</div>
					<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">					
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th style="width:60px">系统id</th>
					<th style="width:80px;">请假人</th>
					<th style="width:350px;">理由</th>
					<th style="width:200px;">请假时间</th>
					<th style="width:80px;">审核状态</th>
					<th style="width:180px;">处理时间</th>
					<th style="width:100px;">班级</th>
					<th style="width:60px;">类型</th>
					<th style="width:60px;">请假人类型</th>
					<th style="width:60px;">申请人</th>
					<th style="width:130px; text-align:right;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><span><?php  echo $item['id'];?></span></td>
					<td>
						<span class="label label-info"><?php  if(empty($item['tid'])) { ?><?php  echo $item['s_name'];?><?php  } else if(empty($item['sid'])) { ?><?php  echo $item['tname'];?><?php  } ?></span>
					</td>
					<td style="overflow:hidden;">
						<span class="label label-success"><i class="fa fa-rss"></i></span>&nbsp;<?php  echo $item['conet'];?>
					</td>
					<td style="overflow:hidden;">
						<?php  echo $item['startime'];?>至<?php  echo $item['endtime'];?>
					</td>					
					<td>
						<?php  if($item['status'] == 1) { ?><span class="label label-success">通过</span><?php  } else if($item['status'] == 2) { ?>
						<span class="label label-danger">拒绝</span><?php  } else if($item['status'] == 0) { ?><span class="label label-info">未处理</span><?php  } ?>
					</td>					
					<td>
						<?php  if(!empty($item['cltime'])) { ?><span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['cltime'])?></span><?php  } ?>
					</td>
					<td>
						<?php  echo $item['bjname'];?>
					</td>
					<td>
						<?php  if($item['type'] == '病假') { ?><span class="label label-danger">病假</span>
						<?php  } else if($item['type'] == '事假') { ?><span class="label label-info">事假</span>
						<?php  } else if($item['type'] == '其他') { ?><span class="label label-warning">其他</span>
						<?php  } ?>
					</td>					
					<td>
						<?php  if(empty($item['sid'])) { ?><span class="label label-success">教师</span>
						<?php  } else { ?>
						<span class="label label-info">学生</span>
						<?php  } ?>
					</td>
					<td>
						<?php  if(!empty($item['guanxi'])) { ?>
						<?php  if($item['guanxi'] == 2) { ?>
						<span class="label label-warning">母亲</span>
						<?php  } else if($item['guanxi'] == 3) { ?>
						<span class="label label-info">父亲</span>
						<?php  } else if($item['guanxi'] == 4) { ?>
						<span class="label label-danger">本人</span>
						<?php  } ?>
						<?php  } ?>
					</td>					
					<td style="text-align:right; position:relative;">
					<?php  if(empty($item['status'])) { ?>
					<?php  if(empty($item['sid'])) { ?>
						<a onclick="return confirm('将以校长身份发送至请假人,确认批准该请假申请？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'shenhe', 'fenlei' => 1, 'status' => 1, 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="批准">批准</a>&nbsp;
						<a onclick="return confirm('将以校长身份发送至请假人,确认批拒绝请假申请？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'shenhe', 'fenlei' => 1, 'status' => 2, 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="拒绝">拒绝</a>
					<?php  } else { ?>
						<a onclick="return confirm('将以班主任身份发送至请假人,确认批准该请假申请？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'shenhe', 'fenlei' => 2, 'status' => 1, 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="批准">批准</a>&nbsp;
						<a onclick="return confirm('将以班主任身份发送至请假人,确认批拒绝请假申请？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'shenhe', 'fenlei' => 2, 'status' => 2, 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="拒绝">拒绝</a>
					<?php  } ?>
					<?php  } ?>					
						&nbsp;<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'delete2', 'id' => $item['id'], 'schoolid' => $schoolid))?>" title="删除">删除</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
<?php  echo $pager;?>
<?php  } else if($operation == 'display4') { ?>
<div class="panel panel-info">
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li <?php  if(($_GPC['op'] == 'display')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>">班级通知</a>
			</li >		
			<li <?php  if(($_GPC['op'] == 'display1')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display1', 'schoolid' => $schoolid))?>">校园群发</a>
			</li >
			<li <?php  if(($_GPC['op'] == 'display2')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display2', 'schoolid' => $schoolid))?>">作业管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display3')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display3', 'schoolid' => $schoolid))?>">请假管理</a>
			</li>
			<li <?php  if(($_GPC['op'] == 'display4')) { ?>class="active"<?php  } ?>>
				<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>">对话班主任</a>
			</li>			
		</ul>
		<div class="form-group">
			<div class="form-group inline-form" style="display: inline-block;">
				<form accept-charset="UTF-8" action="./index.php" class="form-inline" id="diandanbao/table_search" method="get" role="form">
					<div style="margin:0;padding:0;display:inline">
					<input name="utf8" type="hidden" value="✓"></div>
					<input type="hidden" name="c" value="site" />
					<input type="hidden" name="a" value="entry" />
					<input type="hidden" name="m" value="fm_jiaoyu" />
					<input type="hidden" name="do" value="notice" />
					<input type="hidden" name="op" value="display4" />
					<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 110px;">按班级</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="bj_id" class="form-control">
								<option value="">请选择班级搜索</option>
								<?php  if(is_array($bjlist)) { foreach($bjlist as $row) { ?>
								<option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
								<?php  } } ?>
							</select>							
						</div>
					</div>
					<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">					
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" >
	<div class="table-responsive panel-body">
		<div id="queue-setting-index-body">
			<div class="viewList" >
			<?php  if(is_array($leave)) { foreach($leave as $row) { ?>	
				<div class="viewBox" style="width:350px;background-color:#F5EFEF;border-top-left-radius: 3%;border-top-right-radius: 3%;border-bottom-left-radius: 3%;border-bottom-right-radius: 3%;">
					<a class="btn btn-default btn-sm" style="background-color:#F5EFEF;position: relative;top:-15px;right:-325px;width:23px;height:23px;border-radius:50%;" href="<?php  echo $this->createWebUrl('notice', array('id' => $row['id'], 'op' => 'deleteall', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times" style="top: -4px;right: 4px;position: relative;"></i></a>				
					<div class="content" style="border-bottom:1px solid #c6c6c6;">					
							<a class="lightgray" >
								<span class="label label-warning"><?php  echo $row['bjname'];?></span>&nbsp;
								学生:<?php  echo $row['s_name'];?></a>
								<?php  if(!empty($row['guanxi'])) { ?>
									<?php  if($row['guanxi'] == 2) { ?>
									<span class="label label-warning">母亲</span>
									<?php  } else if($row['guanxi'] == 3) { ?>
									<span class="label label-info">父亲</span>
									<?php  } else if($row['guanxi'] == 4) { ?>
									<span class="label label-danger">本人</span>
									<?php  } ?>
								<?php  } ?>
									
							<a style="float: right;" href="<?php  echo $this->createWebUrl('notice', array('op' => 'posta', 'schoolid' => $schoolid, 'leaveid' => $row['id']))?>"><button type="button" class="btn btn-sm btn-info">查看详情</button></a>
					</div>
					<?php  if(!empty($row['conet'])) { ?>
					<?php  if(is_array($row['conet'])) { foreach($row['conet'] as $row1) { ?>
					</br>
					<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
						<?php  if(!empty($row1['tuid']) || !empty($row1['teacherid'])) { ?><span class="label label-success" style="float:left">老师</span><?php  } else { ?><span class="label label-info" style="float:left">学生</span><?php  } ?>
						<span class="name" style="width: 200px;">&nbsp;<?php  echo $row1['conet'];?></span>
						<span name="publishdate" class="time"><?php  echo date('m-d H:m', $row1['createtime'])?></span>						
					</div>
					<?php  } } ?>
					<?php  } ?>
				</div>
			<?php  } } ?>
			</div>
		</div>
	</div>
</div>
<?php  echo $pager;?>
<?php  } else if($operation == 'display5') { ?>
<div class="panel panel-info">
	<div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>"><i class="fa fa-tasks"></i>返回列表</a></div>
</div>
    <div class="panel panel-info">
        <div class="panel-heading">记录发送列表-------------------标题：【<?php  echo $notice['title'];?>】</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site">
				<input type="hidden" name="a" value="entry">
				<input type="hidden" name="m" value="fm_jiaoyu">
				<input type="hidden" name="do" value="notice"/>
				<input type="hidden" name="op" value="display5"/>
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
				<input type="hidden" name="notice_id" value="<?php  echo $notice_id;?>" />
				<input type="hidden" name="is_pay" value="<?php  echo $_GPC['is_pay'];?>"/>
				<input type="hidden" name="shenfen" value="<?php  echo $_GPC['shenfen'];?>"/>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-1 control-label">阅读状态</label>
					<div class="col-sm-9 col-xs-9 col-md-9">
						<div class="btn-group">
							<a href="<?php  echo $this->createWebUrl('notice', array('notice_id' => $notice_id, 'op' => 'display5', 'is_pay' => '-1', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
							<a href="<?php  echo $this->createWebUrl('notice', array('notice_id' => $notice_id, 'op' => 'display5', 'is_pay' => '1', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">未读</a>
							<a href="<?php  echo $this->createWebUrl('notice', array('notice_id' => $notice_id, 'op' => 'display5', 'is_pay' => '2', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == 2) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已读</a>
							<a class="btn btn-danger" href="<?php  echo $this->createWebUrl('notice', array('op' => 'clear', 'schoolid' => $schoolid))?>"><i class="fa fa-trash-o"></i> 清除垃圾信息</a>
						</div>
					</div>
				</div>
				<div class="form-group clearfix">
					<label class="col-xs-12 col-sm-3 col-md-1 control-label">按条件</label>
					<div class="col-sm-2 col-lg-2">
					<select style="margin-right:15px;" name="shenfen" class="form-control">
						<option value="0">按身份搜索</option>						
						<option value="1" <?php  if($_GPC['shenfen'] == 1) { ?> selected="selected"<?php  } ?>>老&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;师</option>
						<option value="2" <?php  if($_GPC['shenfen'] == 2) { ?> selected="selected"<?php  } ?>>家长学生</option>
					</select>
					</div>
					<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>					
				</div>
			</form>
		</div>		
    </div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table">
			<thead>
				<tr>
					<th class='with-checkbox' style="width: 20px;"><input type="checkbox" class="check_all" /></th>
					<th style="width:10%">接收人</th>
					<th style="width:5%;">状态</th>
					<th style="width:10%;">阅读时间</th>
					<th style="width:10%;">发布时间</th>
					<!--th style="width:150px; text-align:right;">操作</th-->
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
					<td>
					<?php  if(!empty($item['guanxi'])) { ?>
						<?php  if($item['guanxi'] == 2) { ?>
							<span class="label label-success"><i class="fa fa-users"></i></span>【<?php  echo $item['s_name'];?>】母亲
						<?php  } else if($item['guanxi'] == 3) { ?>
							<span class="label label-success"><i class="fa fa-users"></i></span>【<?php  echo $item['s_name'];?>】父亲
						<?php  } else if($item['guanxi'] == 4) { ?>
							<span class="label label-success"><i class="fa fa-users"></i></span>【<?php  echo $item['s_name'];?>】
						<?php  } ?>	
					<?php  } else { ?>
						<span class="label label-success"><i class="fa fa-user"></i></span>【<?php  echo $item['tname'];?>】老师
					<?php  } ?>
					</td>					
					<td>
						<span class="label label-success">已送达</span>
					</td>
					<td>
						<?php  if(!empty($item['readtime'])) { ?><span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['readtime'])?></span><?php  } else { ?><span class="label label-danger">未读</span><?php  } ?>
					</td>					
					<td>
						<span class="label label-success"><?php  echo date('Y-m-d H:m:s',$item['createtime'])?></span>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
			<tr>
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                    <input type="button" class="btn btn-primary" name="btndeleteall" value="批量删除" />
				</td>
			</tr>		
	</div>
</div>
<?php  echo $pager;?>
<script type="text/javascript">
<!--
	var category = <?php  echo json_encode($children)?>;
//-->
$(function(){
    $(".check_all").click(function(){
        var checked = $(this).get(0).checked;
        $("input[type=checkbox]").attr("checked",checked);
    });

    $("input[name=btndeleteall]").click(function(){
        var check = $("input[type=checkbox][class!=check_all]:checked");
        if(check.length < 1){
            alert('请选择要删除的教师!');
            return false;
        }
        if(confirm("确认要删除选择的教师?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('notice', array('op' => 'deleteallrecord','schoolid' => $schoolid))?>";
            $.post(
                url,
                {idArr:id},
                function(data){
                    if(data.result){
					    alert(data.msg);
                        location.reload();
                    }else{
                        alert(data.msg);
                    }
                },'json'
            );
        }
    });

});
</script>
<?php  } else if($operation == 'posta') { ?>
<div class="panel panel-info">
	<div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('notice', array('op' => 'display4', 'schoolid' => $schoolid))?>"><i class="fa fa-tasks"></i>返回对话列表</a></div>
</div>
<div class="main">
	<div class="panel panel-default">
        <div class="table-responsive panel-body">
			<div id="queue-setting-index-body">
				<div class="panel panel-default">
					<div class="panel-heading">对话详情</div>
				</div>
				<div class="uploadList">
					<div class="" style="border-bottom: 1px solid #dbe1e8;">
						<div class="">
							<label class="control-label" style="float: left;width: 25%;"><?php  echo $student['s_name'];?><?php  if($user['pard'] == 2) { ?>
									<span class="label label-warning">母亲</span>
									<?php  } else if($user['pard'] == 3) { ?>
									<span class="label label-info">父亲</span>
									<?php  } else if($user['pard'] == 4) { ?>
									<span class="label label-danger">本人</span>
									<?php  } ?></label>
							<span class="help-block">班级：<span style="color:red"><?php  echo $bj['sname'];?></span></span>							
							<span class="help-block">班主任：<span style="color:red"><?php  echo $teacher['tname'];?></span></span>							
						</div>
					</div>
				</div>
				<div class="" style="">
					<div style="margin:10px">
						<img alt="" src="../addons/fm_jiaoyu/public/web/recipe/liked.png" />
						<span style="margin:10px;"><?php  echo $total;?>条留言</span>
					</div>
				</div>
				<div class="" style="border-bottom: 1px solid #dbe1e8;">
					<div class="row">
					   <div class="col-sm-6 col-xs-5"></div>
					   <div class="col-sm-6 col-xs-7"></div>
					</div>
					<table id="wlzy-datatable" class="table table-vcenter table-condensed table-bordered">
						<thead>
							<tr role="row">
							    <th class="sorting_disabled text-center" tabindex="0" rowspan="1" colspan="1" style="width:8%;">回复人</th>
								<th class="sorting_disabled text-center" tabindex="0" rowspan="1" colspan="1" style="width:80%;">内容</th>
								<th class="sorting_disabled text-center" tabindex="0" rowspan="1" colspan="1" style="width:10%;">回复时间</th>
								<th class="sorting_disabled text-center" tabindex="0" rowspan="1" colspan="1" style="width:5%;">管理</th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php  if(is_array($list)) { foreach($list as $row) { ?>
							<tr class="odd">
								<td class="text-center" style="text-align:left;"><a><?php  if(!empty($row['tuid'])  || !empty($row['teacherid'])) { ?><span class="label label-info" style="float:left;">老师</span>&nbsp;<?php  echo $teacher['tname'];?><?php  } else { ?><span class="label label-success" style="float:left;">学生</span>&nbsp;<?php  echo $student['s_name'];?><?php  } ?></a></td>
								<td class="text-center" style="text-align:left;height:auto;"><a><?php  echo $row['conet'];?></a></td>
								<td class="text-center"><a><?php  echo(date('Y-m-d H:i:s',$row['createtime']))?></a></td>
								<td class="text-center">
								<a href="<?php  echo $this->createWebUrl('notice', array('op' => 'delete2', 'schoolid' => $schoolid, 'id' => $row['id']))?>" onclick="return confirm('确定审核通过本条消息吗？');return false;">删除</a>
								</td>
							</tr>
							<?php  } } ?>
						</tbody>
					</table>
					<?php  echo $pager;?>
				</div>
	        </div>
		</div>
	</div>
</div>
<?php  } else if($operation == 'postb') { ?>
<div class="panel panel-info">
	<div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('notice', array('op' => 'display', 'schoolid' => $schoolid))?>"><i class="fa fa-tasks"></i>返回</a></div>
</div>
<div class="main">
	<div class="panel panel-default">
        <div class="table-responsive panel-body">
			<div id="queue-setting-index-body">
				<div class="panel panel-default">
					<div class="panel-heading">内容详情</div>
				</div>
				<div class="uploadList">
					<div class="" style="border-bottom: 1px solid #dbe1e8;">
						<div class="">
							<label class="control-label" style="float: left;width: 25%;">标题：<?php  echo $item['title'];?></label>
							</br>
							<span class="help-block">发布时间：<span style="color:#444;"><?php  echo date('Y-m-d H:m:s', $item['createtime'])?></span></span>
							<span class="help-block">文字内容：<span style="color:red;">;<?php  if(!empty($item['outurl'])) { ?><span class="label label-info"><?php  echo $item['outurl'];?></span><?php  } else { ?><?php  echo htmlspecialchars_decode($item['content'])?><?php  } ?><br/></span></span>						
							<?php  if(!empty($item['groupid'])) { ?><span class="help-block">发送到：<span style="color:red;">&nbsp;<?php  if($item['groupid'] == 1 ) { ?>全体师生<?php  } else if($item['groupid'] ==2) { ?>全体教师<?php  } else if($item['groupid'] ==3) { ?>家长学生<?php  } ?></span></span><?php  } ?>						
						</div>
					</div>
				</div>
				<div class="" style="">
					<div style="margin:10px 0"></div>
					<div class="photoList" style="width:100%;margin:10px 0;">
						<div id="addPhotoBox1" name="addPhotoBox">
						    <div class="gallery" data-toggle="lightbox-gallery">
								<?php  if(!empty($item['picarr'])) { ?>
									<?php  if(is_array($picarr)) { foreach($picarr as $key => $row) { ?>
									<?php  if(empty($row)) { ?><?php  continue;?><?php  } ?>
										<div class="photoBox" style="width:200px;height:200px;">								
											<div class="img" style="width:200px;height:200px;">
												<div class="gallery-image">
													<a href="<?php  echo tomedia($row)?>" target="_blank" class="gallery-link">
														<img src="<?php  echo tomedia($row)?>" alt="image" style="width:100%;">															
													</a>
												</div>
											</div>	
										</div>
									<?php  } } ?>
								<?php  } ?>
			                </div>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>	
<?php  } else if($operation == 'post') { ?>
<div class="panel panel-info">
    <div class="panel-heading"><a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i> 返回</a></div>
</div>
<div class="clearfix">
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="type" value="<?php  echo $_GPC['type'];?>" />
	<div class="panel panel-default">
		<div class="panel-heading"><?php  if($_GPC['type'] == 1) { ?>创建班级通知<?php  } else if($_GPC['type'] == 2) { ?>创建校园通知<?php  } else if($_GPC['type'] == 3) { ?>创建作业通知<?php  } ?></div>
		<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">标题</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="请输入标题" name="title" value="">
						<span class="help-block">标题</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">老师</label>
					<div class="col-sm-2 col-lg-2">
						<select style="margin-right:15px;" name="tid" class="form-control">
							<option value="0">请选择教师</option>
							<?php  if(is_array($techerlist)) { foreach($techerlist as $it) { ?>
							<option value="<?php  echo $it['id'];?>"><?php  echo $it['tname'];?></option>
							<?php  } } ?>
						</select>
						<span class="help-block">选择发送人</span>
					</div>
				</div>
                <div class="form-group">
					<?php  if($_GPC['type'] == 3 || $_GPC['type'] == 1) { ?>
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">接收班级</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="bj_id" class="form-control">
								<option value="0">请选择班级</option>
								<?php  if(is_array($bjlist)) { foreach($bjlist as $it) { ?>
								<option value="<?php  echo $it['sid'];?>"><?php  echo $it['sname'];?></option>
								<?php  } } ?>
							</select>
						</div>
						<?php  if($_GPC['type'] == 3) { ?>
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择科目</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="km_id" class="form-control">
								<option value="0">请选择该作业科目</option>
								<?php  if(is_array($kmlist)) { foreach($kmlist as $it) { ?>
								<option value="<?php  echo $it['sid'];?>"><?php  echo $it['sname'];?></option>
								<?php  } } ?>
							</select>
						</div>
						<?php  } ?>
					<?php  } ?>
					<?php  if($_GPC['type'] == 2) { ?>
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">接收对象</label>
						<div class="col-sm-2 col-lg-2">
							<select style="margin-right:15px;" name="groupid" class="form-control">
								<option value="0">请选择接收对象</option>
								<option value="1">全体师生</option>
								<option value="2">全体教师</option>
								<option value="3">家长学生</option>
							</select>
						</div>
					<?php  } ?>	
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">内容</label>
					<div class="col-sm-8 col-xs-12">
						<?php  echo tpl_ueditor('content', $item1['content']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">外部链接</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="请输入URL" name="outurl" value="">
						<span class="help-block">点击模板消息会直接跳转该链接,如http://www.baidu.com</span>
					</div>
				</div>				
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="保存并群发" class="btn btn-primary col-lg-1">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>