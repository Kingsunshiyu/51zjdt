<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/main.css"/>

<?php  if($operation == 'display') { ?>
<script>
require(['bootstrap'],function($){
	$('.btn,.tips').hover(function(){
		$(this).tooltip('show');
	},function(){
		$(this).tooltip('hide');
	});
});
</script>

<div class="main">
    <style>
        .form-control-excel {
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
    </style>
	<script src="../addons/fm_jiaoyu/public/web/js/webuploader.js"></script>
	<script src="../addons/fm_jiaoyu/public/web/js/wlzyList.js"></script>
    <div class="panel panel-info">
        <div class="panel-heading">报名管理</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="signup" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
				 <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按年级</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="nj_id" class="form-control">
                            <option value="">请选择年级搜索</option>
                            <?php  if(is_array($njlist)) { foreach($njlist as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['nj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>				 
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按班级</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="bj_id" class="form-control">
                            <option value="">请选择班级搜索</option>
                            <?php  if(is_array($bjlist)) { foreach($bjlist as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按审核</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="status" class="form-control">
                            <option value="">请审核装搜索</option>
                            <option value="1">审核中</option>
                            <option value="2">已通过</option>
							<option value="3">已拒绝</option>
                        </select>
                    </div>					
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>					
				</div>	
            </form>
        </div>
    </div>	
	<div class="panel panel-default" >
		<div class="table-responsive panel-body">
			<div id="queue-setting-index-body">
				<div class="viewList" >
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<div class="viewBox" style="width:320px;background-color:#F5EFEF;border-top-left-radius: 3%;border-top-right-radius: 3%;border-bottom-left-radius: 3%;border-bottom-right-radius: 3%;">
					<a class="btn btn-default btn-sm" style="background-color:#F5EFEF;position: relative;top:-15px;right:-295px;width:23px;height:23px;border-radius:50%;" href="<?php  echo $this->createWebUrl('signup', array('id' => $row['id'], 'op' => 'delete', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times" style="top: -4px;right: 4px;position: relative;"></i></a>
						<div class="content" style="margin-top: -20px;border-bottom:1px solid #c6c6c6;height:auto;">					
								<a class="lightgray" >
									<span><img style="width:30px;height:30px;border-radius:50%;" src="<?php  echo tomedia($row['avatar'])?>"></span>&nbsp;
									<span style="width:36px;text-overflow:hidden;white-space:nowrap;" class="label label-warning"><?php  echo $row['nickname'];?></span>
									<span <?php  if($row['status'] ==1) { ?>class="label label-warning"<?php  } else if($row['status'] ==2) { ?>class="label label-success"<?php  } else if($row['status'] ==3) { ?>class="label label-danger"<?php  } ?>><?php  if($row['status'] ==1) { ?>审核中<?php  } else if($row['status'] ==2) { ?>已通过<?php  } else if($row['status'] ==3) { ?>已拒绝<?php  } ?></span>
									<span <?php  if($row['order'] ==1) { ?>class="label label-warning"<?php  } else if($row['order'] ==2) { ?>class="label label-success"<?php  } else if($row['order'] ==3) { ?>class="label label-danger"<?php  } ?>><?php  if($row['order'] ==1) { ?>未付费<?php  } else if($row['order'] ==2) { ?>已付费<?php  } else if($row['order'] ==3) { ?>已退费<?php  } ?></span>
									<?php  if($row['status'] == 1) { ?>
								    <a onclick="return confirm('确认通过申请，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('signup', array('op' => 'pass', 'schoolid' => $schoolid, 'id' => $row['id']))?>">通过</a>
									<a onclick="return confirm('确认拒绝申请，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('signup', array('op' => 'defid', 'schoolid' => $schoolid, 'id' => $row['id']))?>">拒绝</a>
									<?php  } ?>
								</a>								
						</div>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-warning" style="float:left">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo $row['name'];?></span>
						</div>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-success" style="float:left">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  if($row['sex'] == 1) { ?>男<?php  } else { ?>女<?php  } ?></span>
						</div>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo $row['mobile'];?></span>
						</div>
						<?php  if(!empty($row['birthday'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo date('Y年m月d日', $row['birthday'])?></span>
						</div>
						<?php  } ?>
						<?php  if(!empty($row['nj_id'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo $row['njname'];?></span>
						</div>
						<?php  } ?>
						<?php  if(!empty($row['bj_id'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">班&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo $row['bjname'];?></span>
						</div>
						<?php  } ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">申请时间</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo date('Y-m-d H:m', $row['createtime'])?></span>
						</div>
						<?php  if(!empty($row['passtime'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">处理时间</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  echo date('Y-m-d H:m', $row['passtime'])?></span>
						</div>
						<?php  } ?>
						<?php  if(!empty($row['cost'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">报名费用</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;￥<?php  echo $row['cost'];?></span>
						</div>
						<?php  } ?>
						<?php  if(!empty($row['pard'])) { ?>
						</br>
						<div class="nameAndTime" width="100%" height="100%" border="1" style="border-bottom:1px solid #c6c6c6;">
							<span class="label label-info" style="float:left">关&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;系</span>
							<span class="name" style="width:200px;">&nbsp;&nbsp;&nbsp;<?php  if($row['pard'] == 2) { ?>母亲<?php  } else if($row['pard'] == 3) { ?>父亲<?php  } else if($row['pard'] == 4) { ?>本人<?php  } ?></span>
						</div>
						<?php  } ?>						
					</div>
				<?php  } } ?>
				</div>
			</div>	
		</div>
	</div>
	<?php  echo $pager;?>
</div>		
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>