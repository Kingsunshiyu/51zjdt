<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'display'))?>">课程分类</a></li>
    <li <?php  if($operation == 'post' && empty($item['id'])) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'post'))?>">添加课程分类</a></li>
    <?php  if($operation == 'post'  && !empty($item['id'])) { ?>
    <li class="active"><a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'post'))?>">编辑课程分类</a></li>
    <?php  } ?>
</ul>
<?php  if($operation == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return formcheck()">
     	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
        <div class="panel panel-default">
         	<div class="panel-heading">
                分类详细设置
            </div>
            <div class="panel-body">
                <?php  if(!empty($parentid)) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">上级分类</label>
                    <div class="col-sm-9 col-xs-12 control-label" style="text-align:left;"><?php  echo $parent['cname'];?></div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" id='cname' name="cname" class="form-control" value="<?php  echo $item['cname'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类描述</label>
                    <div class="col-sm-9 col-xs-12">
                         <textarea name="description" class="form-control" cols="70"><?php  echo $item['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-sm-9 col-xs-12">
                             <label class='radio-inline'>
                        <input type='radio' name='status' value='0' <?php  if($item['status']==0) { ?>checked<?php  } ?>/> 隐藏
                    </label>
                    <label class='radio-inline'>
                        <input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?>/> 显示
                    </label>
                    </div>
                </div>
            </div>
      	</div>
      	<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	 	</div>
    </form>
</div>
<script type="text/javascript">
    function formcheck(){
        if($("#cname").isEmpty()){
            Tip.focus("cname","请输入分类名称!","right");
            return false;
        }
        return true;
    }
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main panel panel-default">
    <div class="category panel-body table-responsive">
        <form action="" method="post" onsubmit="return formcheck(this)">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:10px;"></th>
                        <th style="width:120px;">显示顺序</th>
                        <th style="width:120px;">分类名称</th>
                        <th style="width:100px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($category)) { foreach($category as $row) { ?>
                    <tr>
                        <td><?php  if(count($children[$row['id']]) > 0) { ?><a href="javascript:;"><i class="fa fa-chevron-down"></i></a><?php  } ?></td>
                        <td><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
                        <td><div class="type-parent"><?php  echo $row['cname'];?>&nbsp;&nbsp;
                                <?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('course_category', array('parentid' => $row['id'], 'op' => 'post'))?>"><i class="fa fa-plus-circle"></i> 添加子分类</a><?php  } ?></div></td>
                        <td>
							<a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'post', 'id' => $row['id']))?>"data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm" title="编辑"><i class="fa fa-edit"></i></a>
							<a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;"data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm" title="删除"><i class="fa fa-times"></i></a>
						</td>
                    </tr>
                    <?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
                    <tr>
                        <td></td>
                        <td>
							<input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>">
						</td>
                        <td><div class="type-child"><?php  echo $row['cname'];?>&nbsp;&nbsp;</div></td>
                        <td>
							<a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'post', 'id' => $row['id']))?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm" title="编辑"><i class="fa fa-edit"></i></a>
							<a href="<?php  echo $this->createWebUrl('course_category', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm" title="删除"><i class="fa fa-times"></i></a>
						</td>
                    </tr>
                    <?php  } } ?>
                    <?php  } } ?>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <input name="submit" type="submit" class="btn btn-primary" value="提交排序">
	                        <a class='btn btn-default' href="<?php  echo $this->createWebUrl('course_category', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新分类</a>
	                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php  } ?>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
