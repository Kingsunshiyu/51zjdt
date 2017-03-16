<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    table li{padding:5px 0;}
    small a{color:#999;}
	.control-label{text-align:right;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">表单列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建表单</a></li>
	<li><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>">表单记录</a></li>
	<li class="active"><a href="#">表单详情</a></li>
</ul>
<div class="main">
        <div class="panel panel-default">
            <div class="">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="navbar-inner">
                        <tr class="warning">
							<th style="width:200px;text-align:right">项目：</th>
                            <th>内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
							<td style="text-align:right">客户：</td>
							<td><?php  echo $row['member'];?></td>
						</tr>
                        <tr>
							<td style="text-align:right">手机：</td>
							<td><?php  echo $row['mobile'];?></td>
						</tr>
                        <tr>
							<td style="text-align:right">用户提交时间：</td>
							<td><?php  echo date('Y-m-d H:i:s', $row['createtime']);?></td>
						</tr>
              	<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
                        <tr>
							<td style="text-align:right"><?php  echo $ftitle['fid'];?>：</td>
							<td>
                            <?php  if($ftitle['type'] == 'image') { ?>
                            <?php  if($row['fields'][$fid]) { ?><a target="_blank" href="<?php  echo tomedia($row['fields'][$fid]);?>">点击查看<?php  echo $ftitle['fid'];?><img src="<?php  echo tomedia($row['fields'][$fid]);?>" height="50"></a><?php  } else { ?>用户未上传<?php  } ?>
                            <?php  } else { ?>
                            <?php  echo $row['fields'][$fid];?>
                            <?php  } ?>&nbsp;
							</td>
						</tr>
                <?php  } } ?>
				<tr>
					<td style="text-align:right">表单状态：</td>
					<td><span class="btn btn-default btn-danger"><?php  if($row['status'] == '0') { ?>待确认<?php  } else if($row['status'] == '1') { ?>已受理<?php  } else if($row['status'] == '2') { ?>已拒绝<?php  } else if($row['status']=='3') { ?>已完成<?php  } else if($row['status']=='-1') { ?>客户取消了预约<?php  } ?></span></td>
				</tr>
					</tbody>
				</table>
            </div>
        </div>
		
       <form class="form" method="post" id="form" action="">
        <div class="panel panel-default">
            <div class="panel-heading">
                更新表单状态
            </div>
            <div>
                <table class="table table-hover">
                    <tbody>
                        <tr>
							<td style="width:200px;text-align:right">表单状态：</td>
                            <td>
        <select id="status" name="status" class="form-control">
             <option value="0" <?php  if($row['status'] == 0) { ?>selected="selected"<?php  } ?>>待确认</option>
             <option value="1"  <?php  if($row['status'] == 1) { ?>selected="selected"<?php  } ?>>确认</option>
             <option value="2" <?php  if($row['status'] == 2) { ?>selected="selected"<?php  } ?>>拒绝受理</option>
             <option value="3" <?php  if($row['status'] == 3) { ?>selected="selected"<?php  } ?>>完成</option>
        </select></td>
                        </tr>
                        <tr>
							<td style="text-align:right">受理时间：</td>
							<td>
							<?php  echo tpl_form_field_date('yuyuetime', $yuyuetime, true)?>
							</td>
						</tr>
                        <tr>
							<td style="text-align:right">客服备注：</td>
							<td><textarea class="form-control" rows="5" cols="50" id="kfinfo" name="kfinfo"><?php  echo $row['kfinfo'];?></textarea></td>
						</tr>
					</tbody>
				</table>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php  echo $row['rerid'];?>" />
       <button type="submit" name="button" class="btn btn-primary span3">保存</button> 
       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
       </form>
</div>
        <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading">
                表单信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单标题</label>
                    <div class="col-xs-12 col-sm-9">
                    	<p class="form-control-static"><?php  echo $activity['title'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单说明</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['description'];?></p>
                    </div>
                </div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['information'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片介绍</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><img src="<?php  echo tomedia($activity['thumb']);?>" style="height:150px;" /></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">创建时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['createtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间~结束时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['starttime']);?> ~ <?php  echo date('Y-m-d H:i:s', $activity['endtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-xs-12 col-sm-9">
                    	<label>
							<p class="form-control-static">
							<?php  if($activity['status'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前表单生效中</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前表单已失效</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
                  		<label>
							<p class="form-control-static">
							<?php  if($activity['inhome'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前表单将展示在微站首页上</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前表单不显示在微站首页</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                   </div>
            </div>
        </div>
<!--<input type="submit" class="btn btn-primary span3" name="submit" onclick="history.go(-1)" value="返回" />-->

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
