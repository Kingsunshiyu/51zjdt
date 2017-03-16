<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paper',array('op'=>'list'));?>">试卷管理</a></li>
        <?php  if($op=='edit' && empty($item['id'])) { ?>
        <li class="active"><a href="javascript:;">添加试卷</a></li>
        <!--<li class="active"><a href="<?php  echo $this->createWebUrl('paper',array('op'=>'edit'));?>">添加试卷</a></li>-->
        <?php  } ?>
        <?php  if($op=='edit' && !empty($item['id'])) { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('paper', array('op'=>'edit','id'=>$id));?>">编辑试卷</a></li>
        <?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <input type="hidden" name="tid" value="<?php  echo $tid;?>">
 		<div class="panel panel-default">
            <div class="panel-heading">
                试卷编辑
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">   
                        <input type='text' id='displayorder' name='displayorder' value="<?php  echo $item['displayorder'];?>" class='form-control' />
                    </div>
                </div>
               	<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷类型</label>
                    <div class="col-sm-9 col-xs-12">   
                         <input type='text' id='types' name='types' value="<?php  echo $type_item['title'];?>" readonly="" class='form-control' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷分类</label>
                    <div class="col-sm-3 col-xs-12">   
                        <input type='hidden' id='pcate' name='pcate' value="<?php  echo $paper_category['id'];?>" />
                        <div class='input-group'>
                   			<input type="text" name="paper_category" maxlength="30" value="<?php  echo $paper_category['title'];?>" id="paper_category"  readonly class='form-control' />
                   			<div class='input-group-btn'>
                   				<button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus1').modal();">选择</button>
                   				<button class="btn btn-default" type="button" onclick="clear_paper_category()">清除</button>
                   			</div>
                   		</div>
                   		<div id="modal-module-menus1" class="modal fade ">
                       		<div class='modal-dialog' style='width:920px;'>
                       			<div class="modal-content">
                       				<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择分类</h3></div>
                       				<div class="modal-body">
                         				<div class='input-group'>
                             				<input type="text" class="form-control" name="keyword" value="" id="search-kwd1" placeholder="搜索关键词" />
                                       		<div class='input-group-btn'>
                                       			<button type="button" class="btn btn-default" onclick="search_paper_categorys();">搜索</button>
                                       		</div>
                                        </div>
                           				<div id="module-menus1" style='padding-top:5px;'></div>
                       				</div>
                       				<div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                   				</div>
                    		</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷标题</label>
                    <div class="col-sm-9 col-xs-12">   
                          <input type='text' id='title' name='title' value="<?php  echo $item['title'];?>"  class='form-control'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷年份</label>
                    <div class="col-sm-9 col-xs-12">   
                        <select class='form-control' id='year' name='year'>
                            <?php  if(is_array($year_array)) { foreach($year_array as $key => $value) { ?>
                                <option value ="<?php  echo $value;?>" <?php  if($item['year'] == $value) { ?>selected="selected"<?php  } ?>><?php  echo $value;?></option>
                            <?php  } } ?>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷难度</label>
                    <div class="col-sm-3 col-xs-12">   
                       <select class='form-control' id='level' name='level'>
                   			<option value ="1" <?php  if($item['level'] == 1 || $item['level'] == 0) { ?>selected="selected"<?php  } ?>>1</option>
                   			<option value ="2" <?php  if($item['level'] == 2) { ?>selected="selected"<?php  } ?>>2</option>
                   			<option value ="3" <?php  if($item['level'] == 3) { ?>selected="selected"<?php  } ?>>3</option>
                   			<option value ="4" <?php  if($item['level'] == 4) { ?>selected="selected"<?php  } ?>>4</option>
                   			<option value ="5" <?php  if($item['level'] == 5) { ?>selected="selected"<?php  } ?>>5</option>
                   			<option value ="6" <?php  if($item['level'] == 6) { ?>selected="selected"<?php  } ?>>6</option>
                   			<option value ="7" <?php  if($item['level'] == 7) { ?>selected="selected"<?php  } ?>>7</option>
                   			<option value ="8" <?php  if($item['level'] == 8) { ?>selected="selected"<?php  } ?>>8</option>
                   			<option value ="9" <?php  if($item['level'] == 9) { ?>selected="selected"<?php  } ?>>9</option>
                   			<option value ="10" <?php  if($item['level'] == 10) { ?>selected="selected"<?php  } ?>>10</option>
               			</select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷分制</label>
                    <div class="col-sm-3 col-xs-12">   
                      	<div class="input-group">
                        	<input type="text" class="form-control" name="score" value="<?php  echo $type_item['score'];?>" readonly=""/>
                            <span class="input-group-addon">分</span>
                    	</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷时间</label>
                    <div class="col-sm-3 col-xs-12">   
                     	<div class="input-group">
                            <input type="text" class="form-control" name="times" value="<?php  echo $type_item['times'];?>" readonly=""/>
                          	<span class="input-group-addon">分钟</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷题型</label>
                    <div class="col-sm-9 col-xs-12 form-control-static">
						<?php  if(is_array($types)) { foreach($types as $key => $value) { ?>
						<?php  if($value['has'] == 1) { ?>
						<?php  echo $types_config[$key];?>(<?php  echo $value['num'];?>道 共<?php  echo $value['sum_score'];?>分)&nbsp;&nbsp;
						<?php  } ?>
						<?php  } } ?>
                    </div>
                </div>
                <?php  if($id!='') { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">当前题数</label>
                    <div class="col-sm-9 col-xs-12 form-control-static">
                    	<?php  if(is_array($types)) { foreach($types as $key => $value) { ?>
                   		<?php  if($value['has'] == 1) { ?>
                   			<?php  echo $types_config[$key];?>(<?php  echo $now_question_data[$key]['num'];?>/<?php  echo $value['num'];?>道)&nbsp;&nbsp;
                   		<?php  } ?>
                   		<?php  } } ?>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷简介</label>
                    <div class="col-sm-9 col-xs-12">   
                     	<textarea style="height:100px;" id="description" name="description" class="form-control" cols="60"><?php  echo $item['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-sm-3 col-xs-12">   
                        <label class="radio-inline">
                        	<input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>显示
               			</label>
                   		<label class="radio-inline">
                       		<input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>隐藏
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
$(function () {
	$('#myTab a').click(function (e) {
		e.preventDefault();//阻止a链接的跳转行为
		$(this).tab('show');//显示当前选中的链接及关联的content
	})
	//$('#tab_list').click();
});

function clear_paper_category(){
    $("#pcate").val("");
    $("#paper_category").val("");
}

function search_paper_categorys() {
    $("#module-menus1").html("正在搜索....")
    $.post('<?php  echo $this->createWebUrl('paper_category',array('op'=>'query'));?>', {
        keyword: $.trim($('#search-kwd1').val())
    }, function(dat){
        $('#module-menus1').html(dat);
    });
}

function select_paper_category(o) {
    $("#pcate").val(o.id);
    $("#paper_category").val( o.title );
    $(".close").click();
}

function fill(type,num){
}

function formcheck(){
    if($("#title").isEmpty()){
        Tip.focus("title","请填写试卷标题!","right");
        return false;
    }

    return  true;
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>