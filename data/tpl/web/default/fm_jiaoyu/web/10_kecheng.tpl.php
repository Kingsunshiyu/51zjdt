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
        <div class="panel-heading">课程管理</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="kecheng" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">按名称</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="name" id="" type="text" value="<?php  echo $_GPC['name'];?>">
                    </div>
					<?php  if($school['issale'] != 5) { ?>
                    <div class="col-sm-2 col-lg-2">
						<a class="btn btn-success" href="<?php  echo $this->createWebUrl('baoming', array('schoolid' => $schoolid))?>">查看报名列表</a>
                    </div>
                    <?php  } ?>					
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
						<a class="btn btn-success" href="javascript:;" onclick="$('.file-container').slideToggle()">批量导入课程</a>
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
                <input type="hidden" name="ac" value="kecheng" />
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />

                <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i> 刷新</a>
                <input name="viewfile" id="viewfile" type="text" value="" style="margin-left: 40px;" class="form-control-excel" readonly>
                <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
                <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
                       onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
                <input type="submit" class="btn btn-primary" name="btnExcel" value="导入数据">
                <a class="btn btn-primary" href="../addons/fm_jiaoyu/public/example/example_kecheng.xls">下载导入模板</a>
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
					<th style="width:5%;">排序</th>
					<th style="width:5%">课程ID</th>
					<th style="width:6%">授课教师</th>
					<?php  if($school['issale'] == 1 || $school['issale'] == 2) { ?>
					<th style="width:15%;">课程</th>
					<th style="width:5%;">课程费用</th>
					<th style="width:5%;">限报人数</th>
					<th style="width:5%;">已报人数</th>	
					<th style="width:10%;">报名情况</th>
					<?php  } else if($school['issale'] == 3 || $school['issale'] == 4) { ?>
					<th style="width:15%;">课程</th>
					<th style="width:5%;">限报人数</th>
					<th style="width:5%;">已报人数</th>	
					<th style="width:10%;">报名情况</th>
					<?php  } else { ?>
					<th style="width:15%;">时间</th>
					<th style="width:18%;">课程名称</th>
                    <?php  } ?>					
					<th style="width:10%;">授课班级/年级</th>
					<th style="width:8%;">授课科目</th>	
					<th style="width:8%;">授课教室</th>	
					<th style="width:8%;">总课时</th>	
                    <th style="width:8%;">状态</th>	
                    <th style="width:10%;">添加课表</th>					
					<th style="text-align:right; width:8%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
                    <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
					<td><input type="text" class="form-control" name="ssort[<?php  echo $item['id'];?>]" value="<?php  echo $item['ssort'];?>"></td>
					<td style="text-align:center;color:red;font-size:20px;font-weight:blod;"><?php  echo $item['id'];?></td>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal"><?php  echo $item['tname'];?></td>
					<?php  if($school['issale'] == 1 || $school['issale'] == 2) { ?>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal">
              	    <div><?php  if($item['is_hot']==1) { ?><span class="label label-danger">精品课</span></br><?php  } ?><?php  echo $item['name'];?></br><span class="label label-info"><?php  echo date('Y-m-d',$item['start'])." 至 ".date('Y-m-d',$item['end'])?></span></div>                   
                    </td>
					<td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">&nbsp;<span class="label label-warning" style="font-weight:bold;">￥<?php  echo $item['cose'];?></span></td>	
					<td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">&nbsp;<span class="label label-danger"><?php  echo $item['minge'];?></span></td>
					<td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">&nbsp;<span class="label label-success"><?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_order')." WHERE kcid = '".$item['id']."' And status = 1 ")?></span></td>
					<td><a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('baoming', array('kcid' => $item['id'], 'schoolid' => $schoolid))?>" title="报名情况"><i class="fa fa-qrcode">&nbsp;&nbsp;报名情况</i></a></td>
					<?php  } else if($school['issale'] == 3 || $school['issale'] == 4) { ?>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal">
              	    <div><?php  if($item['is_hot']==1) { ?><span class="label label-danger">精品课</span></br><?php  } ?><?php  echo $item['name'];?></br><span class="label label-info"><?php  echo date('Y-m-d',$item['start'])." 至 ".date('Y-m-d',$item['end'])?></span></div>                   
                    </td>	
					<td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">&nbsp;<span class="label label-danger"><?php  echo $item['minge'];?></span></td>
					<td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">&nbsp;<span class="label label-success"><?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_order')." WHERE kcid = '".$item['id']."' And status = 0 ")?></span></td>
					<td><a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('baoming', array('kcid' => $item['id'], 'op' => 'display', 'schoolid' => $schoolid))?>" title="报名情况"><i class="fa fa-qrcode">&nbsp;&nbsp;报名情况</i></a></td>					
					<?php  } else { ?>
					<td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal">
              	    <div><span class="label label-info"><?php  echo date('Y-m-d',$item['start'])." 至 ".date('Y-m-d',$item['end'])?></span></div>                   
                    </td>					
					<td><?php  if($item['is_hot']==1) { ?><span class="label label-danger">精品课</span></br><?php  } ?><?php  echo $item['name'];?></td>	
					<?php  } ?>
                    <td>
					    <?php  if(!empty($category[$item['xq_id']])) { ?><?php  echo $category[$item['xq_id']]['sname'];?></br><?php  } ?>
                        <?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?></br><?php  if(!empty($category[$item['xq_id']])) { ?><span class="label label-danger">只限本年级报名</span><?php  } else { ?><span class="label label-success"><i class="fa fa-check-circle">全体可报</i></span><?php  } ?>
                    </td>					
                    <td>
                        <?php  if(!empty($category[$item['km_id']])) { ?><?php  echo $category[$item['km_id']]['sname'];?><?php  } ?>
                    </td>
					<td><?php  echo $item['adrr'];?></td>
					<td><span class="label label-warning">共<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_kcbiao')." WHERE kcid = '".$item['id']."'")?>个课时</span></td>
                    <td style="overflow:visible; word-break:break-all; text-overflow:visible;white-space:normal">
                    <?php  if($item['start']>TIMESTAMP) { ?><span class="label label-default">未开始</span><?php  } ?>
                    <?php  if($item['start']<TIMESTAMP && $item['end']>TIMESTAMP) { ?><span class="label label-info">授课中</span><?php  } ?>
                    <?php  if($item['end']<TIMESTAMP) { ?><span class="label label-warning">结束</span><?php  } ?></br></br>
					<?php  if($item['is_show'] == 1) { ?><span class="label label-success">显示</span><?php  } else { ?><span class="label label-danger">不显示</span><?php  } ?>
                    </td>
                    <td><a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('kecheng', array('id' => $item['id'], 'op' => 'add', 'schoolid' => $schoolid))?>" title="添加课表"><i class="fa fa-qrcode">&nbsp;&nbsp;添加课表</i></a></td>					
					<td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('kecheng', array('id' => $item['id'], 'op' => 'post', 'schoolid' => $schoolid))?>" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('kecheng', array('id' => $item['id'], 'op' => 'delete', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
			<tr>
				<td colspan="7">
                    <input name="submit" type="submit" class="btn btn-primary" value="批量修改排序">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>			
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
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
            alert('请选择要删除的课程!');
            return false;
        }
        if(confirm("确认要删除选择的课程?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('kecheng', array('op' => 'deleteall', 'schoolid' => $schoolid))?>";
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
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i>返回课程列表</a></div>
</div>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">编辑课程</div>
            <div class="panel-body">
				<div class="form-group">	
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">前端排序：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="ssort" value="<?php  echo $item['ssort'];?>" />
                         </div>
						 <div class="help-block">数值越大手机前端显示越靠前</div>
					</div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">是否显示：</label>
                    <div class="col-sm-2 col-lg-2">
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="1" <?php  if($item['is_show']==1) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="2" <?php  if($item['is_show']==2) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">前端是否显示:默认显示</div>
                    </div>									
                </div>			
			    <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称：</label>
                    <div class="col-sm-9">                       
                            <input type="text" class="form-control" name="name" value="<?php  echo $item['name'];?>" />
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">教师姓名:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="tid" class="form-control">
                            <option value="0">请选择授课老师</option>
                            <?php  if(is_array($teachers)) { foreach($teachers as $row) { ?>
                            <option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $item['tid']) { ?> selected="selected"<?php  } ?>><?php  echo $row['tname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>					
				</div>
				<?php  if($school['issale'] == 1 || $school['issale'] == 2) { ?>
				<div class="form-group">	
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">报名费用：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="cose" value="<?php  echo $item['cose'];?>" />
							<div class="help-block">输入课程所需费用</div>
                         </div>
				    </div>
					<?php  if($_W['isfounder']) { ?>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">付费至：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">
							<select class="form-control" name="payweid" id="payweid">
								<option value="0">请选择收款账户</option>
								<?php  if(is_array($payweid)) { foreach($payweid as $row) { ?>
								<option value="<?php  echo $row['uniacid'];?>" <?php  if($item['payweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
								<?php  } } ?>
							</select>
							<div class="help-block">付费至指定公众号设置的支付方式内，不设置这付费至当前公众号</div>
                         </div>
				    </div>
					<?php  } ?>	
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">人数限制：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="minge" value="<?php  echo $item['minge'];?>" />
							<div class="help-block">输入课程限报人数</div>
                         </div>
				    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">已报人数：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="yibao" value="<?php  echo $item['yibao'];?>" />
							<div class="help-block">已报虚拟人数</div>
                         </div>
				    </div>					
                </div>
				<?php  } else if($school['issale'] == 3 || $school['issale'] == 4) { ?>
				<div class="form-group">	
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">人数限制：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="minge" value="<?php  echo $item['minge'];?>" />
							<div class="help-block">输入课程限报人数</div>
                         </div>
				    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">已报人数：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="yibao" value="<?php  echo $item['yibao'];?>" />
							<div class="help-block">已报虚拟人数(会占用名额)</div>
                         </div>
				    </div>					
                </div>				
                <?php  } ?>				
				<div class="form-group">	
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">授课地址：</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="adrr" value="<?php  echo $item['adrr'];?>" />
                         </div>
					</div>	
                    <div class="col-sm-2 col-lg-2">
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="1" <?php  if($item['is_hot']==1 || empty($item)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="0" <?php  if(isset($item['is_hot']) && empty($item['is_hot'])) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">是否精品课程</div>
                    </div>									
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择年级:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="xq" class="form-control">
                            <option value="0">请选择年级</option>
                            <?php  if(is_array($xueqi)) { foreach($xueqi as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
						<div class="help-block" style="color:red;">留空则任何年级学生都可报名本课程</div>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择班级:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="bj" class="form-control">
                            <option value="0">请选择班级</option>
                            <?php  if(is_array($bj)) { foreach($bj as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['bj_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择科目:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="km" class="form-control">
                            <option value="0">请选择科目</option>
                            <?php  if(is_array($km)) { foreach($km as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($it['sid'] == $item['km_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
				</div>	

				<div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">开始时间:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				     <?php  echo tpl_form_field_date('start', date('Y-m-d', $item['start']))?>	
                        </div>
				     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">结束时间:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				     <?php  echo tpl_form_field_date('end', date('Y-m-d', $item['end']))?>	
                        </div>
				     </div>					 
		 
                </div>	
			    <div class="form-group">
                     <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程大纲</label>
                        <div class="col-sm-9">
							<?php  echo tpl_ueditor('dagang', $item['dagang']);?>
                        <div class="help-block">课程大纲</div>
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
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/fm_jiaoyu/public/web/js/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/standalone.css" media="all">
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/uploadify_t.css?v=4" media="all" />
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('kecheng', array('op' => 'display', 'schoolid' => $schoolid))?>"><i class="fa fa-tasks"></i> 返回课程列表</a></div>
</div>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="tid" value="<?php  echo $item['tid'];?>" />
		<input type="hidden" name="kcid" value="<?php  echo $item['id'];?>" />
		<input type="hidden" name="bj_id" value="<?php  echo $item['bj_id'];?>" />
		<input type="hidden" name="km_id" value="<?php  echo $item['km_id'];?>" />
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                添加课表
            </div>
            <div class="panel-body">
			    <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称：</label>
                    <div class="col-sm-9">                       
                           <?php  echo $item['name'];?>
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
                           <?php  echo $item['adrr'];?>
                         </div>
					</div>					
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
				     <?php  echo date('Y-m-d', $item['start'])?>	
                        </div>
				     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">结束时间:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				    <?php  echo date('Y-m-d', $item['end'])?>
                        </div>
				     </div>					 
                </div>	
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择星期:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="xq" class="form-control">
                            <option value="0">请选择星期</option>
                            <?php  if(is_array($xq)) { foreach($xq as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($row['sid'] == $item['xq_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">选择时段:</label>
                    <div class="col-sm-2 col-lg-2">
                        <select style="margin-right:15px;" name="sd" class="form-control">
                            <option value="0">请选择时段或课节</option>
                            <?php  if(is_array($sd)) { foreach($sd as $it) { ?>
                            <option value="<?php  echo $it['sid'];?>" <?php  if($row['sid'] == $item['sd_id']) { ?> selected="selected"<?php  } ?>><?php  echo $it['sname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
				</div>	
				<div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">本节日期:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				     <?php  echo tpl_form_field_date('date')?>	
                        </div>
				     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程编号:</label>
                     <div class="col-sm-2 col-lg-2">
				        <div class="input-group">
				            <div class="col-sm-9">                       
                              <input type="text" class="form-control" name="nub" value="" /><i style="color:red;">&nbsp;&nbsp;必须为整数</i>
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