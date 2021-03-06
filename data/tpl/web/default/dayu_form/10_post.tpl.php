<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style type="text/css">
.form .alert{width:700px;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">表单列表</a></li>
	<li<?php  if(!$reid) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post')?>">新建表单</a></li>
	<?php  if($reid) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('post', array('id' => $reid))?>">编辑表单</a></li><?php  } ?>
</ul>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
    	<div class="panel panel-default">
            <div class="panel-heading">
                表单 <span class="text-muted">通过表单你可以实现服务表单功能</span>
            </div>
            <div class="panel-body">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#tab_basic">基本设置</a></li>
			<li><a href="#tab_body">通知设置</a></li>
			<li><a href="#tab_skins">参数与模板</a></li>
		</ul>
		
		<div class="tab-content">
		<div class="tab-pane  active" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('post_basic', TEMPLATE_INCLUDEPATH)) : (include template('post_basic', TEMPLATE_INCLUDEPATH));?></div>
		<div class="tab-pane" id="tab_body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('post_setting', TEMPLATE_INCLUDEPATH)) : (include template('post_setting', TEMPLATE_INCLUDEPATH));?></div>
		<div class="tab-pane" id="tab_skins"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('post_skins', TEMPLATE_INCLUDEPATH)) : (include template('post_skins', TEMPLATE_INCLUDEPATH));?></div>
		</div>
				
            </div>
        </div>
		
<script type="text/javascript">
<!--	
	$(function () {
		window.optionchanged = false;
		$('#myTab a').click(function (e) {
			e.preventDefault();//阻止a链接的跳转行为
			$(this).tab('show');//显示当前选中的链接及关联的content
		})
	});
//-->	
</script>
        <div class="panel panel-default">
            <div class="panel-heading">
                表单内容管理
            </div>
            <div class="panel-body table-responsive">
                <div class="alert-new">
					<table class="table table-hover">
						<thead>
						<tr>
							<th style="width:45%;">表单项目 <span style="color:#ff0000;">姓名、手机号码已为前台固定项目，无需添加</span></th>
							<th style="width:15%;text-align:center;">排序</th>
							<th style="width:8%;text-align:center;">是否必填</th>
							<th style="width:12%;">类型</th>
							<th style="width:10%;">关联默认值</th>
							<th style="width:10%;">操作</th>
						</tr>
						</thead>
						<tbody id="re-items">
						<tr>
							<td><input type="text" class="form-control" value="真实姓名" readonly /></td>
							<td><input type="text" class="form-control" value="100" readonly /></td>
							<td style="text-align:center;"><input type="checkbox" title="必填项" checked="checked" disabled="true" /></td>
							<td>
								<select class="form-control" readonly>
									<option>字串(text)</option>
								</select>
							</td>
							<td>
								<select class="form-control" readonly>
									<option>真实姓名</option>
								</select>
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td><input type="text" class="form-control" value="手机号码" readonly /></td>
							<td><input type="text" class="form-control" value="99" readonly /></td>
							<td style="text-align:center;"><input type="checkbox" title="必填项" checked="checked" disabled="true" /></td>
							<td>
								<select class="form-control" readonly>
									<option>数字(number)</option>
								</select>
							</td>
							<td>
								<select class="form-control" readonly>
									<option>手机号码</option>
								</select>
							</td>
							<td>
							</td>
						</tr>
						<?php  if(is_array($ds)) { foreach($ds as $r) { ?>
						<tr>
							<td><input name="title[]" type="text" class="form-control" value="<?php  echo $r['title'];?>"/></td>
							<td><input type="text" name="displayorder[]" class="form-control" value="<?php  echo $r['displayorder'];?>" /></td>
							<td style="text-align:center;"><input name="essential[]" type="checkbox" title="必填项" <?php  if($r['essential']) { ?> checked="checked"<?php  } ?>/></td>
							<td>
								<select name="type[]" class="form-control">
									<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['type']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
							</td>
							<td>
								<select name="bind[]" class="form-control">
									<option value="">不关联粉丝数据</option>
									<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['bind']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
								<input type="hidden" name="value[]" value="<?php  echo $r['value'];?>"/>
								<input type="hidden" name="desc[]" value="<?php  echo $r['description'];?>"/>
								<input type="hidden" name="essentialvalue[]" value="<?php  if($r['essential']) { ?>true<?php  } else { ?>false<?php  } ?>"/>
							</td>
							<td>
								<?php  if(!$hasData) { ?>
								<a href="javascript:;" onclick="deleteItem(this)" data-toggle="tooltip" data-placement="bottom" title="删除此条目" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a> &nbsp;
								<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="设置详细信息" onclick="setValues(this);" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
								<?php  } ?>
							</td>
						</tr>
						<?php  } } ?>
						</tbody>
					</table>
				</div>
				<div class="alert alert-block alert-new">
					<?php  if($hasData) { ?>
					<a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid));?>" target="_blank">已经存在表单数据, 不能修改表单条目信息</a>
					<?php  } else { ?>
					<a href="javascript:;" onclick="addItem();">添加表单条目 <i class="fa fa-plus" title="添加表单条目"></i></a> 建议先编排好条目顺序再添加，否则导出数据会与标题不对应（导出xls按添加先后排序）
					<?php  } ?>
				</div>
				<span class="help-block">表单成功启动以后(已经有粉丝用户提交给表单信息), 将不能再修改表单项目, 请仔细编辑. </span>
            </div>
        </div>
        <div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
   </form>
</div>
<div id="dialog"  class="modal fade" tabindex="-1">
    <div class="modal-dialog" style='width: 920px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>设置选项</h3></div>
            <div class="modal-body" >  
               <div class="well">
					<textarea id="re-desc" class="form-control" rows="3"></textarea>
					<span class="help-block"><strong>设置此条目的说明信息</strong></span>
				</div>
				<div class="well re-value hide">
					<textarea id="re-value" class="form-control" rows="6"></textarea>
					<span class="help-block"><strong>设置表单条目的选项(如果有需要的话.) 每行一条记录, 例如: 性别 男, 女</strong></span>
				</div>
                <div id="module-menus" style="padding-top:5px;"></div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-ok" data-dismiss="modal" aria-hidden="true">确 定</a>
                <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关 闭</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    require(['util'],function(util){
         util.editor($('.richtext-clone')[0]);
    })
	var currentItem = null;
	$(function(){
		require(['jquery','jquery.ui'],function($,j){
			$('#re-items').sortable({handle: '.fa-move'});
		})
		$('#dialog .btn-ok').on('click', function(){
       
			if(currentItem == null) return;
			var v = $('#dialog #re-value').val();
			$(currentItem).parent().prev().find(':hidden[name="value[]"]').val(encodeURIComponent(v.replace(/\n/g, ',')));
			var v = $('#dialog #re-desc').val();
			$(currentItem).parent().prev().find(':hidden[name="desc[]"]').val(encodeURIComponent(v));
		});
		<?php  if($hasData) { ?>
		$('#re-items').find(':text,:checkbox,select').attr('disabled', 'disabled');
		<?php  } ?>
	});
	function setValues(o) {
		var v = $(o).parent().prev().find(':hidden[name="value[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-value').val(v.replace(/,/g, '\n'));
		var v = $(o).parent().prev().find(':hidden[name="desc[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-desc').val(v);
		var v = $(o).parent().prev().prev().find('select[name="type[]"]').val();
             
		if(v == 'radio' || v == 'checkbox' || v == 'select') {
			$('.well.re-value').removeClass('hide');
		} else {
			$('.well.re-value').addClass('hide');
		}
		$('#dialog').modal({keyboard: false});
		currentItem = o;
	}
	function addItem() {
		var html = '' + 
				'<tr>' +
					'<td><input name="title[]" type="text" class="form-control" /></td>' +
					'<td><input type="text" name="displayorder[]" class="form-control" /></td>' + 
					'<td style="text-align:center;"><input name="essential[]" type="checkbox" title="必填项" /></td>' +
					'<td>' +
						'<select name="type[]" class="form-control">' +
						<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } } ?>
						'</select>' +
					'</td>' +
					'<td>' +
						'<select name="bind[]" class="form-control">' +
							'<option value="">不关联粉丝数据</option>' +
						<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?><?php  if(!empty($v)) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } ?><?php  } } ?>
						'</select>' +
						'<input type="hidden" name="value[]" />' +
						'<input type="hidden" name="desc[]" />' +
						'<input type="hidden" name="essentialvalue[]" />' +
					'</td>' +
					'<td>' +
						'<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" onclick="deleteItem(this)"  title="删除此条目"><i class="fa fa-times"></i></a> &nbsp;&nbsp; ' +
						'<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="设置详细信息" onclick="setValues(this);"><i class="fa fa-edit"></i></a>' +
					'</td>' + 
				'</tr>';
		$('#re-items').append(html);
	}
	function deleteItem(o) {
		$(o).parent().parent().remove();
	}
    function message(msg){
        require(['util'],function(util){
            util.message(msg);
        });
    }
	function validate() {
		if($.trim($(':text[name="activity"]').val()) == '') {
			message('必须填写表单标题.', '', 'error');
			return false;
		}
		if($.trim($('textarea[name="information"]').val()) == '') {
			message('必须填写表单成功提示信息.', '', 'error');
			return false;
		}
		<?php  if(empty($reid)) { ?>
		if($.trim($(':input[name="thumb"]').val()) == '') {
			message('必须上传表单封面.', '', 'error');
			return false;
		}
		<?php  } ?>
		if($(':text[name="title[]"]').length == 0) {
			message('必须设定表单的调查条目.', '', 'error');
			return false;
		}
		var isError = false;
		$(':text[name="title[]"]').each(function(){
			if($.trim($(this).val()) == '') {
				isError = true;
			}
		});
		if(isError) {
			message('必须要设定每个表单条目的标题.', '', 'error');
			return false;
		}
		
		var isError = false;
		$('#re-items tr').each(function(){
			var t = $(this).find('select[name="type[]"]').val();
			if(t == 'radio' || t == 'checkbox' || t == 'select') {
				if($.trim($(this).find(':hidden[name="value[]"]').val()) == '') {
					isError = true;
				}
			}
		});
		if(isError) {
			message('单选, 多选或下拉选择项目必须要设定备选项.', '', 'error');
			return false;
		}
		$(':checkbox').each(function(){
			if($(this).get(0).checked) {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('true');
			} else {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('false');
			}
		});
		return true;
	}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
