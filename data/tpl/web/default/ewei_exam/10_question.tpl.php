<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li class="active"><a href="<?php  echo $this->createWebUrl('question',array('op'=>'list'));?>">试题管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('question',array('op'=>'edit'));?>">添加试题</a></li>
        <li><a href='<?php  echo $this->createWebUrl('upload_question',array('poolid'=>$item['id']))?>'>导入试题</a></li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="question" />
       			<input type="hidden" name="add_paper" value="<?php  echo $add_paper;?>" />
            	<input type="hidden" name="paperid" value="<?php  echo $paperid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">试题</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                      	<input class="form-control" name="question" type="text" value="<?php  echo $_GPC['question'];?>">
                    </div>
                </div>
             	<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">类型</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                     	<select class='form-control' name='type'>
							<option value='' <?php  if(empty($_GPC['type'])) { ?>selected<?php  } ?>></option>
							<?php  if(is_array($types_config)) { foreach($types_config as $key => $value) { ?>
							<option value ="<?php  echo $key;?>" <?php  if($_GPC['type']== $key) { ?>selected="selected"<?php  } ?>><?php  echo $value;?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">题库</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                      	<select class='form-control' name='poolid'>
							<option value='0' <?php  if(empty($_GPC['poolid'])) { ?>selected<?php  } ?>></option>
							<?php  if(is_array($pools)) { foreach($pools as $key => $value) { ?>
							<option value ="<?php  echo $value['id'];?>" <?php  if($_GPC['poolid']== $value['id']) { ?>selected="selected"<?php  } ?>><?php  echo $value['title'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                        <button class="btn btn-default" name="export" value="export"><i class="fa fa-download"></i> 导出数据</button>
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
					<th class='with-checkbox' style="width:10px;">
                        <input type="checkbox" class="check_all" />
                    </th>
                    <th style="width:100px;">试题</th>
                    <th style="width:120px;">所属题库</th>
                    <th style="width:100px;">类型</th>
                    <th style="width:100px;">难度</th>
                    <th style="width:100px;">答题数</th>
                    <th style="width:100px;">正确率</th>
                    <th style="width:100px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td class="with-checkbox">
                        <input type="checkbox" name="check" value="<?php  echo $item['id'];?>">
                    </td>
                    <td><?php  echo mb_substr($item['question'],0,20,'utf-8')?>...</td>
                    <!--<td><?php  echo $item['paper_name'];?></td>-->
                    <td><?php  echo $item['pooltitle'];?></td>
                    <td><?php  echo $item['type_name'];?></td>
                    <td><?php  echo $item['level'];?></td>
                    <td><?php  echo $item['fansnum'];?></td>
                    <td><?php  echo $item['percent'];?>%</td>
                    <td>
                        <?php  if($add_paper == 1) { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('question',array('op'=>'addquestion','id'=>$item['id'],'type'=>$item['type'],'paperid'=>$paperid))?>" title="添加到试卷">添加到试卷</a>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $url;?>" title="返回试卷">返回试卷</a>
                        <?php  } else { ?>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('question',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('question',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除"><i class="fa fa-remove"></i></a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
                    <td colspan="8">
                        <?php  if($add_paper == 1) { ?>
                        <input type="button" class="btn btn-primary" name="addquestionall" value="批量添加到试卷" />

                        <a class="btn" rel="tooltip" href="<?php  echo $url;?>" title="返回试卷">返回试卷</a>
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
	require(['util'], function(u){
		$('#myTab a').click(function(e) {
			e.preventDefault();//阻止a链接的跳转行为
			$(this).tab('show');//显示当前选中的链接及关联的content
		});
		$(".check_all").click(function() {
			var checked = $(this).get(0).checked;
			$(':checkbox').each(function(){this.checked = checked});
		});

		$("input[name=addquestionall]").click(function() {

			var check = $("input:checked");
			if (check.length < 1) {
				u.message('请选择要批量添加的试题!','','error');
				return false;
			}
			if (confirm("确认要批量添加选择的试题?")) {
				var id = new Array();
				check.each(function(i) {
					id[i] = $(this).val();
				});
				$.post("<?php  echo create_url('site/entry', array('do' => 'question','op'=>'addquestion', 'm' => 'ewei_exam','paperid'=>$paperid))?>", {idArr: id,type:'<?php  echo $_GPC['type'];?>'}, function(data) {
					if(data.message) {
						u.message(data.message, '', 'error');
					} else {
						location.reload();
					}
				}, 'json');
			}
		});

		$("input[name=deleteall]").click(function() {

			var check = $("input:checked");
			if (check.length < 1) {
				u.message('请选择要删除的记录!','','error');
				return false;
			}
			if (confirm("确认要删除选择的记录?")) {
				var id = new Array();
				check.each(function(i) {
					id[i] = $(this).val();
				});
				$.post("<?php  echo create_url('site/entry', array('do' => 'question','op'=>'deleteall', 'm' => 'ewei_exam'))?>", {idArr: id}, function(data) {
					if (data.errno == 0)
					{
						location.reload();
					} else {
						u.message(data.error, '', 'error');
					}
				}, 'json');
			}
		});
	});
</script>
<script>
    function drop_confirm(msg, url) {
        if (confirm(msg)) {
            window.location = url;
        }
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
