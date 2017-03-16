<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>班级公告-<?php  echo $_SESSION['school_name'];?></title>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('tea_common', TEMPLATE_INCLUDEPATH)) : (include template('tea_common', TEMPLATE_INCLUDEPATH));?>
    <link href="<?php echo MODULE_URL;?>style/css/line_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/mobile/style/style_nav.css">
</head>
<div class="top-wrap">
        <div class="fn-clear tr-box top bg_yellow" >
            <div class='text_center white'>班级公告</div>
        </div>
 </div>  
 
<div class="main" style='margin-bottom:60px;'>
	<?php  if($ac=='list') { ?>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th>选择班级</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><a href="<?php  echo  $this->createMobileUrl('Tea_line',array('ac'=>'new','cid'=>$item['class_id']))?>"><?php  echo $item['class_name'];?></a></td>
                    
					<td>
                        <a href="<?php  echo $this->createMobileUrl('Tea_line',array('ac'=>'new','cid'=>$item['class_id']))?>">班级记录</a>
						<a href="<?php  echo $this->createMobileUrl('Tea_line',array('ac'=>'old','cid'=>$item['class_id']))?>">查看</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
	<?php  } ?>
	<?php  if($ac=='old') { ?>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:20%">标题</th>
					<th style="width:10%">发布老师</th>
					<th style="width:10%">类型</th>
					<th style="width:10%">查看数</th>
					<th style="width:5%">状态</th>
					<th style="width:10%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['line_title'];?></td>
					<td><?php  if($item['teacher_realname']) { ?><?php  echo $item['teacher_realname'];?><?php  } else { ?>管理员<?php  } ?></td>
					<td><?php  echo $line_type[$item['line_type']];?></td>
					<td><?php  echo $item['line_look'];?></td>
					<td><?php  if($item['status'] ==1) { ?>正常<?php  } else { ?>关闭<?php  } ?></td>
					<td><?php  echo $item['line_look'];?></td>
					<td>
						<a href="<?php  echo $this->createMobileUrl('Tea_line',array('ac'=>'edit','lid'=>$item['line_id']))?>">编辑</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
	<?php  } ?>
	<?php  if($ac=='new' || $ac=='edit') { ?>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<input type="hidden" name="cid"   value='<?php  echo $class['class_id'];?>' />
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php  if($ac=='new') { ?>新增<?php  } else { ?>修改<?php  } ?>
			</div>
			<div class="panel-body">
				<div class="tab-content">
				<div class='form-group'>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>标题</label>
					<div class="col-sm-9 col-xs-10">
						<input type='text' value='<?php  echo $result['line_title'];?>' name='line_title' class='form-control' >
					</div>	
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>类型</label>
					<div class="col-sm-9 col-xs-10">
						<select name='line_type'  class='form-control' >
							<?php  if(is_array($line_type)) { foreach($line_type as $key => $list) { ?>
								<option value='<?php  echo $key;?>' <?php  if($result['line_type']==$key) { ?> selected <?php  } ?>><?php  echo $list;?></option>
							<?php  } } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>消息内容</label>
					<div class="col-sm-9 col-xs-10">
						<textarea class='form-control' name='line_content' style="height:200px;"><?php  echo $result['line_content'];?></textarea>
					</div>
				</div>							
				<?php  if($ac=='edit') { ?>
					<div class='form-group'>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>状态</label>
					<div class="col-sm-9 col-xs-10">
					<select name='status'  class='form-control'>
							<option value='1' <?php  if($result['status']==1) { ?> selected <?php  } ?>>正常</option>
							<option value='0' <?php  if($result['status']==0) { ?> selected <?php  } ?>>关闭</option>
					</select>
					</div>							
					</div>
				<?php  } ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-10">
				&nbsp;&nbsp;<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			</div>
			</div>
		</div>		
	</form>		
	<?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer_tea', TEMPLATE_INCLUDEPATH)) : (include template('footer_tea', TEMPLATE_INCLUDEPATH));?>