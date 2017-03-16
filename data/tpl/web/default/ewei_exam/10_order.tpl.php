<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('reserve');?>">订单管理</a></li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" role="form" class='form form-horizontal'>
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="reserve" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">课程标题</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                       <input class="form-control" name="title" type="text" value="<?php  echo $_GPC['title'];?>">
                    </div>
                </div>
           		<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                     	<select name="ctype" class="form-control">
                            <option value="" <?php  if($_GPC['ctype']=='') { ?> selected="selected"<?php  } ?>></option>
                            <option value="0" <?php  if($_GPC['ctype']=='0') { ?> selected="selected"<?php  } ?>>时间限制</option>
                        	<option value="1" <?php  if($_GPC['ctype'] == 1 ) { ?> selected="selected"<?php  } ?>>人数限制</option>
                        </select>
                    </div>
                </div>
            	<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">预  定 人</label>
                    <div class="col-sm-4">
                      	<input class="form-control" name="username" id="" type="text" value="<?php  echo $_GPC['username'];?>" placeholder='姓名'/>
                    </div>
                    <div class="col-sm-4">
                       	<input class="form-control" name="mobile" id="" type="text" value="<?php  echo $_GPC['mobile'];?>" placeholder="手机号"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单编号</label>
                    <div class="col-xs-12 col-sm-9">
                    	<input class="form-control" name="ordersn" id="" type="text" value="<?php  echo $_GPC['ordersn'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单状态</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                       	<select name="status" class="form-control">
                        	<option value="" <?php  if($_GPC['status']=='') { ?> selected="selected"<?php  } ?>></option>
                        	<option value="0" <?php  if($_GPC['status']=='0') { ?> selected="selected"<?php  } ?>>等待确认</option>
                        	<option value="-1" <?php  if($_GPC['status'] == -1 ) { ?> selected="selected"<?php  } ?>>订单取消</option>
                        	<option value="1" <?php  if($_GPC['status'] == 1 ) { ?> selected="selected"<?php  } ?>>订单确认</option>
                        	<option value="2" <?php  if($_GPC['status'] == 2 ) { ?> selected="selected"<?php  } ?>>订单拒绝</option>
                        </select>
                    </div>
                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
		<div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
				<th class='with-checkbox' style="width:20px;">
					<input type="checkbox" class="check_all" />
				</th>
                <th style="width:100px;">订单编号</th>
                <th style="width:100px;">课程标题</th>
                <th style="width:80px;">报名限制</th>
                <th style="width:80px;">预定人</th>
                <th style="width:100px;">手机</th>
                <th style="width:120px;">订单时间</th>
                <th style="width:120px;">订单状态</th>
                <th style="width:150px;">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <td class="with-checkbox">
                    <input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>
                <td><?php  echo $row['ordersn'];?></td>
                <td><?php  echo mb_substr($row['title'],0,10,'utf-8')?></td>
                <td ><?php  if($row['ctype']==1) { ?>
                    人数限制
                    <?php  } else { ?>
                    时间限制
                    <?php  } ?>
                </td>
                <td><?php  echo $row['username'];?></td>
                <td><?php  echo $row['mobile'];?></td>
                <td ><?php  echo date("Y-m-d H:i:s",$row['createtime']); ?></td>
                <td>
                    <?php  if($row['status'] == 0) { ?><span class="label label-info"><?php  if($row['paytype']==1 || $row['paytype']==2) { ?>待付款<?php  } else { ?>等待确认<?php  } ?></span><?php  } ?>
                    <?php  if($row['status'] == -1) { ?><span class="label label-default">已取消</span><?php  } ?>
                    <?php  if($row['status'] == 1) { ?><span class="label label-success">已接受</span><?php  } ?>
                    <?php  if($row['status'] == 2) { ?><span class="label label-default">已拒绝</span><?php  } ?>
                    <?php  if($row['status'] == 3) { ?><span class="label label-success">订单完成</span><?php  } ?>
                </td>
                <td>
					<span>
                    	<a href="<?php  echo $this->createWebUrl('reserve', array('op'=>'edit', 'id' => $row['id'])); ?>" title="编辑" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>&nbsp;
                        <a onclick="return confirm('此操作不可恢复，确认吗？');return false;" href="<?php  echo $this->createWebUrl('reserve', array('op'=>'delete', 'id' => $row['id']))?>" title="删除" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                    </span>
				</td>
            </tr>
            <?php  } } ?>
            <tr>
                <td colspan="9">
                    <input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                </td>
            </tr>
            </tbody>
            <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
        </table>
		</div>
    </div>
	<?php  echo $pager;?>
</div>
<script>
    $(function(){

        $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
			$(':checkbox').each(function(){this.checked = checked});
        });
        $("input[name=deleteall]").click(function(){

            var check = $("input:checked");
            if(check.length<1){
                message('请选择要删除的记录!','','error');
                return false;
            }
            if( confirm("确认要删除选择的记录?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
                $.post("<?php  echo $this->createWebUrl('reserve',array('op'=>'deleteall'))?>", {idArr:id},function(data){
                    location.reload();
                },'json');
            }

        });
    });
</script>
<script>
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
