<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li><a href="<?php  echo $this->createWebUrl('paper');?>">试卷管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('paper_type',array('op'=>'display'));?>">添加试卷</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('paper_member',array('id'=>$paperid));?>">考生查看</a></li>
        <!--<li><a href="<?php  echo $this->createWebUrl('paper', array('op'=>'edit'));?>">添加试卷</a></li>-->
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="paper_member" />
                   	<input type="hidden" name="id" value="<?php  echo $paperid;?>" />
                    <div class="form-group">
                    	<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
                    	<div class="col-sm-8 col-lg-9">
                            <input class="form-control" name="username"  type="text" value="<?php  echo $_GPC['username'];?>">
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
                    <!--<th class='with-checkbox'><input type="checkbox" class="check_all" /></th>-->
                    <th style="width:80px;">编号</th>
                    <th style="width:150px;">姓名</th>
                    <th style="width:120px;">手机</th>
                    <th style="width:150px;">用时</th>
                    <th style="width:150px;">得分</th>
                    <th style="width:150px;">平均用时</th>
                    <th style="width:100px;">平均成绩</th>
                    <th style="width:200px;">考试时间</th>
                    <!--<th>操作</th>-->
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <!--<td class="with-checkbox">-->
                    <!--<input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>	-->
                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['username'];?></td>
                    <td><?php  echo $item['mobile'];?></td>
                    <td><?php  echo format_use_time($item['times'])?></td>
                    <td><?php  echo $item['score'];?></td>
                    <td><span class="label label-info"><?php  echo format_use_time($item['avtimes'])?></span></td>
                    <td><span class="label label-success"><?php  echo $item['avscore'];?>分</span></td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
                    <!--<td>-->
                        <!--<a href="<?php  echo $this->createWebUrl('paper_member',array('id'=>$item['id']))?>" class="btn" rel="tooltip" title="考生查看"><i class="list-alt"></i>考生查看</a>-->
                        <!--<a href="<?php  echo $this->createWebUrl('paper',array('op'=>'editquestion','id'=>$item['id']))?>" class="btn" rel="tooltip" title="编辑试题"><i class="list-alt"></i>编辑试题</a>-->
                        <!--<a class="btn" rel="tooltip" href="<?php  echo $this->createWebUrl('paper',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="icon-edit"></i></a>-->
                        <?php  if($item['status']==0) { ?>
                        <!--<a class="btn" title="显示" href="#" onclick="drop_confirm('您确定要显示此试卷吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');"><i class="icon-play"></i></a>                                       -->
                        <?php  } else if($item['status']==1) { ?>
                        <!--<a class="btn" title="隐藏" href="#" onclick="drop_confirm('您确定要隐藏此试卷吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');"><i class="icon-stop"></i></a>                                       														-->
                        <?php  } ?>
                        <!--<a class="btn" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('paper',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="icon-remove"></i></a>-->
                    <!--</td>-->
                </tr>
                <?php  } } ?>
                <tr>
				<td colspan="8">
	                <!--<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />-->
                    <!--<input type="button" class="btn btn-primary edit_all" name="showall" value="批量显示" />-->
                    <!--<input type="button" class="btn btn-primary edit_all" name="hideall" value="批量隐藏" />-->
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
       $("input[type=checkbox]").attr("checked",checked);
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
		$.post("<?php  echo $this->createWebUrl('paper',array('op'=>'deleteall', 'name' => 'ewei_exam'))?>", {idArr:id},function(data){
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
        $.post("<?php  echo $this->createWebUrl('paper',array('op'=>'showall', 'name' => 'ewei_exam'))?>", {idArr:id,show_name:name},function(data){
            location.reload();
        },'json');
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
