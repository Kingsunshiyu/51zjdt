<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<?php  if($model!='someone') { ?>
	<div class="panel-body table-responsive">
         <div class='title'><?php  if($model=='grade') { ?>年级列表<?php  } else if($model=='class') { ?>班级列表<?php  } else if($model=='student') { ?>学生列表<?php  } ?> </div>
         <ul class='record_list'>
				<?php  if(is_array($result)) { foreach($result as $item) { ?>
				<li>
					<a href="<?php  echo $this->result_result($item,$model,'url','test');?>">
                            <div class='btn btn-primary' style='background-color:#7DCC4A;border:1px solid #7DCC4A;'> <?php  echo $this->result_result($item,$model,'name','test');?></div>
				</a></li>
				<?php  } } ?>
                <div class="clear"></div>
        </ul>
        <?php  if($model!='grade') { ?>
					<a href="javascript:;" onclick="window.history.back() "> <div class='btn btn-primary' >返回</div>
    	<?php  } ?> 
	</div>
	<?php  } ?>
	<?php  if($model=='someone') { ?>
	<div class="panel panel-info">
	<div class="panel-body ">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
			<div class="panel-heading">
				添加新的考试记录【<?php  echo $result['student_name'];?>】
			</div>
			<div class="panel-body">
				<div class="tab-content">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>考试记录名</label>
					<div class="col-sm-9 col-xs-8">
						<input type="text" name="word" id="word" class="form-control" />
						<input type="hidden" name="sid"  class="form-control" value='<?php  echo $_GPC['sid'];?>' />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>考试分数</label>
					<div class="col-sm-9 col-xs-8">
						<input type="text" name="score" id="score" class="form-control" />
					</div>
				</div>				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>考试内容简评</label>
					<div class="col-sm-9 col-xs-8">
						<textarea name='content' class='form-control'></textarea>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>照片</label>
					<div class="col-sm-9 col-xs-8">
						<?php  echo tpl_form_field_image('img',$result['img']);?>
					</div>
				</div>	
				</div>
			</div>
		</div>		
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
		</div>
	</form>	
</div>
<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:10%">考试记录ID</th>
					<th style="width:10%">考试记录名</th>
					<th style="width:5%">学生</th>
					<th style="width:5%">教师</th>
					<th style="width:10%">图片</th>
					<th style="width:5%">得分</th>
					<th style="width:20%">内容</th>
					<th style="width:10%">添加时间</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<?php $teacher=$item['teacher_realname'] ? $item['teacher_realname'] :'管理员无法绑定教师';?>
				<tr>
					<td><?php  echo $item['test_id'];?></td>
					<td><?php  echo $item['word'];?></td>
					<td><?php  echo $result['student_name'];?></td>
					<td><?php  echo $teacher;?></td>
					<td><img src="<?php  echo $this->imgFrom($item['img'])?>" style="width:80px;"></td>
					<td><?php  echo $item['score'];?></td>
					<td><?php  echo $item['content'];?></td>
					<td><?php  echo date("Y-m-d H:i:s",$item['addtime']);?></td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
	<?php  } ?>
</div>