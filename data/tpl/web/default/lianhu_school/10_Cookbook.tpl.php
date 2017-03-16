<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<style>
    .margin-5{
        display: inline-block;
        margin-bottom: 5px;
    }
</style>

<ul class="nav nav-tabs">
	<li class="active">
	<a href="<?php  echo $this->createWebUrl('cookbook')?>">食谱列表</a>
	</li>
</ul>

	<div class="main">
	<form  method="post" class="form-horizontal form" >
	 <input type="hidden" name="cid"  class="form-control" value='<?php  echo $class_result['class_id'];?>' />
		<div class="panel panel-default">
		<div class="panel-heading">
			新建/编辑 校园食堂【如果（早餐|中午餐|晚餐）没有，则不填写即可】
		</div>
		</div>
					<?php  if(is_array($display_list)) { foreach($display_list as $key => $row) { ?>
					 	 <?php  if($key+1 <= $on_school ) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									星期 <?php  echo $begin_course+$key;?> 
								</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">早餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='breakfast[<?php  echo $key;?>]'  class='form-control' value='<?php  echo $list[$key]['cookbooK_breakfast'];?>'> 					
												</div>
										</div> 
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">午餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='lunch[<?php  echo $key;?>]'  class='form-control' value="<?php  echo $list[$key]['cookbook_lunch'];?>"> 					
												</div>
										</div> 
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">下午餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='dinner[<?php  echo $key;?>]'  class='form-control' value='<?php  echo $list[$key]['cookbook_dinner'];?>'> 					
												</div>
										</div> 																			
									</div>
								</div>			
							</div>
						 <?php  } ?>
					<?php  } } ?>
			<div class="form-group col-sm-12">
				<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		 </div>				
	</form>
	</div>