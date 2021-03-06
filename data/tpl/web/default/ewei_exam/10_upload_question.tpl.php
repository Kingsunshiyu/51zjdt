<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('upload_question',array('op'=>'list'));?>">试题导入</a></li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">导入试题</div>
        <div class="panel-body">
            <form action="./index.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_exam" />
                <input type="hidden" name="do" value="uploadexcel" />
                <input type="hidden" name="leadExcel" value="true">
				<input type="hidden" name="ac" value="question" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">请选择要导入的题库</label>
                    <div class="col-sm-9 col-xs-12">
                       	<select class='form-control' name='poolid'>
							<option value='0' <?php  if(empty($_GPC['poolid'])) { ?>selected<?php  } ?>></option>
							<?php  if(is_array($poollist)) { foreach($poollist as $key => $value) { ?>
							<option value ="<?php  echo $value['id'];?>" <?php  if($_GPC['poolid']== $value['id']) { ?>selected="selected"<?php  } ?>><?php  echo $value['title'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="help-block">请先下载导入模板，然后按照模板样式添加试题。添加试题后上传下载的模板。建议使用工具<a href="http://rj.baidu.com/soft/detail/14391.html?ald">WPS OFFICE</a>修改添加试题</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                      	<input type="file" class="pull-left btn-default" name="inputExcel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                         <input type="submit" class="btn pull-left btn-primary" value="导入数据">
                         <a class="btn btn-primary" href="../addons/ewei_exam/example/example_question.csv" style="margin-left: 20px;">下载导入模板</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function(){
     $(function () {
    $('#myTab a').click(function (e) {
        e.preventDefault();//阻止a链接的跳转行为
        $(this).tab('show');//显示当前选中的链接及关联的content
    })
    })
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
