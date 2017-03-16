<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('member',array('op'=>'list'));?>">用户管理</a></li>    
        <li><a href="<?php  echo $this->createWebUrl('member',array('op'=>'edit'));?>">添加用户</a></li>	
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="member" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                     	<input class="form-control" name="username"  type="text" value="<?php  echo $_GPC['username'];?>">
                    </div>
                </div>
                <?php  if($this->_set_info['login_flag'] == 1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">用户名</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                     	<input class="form-control" name="userid"  type="text" value="<?php  echo $_GPC['userid'];?>">
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">手机号</label>
                    <div class="col-sm-8 col-lg-9">
                           <input class="form-control" name="mobile"  type="text" value="<?php  echo $_GPC['mobile'];?>">
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
					<th class='with-checkbox' style="width:30px;">
						<input type="checkbox" class="check_all" />
					</th>
                    <th style="width:80px;">序号</th>
                    <th style="width:100px;">姓名</th>
                    <?php  if($this->_set_info['login_flag'] == 1) { ?>
                    <th style="width:100px;">用户名</th>
                    <?php  } ?>
                    <th style="width:120px;">电话</th>
                    <th style="width:150px;">加入时间</th>
                    <th style="width:100px;">状态</th>
                    <th style="width:150px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td class="with-checkbox">
                        <input type="checkbox" name="check" value="<?php  echo $item['id'];?>">
                    </td>
                    <td><?php  echo $item['id'];?></td>
                    <td>
                        <?php  if($item['username'] != '') { ?>
                        <?php  echo $item['username'];?>
                        <?php  } else { ?>
                        <span class='label label-danger'>未完善</span>
                        <?php  } ?>
                    </td>
                    <?php  if($this->_set_info['login_flag'] == 1) { ?>
                    <td><?php  echo $item['userid'];?></td>
                    <?php  } ?>
                    <td>
                        <?php  if($item['mobile'] != '') { ?>
                        <?php  echo $item['mobile'];?>
                        <?php  } else { ?>
                        <span class='label label-danger'>未完善</span>
                        <?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i',$item['createtime'])?></td>
                    <td>
                        <?php  if($item['status'] > 0) { ?>
                        <span class='label label-success'>启用</span>
                        <?php  } else { ?>
                        <span class='label label-danger'>禁用</span>
                        <?php  } ?>
                    </td>
                    <td> 
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('member',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <?php  if($item['status']==0) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="显示" href="#" onclick="drop_confirm('您确定要启用此用户吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="fa fa-play"></i></a>
                        <?php  } else if($item['status']==1) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="隐藏" href="#" onclick="drop_confirm('您确定要禁用此用户吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="fa fa-stop"></i></a>
                        <?php  } ?>
                        <a class="btn btn-default btn-sm"  data-toggle="tooltip" data-placement="bottom" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="fa fa-remove"></i></a>
                        
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
				<td colspan="7">
					<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    <input type="button" class="btn btn-primary edit_all" name="showall" value="批量启用" />
                    <input type="button" class="btn btn-primary edit_all" name="hideall" value="批量禁用" />
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
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<script>
require(['util'], function(u){
    $(".check_all").click(function(){
        var checked = $(this).get(0).checked;
		$(':checkbox').each(function(){this.checked = checked});
    });

    $(".edit_all").click(function(){
        var name = $(this).attr('name');
        var check = $("input:checked");
        if(check.length<1){
            u.message('请选择要操作的记录!','','error');
            return false;
        }

        var id = new Array();
        check.each(function(i){
            id[i] = $(this).val();
        });
        $.post("<?php  echo $this->createWebUrl('member', array('op'=>'showall'))?>", {idArr:id,show_name:name},function(data){
            location.reload();
        });
    });

	$("input[name=deleteall]").click(function(){
 
		var check = $("input:checked");
		if(check.length<1){
			u.message('请选择要删除的记录!','','error');
			return false;
		}
        if( confirm("确认要删除选择的记录?")){
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post("<?php  echo $this->createWebUrl('member', array('op'=>'deleteall'))?>", {idArr:id},function(data){
				location.reload();
		});
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
