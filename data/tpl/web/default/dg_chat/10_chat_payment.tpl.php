<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main" style="padding-top:5px;">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="<?php  echo $this->createWebUrl('ask_payment',array('issucc' => $_GPC['status']))?>" method="get" class="form-horizontal" role="form">				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">处理状态</label>
					<div class="col-sm-6 col-lg-8">
					<input type="hidden" name="c" value="site">
					<input type="hidden" name="a" value="entry">
					<input type="hidden" name="do" value="chat_payment">
					<input type="hidden" name="m" value="dg_chat">
						<select name="status" class="form-control">
							<option value="" selected="selected">不限</option>
							<option value="1"<?php  if(1 == $_GPC['status']) { ?> selected="selected"<?php  } ?>>处理中</option>
							<option value="2"<?php  if(2 == $_GPC['status']) { ?> selected="selected"<?php  } ?>>完结</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">申请人</label>
					<div class="col-sm-6 col-lg-8">
						<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入申请 人昵称">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">申请时间范围</label>
					<div class="col-sm-6 col-lg-8">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
 <div class="panel panel-default">
            <div class="table-responsive panel-body">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                    <th style="width:65px;" align="center">头像</th>
                        <th style="width:80px;">申请人</th>
                        <th>类型</th>
                        <th>提现金额(￥)</th>
                        <th>申请时间</th>
                        <th>当前状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="level-list">
                    <?php  if(is_array($records)) { foreach($records as $row) { ?>
                    <tr>
                    <td><img alt="" src="<?php  echo $row['avatar'];?>" width='auto' style="max-width:50px; max-height:50px;" height='auto'></td>
                    <td><div class="type-parent"><?php  echo $row['nickname'];?></div></td>
                     <td><div class="type-parent"><?php  if($row['pay_type']==1) { ?>个人<?php  } else { ?>直播间(<?php  echo $row['room_id'];?>)<?php  } ?></div></td>
                     <td><div class="type-parent"><?php  echo $row['pay_money'];?></div></td>
                    <td><div class="type-parent"><?php  echo date('Y/m/d H:i', $row['create_time']);?>&nbsp;&nbsp;</div></td>
                    <td id="row_status_<?php  echo $row['id'];?>"><div class="type-parent"><?php  echo $row['status'];?>&nbsp;&nbsp;</div></td>
                    <td id="row_last_<?php  echo $row['id'];?>"><?php  if($row['status']=='处理中') { ?><a style="color:red;" href="javascript:sendred(<?php  echo $row['id'];?>)">发放</a><?php  } ?></td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
            </div>
    </div>
    <?php  echo $pager;?>
    <script type="text/javascript">
    var url=location.href;
      function sendred(id){
    	  var result=confirm("确认要发放吗？");
    	  if(result){
	        $.post(url, { id: id },
	    		 function(data){
	    		     if(data.success==0){
	    			     $("#row_status_"+id).children('.type-parent').text('完结');
	    			     $("#row_last_"+id).text('');
	    		     }else{
	    		    	 alert(data.msg);
	    		     }
	    	   },"json");
	    	  return false;
	        }
      }
    </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>