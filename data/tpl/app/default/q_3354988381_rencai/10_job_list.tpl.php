<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
    <div class="am-g" style="margin-top:5px">
    	<!-- 搜索框 -->
    	<div class="am-u-sm-12" style="padding-left:10px;background-color: #FFF;padding-top:5px;height: 45px">
		    <form  action="" class="am-form" method="POST">
		    	<div class="am-u-sm-10" style="padding-left: 0;padding-right: 0; width:78%">
		    		<input type="text" value="<?php  echo $keyword;?>" name="keyword" class="am-input-sm" placeholder="输入职位名称">
		    	</div>
		    	<div class="am-u-sm-2" style="margin-right:10px;" >
		    		<input type="submit" class="am-btn am-btn-success am-btn-sm" value="搜索" required />
		    	</div>
			</form>
		</div>

                                                		
		<!-- 显示检索条件 -->
		<div class="am-u-sm-12" style="margin-top:5px;height:50px; display:none">
			<div class="am-alert">
			条件：
            	<?php  if($cname) { ?>
                <span class="am-badge am-badge-success">
                <?php  echo $cname;?>
                </span>
                <?php  } ?>                
                
                <?php  if($query_payroll) { ?>
                <span class="am-badge am-badge-success">
                <?php  echo $config['payroll'][$query_payroll];?>
                </span>
                <?php  } ?>

                <?php  if($query_positiontype) { ?>
                <span class="am-badge am-badge-success">
                <?php  echo $config['positiontype'][$query_positiontype];?>
                </span>
                <?php  } ?>
                                
                <?php  if($keyword) { ?>
                <span class="am-badge am-badge-success">
                "<?php  echo $keyword;?>"
                </span>
                <?php  } ?>  
                          
                
            </div>
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
                        <li><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $parent_id, 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>">不限</a></li>
                        <?php  if(is_array($offices)) { foreach($offices as $vo) { ?>
                            <li>
                                <a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $vo['id'], 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>"><?php  echo $vo['name'];?></a>
                            <ul style="margin-top: 0;margin-bottom: 0;list-style:none">
                            <?php  if(is_array($vo['sub'])) { foreach($vo['sub'] as $v) { ?>
                                <li style=""><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $v['id'], 'positiontype' => $query_positiontype, 'payroll' => $query_payroll));?>">|-<?php  echo $v['name'];?></a></li>
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
                    <li><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $cid, 'positiontype' => $query_positiontype));?>">不限</a></li>
                    <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $k => $payroll) { ?>
                    <li><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $cid, 'payroll' => $k, 'positiontype' => $query_positiontype));?>"><?php  echo $payroll;?></a></li>
                    <?php  } } ?>
                    </ul>
                </div>
				<?php  if(false) { ?>
                <div class="am-dropdown" data-am-dropdown style="width:32%">
                    <button class="am-btn am-btn-block am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>
                    <?php  if($query_positiontype) { ?>
                        <span class="am-badge am-badge-success">
                        <?php  echo $config['positiontype'][$query_positiontype];?>
                        </span>
                    <?php  } else { ?>类型<?php  } ?>
                    <span class="am-icon-caret-down"></span>
                    </button>
                    <ul class="am-dropdown-content" id="Positiontype">
                    <li><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $cid, 'payroll' => $query_payroll));?>">不限</a></li>
                    <?php  if(is_array($config['positiontype'])) { foreach($config['positiontype'] as $k => $positiontype) { ?>
                    <li><a href="<?php  echo $this->createMobileUrl('JobList', array('cid' => $cid, 'positiontype' => $k, 'payroll' => $query_payroll));?>"><?php  echo $positiontype;?></a></li>
                    <?php  } } ?>
                    </ul>
                </div>
				<?php  } ?>
                
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
		location.href = '<?php  echo $this->createMobileUrl('JobList', array('cid' => $cid, 'payroll' => $query_payroll));?>&positiontype='+p_c_d;
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
<div data-am-widget="list_news" class="am-list-news am-list-news-default" style="margin: 0">
    <ul class="am-list" id="continue_jobs">
        <?php  if(is_array($job_lists)) { foreach($job_lists as $job) { ?>
        <li class="am-g am-list-item-desced" style="padding-left: 1rem">
            <a href="<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']));?>" class="am-list-item-hd ">
                <?php  echo $job['title'];?>&nbsp;<font color="red"><?php  echo $config['payroll'][$job['payroll']];?></font>
            </a>
            <div class="am-list-item-text" style="font-size: 1.4rem">
                <?php  echo $companys[$job['mid']]['name'];?>
                <?php  if($companys[$job['mid']]['isauth'] == 0) { ?>
                <span class="am-badge am-badge-default">未认证</span>
                <?php  } else { ?>
                <span class="am-badge am-badge-success">已认证</span>
                <?php  } ?>
            </div>
            <div class="am-list-item-text" style="max-height: 8.4rem;padding-bottom:0.2rem">
                <?php  if(is_array($job['welfare'])) { foreach($job['welfare'] as $key => $welfare) { ?>
                <span type="button" class="am-btn am-btn-default am-btn-xs am-radius" style="background-color: #FFF;padding: 0.4rem;margin: 2px"><?php  echo $config['welfare'][$welfare];?></span>
                <?php  } } ?>
            </div>
        </li>
        <?php  } } ?>
        
              
    </ul>
    <ul class="am-list" id="continue_jobs_more">
        <li class="am-g am-list-item-desced" style="padding-left: 1rem">
            <div style="text-align: center;padding: 10px; display:none">
                <a id="loading" style="color: #9fa0a0;display: block; text-align: center; font-size: 13px !important;">加载中，请稍后...</a>
            </div>  
            <div class="loading-more" id="more" style="display:none">
              <a href="" class="pro-more">查看更多</a>
            </div>         
        </li>
    </ul>    
</div>


    <script>
        wx.ready(function () {
            sharedata = {
                title: "<?php  echo $_W['mobile']['share']['zhao_title'];?>",
                desc: "<?php  echo $_W['mobile']['share']['zhao_desc'];?>",
                link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('JobList')?>",
                imgUrl: "<?php  echo $this->get_rencai_pic($_W['mobile']['share']['zhao_pic']);?>",
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
				$("#continue_jobs_more").hide();
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
                    url:"<?php  echo $this->createMobileUrl('joblist');?>&page="+page,
                    type:"get",
                    success:function(data){
						if (data == 'norec') {
							page = 200;
							lock = true;
						} else {
							$('#continue_jobs').append(data);
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