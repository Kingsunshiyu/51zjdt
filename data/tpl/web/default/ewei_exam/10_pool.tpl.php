<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('pool',array('op'=>'list'));?>">题库管理</a></li>    
        <li><a href="<?php  echo $this->createWebUrl('pool',array('op'=>'edit'));?>">添加题库</a></li>	
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="pool" />
              	<input type="hidden" name="paperid" value="<?php  echo $paperid;?>" />
            	<input type="hidden" name="add_paper" value="<?php  echo $add_paper;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">题库</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                     	<input class="form-control" name="title" type="text" value="<?php  echo $_GPC['title'];?>">
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
					<th class='with-checkbox' style="width:40px;">
                    	<input type="checkbox" class="check_all" />
					</th>
                    <th style="width:150px;">题库名称</th>
                    <th style="width:120px;">试题数</th>
                    <?php  if($add_paper == 0) { ?>
                    <th style="width:300px;">操作</th>
                    <?php  } ?>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>  <td class="with-checkbox">
                <input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>	
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['nums'];?></td>
                    <td>
                        <?php  if($add_paper == 0) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('upload_question',array('poolid'=>$item['id']))?>" title="导入试题">导入试题</a>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('question',array('poolid'=>$item['id']))?>" title="查看试题">查看试题</a>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('pool',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('pool',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="fa fa-times"></i></a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
					<td colspan="4">
                	<?php  if($add_paper == 1) { ?>
                		<input type="button" class="btn btn-primary" name="addquestionall" value="自动填充试题" />
                		<a class="btn btn-default" rel="tooltip" href="<?php  echo $url;?>" title="返回试卷">返回试卷</a>
                	<?php  } else { ?>
                	<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                	<?php  } ?>
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
$(function(){
   
    $(".check_all").click(function(){
       var checked = $(this).get(0).checked;
		$(':checkbox').each(function(){this.checked = checked});
    });

    $("input[name=addquestionall]").click(function() {
        var check = $("input:checked");
        if (check.length < 1) {
            message('请选择要从中填充试题的题库!','','error');
            return false;
        }
        if (confirm("确认要从选中的题库中自动填充试题?")) {
            var id = new Array();
            check.each(function(i) {
                id[i] = $(this).val();
            });
            $.post("<?php  echo $this->createWebUrl('pool',array('op'=>'addquestion'))?>", {idArr: id,type:'<?php  echo $_GPC['type'];?>',paperid:"<?php  echo $paperid;?>"}, function(data) {
                //alert(data.error);
                if (data.errno == 0)
                {
                    location.href = data.url;
                } else {
                    alert(data.errno);
                }
            }, 'json');
        }
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
		$.post("<?php  echo $this->createWebUrl('pool',array('op'=>'deleteall'))?>", {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}
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
