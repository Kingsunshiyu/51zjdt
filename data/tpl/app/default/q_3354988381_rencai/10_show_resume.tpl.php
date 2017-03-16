<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
    <style>
        .amtxt {margin: 5px 0 0 0}
    </style>
    <div class="am-g" style="background-color:#FFF;margin-top:0;padding-top:0" onclick="location.href='<?php  echo $this->createMobileUrl('ShowResumeInfo', array('person_id' => $person['id']));?>';">
        <div class="am-u-sm-3">
            <img class="am-img-thumbnail am-radius" style="width:80px;height:80px" src="<?php  echo $person['headimgurl'];?>"/>
        </div>
         <div class="am-u-sm-8">
              <strong><?php  echo $person['username'];?></strong>
              <font size="1.2rem"><?php  if($person['sex'] == 1) { ?>先生<?php  } else { ?>女士<?php  } ?></font>
              <p style="font-size:12px;margin:5px 0 5px 0;color:red"><?php  echo $person['mobile'];?></p>
              <p style="font-size:12px;margin:5px 0 5px 0">
              <?php  echo $person['views'];?>人浏览
              更新于：<?php  echo $person['updatetime'];?>
              </p>
         </div>         
    </div>
   
   	<div class="am-g" style="margin-top:3px;padding-top:0">
    	<div class="am-u-sm-12" style="background-color:#FFF">
    		<div class="am-tabs" data-am-tabs="{noSwipe: 1}">
			  <ul class="am-tabs-nav am-nav am-nav-tabs">
			    <li class="am-active" style="width:49%"><a href="#tab1">基本信息</a></li>
			    <li><a href="#tab2">工作经验</a></li>
			  </ul>
			  <div class="am-tabs-bd">
                    <!-- 基本信息 -->   
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
<?php  if ($fields_list) { foreach($fields_list as $field => $field_item) { 
	if (in_array($field, array('username', 'sex', 'mobile', 'headimgurl'))) {
    	continue;
    }    
?>    
	<?php  if($field == 'educational') { ?>
                        <p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $config['educational'][$person['educational']];?></p> 
	<?php  } else if($field == 'cid') { ?>
                        <p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $category['name'];?></p> 
	<?php  } else if($field == 'payroll') { ?>
                        <p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $config['payroll'][$person['payroll']];?></p> 
    <?php  } else if($field == 'assessment') { ?> 
                        <hr style="margin: 5px 0">
                        <h4 style="margin: 5px 0"><strong><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?></strong></h4>
                        <p><?php  echo $person['assessment'];?></p>
	<?php  } else if($field == 'payroll') { ?>
                        <p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $config['payroll'][$person['payroll']];?></p> 
    <?php  } else if($field == 'province') { ?> 
                        <p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $person['province'];?><?php  echo $person['city'];?><?php  echo $person['district'];?></p>        
    <?php  } else { ?>
       					<p class="am-text-default amtxt"><?php echo $field_item['user_label'] ? $field_item['user_label'] : $field_item['label'];?>：&nbsp;&nbsp;<?php  echo $person[$field];?></p>
    <?php  } ?> 
<?php  }} else {?>                           
                        <p class="am-text-default amtxt">年龄：&nbsp;&nbsp;<?php  echo $person['age'];?></p>    
                        <p class="am-text-default amtxt">学历：&nbsp;&nbsp;<?php  echo $config['educational'][$person['educational']];?></p>
                        <p class="am-text-default amtxt">专业：&nbsp;&nbsp;<?php  echo $person['professional'];?></p>
                        <p class="am-text-default amtxt">QQ：&nbsp;&nbsp;<?php  echo $person['qq'];?></p>
                        <p class="am-text-default amtxt">工作经验：&nbsp;&nbsp;<?php  echo $person['workexperience'];?></p>
                        
                        <p class="am-text-default amtxt">期望工作地：&nbsp;&nbsp;<?php  echo $person['workaddress'];?></p>
                        <hr style="margin: 5px 0">
                        <h4 style="margin: 5px 0"><strong>自我评价</strong></h4>
                        <p><?php  echo $person['assessment'];?></p>    
<?php  }?>                    
                    </div>
                    <!-- 工作经验 -->
                    <div class="am-tab-panel am-fade" id="tab2">    
                            <?php  if(is_array($resumes)) { foreach($resumes as $resume) { ?>
                                <p class="am-text-default amtxt">公司：&nbsp;&nbsp;<?php  echo $resume['company_name'];?></p>
                                <p class="am-text-default amtxt">时间：&nbsp;&nbsp;<?php  echo $resume['dateline'];?></p>
                                <hr style="margin: 5px 0">
                                <h4 style="margin: 5px 0"><strong>工作描述</strong></h4>
                                <p><?php  echo $resume['work_description'];?></p> 
                                          
                            <?php  } } ?>      
                    </div>        
			  </div>
			</div>
    	</div>
                
        <div class="am-u-sm-12" style="margin-top:5px;background-color:#FFF">
            <div class="am-form-group">
                <?php  if($isinvite) { ?>
                <input type="button" id="invite" value="<?php  echo $isinvite_msg;?>" class="am-btn am-btn-block am-btn-default"/>
                <?php  } else { ?>
                <input type="button" id="invite" value="发出面试邀请" class="am-btn am-btn-block am-btn-success"/>
                <?php  } ?>            
                
            </div>
        </div>        
	</div>
<script>
    wx.ready(function () {
        sharedata = {
            title: "简历-<?php  echo $person['username'];?>",
            desc: "<?php  echo $person['assessment'];?>",
            link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('ShowResumeInfo', array('person_id' => $person['id']))?>",
            imgUrl: "<?php  echo $person['headimgurl'];?>",
            success: function(){
            },
            cancel: function(){
            }
        };
        wx.onMenuShareAppMessage(sharedata);
        wx.onMenuShareTimeline(sharedata);
    });
	//职位邀请
        $("#invite").click(function(data){
            $.get(
				'<?php  echo $this->createMobileUrl("InviteJobAjax", array('person_id' => $person['id']))?>',
				{},
				function (data){
					if(data == '-5'){
						alert('可查看简历数已用完');
					}					
					if(data == '-4'){
						alert('邀请次数已用完');
					}
					if(data == '-3'){
						alert('您是求职用户，无法邀请');
					}
					if(data == '-2'){
						alert('您还未成为认证企业');
					}
					if(data == '-1'){
						alert('已经邀请');
					}        			
					if(data == 1){
						alert('邀请成功');
					}
					if(data == 0){
						alert('邀请失败');
					} 
					return false;   
				}
			);            
        });	
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>