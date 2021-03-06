<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('course');?>">课程管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('course',array('op'=>'edit'));?>">添加课程</a></li>
        <!--<li><a href="<?php  echo $this->createWebUrl('course', array('op'=>'edit'));?>">添加试卷</a></li>-->
    </ul>
    <div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="ewei_exam" />
				<input type="hidden" name="do" value="course" />
				<input type="hidden" name="add_paper" value="<?php  echo $add_paper;?>" />
				<input type="hidden" name="paperid" value="<?php  echo $paperid;?>" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">标题</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<input class="form-control" name="title" type="text" value="<?php  echo $_GPC['title'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分类</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<select class='form-control' name='ccate'>
							<option value='' <?php  if(empty($_GPC['ccate'])) { ?>selected<?php  } ?>></option>
							<?php  if(is_array($category)) { foreach($category as $key => $value) { ?>
							<option value ="<?php  echo $value['id'];?>" <?php  if($_GPC['ccate']== $value['id']) { ?>selected="selected"<?php  } ?>><?php  echo $value['cname'];?></option>
							<?php  } } ?>
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
					<th class='with-checkbox' style="width:30px;">
                    	<input type="checkbox" class="check_all" />
					</th>
                    <th style="width:120px;">标题</th>
                    <th style="width:80px;">授课讲师</th>
                    <th style="width:150px;">开课时间</th>
                    <th style="width:120px;">授课时长</th>
                    <th style="width:100px;">报名限制</th>
                    <th style="width:100px;">访问人数</th>
                    <th style="width:100px:">报名人数</th>
                    <th style="width:80px;">状态</th>
                    <th style="width:200px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td class="with-checkbox">
                     	<input type="checkbox" name="check" value="<?php  echo $item['id'];?>">
					</td>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['teachers'];?></td>
                    <td><?php  echo date('Y-m-d H:i', $item['coursetime'])?></td>
                    <td><?php  echo $item['times'];?></td>
                    <td>
                        <?php  if($item['ctype']==1) { ?>
                        人数限制
                        <?php  } else { ?>
                        时间限制
                        <?php  } ?>
                    </td>
                    <td><?php  echo $item['viewnum'];?></td>
                    <td><?php  echo $item['fansnum'];?></td>
                    <td><?php  if($item['status']==1) { ?>
                        <span class='label label-success'>显示</span>
                    <?php  } else { ?>
                    <span class='label label-default'>隐藏</span>
                    <?php  } ?>
                    </td>
                    <td>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('course',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <?php  if($item['status']==0) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="显示" href="#" onclick="drop_confirm('您确定要显示此课程吗?', '<?php  echo $this->createWebUrl('course',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="fa fa-play"></i></a>
                        <?php  } else if($item['status']==1) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此课程吗?', '<?php  echo $this->createWebUrl('course',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="fa fa-stop"></i></a>
                        <?php  } ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('course',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
					<td colspan="10">
	   					<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    	<input type="button" class="btn btn-primary edit_all" name="showall" value="批量显示" />
                    	<input type="button" class="btn btn-primary edit_all" name="hideall" value="批量隐藏" />
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
	require(['util'], function(u){
		$(".check_all").click(function(){
			var checked = $(this).get(0).checked;
			$(':checkbox').each(function(){this.checked = checked});
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
				$.post("<?php  echo $this->createWebUrl('course',array('op'=>'deleteall'))?>", {idArr:id},function(data){
					if (data.errno ==0)
					{
						location.reload();
					} else {
						u.message(data.error, '', 'error');
					}
				},'json');
			}
		});

		$(".edit_all").click(function(){
			var name = $(this).attr('name');
			//alert(name);return false;
			var check = $("input:checked");
			if(check.length<1){
				u.message('请选择要操作的记录!','','error');
				return false;
			}
			var id = new Array();
			check.each(function(i){
				id[i] = $(this).val();
			});
			$.post("<?php  echo $this->createWebUrl('course',array('op'=>'showall'))?>", {idArr:id,show_name:name},function(data){
				location.reload();
			});
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
