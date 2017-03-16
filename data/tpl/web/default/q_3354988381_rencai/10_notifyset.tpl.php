<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default">
	<div class="panel-heading">
		通知插件检查
	</div>
                   
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">通知接口地址</label>
			<div class="col-sm-8">
                <?php  if(!$send_notify_api_url) { ?>
                <span class="label label-danger" style="font-size:16px">您的系统不支持服务通知功能，请即时安装：</span>
                <a class="btn btn-primary" href="http://s.we7.cc/index.php?c=store&a=application&id=1706" target="_blank">立即安装</a>
                
                <?php  } else { ?>
                <?php  echo $send_notify_api_url;?>
                <br />注意：请在参数设置中配置好 第三方调用时的授权密钥 （密钥必须与“模板消息留言通知”参数中的密钥相同）
                <?php  } ?>
			</div>
		</div>
        
       
    </div>        
</div>
<?php  if($send_notify_api_url) { ?>
<form action="<?php  echo $this->createWebUrl('notify');?>"  method="post" class="form-horizontal form ng-pristine ng-valid" accept-charset="utf-8">
<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
<script>
function add_tpl_person(field) {
	$('#tpl_person').val($("#tpl_person").val() + '{{' + field + '}}');
}
function add_tpl_company(field) {
	$('#tpl_company').val($("#tpl_company").val() + '{{' + field + '}}');
}
function chg_award_type(type){
	$('#award_scores').hide();
	$('#award_hongbao').hide();
	$('#award_credit2').hide();
	if (type == 1) {
		$('#award_scores').show();
	} else if(type == 2) {
		$('#award_hongbao').show();
	} else if(type == 3) {
		$('#award_credit2').show();
	}
		
}
//chg_award_type('<?php  echo $award_type;?>');
</script>
    
    <div class="panel panel-default">      
        <div class="panel-heading">
            消息设置
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">求职者申请职位时通知企业</label>
                <div class="col-sm-8">
                <?php  if(is_array($notify_tpl['person_field_arr'])) { foreach($notify_tpl['person_field_arr'] as $field => $field_name) { ?>
                <span class="btn btn-success" onclick="add_tpl_person('<?php  echo $field;?>')" style="width:100px; margin-right:10px; margin-bottom:3px"><?php  echo $field_name;?></span>
                <?php  } } ?>
                	<br />
                    <textarea class="form-control" name="tpl_person" id="tpl_person" rows="5"><?php  if($tpl_person['content']) { ?><?php  echo $tpl_person['content'];?>
                    <?php  } else { ?>{{username}}【{{sex}}】申请了{{cid}}{{title}}职位
基本信息：{{age}}，{{educational}}，{{professional}}，{{workexperience}}
手机号码：{{mobile}}<?php  } ?>
                    </textarea>
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">企业发邀请时通知求职者</label>
                <div class="col-sm-8">
                <?php  if(is_array($notify_tpl['company_field_arr'])) { foreach($notify_tpl['company_field_arr'] as $field => $field_name) { ?>
                <span class="btn btn-success" onclick="add_tpl_company('<?php  echo $field;?>')" style="width:100px; margin-right:10px; margin-bottom:3px"><?php  echo $field_name;?></span>
                <?php  } } ?>
                	<br />
                    <textarea class="form-control" name="tpl_company" id="tpl_company" rows="5"><?php  if($tpl_company['content']) { ?><?php  echo $tpl_company['content'];?>
                    <?php  } else { ?>恭喜，{{name}}向你发出了面试邀请
联系人：{{contact}}
联系电话：{{mobile}}
所在地址：{{address}}
公司介绍：{{industry}}行业，{{scale}}，{{type}}，{{description}}<?php  } ?>
                    </textarea>
                </div>
            </div>
            
                        
        </div>    
        
    </div>
    
		<div class="form-group">
			<div class="col-sm-12">
			<input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>"/>
			<input type="submit"  name="submit" value="提交" class="btn btn-primary col-lg-1"/>
				
			</div>
		</div>
	

</form>
<script type="text/javascript">
require(['jquery', 'util'], function($, u){
	$(function(){
		u.editor($('.richtext')[0]);
	});
});   
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>