<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
    <!-- 基本信息 -->
    <div class="am-g" style="background-color:#FFF;">
        <div class="am-u-sm-12">
            <div class="am-u-sm-6" style="padding-right:0">
                <a class="am-btn am-btn-block am-btn-success" style="color:aliceblue" href="<?php  echo $this->createMobileUrl('PublicResumeBasic', array('person_id' => $person['id']));?>">基本信息</a>
            </div>
            <div class="am-u-sm-6" style="padding-left:0">
                <a class="am-btn am-btn-block am-btn-default" style="color:black" href="<?php  echo $this->createMobileUrl('PublicResumeWorkExperience', array('person_id' => $person['id']));?>">工作经验</a>
            </div>
        </div>
        
        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
       
		<div class="am-u-sm-12" style="margin-top:5px">
          <form action="" class="am-form am-form-horizontal" enctype="multipart/form-data" method="POST" data-am-validator>
            <input type="hidden" value="<?php  echo $_W['token'];?>" name="token">
            <input type="hidden" value="<?php  echo $person_id;?>" name="person_id">
<?php  if ($fields_list) { foreach($fields_list as $field => $field_item) {
?>
	<?php  if(in_array($field, array('username', 'age', 'professional', 'qq', 'workaddress', 'attach_a', 'attach_b', 'attach_c', 'attach_d', 'attach_e'))) { ?>
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
              <div class="am-u-sm-9">
                <input type="<?php echo in_array($field, array('age', 'qq')) ? 'number' : 'text';?>" name="data[<?php  echo $field;?>]" value="<?php  echo $person[$field];?>" class="am-input-sm" placeholder="输入<?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>" <?php  if('username' == $field) { ?> minlength="2" required<?php  } ?>>
              </div>
            </div>         
    <?php  } else if($field == 'mobile') { ?>
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
              <div class="am-u-sm-9">
				<input type="text" name="data[mobile]" value="<?php  echo $person['mobile'];?>" class="am-input-sm" placeholder="输入手机号码" minlength="2" pattern="^1((3|5|8){1}\d{1}|70|78|77)\d{8}$"  required>
              </div>
            </div>                              
    <?php  } else if($field == 'headimgurl') { ?>   
            <div class="am-form-group">
                  <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
                  <div class="am-u-sm-9">
                    <input id="img" class="am-input-sm" type="file" name="uploadfile" accept="image/*"  style="width: 200px"/>
                  </div>
            </div>
            <?php  if($person['headimgurl']) { ?>
            <div class="am-form-group">
                  <div class="am-u-sm-3"></div>
                  <div class="am-u-sm-9">
                      <div id="showmsg"><img class="am-img-thumbnail am-radius" style="width:200px;height:200px" src="<?php  echo $person['headimgurl'];?>" /></div>
                  </div>
            </div>
            <?php  } ?> 
    <?php  } else if($field == 'sex') { ?>   
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
              <div class="am-u-sm-9">
                  <select id="doc-select-1" class="am-input-sm" name="data[sex]">
                    <option value="1" <?php  if($person['sex'] == 1) { ?>selected<?php  } ?>>男</option>
                    <option value="0" <?php  if($person['sex'] == 0) { ?>selected<?php  } ?>>女</option>
                  </select>
              </div>
            </div>        
    <?php  } else if($field == 'educational') { ?>   
           <div class="am-form-group">
             <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
             <div class="am-u-sm-9">
              <select name="data[educational]" class="am-input-sm">
                <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $key => $educational) { ?>
                <option value="<?php  echo $key;?>" <?php  if($person['educational'] == $key) { ?>selected<?php  } ?>><?php  echo $educational;?></option>
                <?php  } } ?>
              </select>
             </div>
           </div>      
	<?php  } else if($field == 'workexperience') { ?>
           <div class="am-form-group">
             <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
             <div class="am-u-sm-9">
              <select name="data[workexperience]" class="am-input-sm">
                <?php  if(is_array($config['workexperience'])) { foreach($config['workexperience'] as $key => $xperience) { ?>
                <option value="<?php  echo $xperience;?>" <?php  if(trim($person['workexperience']) == trim($xperience)) { ?>selected<?php  } ?>><?php  echo $xperience;?></option>
                <?php  } } ?>
              </select>                 
             </div>
           </div> 
	<?php  } else if($field == 'assessment') { ?>        
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
              <div class="am-u-sm-9">
                <textarea name="data[assessment]" minlength="10" maxlength="500" class="" rows="10" required><?php  echo $person['assessment'];?></textarea>
                <em class="am-text-xs">10~500个汉字</em>
              </div>
            </div> 
    <?php  } else if($field == 'cid') { ?> 
            <div class="am-form-group">
                <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
                <div class="am-u-sm-9">
                    <select class="am-input-sm" name="data[cid]" minchecked=1>
                        <?php  if(is_array($parent_cate)) { foreach($parent_cate as $key => $parent) { ?>
                        <option value="<?php  echo $parent['id'];?>" <?php  if(!empty($parent['sub'])) { ?> disabled="disabled" <?php  } ?>><?php  echo $parent['name'];?></option>
                        <?php  if(is_array($parent['sub'])) { foreach($parent['sub'] as $sub) { ?>
                        <option value="<?php  echo $sub['id'];?>" <?php  if($person['cid'] == $sub['id']) { ?> selected <?php  } ?>>&nbsp;&nbsp;|—<?php  echo $sub['name'];?></option>
                        <?php  } } ?>
                        <?php  } } ?>
                    </select>
                </div>
            </div>    
    <?php  } else if($field == 'payroll') { ?> 
            <div class="am-form-group">
                <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
                <div class="am-u-sm-9">
                    <select class="am-input-sm" name="data[payroll]">
                        <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $key => $payroll) { ?>
                        <option value="<?php  echo $key;?>" <?php  if($person['payroll'] == $key) { ?> selected <?php  } ?>><?php  echo $payroll;?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>   
    <?php  } else if($field == 'province') { ?>
<script src="../web/resource/js/app/util.js"></script> 
<script src="../web/resource/js/require.js"></script>  
<script src="../web/resource/js/app/config.js"></script>    
<script type="text/javascript">
require(['jquery', 'district'], function($, d){
	$(function(){
		d.render(
			{province: $('#p')[0], city: $('#c')[0], district: $('#d')[0]},
			{province: '<?php  echo $person['province'];?>', city: '<?php  echo $person['city'];?>', district: '<?php  echo $person['district'];?>'},
			{withTitle: true}
		);
	});
});
</script>    
            <div class="am-form-group">
                <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></label>
                <div class="am-u-sm-9">
                    <select id="p"  name="data[province]" class="am-input-sm"></select>
                    <select id="c"  name="data[city]" class="am-input-sm" ></select>  
                    <select id="d"  name="data[district]" class="am-input-sm"></select>           
                </div>
            </div>                                      
    <?php  } ?>

<?php  }} else {?>             
            <div class="am-form-group">
                  <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">照片</label>
                  <div class="am-u-sm-9">
                    <input id="img" class="am-input-sm" type="file" name="uploadfile" accept="image/*"  style="width: 200px"/>
                  </div>
            </div>
            <?php  if($person['headimgurl']) { ?>
            <div class="am-form-group">
                  <div class="am-u-sm-3"></div>
                  <div class="am-u-sm-9">
                      <div id="showmsg"><img class="am-img-thumbnail am-radius" style="width:200px;height:200px" src="<?php  echo $person['headimgurl'];?>" /></div>
                  </div>
            </div>
            <?php  } ?>
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">姓名</label>
              <div class="am-u-sm-9">
                <input type="text" name="data[username]" value="<?php  echo $person['username'];?>" class="am-input-sm" placeholder="输入姓名" minlength="2" required>
              </div>
            </div>
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">性别</label>
              <div class="am-u-sm-9">
                  <select id="doc-select-1" class="am-input-sm" name="data[sex]">
                    <option value="1" <?php  if($person['sex'] == 1) { ?>selected<?php  } ?>>男</option>
                    <option value="0" <?php  if($person['sex'] == 0) { ?>selected<?php  } ?>>女</option>
                  </select>
              </div>
            </div>
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">手机</label>
              <div class="am-u-sm-9">
				<input type="text" name="data[mobile]" value="<?php  echo $person['mobile'];?>" class="am-input-sm" placeholder="输入手机号码" minlength="2" pattern="^1((3|5|8){1}\d{1}|70|78|77)\d{8}$"  required>
              </div>
            </div>

              <div class="am-form-group">
                  <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">QQ</label>
                  <div class="am-u-sm-9">
                      <input type="number" name="data[qq]" value="<?php  echo $person['qq'];?>" class="am-input-sm" placeholder="输入qq" minlength="2" >
                  </div>
              </div>

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">年龄</label>
              <div class="am-u-sm-9">
              	<input type="number" name="data[age]" value="<?php  echo $person['age'];?>" class="am-input-sm" placeholder="输入年龄" min=1 required>
              </div>
            </div>

           <div class="am-form-group">
             <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">教育程度</label>
             <div class="am-u-sm-9">
              <select name="data[educational]" class="am-input-sm">
                <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $key => $educational) { ?>
                <option value="<?php  echo $key;?>" <?php  if($person['educational'] == $key) { ?>selected<?php  } ?>><?php  echo $educational;?></option>
                <?php  } } ?>
              </select>
             </div>
           </div>

           <div class="am-form-group">
             <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">所学专业</label>
             <div class="am-u-sm-9">
               <input type="text" name="data[professional]" value="<?php  echo $person['professional'];?>" class="am-input-sm" placeholder="输入专业" minlength="2" required>
             </div>
           </div>
                
           <div class="am-form-group">
             <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">工作经验</label>
             <div class="am-u-sm-9">
              <select name="data[workexperience]" class="am-input-sm">
                <?php  if(is_array($config['workexperience'])) { foreach($config['workexperience'] as $key => $xperience) { ?>
                <option value="<?php  echo $xperience;?>" <?php  if(trim($person['workexperience']) == trim($xperience)) { ?>selected<?php  } ?>><?php  echo $xperience;?></option>
                <?php  } } ?>
              </select>                 
             </div>
           </div>

          <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">期望工作地</label>
              <div class="am-u-sm-9">
                  <input type="text" name="data[workaddress]" value="<?php  echo $person['workaddress'];?>" class="am-input-sm" placeholder="期望工作地点" min=1 required>
              </div>
          </div>

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">自我评价</label>
              <div class="am-u-sm-9">
                <textarea name="data[assessment]" minlength="10" maxlength="500" class="" rows="10" required><?php  echo $person['assessment'];?></textarea>
                <em class="am-text-xs">10~500个汉字</em>
              </div>
            </div> 
<?php  }?>            
            <div class="am-form-group">
              <input type="submit" name="save_basic_submit" value="保存" class="am-btn am-btn-block am-btn-success">
            </div>
          </form>
       </div>
    </div>

    <script type="text/javascript">
	$(function() {
		  $('#doc-datepicker').datepicker().on('changeDate.datepicker.amui', function(event) {
		      var year = event.date.getFullYear();
		      var month = event.date.getMonth() + 1;
		      var day = event.date.getDate();
		      $("#birthday").val(year+'-'+month+'-'+day);
		    });
		});

    $(function(){
        $('#img').change(function(){
            var file = this.files[0]; //选择上传的文件
            var r = new FileReader();
            r.readAsDataURL(file); //Base64
            $(r).load(function(){
                $("#showmsg").html();
                $('#showmsg').html('<img  class="am-img-thumbnail am-radius" src="'+ this.result +'" alt="" />');
            });
        });
    });
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>