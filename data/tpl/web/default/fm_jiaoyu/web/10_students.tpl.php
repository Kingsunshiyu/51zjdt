<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<script>
require(['bootstrap'],function($){
	$('.btn,.tips').hover(function(){
		$(this).tooltip('show');
	},function(){
		$(this).tooltip('hide');
	});
});
</script>
<div class="main">
    <style>
        .form-control-excel {
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
    </style>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="students" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
				<div class="form-group">
					<a style="margin-left:40px;" class="btn btn-primary" href="<?php  echo $this->createWebUrl('students', array('op' => 'post', 'schoolid' => $schoolid))?>"><i class="fa fa-plus"></i> 添加学生</a>
					<a class="btn btn-success" href="javascript:;" onclick="$('.file-container').slideToggle()">批量导入</a>
				</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">关键字</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按班级</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="bj_id" class="form-control">
                            <option value="0">请选择班级搜索</option>
                            <?php  if(is_array($bj)) { foreach($bj as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>					
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>				
            </form>
        </div>
    </div>
    <div class="panel panel-default file-container" style="display:none;">
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <input type="hidden" name="leadExcel" value="true">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="UploadExcel" />
                <input type="hidden" name="ac" value="students" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />

                <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i> 刷新</a>
                <input name="viewfile" id="viewfile" type="text" value="" style="margin-left: 40px;" class="form-control-excel" readonly>
                <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
                <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
                       onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
                <input type="submit" class="btn btn-primary" name="btnExcel" value="导入数据">
                <a class="btn btn-primary" href="../addons/fm_jiaoyu/public/example/example_students.xls">下载导入模板</a>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
                    <th class='with-checkbox' style="width: 20px;"><input type="checkbox" class="check_all" /></th>
					<th style="width:5%">学号</th>
					<th style="width:6%">姓名</th>
					<th style="width:8%;">详情</th>
                    <th style="width:8%;">手机</th>
					<!--th style="width:8%;">固话</th-->
					<th style="width:13%;">班级/家庭地址</th>
					<th style="width:6%;"></br>本人</th>
                    <th style="width:6%;"></br>母亲</th>
					<th style="width:6%;"></br>父亲</th>
					<th style="width:6%;"></br>其他家长</th>
                    <th style="width:7%;">报名时间</th>	
                    <th style="width:8%;">录入成绩</th>					
					<th style="text-align:right; width:8%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
                    <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
					<td>
                        <?php  echo $item['numberid'];?>
                    </td>
					<td>
                        <img style="width:50px;height:50px;border-radius:50%;" src="<?php  if(!empty($item['icon'])) { ?><?php  echo tomedia($item['icon'])?><?php  } else { ?><?php  echo tomedia($school['spic'])?><?php  } ?>" width="50" style="border-radius: 3px;" /></br></br><?php  echo $item['s_name'];?>
                    </td>	
					<td>
					<?php  if($item['sex'] == 1) { ?><span class="label label-success">男</span><?php  } else { ?><span class="label label-success">女</span><?php  } ?></br>
					<span class="label label-danger"><?php  echo (date('Y',TIMESTAMP) - date('Y',$item['birthdate']))?>岁</span></br>
					<span class="label label-warning"><?php  echo date('Y-m-d',$item['birthdate'])?></span>
					</td>
					<td>
                        <?php  echo $item['mobile'];?>
                    </td>
                    <td>
                        <?php  if(!empty($category[$item['xq_id']])) { ?><?php  echo $category[$item['xq_id']]['sname'];?><?php  } ?>丨<?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?></br></br>
						<?php  echo $item['area_addr'];?>
                    </td>
                    <td>
					<?php  if(!empty($item['ouid'])) { ?>
                     <img style="width:50px;height:50px;border-radius:50%;" src="<?php  echo tomedia($item['oavatar'])?>" width="50"  onerror="this.src='./resource/images/nopic.jpg';" style="border-radius: 3px;" /></br><?php  echo $item['onickname'];?></br>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'openid' => $item['own'], 'op' => 'own', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认解绑？');return false;" title="解绑"><i class="fa fa-times"></i>&nbsp;解绑</a>
                    <?php  } ?>
					</td>
                    <td>
					<?php  if(!empty($item['muid'])) { ?>
                     <img style="width:50px;height:50px;border-radius:50%;" src="<?php  echo tomedia($item['mavatar'])?>" width="50"  onerror="this.src='./resource/images/nopic.jpg';" style="border-radius: 3px;" /></br><?php  echo $item['mnickname'];?></br>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'openid' => $item['mom'], 'op' => 'mom', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认解绑？');return false;" title="解绑"><i class="fa fa-times"></i>&nbsp;解绑</a>
                    <?php  } ?>
				    </td>
                    <td>
					<?php  if(!empty($item['duid'])) { ?>
                     <img style="width:50px;height:50px;border-radius:50%;" src="<?php  echo tomedia($item['davatar'])?>" width="50"  onerror="this.src='./resource/images/nopic.jpg';" style="border-radius: 3px;" /></br><?php  echo $item['dnickname'];?></br>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'openid' => $item['dad'], 'op' => 'dad', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认解绑？');return false;" title="解绑"><i class="fa fa-times"></i>&nbsp;解绑</a>
                    <?php  } ?>
				    </td>
                    <td>
					<?php  if(!empty($item['otheruid'])) { ?>
                     <img style="width:50px;height:50px;border-radius:50%;" src="<?php  echo tomedia($item['otheravatar'])?>" width="50"  onerror="this.src='./resource/images/nopic.jpg';" style="border-radius: 3px;" /></br><?php  echo $item['othernickname'];?></br>
					 <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'openid' => $item['other'], 'op' => 'other', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认解绑？');return false;" title="解绑"><i class="fa fa-times"></i>&nbsp;解绑</a>
                    <?php  } ?>
				    </td>					
					<td><?php  echo date('Y-m-d',$item['seffectivetime'])?></td>  					
                    <td><a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'op' => 'add', 'schoolid' => $schoolid))?>" title="录入成绩"><i class="fa fa-qrcode">&nbsp;&nbsp;录入成绩</i></a></td>					
					<td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'op' => 'post', 'schoolid' => $schoolid))?>" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('students', array('id' => $item['id'], 'op' => 'delete', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
			<tr>
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
					<!--input type="submit" class="btn btn-primary" name="submit" value="批量更新排序" /-->
                    <input type="button" class="btn btn-primary" name="btndeleteall" value="批量删除" />
				</td>
			</tr>
		</table>
        <?php  echo $pager;?>
    </form>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
	var category = <?php  echo json_encode($children)?>;
//-->
$(function(){
    $(".check_all").click(function(){
        var checked = $(this).get(0).checked;
        $("input[type=checkbox]").attr("checked",checked);
    });

    $("input[name=btndeleteall]").click(function(){
        var check = $("input[type=checkbox][class!=check_all]:checked");
        if(check.length < 1){
            alert('请选择要删除的学生!');
            return false;
        }
        if(confirm("确认要删除选择的学生?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('students', array('op' => 'deleteall', 'schoolid' => $schoolid))?>";
            $.post(
                url,
                {idArr:id},
                function(data){
                    if(data.result){
					    alert(data.msg);
                        location.reload();
                    }else{
                        alert(data.msg);
                    }
                },'json'
            );
        }
    });

});
</script>
<?php  } else if($operation == 'post') { ?>
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i> 返回</a></div>
</div>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />	
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                编辑学生信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学生姓名</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" name="s_name" class="form-control" value="<?php  echo $item['s_name'];?>" />
                        </div>
                    </div>
                </div>	
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学号</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" name="numberid" class="form-control" value="<?php  echo $item['numberid'];?>" />
                        </div>
                    </div>
                </div>				
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">头像</label>
                    <div class="col-sm-9">					 
                        <?php  echo tpl_form_field_image('icon', $item['icon'])?>		
                        <span class="help-block"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择性别</label>
                    <div class="col-sm-9">
                        <label for="isshow1" class="radio-inline"><input type="radio" name="sex" value="1" id="isshow1" <?php  if(empty($item) || $item['sex'] == 1) { ?>checked="true"<?php  } ?> /> 男</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="isshow2" class="radio-inline"><input type="radio" name="sex" value="0" id="isshow2"  <?php  if(!empty($item) && $item['sex'] == 0) { ?>checked="true"<?php  } ?> /> 女</label>
                        <span class="help-block"></span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择年级</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="margin-right:15px;" name="xueqi" onchange="fetchChildXueqi(this.options[this.selectedIndex].value)"  autocomplete="off" class="form-control">
                            <option value="0">请选择年级</option>
                            <?php  if(is_array($xueqi)) { foreach($xueqi as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>	
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择班级</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="margin-right:15px;" name="bj" onchange="fetchChildBj(this.options[this.selectedIndex].value)"  autocomplete="off" class="form-control">
                            <option value="0">请选择班级</option>
                            <?php  if(is_array($bj)) { foreach($bj as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>	
				<div class="form-group">
                   <label class="col-xs-12 col-sm-3 col-md-2 control-label">出生日期</label>
                   <div class="col-sm-9">
                 <?php  echo tpl_form_field_date('birthdate', date('Y-m-d', $item['birthdate']))?>				   
                   </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">固定电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" class="form-control" value="<?php  echo $item['homephone'];?>" />
                    </div>
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="<?php  echo $item['mobile'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">家庭地址</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="addr" value="<?php  echo $item['area_addr'];?>" />
                    </div>
                </div>				
				<div class="form-group">
                   <label class="col-xs-12 col-sm-3 col-md-2 control-label">报名日期</label>
                   <div class="col-sm-9">
                 <?php  if(!empty($item['seffectivetime'])) { ?><?php  echo tpl_form_field_date('seffectivetime', date('Y-m-d', $item['seffectivetime']))?><?php  } else { ?><?php  echo tpl_form_field_date('seffectivetime', date('Y-m-d', TIMESTAMP))?><?php  } ?>				 
                   </div>
                </div>
				<div class="form-group">
                   <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束日期</label>
                   <div class="col-sm-9">
                <?php  if(!empty($item['stheendtime'])) { ?><?php  echo tpl_form_field_date('stheendtime', date('Y-m-d', $item['stheendtime']))?><?php  } else { ?><?php  echo tpl_form_field_date('stheendtime', date('Y-m-d', TIMESTAMP))?><?php  } ?>					 
                   </div>
                </div>				
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注信息</label>
                    <div class="col-sm-9">
                        <textarea style="height:150px;" class="form-control richtext" name="note" cols="70"><?php  echo $item['note'];?></textarea>
                        <span class="help-block"></span>
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
<?php  } else if($operation == 'add') { ?>
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('students', array('op' => 'display', 'schoolid' => $schoolid))?>"><i class="fa fa-tasks"></i> 返回</a></div>
</div>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="sid" value="<?php  echo $it['id'];?>" />
		<input type="hidden" name="bj" value="<?php  echo $item['bj_id'];?>" />
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                录入成绩
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学生姓名:</label>
                    <div class="col-sm-9" style="color:red;">
                       <?php  echo $item['s_name'];?>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所在班级:</label>
                    <div class="col-sm-9" style="color:red;">                       
						 <?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择年级</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="margin-right:15px;" name="xueqi" onchange="fetchChildBj(this.options[this.selectedIndex].value)"  autocomplete="off" class="form-control">
                            <option value="0">请选择年级</option>
                            <?php  if(is_array($xueqi)) { foreach($xueqi as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>					
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择期号</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="margin-right:15px;" name="qh" onchange="fetchChildKm(this.options[this.selectedIndex].value)"  autocomplete="off" class="form-control">
                            <option value="0">请选择期号</option>
                            <?php  if(is_array($qh)) { foreach($qh as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($row['sid'] == $it['qh']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>					
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选择科目</label>
                    <div class="col-sm-9">
                        <select class="form-control" style="margin-right:15px;" name="km" onchange="fetchChildKm(this.options[this.selectedIndex].value)"  autocomplete="off" class="form-control">
                            <option value="0">请选择科目</option>
                            <?php  if(is_array($km)) { foreach($km as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($row['sid'] == $it['km']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>					
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">考试分数</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" name="score" class="form-control" value="<?php  echo $item['my_score'];?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">点评</label>
                    <div class="col-sm-9">                       
                        <input type="text" name="info" class="form-control" value="<?php  echo $item['my_score'];?>" />
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
    <!--
    var category = <?php  echo json_encode($children)?>;
    //-->
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>