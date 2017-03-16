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
    <style> .form-control-excel { height: 34px; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; color: #555; background-color: #fff; background-image: none; border: 1px solid #ccc; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075); box-shadow: inset 0 1px 1px rgba(0,0,0,.075); -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s; -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s; } </style>
    <div class="panel panel-info">
        <div class="panel-heading">课程表管理</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="kcbiao" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />	
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按星期</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="xq_id" class="form-control">
                            <option value="0">请选择星期搜索</option>
                            <?php  if(is_array($xq)) { foreach($xq as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按时段</label>	
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="sd_id" class="form-control">
                            <option value="0">请选择时段搜索</option>
                            <?php  if(is_array($sd)) { foreach($sd as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['sd_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>										
				</div>
				 <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按班级</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="bj_id" class="form-control">
                            <option value="0">请选择班级搜索</option>
                            <?php  if(is_array($bj)) { foreach($bj as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">按科目</label>	
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="km_id" class="form-control">
                            <option value="0">请选择科目搜索</option>
                            <?php  if(is_array($km)) { foreach($km as $row) { ?>
                            <option value="<?php  echo $row['sid'];?>" <?php  if($row['sid'] == $_GPC['km_id']) { ?> selected="selected"<?php  } ?>><?php  echo $row['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>						
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						<a class="btn btn-success" href="javascript:;" onclick="$('.file-container').slideToggle()">批量导入课表</a>
                    </div>					
				</div>	
            </form>
        </div>
    </div>
    <div class="panel panel-default file-container file-container" style="display:none;">
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <input type="hidden" name="leadExcel" value="true">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="UploadExcel" />
                <input type="hidden" name="ac" value="kcbiao" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />

                <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i> 刷新</a>
                <input name="viewfile" id="viewfile" type="text" value="" style="margin-left: 40px;" class="form-control-excel" readonly>
                <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
                <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
                       onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
                <input type="submit" class="btn btn-primary" name="btnExcel" value="导入数据">
                <a class="btn btn-primary" href="../addons/fm_jiaoyu/public/example/example_kcbiao.xls">下载导入模板</a>
            </form>
        </div>
    </div>	
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
                    <th class='with-checkbox' style="width: 20px;"><input type="checkbox" class="check_all" /></th>
					<th style="width:5%">授课教师</th>
					<th style="width:10%;">课程名称</th>	
					<th style="width:7%;">授课班级</th>
					<th style="width:7%;">授课科目</th>	
					<th style="width:7%;">授课星期</th>
					<th style="width:7%;">课节或时段</th>						
					<th style="width:7%;">授课教室</th>
                    <th style="width:7%;">课时</th>						
                    <th style="width:10%;">状态</th>						
					<th style="text-align:right; width:8%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>

				<tr>
                    <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal"><?php  echo $item['tname'];?></td>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal"> <div> <?php  echo $item['kcname'];?></br> <span class="label label-info"><?php  echo date('Y-m-d',$item['date'])?></span> </div> </td>


                    <td> <?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?></td>
                    <td> <?php  if(!empty($category[$item['km_id']])) { ?><?php  echo $category[$item['km_id']]['sname'];?><?php  } ?></td>
                    <td> <?php  if(!empty($category[$item['xq_id']])) { ?><?php  echo $category[$item['xq_id']]['sname'];?><?php  } ?></td>
                    <td> <?php  if(!empty($category[$item['sd_id']])) { ?><?php  echo $category[$item['sd_id']]['sname'];?><?php  } ?></td>
                    <td><?php  echo $item['adrr'];?></td>
					<td>第<span class="label label-warning"><?php  echo $item['nub'];?></span>课</td>

                    <td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">
                    <?php  if($item['date']>TIMESTAMP) { ?><span class="label label-default">未开始</span><?php  } ?>
                    <?php  if($item['date']<TIMESTAMP) { ?><span class="label label-warning">已结束</span><?php  } ?>
					<?php  if(!empty($item['isxiangqing'])) { ?></br><span class="label label-success"><i class="fa fa-check-circle">有详细内容</i></span><?php  } ?>
                    </td>

					<td style="text-align:right;">
                        <a class="btn btn-default btn-sm"
                           href="<?php  echo $this->createWebUrl('kcbiao', array('id' => $item['id'], 'op' => 'post', 'schoolid' => $schoolid))?>"
                           title="编辑"><i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('kcbiao', array('id' => $item['id'], 'op' => 'delete', 'schoolid' => $schoolid))?>"
                           onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除">
                            <i class="fa fa-times"></i>
                        </a>
					</td>
				</tr>

				<?php  } } ?>
			</tbody>
			<tr>
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                    <input type="button" class="btn btn-primary" name="btndeleteall" value="批量删除" />
				</td>
			</tr>
		</table>
        <?php  echo $pager;?>
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
            alert('请选择要删除的课程!');
            return false;
        }
        if(confirm("确认要删除选择的课程?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('kcbiao', array('op' => 'deleteall', 'schoolid' => $schoolid))?>";
            $.post(
                url,
                {idArr:id},
                function(data){
                    alert('操作成功!');
                    location.reload();
                },'json'
            );
        }
    });

});
</script>
<?php  } else if($operation == 'post') { ?>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/fm_jiaoyu/public/web/js/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/standalone.css" media="all">
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/uploadify_t.css?v=4" media="all" />
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i> 返回</a></div>
</div>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="tid" value="<?php  echo $item['tid'];?>" />
		<input type="hidden" name="kcid" value="<?php  echo $item['kcid'];?>" />
		<input type="hidden" name="bj_id" value="<?php  echo $item['bj_id'];?>" />
		<input type="hidden" name="km_id" value="<?php  echo $item['km_id'];?>" />
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                修改课程
            </div>
            <div class="panel-body">
			    <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称：</label>
                    <div class="col-sm-9">                       
                      <?php  echo $kc['name'];?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">教师姓名:</label>
                    <div class="col-sm-9" style="color:red;">
                      <?php  echo $teachers['tname'];?>
                    </div>
				</div>	
				<div class="form-group">	
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">授课地址：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">
						<?php  echo $kc['adrr'];?>
                         </div>
					</div>	
               <!-- <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">人数限制：</label>
                    <div class="col-sm-2 col-lg-2">
                       <div class="input-group">
                           <div class="input-group">							 
                            <input type="text" class="form-control" name="minge" value="20" />
                           </div>
					   </div>
					</div>	-->					
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">班级:</label>
                    <div class="col-sm-2 col-lg-2">                                         
                         <?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">科目:</label>
                    <div class="col-sm-2 col-lg-2">                       
                         <?php  if(!empty($category[$item['km_id']])) { ?><?php  echo $category[$item['km_id']]['sname'];?><?php  } ?>
                    </div>
				</div>	
				<div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">开始时间:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				     <?php  echo date('Y-m-d', $kc['start'])?>
                        </div>
				     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">结束时间:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				    <?php  echo date('Y-m-d', $kc['end'])?>
                        </div>
				     </div>					 
                </div>	
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择星期:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="xq" class="form-control">
                            <option value="<?php  echo $item['xq_id'];?>"><?php  if(!empty($category[$item['xq_id']])) { ?><?php  echo $category[$item['xq_id']]['sname'];?><?php  } ?></option>
                            <?php  if(is_array($xq)) { foreach($xq as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择时段:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="sd" class="form-control">
                            <option value="<?php  echo $item['sd_id'];?>"><?php  if(!empty($category[$item['sd_id']])) { ?><?php  echo $category[$item['sd_id']]['sname'];?><?php  } ?></option>
                            <?php  if(is_array($sd)) { foreach($sd as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['sd_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
				</div>	
				<div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">本节日期:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				     <?php  echo tpl_form_field_date('date',date('Y-m-d',$item['date']))?>	
                        </div>
				     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程编号:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				            <div class="col-sm-9">                       
                              <input type="text" class="form-control" name="nub" value="<?php  echo $item['nub'];?>" /><i style="color:red;">必须为整数</i>
                            </div>
                        </div>
				     </div>					 
                </div>
				<div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">显示详情</label>
                        <label class="radio-inline">
                            <input type="radio" name="isxiangqing" value="1" <?php  if($item['isxiangqing']==1 || empty($item)) { ?>checked<?php  } ?> id="credit1">是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="isxiangqing" value="0" <?php  if(isset($item['isxiangqing']) && empty($item['isxiangqing'])) { ?>checked<?php  } ?> id="credit0">否
                        </label>
                        <div class="help-block"></div>
                </div>				
				<div id="credit-status1" <?php  if($item['isxiangqing'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">本节详情</label>
                    <div class="col-sm-8 col-xs-12">
                       <?php  echo tpl_ueditor('content', $item['content']);?>
                    </div>
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
	var category = <?php  echo json_encode($children)?>;
	$('#credit1').click(function(){
		$('#credit-status1').show();
	});
	$('#credit0').click(function(){
		$('#credit-status1').hide();
	});
</script>
<script type="text/javascript">
    <!--
    var category = <?php  echo json_encode($children)?>;
    //-->
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>