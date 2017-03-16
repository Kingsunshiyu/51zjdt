<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('Resume');?>">简历信息<?php echo $resumeid > 1 ? '编辑' : '添加'?></a></li>
</ul>
<div class="main">
    <form class="form-horizontal" action="" role="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        <input type="hidden" name="cid" value="<?php  echo $row['id'];?>" />
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">绑定微信Openid</label>
            <div class="col-sm-4">
                <input type="text" name="data[from_user]" value="<?php  echo $row['from_user'];?>" class="form-control"  placeholder="如o4dYfsy2cx6xyq1rfQ4OzfGHM6u4" >如o4dYfsy2cx6xyq1rfQ4OzfGHM6u4
            </div>
        </div>  
                
<?php  if ($fields_list) { foreach($fields_list as $field => $field_item) {
?>
	<?php  if(in_array($field, array('username', 'age', 'professional', 'mobile', 'qq', 'workaddress', 'attach_a', 'attach_b', 'attach_c', 'attach_d', 'attach_e'))) { ?>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <input type="text" name="data[<?php  echo $field;?>]" value="<?php  echo $row[$field];?>" class="form-control">
            </div>
        </div>                
    <?php  } else if($field == 'headimgurl') { ?>   
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-9 col-xs-12">
            	<?php  echo tpl_form_field_image('data[headimgurl]', $row['headimgurl'])?>
                <br />建议图片比例：120*120
            </div>
        </div>  
    <?php  } else if($field == 'sex') { ?>   
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <select class="form-control" name="data[sex]">
                    <option value="1" <?php  if($row['sex'] == 1) { ?> selected <?php  } ?>>男</option>
                    <option value="0" <?php  if($row['sex'] == 0) { ?> selected <?php  } ?>>女</option>
                </select>
            </div>
        </div>        
    <?php  } else if($field == 'educational') { ?>   
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <select class="form-control" name="data[educational]">
                    <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $key => $payroll) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['educational']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $payroll;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>       
	<?php  } else if($field == 'workexperience') { ?>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                  <select name="data[workexperience]" class="am-input-sm">
                    <?php  if(is_array($config['workexperience'])) { foreach($config['workexperience'] as $key => $xperience) { ?>
                    <option value="<?php  echo $xperience;?>" <?php  if(trim($row['workexperience']) == trim($xperience)) { ?>selected<?php  } ?>><?php  echo $xperience;?></option>
                    <?php  } } ?>
                  </select>             
            </div>
        </div>  
	<?php  } else if($field == 'assessment') { ?>        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <textarea name="data[assessment]" class="form-control"><?php  echo $row['assessment'];?></textarea>
            </div>
        </div>  
    <?php  } else if($field == 'cid') { ?> 
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <select class="form-control" name="data[cid]">
                    <?php  if(is_array($offices)) { foreach($offices as $key => $parent) { ?>
                        <option value="<?php  echo $parent['id'];?>" <?php  if($row['cid'] == $parent['id']) { ?> selected <?php  } ?>><?php  echo $parent['name'];?></option>
                        <?php  if(is_array($parent['sub'])) { foreach($parent['sub'] as $sub) { ?>
                        <option value="<?php  echo $sub['id'];?>" <?php  if($row['cid'] == $sub['id']) { ?> selected <?php  } ?>>&nbsp;&nbsp;|—<?php  echo $sub['name'];?></option>
                        <?php  } } ?>
                    <?php  } } ?>
                </select>
            </div>
        </div>    
    <?php  } else if($field == 'payroll') { ?> 
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
            <div class="col-sm-4">
                <select class="form-control" name="data[payroll]">
                    <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $key => $payroll) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['payroll']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $payroll;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div> 
    <?php  } else if($field == 'province') { ?> 
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">所在城市</label>
            <div class="col-sm-4">
            <select id="p"  name="data[province]" class="form-control" style=" width:30%;display:inline; float:left"></select>
            <select id="c"  name="data[city]" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select>  
            <select id="d"  name="data[district]" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select>           
            </div>
        </div>                                                                          
    <?php  } ?>

            
<?php  }} else {?>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-4">
                <input type="text" name="data[username]" value="<?php  echo $row['username'];?>" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">头像</label>
            <div class="col-sm-9 col-xs-12">
            	<?php  echo tpl_form_field_image('data[headimgurl]', $row['headimgurl'])?>
                <br />建议图片比例：120*120
            </div>
        </div>  
                
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[sex]">
                    <option value="1" <?php  if($row['sex'] == 1) { ?> selected <?php  } ?>>男</option>
                    <option value="0" <?php  if($row['sex'] == 0) { ?> selected <?php  } ?>>女</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">年龄</label>
            <div class="col-sm-4">
                <input type="text" name="data[age]" value="<?php  echo $row['age'];?>" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">学历</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[educational]">
                    <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $key => $payroll) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['educational']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $payroll;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">专业</label>
            <div class="col-sm-4">
                <input type="text" name="data[professional]" value="<?php  echo $row['professional'];?>" class="form-control">
            </div>
        </div>        
        

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">手机</label>
            <div class="col-sm-4">
                <input type="text" name="data[mobile]" value="<?php  echo $row['mobile'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">QQ</label>
            <div class="col-sm-4">
                <input type="text" name="data[qq]" value="<?php  echo $row['qq'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">工作经验</label>
            <div class="col-sm-4">
                  <select name="data[workexperience]" class="am-input-sm">
                    <?php  if(is_array($config['workexperience'])) { foreach($config['workexperience'] as $key => $xperience) { ?>
                    <option value="<?php  echo $xperience;?>" <?php  if(trim($row['workexperience']) == trim($xperience)) { ?>selected<?php  } ?>><?php  echo $xperience;?></option>
                    <?php  } } ?>
                  </select>             
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">应聘职位</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[cid]">
                    <?php  if(is_array($offices)) { foreach($offices as $key => $parent) { ?>
                        <option value="<?php  echo $parent['id'];?>" <?php  if($row['cid'] == $parent['id']) { ?> selected <?php  } ?>><?php  echo $parent['name'];?></option>
                        <?php  if(is_array($parent['sub'])) { foreach($parent['sub'] as $sub) { ?>
                        <option value="<?php  echo $sub['id'];?>" <?php  if($row['cid'] == $sub['id']) { ?> selected <?php  } ?>>&nbsp;&nbsp;|—<?php  echo $sub['name'];?></option>
                        <?php  } } ?>
                    <?php  } } ?>
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">期望薪资</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[payroll]">
                    <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $key => $payroll) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['payroll']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $payroll;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">期望工作地点</label>
            <div class="col-sm-4">
                <input type="text" name="data[workaddress]" value="<?php  echo $row['workaddress'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">自我评价</label>
            <div class="col-sm-4">
                <textarea name="data[assessment]" class="form-control"><?php  echo $row['assessment'];?></textarea>
            </div>
        </div>
<?php  }?>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">浏览数</label>
            <div class="col-sm-4">
                <input type="text" name="data[views]" value="<?php  echo $row['views'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">置顶有效期</label>
            <div class="col-sm-4" style="margin-top:8px">
                <?php  echo date('Y-m-d H:i:s',$row['expiration'])?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="save_info" value="保存">
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
require(['jquery', 'district'], function($, d){
	$(function(){
		d.render(
			{province: $('#p')[0], city: $('#c')[0], district: $('#d')[0]},
			{province: '<?php  echo $row['province'];?>', city: '<?php  echo $row['city'];?>', district: '<?php  echo $row['district'];?>'},
			{withTitle: true}
		);
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>