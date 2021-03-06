<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	.datetimepicker{width:200px}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($do == 'list') { ?> class="active"<?php  } ?>><a href="<?php  echo url('cron/display/list');?>">任务列表</a></li>
	<li <?php  if($do == 'post' && empty($id)) { ?> class="active"<?php  } ?>><a href="<?php  echo url('cron/display/post');?>">添加任务</a></li>
	<?php  if($do == 'post'  && !empty($id)) { ?><li class="active"><a href="<?php  echo url('cron/display/post');?>">编辑任务</a></li><?php  } ?>
</ul>
<?php  if($do == 'post') { ?>
<div class="clearfix">
	<div class="panel panel-default">
		<div class="panel-heading">计划任务</div>
		<div class="panel-body">
			<form class="form-horizontal form" id="form1" action="" method="post">
				<input type="hidden" name="id" value="<?php  echo $cron['id'];?>">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"><span class="text-danger">* </span>任务名称</label>
					<div class="col-sm-10 col-xs-12">
						<input type="text" class="form-control" placeholder="设置本任务的任务名称" name="name" value="<?php  echo $cron['name'];?>"/>
						<span class="help-block help-text">设置本任务的任务名称</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"><span class="text-danger">* </span> 任务url:</label>
					<div class="col-sm-10 col-xs-12">
						<input type="text" class="form-control" placeholder="设置本任务的执行url" name="url" value="<?php  echo $cron['url'];?>"/>
						<span class="help-block help-text">设置本任务的执行URL，必须是有效URL。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"><span class="text-danger"> </span> 是否开启:</label>
					<div class="col-sm-10 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="open" value="1" <?php  if($cron['open'] == 1) { ?>checked<?php  } ?>/> 开启
						</label>
						<label class="radio-inline">
							<input type="radio" name="open" value="0" <?php  if($cron['open'] == 0) { ?>checked<?php  } ?>/> 不开启
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"><span class="text-danger"> </span> 任务类型:</label>
					<div class="col-sm-10 col-xs-12">
						<label class="radio-inline" onclick="$('.type').hide();$('#type1').show();">
							<input type="radio" name="status" value="1" <?php  if($cron['status'] == 1) { ?>checked<?php  } ?>/> 定时任务
						</label>
						<label class="radio-inline" onclick="$('.type').hide();$('#type2').show();">
							<input type="radio" name="status" value="2" <?php  if($cron['status'] == 2) { ?>checked<?php  } ?>/> 循环任务
						</label>
						<span class="help-block">定时任务是某个时间只执行一次，执行后将会自动关闭。定时群发的执行时间必须在当前时间一小时之后</span>
					</div>
				</div>
				<div class="form-group type" id="type1" <?php  if($cron['status'] == 2) { ?>style="display:none"<?php  } ?>>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">执行时间:</label>
					<div class="col-sm-10 col-xs-12">
						<?php  echo tpl_form_field_date('executetime', $cron['value'], true);?>
					</div>
				</div>
				<div class="type" id="type2" <?php  if($cron['status'] == 1) { ?>style="display:none"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">执行时间:</label>
						<div class="col-sm-10 col-xs-12">
							<label class="radio-inline" style="padding-top:0"> 每　月</label>
							<select name="day" id="day" class="form-control" style="display:inline-block;width:200px;" onclick="$(this).prev().find(':radio').prop('checked', true);$('#weekday').val(-1);">
								<option value="-1" <?php  if($cron['value'] == '-1') { ?>selected<?php  } ?>>*</option>
								<?php 
									for($i = 1; $i < 32; $i ++) {
										if($cron['value'] == $i && $cron['type']=='j') {
											echo '<option selected value="'.$i.'">'.$i.'日</option>';
								} else {
									echo '<option value="'.$i.'">'.$i.'日</option>';
								}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
						<div class="col-sm-10 col-xs-12">
							<label class="radio-inline" style="padding-top:0"> 或每周</label>
							<select name="weekday" id="weekday" class="form-control" style="display:inline-block;width:200px;"  onclick="$(this).prev().find(':radio').prop('checked', true);$('#day').val(-1);">
								<option value="-1" <?php  if($cron['value'] == '-1') { ?>selected<?php  } ?>>*</option>
								<option value="0" <?php  if($cron['value'] == '0' && $cron['type']=='w') { ?>selected<?php  } ?>>周日</option>
								<option value="1" <?php  if($cron['value'] == '1' && $cron['type']=='w') { ?>selected<?php  } ?>>周一</option>
								<option value="2" <?php  if($cron['value'] == '2' && $cron['type']=='w') { ?>selected<?php  } ?>>周二</option>
								<option value="3" <?php  if($cron['value'] == '3' && $cron['type']=='w') { ?>selected<?php  } ?>>周三</option>
								<option value="4" <?php  if($cron['value'] == '4' && $cron['type']=='w') { ?>selected<?php  } ?>>周四</option>
								<option value="5" <?php  if($cron['value'] == '5' && $cron['type']=='w') { ?>selected<?php  } ?>>周五</option>
								<option value="6" <?php  if($cron['value'] == '6' && $cron['type']=='w') { ?>selected<?php  } ?>>周六</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
						<div class="col-sm-10 col-xs-12">
							<label class="radio-inline" style="padding-top:0" onclick="$('#weekday, #day').val(-1);"> 或每天</label>
							<select name="hour" class="form-control" style="display:inline-block;width:200px;">
									<option value="-1" selected>*</option>
									<?php 
									for($i = 0; $i < 24; $i ++) {
										if($cron['value'] == $i &&  $cron['type']=='G') {
											echo '<option selected value="'.$i.'">'.$i.'时</option>';
									} else {
									echo '<option value="'.$i.'">'.$i.'时</option>';
									}
									}
									?>
						    </select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
						<div class="col-sm-10 col-xs-12">
							<label class="radio-inline" style="padding-top:0" onclick="$('#weekday, #day').val(-1);"> 或每小时</label>
							<select name="min" class="form-control" style="display:inline-block;width:200px;">
									<option value="-1" selected>*</option>
									<option value="01" >1分</option>
									<option value="02" >2分</option>
									<option value="03" >3分</option>
									<option value="04">4分</option>
									<option value="05">5分</option>
									<option value="06">6分</option>
									<option value="07" >7分</option>
									<option value="08" >8分</option>
									<option value="09" >9分</option>
									<?php 
									for($i = 10; $i < 60; $i ++) {
										if($cron['value'] == $i && $cron['type']=='i') {
											echo '<option selected value="'.$i.'">'.$i.'分</option>';
									} else {
									echo '<option value="'.$i.'">'.$i.'分</option>';
									}
									}
									?>
						    </select>
							<span class="help-block help-text">每小时指定分钟执行一次（不建议使用）。</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
						<div class="col-sm-10 col-xs-12">
							<label class="radio-inline" style="padding-top:0">或每隔</label>
							<input class="form-control" style="display:inline-block;width:200px;" placeholder="设置本任务的执行间隔" name="jiange" value="<?php  if($cron['type']=='jg') { ?><?php  echo $cron['value'];?><?php  } ?>"/>分钟执行
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
					<div class="col-sm-10 col-xs-12">
						<input type="hidden" value="<?php  echo $_W['token'];?>" name="token"/>
						<input type="hidden" name="form" value="<?php  echo $_W['token'];?>"/>
						<input type="submit" value="提交" class="btn btn-primary col-lg-1"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	require(['select2', 'validator'], function(){
		$('#module').select2();

		$('#form1').bootstrapValidator({
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: '任务名称不能为空'
						}
					}
				},
				
			}
		});
	});
</script>
<?php  } ?>

<?php  if($do == 'list') { ?>
<div class="clearfix">
	<form action="<?php  echo url('cron/display/del')?>" id="form1" method="post">
		<div class="panel panel-default">
			<div class="table-responsive panel-body">
				<table class="table table-hover">
					<thead class="navbar-inner">
					<tr>
						<th width="30"></th>
						<th>名称</th>

						<th>类型</th>
						<th style="width:150px;">执行时间</th>

						<th style="width:100px;">状态</th>
						<th width="200">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php  if(is_array($crons)) { foreach($crons as $cron) { ?>
						<tr>
							<td>
								<input type="checkbox" name="id[]" value="<?php  echo $cron['id'];?>"/>
							</td>
							<td><?php  echo $cron['name'];?></td>

							<td>
								<?php  if($cron['status'] == 1) { ?>
								<span class="label label-success">定时任务</span>
								<?php  } else { ?>
								<span class="label label-danger">循环任务</span>
								<?php  } ?>
							</td>
							<td><?php  echo $cron['cn'];?></td>

							<td>
								<span class="switch">
									<input type="checkbox" value="1" <?php  if($cron['open']==1) { ?> checked="checked" <?php  } ?> data-id="<?php  echo $cron['id'];?>"/>
								</span>
							</td>
							<td>
								<div class="btn-group">
									<a title="同步" class="btn btn-default btn-sm" href="<?php  echo url('cron/display/sync', array('id' => $cron['id']))?>">同步</a>
									<a title="编辑" class="btn btn-default btn-sm" href="<?php  echo url('cron/display/post', array('id' => $cron['id']))?>">编辑</a>
									<a title="执行" class="btn btn-default btn-sm"  onclick="if(!confirm('确定执行吗？'))  return false;" href="<?php  echo url('cron/display/run', array('id' => $cron['id']))?>">执行</a>
									<a title="删除" class="btn btn-default btn-sm" onclick="if(!confirm('确定删除吗？'))  return false;" href="<?php  echo url('cron/display/del', array('id' => $cron['id']))?>">删除</a>
								</div>
							</td>
						</tr>
						<?php  } } ?>
						<?php  if(!empty($crons)) { ?>
						<tr>
							<td>
								<input type="checkbox" id="selectall"/>
							</td>
							<td colspan="9">
								<input type="hidden" value="<?php  echo $_W['token'];?>" name="token"/>
								<input type="submit" value="删除" name="submit" class="btn btn-primary" onclick="if(!confirm('删除后将不可恢复,确定删除吗?'))return false;"/>
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>
<?php  } ?>
<script>
	require(['bootstrap.switch', 'select2', 'validator'], function(){
		$('#selectall').click(function(){
			$('#form1 :checkbox').prop('checked', $(this).prop('checked'));
		});

		$('.switch :checkbox').bootstrapSwitch();
		$('.switch :checkbox').on('switchChange.bootstrapSwitch', function(e, state){
			$this = $(this);
			var id = $this.data('id');
			var status = this.checked ? 1 : 0;
			$.post("<?php  echo url('cron/display/status');?>", {id:id, status:status}, function(resp){
				if(resp != 'success') {
					util.message(resp, '', 'error')
				} else {
					location.reload();
				}
				return false;
			});
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
