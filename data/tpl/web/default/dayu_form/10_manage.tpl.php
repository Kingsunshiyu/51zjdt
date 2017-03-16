<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style>
    .field label{float:left;margin:0 !important; width:140px;}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($status == '') { ?>class="active"<?php  } ?>>
	<a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid))?>">所有记录</a>
	</li>
	<li <?php  if($status == '0') { ?> class="active"<?php  } ?>>
	<a href="<?php  echo $this->createWebUrl('manage', array('status' => 0,  'id' => $reid))?>">待确认</a>
	</li>
	<li <?php  if($status == '1') { ?>class="active"<?php  } ?>>
	<a href="<?php  echo $this->createWebUrl('manage', array('status' => '1','id' => $reid))?>">已确认</a>
	</li>
	<li <?php  if($status == '2') { ?>class="active"<?php  } ?>>
	<a href="<?php  echo $this->createWebUrl('manage', array('status' => 2, 'id' => $reid))?>">已取消</a>
	</li>
	<li <?php  if($status == '3') { ?>class="active"<?php  } ?>>
	<a href="<?php  echo $this->createWebUrl('manage', array('status' => 3, 'id' => $reid))?>">已完成</a>
	</li>
	</ul>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="dayu_form" />
                <input type="hidden" name="do" value="manage" />
                <input type="hidden" name="id" value="<?php  echo $reid;?>" />
                <input type="hidden" name="status" value="<?php  echo $_GPC['status'];?>" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名/手机</label>
				<div class="col-sm-8 col-lg-8">
					<input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>" placeholder="可输入姓名或手机号查询"> 
				</div>                     
			</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">提交时间</label>
                    <div class="col-xs-12 col-sm-5 col-lg-3">
                        <?php  echo tpl_form_field_daterange('time',array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)), true)?>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-lg-3">
                        <div class='btn-group'>
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                        <input type="submit" name="export" value="导出数据" class="btn btn-primary">
                        </div>
						<button type="button" class="btn btn-default">总记录数：<?php  echo $total;?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
			<form method="post" class="form-horizontal" id="form1">
    <div class="panel panel-info">
        <div class="panel-heading">详细数据</div>
        <div>
                <table class="table table-responsive table-striped table-hover">
                    <thead class="navbar-inner">
                        <tr class="warning">
							<th style="width:50px;text-align:center;">删？</th>
                            <th width="80">粉丝</th>
                            <th>姓名</th>
                            <th>手机</th>
                            <th>受理时间</th>
                            <th>提交时间<i></i></th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr>
							<td style="text-align:center;"><input type="checkbox" name="recordid[]" value="<?php  echo $row['rerid'];?>" class=""></td>
							<td>
							<?php  if(!empty($row['openid'])) { ?><span class="text-info" style="text-align:center;"><a href="<?php  echo url('mc/member/post', array('uid'=>$row['user']['uid']));?>" target="_blank"><img src="<?php  if(!empty($row['user']['tag']['avatar'])) { ?><?php  echo $row['user']['tag']['avatar'];?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48" data-toggle="tooltip" data-placement="bottom" class="btn btn-xs" title="<?php  echo $row['user']['nickname'];?>"></a></span><?php  } ?>
							</td>
                            <td class="row-hover"><a href="javascript:;" title="<?php  echo $row['from_user'];?>"><?php  echo $row['member'];?></a></td>
                            <td class="row-hover"><a href="javascript:;" title="<?php  echo $row['from_user'];?>"><?php  echo $row['mobile'];?></a></td>
                            <td style="font-size:12px; color:#666;">
                                <?php  if(!empty($row['yuyuetime'])) { ?><?php  echo date('Y-m-d H:i:s', $row['yuyuetime']);?><?php  } ?>
                            </td>
                            <td style="font-size:12px; color:#666;">
                                <?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
                            </td>
							<td>	
            <?php  if($row['status'] == 0) { ?> <span class="badge text-primary">等待确认</span>
                <?php  } else if($row['status'] == 1) { ?> <span class="label label-success status">已确认</span>
                <?php  } else if($row['status'] == 2) { ?> <span class="label label-warning status">已拒绝</span>
                <?php  } else if($row['status'] == 3) { ?> <span class="label label-primary status">已完成</span>
                <?php  } else if($row['status'] == -1) { ?> <span class="label label-warning status">客户取消</span>
            <?php  } ?></td>
                            <td>
								<a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['rerid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="查看详情">查看详情</a>
								<a href="<?php  echo $this->createWebUrl('dayu_formdelete', array('id' => $row['rerid']))?>"  class="btn btn-default btn-sm" onclick="return confirm('删除预约记录，此操作不可恢复，确认删除？');return false;" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        <?php  } } ?>
				<tr>
					<td style="text-align:center;"><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
					<td colspan="7"><input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /><input type="submit" name="submit" class="btn btn-danger" value="删除选中的记录"></td>
				</tr>
                    </tbody>
                </table>
        </div>
    </div>
            </form>
            <?php  echo $pager;?>
</div>
<script language='javascript'>
	function selectall(obj, name){
		$('input[name="'+name+'[]"]:checkbox').each(function() {
			$(this).get(0).checked =  $(obj).get(0).checked;
		});
	}
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<script>
require(['jquery', 'util'], function($, u){
		$('#form1').submit(function(){
		    if($(":checkbox[name='recordid[]']:checked").size() > 0){
			    var check = $(":checkbox[name='recordid[]']:checked");
			    if( confirm("确认要删除选择的记录?")){
		            var rerid = new Array();
				    var reid = <?php  echo $reid;?>;
		            check.each(function(i){
			            rerid[i] = $(this).val();
		            });
		            $.post('<?php  echo $this->createWebUrl('batchrecord')?>', {idArr:rerid,reid:reid},function(data){
			        if (data.errno ==0){
						location.reload();
			        } else {
				        alert(data.error);
			        }
		            },'json');
		        }
		    }else{
		        u.message('没有选择要删除记录', '', 'error');
		        return false;
		    }
	    });		
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
