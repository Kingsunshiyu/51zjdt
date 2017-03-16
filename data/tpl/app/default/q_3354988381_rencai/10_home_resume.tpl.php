<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
    	<!-- 搜索框 -->
    	<div class="am-u-sm-12" style="padding-left:10px;background-color: #FFF;padding-top:5px;height: 45px">
		    <form action="" class="am-form" method="POST">
		    	<div class="am-u-sm-10" style="padding-left: 0;padding-right: 0;width:78%">
		    		<input type="text" name="keyword" value="<?php  echo $keyword;?>" class="am-input-sm" placeholder="输入期望工作地点或专业">
		    	</div>
		    	<div class="am-u-sm-2" style="margin-right:10px;">
		    		<input type="submit" class="am-btn am-btn-success am-btn-sm" value="搜索" required />
		    	</div>
			</form>
		</div>
        
        <!-- 下拉框搜索 -->
		<div class="am-u-sm-12" style="margin-top:10px;">
			<div class="am-avg-sm-3">
                <div class="am-dropdown" data-am-dropdown style="width:32%">

                    <button class="am-btn am-btn-block am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>
                    <?php  if($cname) { ?>
                        <span class="am-badge am-badge-success">
                        <?php  echo $cname;?>
                        </span>
                    <?php  } else { ?>职位<?php  } ?>                     
                     <span class="am-icon-caret-down"></span>
                     </button>                
                
                    <ul class="am-dropdown-content" id="JobCategory">
                        <li><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $parent_id, 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>">不限</a></li>
                        <?php  if(is_array($offices)) { foreach($offices as $vo) { ?>
                            <li>
                                <a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $vo['id'], 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>"><?php  echo $vo['name'];?></a>
                            <ul style="margin-top: 0;margin-bottom: 0;list-style:none">
                            <?php  if(is_array($vo['sub'])) { foreach($vo['sub'] as $v) { ?>
                                <li style=""><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $v['id'], 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>">|-<?php  echo $v['name'];?></a></li>
                            <?php  } } ?>
                            </ul>
                            </li>
                        <?php  } } ?>
                    </ul>
                </div>

                <div class="am-dropdown" data-am-dropdown style="width:32%">
                    <button class="am-btn am-btn-block am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>
                    <?php  if($query_payroll) { ?>
                        <span class="am-badge am-badge-success">
                        <?php  echo $config['payroll'][$query_payroll];?>
                        </span>
                    <?php  } else { ?>薪资<?php  } ?>  
                    <span class="am-icon-caret-down"></span>
                    </button>
                    <!--<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">菜单 <span class="am-icon-caret-down"></span>-->
                    <ul class="am-dropdown-content" id="Payroll">
                    <li><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $cid, 'positiontype' => $query_positiontype));?>">不限</a></li>
                    <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $k => $payroll) { ?>
                    <li><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $cid, 'payroll' => $k, 'positiontype' => $query_positiontype));?>"><?php  echo $payroll;?></a></li>
                    <?php  } } ?>
                    </ul>
                </div>
				<?php  if (0){?>
                <div class="am-dropdown" data-am-dropdown style="width:32%">
                    <button class="am-btn am-btn-block am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>
                    <?php  if($query_positiontype) { ?>
                        <span class="am-badge am-badge-success">
                        <?php  echo $config['educational'][$query_positiontype];?>
                        </span>
                    <?php  } else { ?>学历<?php  } ?>
                    <span class="am-icon-caret-down"></span>
                    </button>
                    <ul class="am-dropdown-content" id="Positiontype">
                    <li><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $cid, 'payroll' => $query_payroll));?>">不限</a></li>
                    <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $k => $positiontype) { ?>
                    <li><a href="<?php  echo $this->createMobileUrl('Resume', array('cid' => $cid, 'positiontype' => $k, 'payroll' => $query_payroll));?>"><?php  echo $positiontype;?></a></li>
                    <?php  } } ?>
                    </ul>
                </div>
				<?php  }?>
                <div class="am-dropdown" data-am-dropdown style="width:32%">
                    <button id="sh_city" class="am-btn am-btn-block am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>
                    <?php  if($sh_city_name) { ?>
                        <span class="am-badge am-badge-success">
                        <?php  echo $sh_city_name;?>
                        </span>
                    <?php  } else { ?>城市<?php  } ?>
                    <span class="am-icon-caret-down"></span>
                    </button>
                </div>
                                
			</div>
        </div>
<script src="./resource/js/app/util.js"></script>
<script src="./resource/js/require.js"></script>
<script src="./resource/js/app/config.js"></script>
<link rel="stylesheet" href="<?php echo CURR_UI_DIR;?>weui/style/weui.css"/>
<style>
.weui_dialog_bd {
    padding: 20px 20px;
    font-size: 15px;
    color: #888;
    word-wrap: break-word;
    word-break: break-all;
}
.am-u-sm-3 {
    width: 33%;
}
</style>
<div class="weui_dialog_confirm" id="div_sh_city" style="display:none;">
    <div class="weui_mask">&nbsp;</div>
    <div class="weui_dialog">
        <div class="weui_dialog_bd">
            <select id="p" name="sh_province"  class="am-input-sm weui_select" style="display:block; width:100%; margin-bottom:5px; border:#d9dcda 1px solid"></select>
            <select id="c" name="sh_city"  class="am-input-sm weui_select"  style="display:block; width:100%;margin-bottom:5px; border:#d9dcda 1px solid"></select>  
            <select id="d" name="sh_district"   class="am-input-sm weui_select" style="display:block; width:100%;margin-bottom:5px; border:#d9dcda 1px solid"></select>            
        </div>
        <div class="weui_dialog_ft">
            <a href="javascript:;" id="sh_city_bt_cancel" class="weui_btn_dialog default">取消</a>
            <a href="javascript:;" id="sh_city_bt_confirm" class="weui_btn_dialog primary">确定</a>
        </div>
    </div>
</div>  
<script type="text/javascript">

	$("#sh_city").click(function(){ 
		$("#div_sh_city").show();
	});						   
	$("#sh_city_bt_cancel").click(function(){ 
		$("#div_sh_city").hide();
	});
	$("#sh_city_bt_confirm").click(function(){ 
		$("#div_sh_city").hide();
		var p_c_d = $("#p").val() + '_' + $("#c").val() + '_' + $("#d").val();
		location.href = '<?php  echo $this->createMobileUrl('Resume', array('cid' => $cid, 'payroll' => $query_payroll));?>&positiontype='+p_c_d;
		
	});	
/*
$(document).ready(function(){
});*/
require(['jquery', 'district'], function($, d){
	$(function(){
		d.render(
			{province: $('#p')[0], city: $('#c')[0], district: $('#d')[0]},
			{province: '<?php  echo $sh_p;?>', city: '<?php  echo $sh_c;?>', district: '<?php  echo $sh_d;?>'},
			{withTitle: true}
		);
	});
});
</script>      
    <!-- 置顶 -->
	<?php  if(is_array($top_lists)) { foreach($top_lists as $person) { ?>
	    <div class="am-g" style="background-color:#FFF;margin-top:0;padding-top:5px" onclick="location.href='<?php  echo $this->createMobileUrl('ShowResumeInfo', array('person_id' => $person['id']));?>';">
	        <div class="am-u-sm-3">
	            <img class="am-img-thumbnail am-radius" style="width:80px;height:80px" src="<?php  echo $person['headimgurl'];?>"/>
	        </div>
	         <div class="am-u-sm-8">
	              <span class="am-badge am-badge-warning am-radius">置顶</span>
	              <strong><?php  echo mb_substr($person['username'],0,1,'utf-8');?></strong>
	              <font size="1.2rem"><?php  if($person['sex'] == 1) { ?>先生<?php  } else { ?>女士<?php  } ?></font>
                  <p style="font-size:12px;margin:5px 0 5px 0">更新于：<?php  echo $person['updatetime'];?></p>
                  
                  <?php  if($this->getFieldsShowFlag('person_age') || $this->getFieldsShowFlag('person_educational') || $this->getFieldsShowFlag('person_professional')) { ?>                
                  <p style="font-size:12px;margin:5px 0 5px 0">
                     <?php  if($this->getFieldsShowFlag('person_age')) { ?><?php  echo $person['age'];?>岁<?php  } ?>
                     <?php  if($this->getFieldsShowFlag('person_educational') && trim($config['educational'][$person['educational']])) { ?> | <?php  echo $config['educational'][$person['educational']];?> <?php  } ?>
                     <?php  if($this->getFieldsShowFlag('person_professional') && trim($person['professional'])) { ?> | <?php  echo $person['professional'];?><?php  } ?>
                  </p> 
                  <?php  } ?>
                                    
                  <?php  if($this->getFieldsShowFlag('person_workaddress')) { ?>                
                  <p style="font-size:12px;margin:5px 0 5px 0">
                  		<?php  echo $this->getFieldsArr('person', 'person_workaddress');?>：<?php  echo $person['workaddress'];?>&nbsp;&nbsp;
	              </p>
                  <?php  } ?>
	         </div>
	   </div>
	<?php  } } ?>

    <!-- 普通 -->
	<?php  if(is_array($lists)) { foreach($lists as $person) { ?>
	    <div class="am-g" style="background-color:#FFF;margin-top:1px;" onclick="location.href='<?php  echo $this->createMobileUrl('ShowResumeInfo', array('person_id' => $person['id']));?>';">
	        <div class="am-u-sm-3">
	            <img class="am-img-thumbnail am-radius" style="width:80px;height:80px" src="<?php  echo $person['headimgurl'];?>"/>
	        </div>
	         <div class="am-u-sm-8">
	              <strong><?php  echo mb_substr($person['username'],0,1,'utf-8');?></strong>
	              <font size="1.2rem"><?php  if($person['sex'] == 1) { ?>先生<?php  } else { ?>女士<?php  } ?></font>
                  <font size="1.2rem">更新于：<?php  echo $person['updatetime'];?></font>

                  <?php  if($this->getFieldsShowFlag('person_age') || $this->getFieldsShowFlag('person_educational') || $this->getFieldsShowFlag('person_professional')) { ?>                
                  <p style="font-size:12px;margin:5px 0 5px 0">
                     <?php  if($this->getFieldsShowFlag('person_age')) { ?><?php  echo $person['age'];?>岁<?php  } ?>
                     <?php  if($this->getFieldsShowFlag('person_educational') && trim($config['educational'][$person['educational']])) { ?> | <?php  echo $config['educational'][$person['educational']];?> <?php  } ?>
                     <?php  if($this->getFieldsShowFlag('person_professional') && $person['professional']) { ?> | <?php  echo $person['professional'];?><?php  } ?>
                     <?php  if($this->getFieldsShowFlag('cid') && $person['cid_name']) { ?> | <?php  echo $person['cid_name'];?><?php  } ?>
                  </p> 
                  <?php  } ?>
                  
                  <?php  if($this->getFieldsShowFlag('person_workaddress')) { ?>                
                  <p style="font-size:12px;margin:5px 0 5px 0">
                  		<?php  echo $this->getFieldsArr('person', 'person_workaddress');?>：<?php  echo $person['workaddress'];?>&nbsp;&nbsp;
	              </p>
                  <?php  } ?>                                  
	         </div>         
	   </div>
	<?php  } } ?>
    
    <div id="continue_resumes"></div>
    <div style="text-align: center;padding: 10px; display:none">
        <a id="loading" style="color: #9fa0a0;display: block; text-align: center; font-size: 13px !important;">加载中，请稍后...</a>
    </div>  
    <div class="loading-more" id="more" style="display:none">
      <a href="" class="pro-more">查看更多</a>
    </div>    
                
    <script>
        wx.ready(function () {
            sharedata = {
                title: "<?php  echo $_W['mobile']['share']['qiu_title'];?>",
                desc: "<?php  echo $_W['mobile']['share']['qiu_desc'];?>",
                link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('Resume')?>",
                imgUrl: "<?php  echo $this->get_rencai_pic($_W['mobile']['share']['qiu_pic']);?>",
                success: function(){
                },
                cancel: function(){
                }
            };
            wx.onMenuShareAppMessage(sharedata);
            wx.onMenuShareTimeline(sharedata);
        });
    </script>
<?php  if(1) { ?>
<script type="text/javascript">
    $(function(){
        var page = 2;

        var bottomOffset = 0;
        var lock = false;
        $(window).scroll(function(){
            if(page > 100) {
                $("#loading").hide();
                $("#more").hide();
                return;
            }
            var $currentWindow = $(window);
            var windowHeight   = $currentWindow.height()+700;
            var scrollTop      = $currentWindow.scrollTop();
            var docHeight      = $(document).height();
            if ((bottomOffset + scrollTop) >= docHeight - windowHeight) {

                if(lock) return;
                lock = true;
                $.ajax({
                    url:"<?php  echo $this->createMobileUrl('resume');?>&page="+page,
                    type:"get",
                    success:function(data){
						if (data == 'norec') {
							page = 200;
							lock = true;
						} else {
							$('#continue_resumes').append(data);
							page++;
							lock = false;						
						}

                    }
                });
            }
        });
    });
</script>  
<?php  } ?>      
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>