<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('paper');?>">试卷管理</a></li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="paper" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">标题</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                    	<input class="form-control" name="title"  type="text" value="<?php  echo $_GPC['title'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分类</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                    	<select class='form-control' name='pcate'>
                         	<option value='' <?php  if(empty($_GPC['pcate'])) { ?>selected<?php  } ?>></option>
                       		<?php  if(is_array($category)) { foreach($category as $key => $value) { ?>
                            <option value ="<?php  echo $value['id'];?>" <?php  if($_GPC['pcate']== $value['id']) { ?>selected="selected"<?php  } ?>><?php  echo $value['cname'];?></option>
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
      	<form action="./index.php" method="get" class="form-horizontal" role="form">
        <table class="table table-hover">
            <thead class="navbar-inner">
            	<tr>
					<th style='width:30px;'><input type="checkbox" class="check_all" /></th>
                    <th style="width:100px;">标题</th>
                    <th style="width:80px;">难度</th>
                    <th style="width:80px;">年份</th>
                    <th style="width:80px;">分数</th>
                    <th style="width:80px;">长时</th>
                    <th style="width:100px;">考试人数</th>
                    <th style="width:80px;">平均分</th>
                    <th style="width:100px;">状态</th>
                    <th style="width:120px;">试题是否完整</th>
                    <th style="width:350px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['level'];?>星</td>
                    <td><?php  echo $item['year'];?></td>
                    <td><?php  echo $item['score'];?></td>
                    <td><?php  echo $item['times'];?></td>
                    <td><?php  echo $item['fansnum'];?></td>
                    <td><?php  echo $item['avscore'];?></td>
                    <td>
					<?php  if($item['status']==1) { ?>
                        <span class='label label-success'>显示</span>
                    <?php  } else { ?>
                    	<span class='label label-danger'>隐藏</span>
                    <?php  } ?>
                    <td>
                        <?php  if($item['isfull']==1) { ?>
                            <span class='label label-success'>完整</span>
                        <?php  } else { ?>
                            <span class='label label-danger'>不完整</span>
                        <?php  } ?>
                    </td>
                    </td>
                    <td>
                        <a class="btn btn-default" href="<?php  echo $this->createWebUrl('paper_member',array('id'=>$item['id']))?>" class="btn" rel="tooltip" title="考生查看"><i class="fa fa-list-alt"></i> 考生查看</a>
                        <a class="btn btn-default"href="<?php  echo $this->createWebUrl('paper',array('op'=>'editquestion','id'=>$item['id']))?>" class="btn" rel="tooltip" title="编辑试题"><i class="fa fa-list-alt"></i> 编辑试题</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('paper',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <?php  if($item['status']==0) { ?>
                        <a class="btn  btn-default" title="显示" href="#" onclick="drop_confirm('您确定要显示此试卷吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="fa fa-play"></i></a>                                       
                        <?php  } else if($item['status']==1) { ?>
                        <a class="btn  btn-default" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此试卷吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="fa fa-stop"></i></a>                                       														
                        <?php  } ?>
                        <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
				<td colspan="11">
	   				<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    <input type="button" class="btn btn-primary edit_all" name="showall" value="批量显示" />
                    <input type="button" class="btn btn-primary edit_all" name="hideall" value="批量隐藏" />
				</td>
				</tr>
            </tbody>
            <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
        </table>
		</form>
		</div>
		</div>
	<?php  echo $pager;?>
    </div>
</div>

<script>
    function message(msg){
        require(['util'],function(){
            util.message(msg);
        })
    }
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
		$.post("<?php  echo $this->createWebUrl('paper', array('op'=>'deleteall', 'name' => 'ewei_exam'))?>", {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}
		},'json');
		}
	});
    $(".edit_all").click(function(){
        var name = $(this).attr('name');
        //alert(name);return false;

        var check = $("input:checked");
        if(check.length<1){
            message('请选择要操作的记录!','','error');
            return false;
        }

        var id = new Array();
        check.each(function(i){
            id[i] = $(this).val();
        });
        $.post("<?php  echo $this->createWebUrl('paper', array('op'=>'showall', 'name' => 'ewei_exam'))?>", {idArr:id,show_name:name},function(data){
           
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
