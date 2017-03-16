<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 课程分类管理
 * ============================================================================
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category');?>">分类列表</a></li>
    <li <?php  if($op=='post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category', array('op'=>'post', 'id'=>$_GPC['id']));?>"><?php  if($_GPC['id']>0) { ?>编辑<?php  } else { ?>添加<?php  } ?>分类</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style type="text/css">
.form-controls{display: inline-block; width:70px;}
.cblock{display:block !important;}
.cnone{display:none !important;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo MODULE_URL;?>template/style/category.css">
<div class="main">
    <div class="category">
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
					<div class="dd" id="div_nestable">
						<ol class="dd-list">
						<?php  if(is_array($category)) { foreach($category as $key => $row) { ?>
							 <li class="dd-item" onclick="<?php  echo $row['id'];?>">
								<div class="dd-handle" style="width:100%;">
								    <input type="text" class="form-control form-controls" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>">
									<img src="<?php  if(!empty($row['ico'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $row['ico'];?><?php  } else { ?><?php echo MODULE_URL;?>template/mobile/images/nopic.png<?php  } ?>" width="30" height="30"> &nbsp;&nbsp;[ID: <?php  echo $row['id'];?>] <?php  echo $row['name'];?>
									<span class="pull-right">
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $row['id']))?>" title="修改"><i class="fa fa-edit"></i></a>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $row['id']))?>" title="删除" onclick="return confirm('该操作不可恢复，确定删除？');return false;"><i class="fa fa-remove"></i></a>
									</span>
								</div>
							 </li>
						<?php  } } ?>
						</ol>
						<table class="table">
							 <tbody>
								 <tr>
									 <td>
										 <input name="submit" type="submit" class="btn btn-primary" value="批量排序">
										 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
									 </td>
								 </tr>
							 </tbody>
						</table>
					</div>
					<?php  echo $pager;?>
				</div>
			</div>
		</form>
	</div>
</div>
<?php  } else if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                分类信息
            </div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="catename" class="form-control" value="<?php  echo $category['name'];?>" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类图标</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('ico', $category['ico']);?>
						<span>建议尺寸200px * 200px</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="id" value="<?php  echo $id;?>" />
        </div>
	</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>