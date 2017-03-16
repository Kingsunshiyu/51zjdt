<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
    <style>
        .amtxt {margin: 5px 0 0 0}
    </style>
    <div class="am-g" style="margin:5px 0 10px 0">
    	<div class="am-u-sm-12" style="background-color:#FFF">
    		<div class="am-tabs" data-am-tabs="{noSwipe: 1}">
			  <ul class="am-tabs-nav am-nav am-nav-tabs">
			    <li class="am-active" style="width:49%"><a href="#tab1">职位详情</a></li>
			    <li><a href="#tab2">公司信息</a></li>
			  </ul>
			  <div class="am-tabs-bd">
			  	<!-- 职位详情 -->
			    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
			    	<h4 style="margin-bottom: 0"><strong><?php  echo $job['title'];?></strong></h4>
			    	<p  class="am-text-xs" style="margin-top: 0"><?php  echo $job['dateline'];?>&nbsp;&nbsp;<?php  echo $job['views'];?>次浏览</p>
			    	<hr>
					<p class="am-text-default amtxt">招聘职位：&nbsp;&nbsp;<?php  echo $category['name'];?></p>
			    	<p class="am-text-default amtxt">截止日期：&nbsp;&nbsp;<?php  echo $job['end_time'];?></p>
			    	<p class="am-text-default amtxt">职位类型：&nbsp;&nbsp;<?php  echo $config['positiontype'][$job['positiontype']];?></p>
                    <p class="am-text-default amtxt">薪资待遇：&nbsp;&nbsp;<font color="red"><?php  echo $config['payroll'][$job['payroll']];?></font></p>
			    	<p class="am-text-default amtxt">福利保障：&nbsp;&nbsp;
                        <?php  if($is_has_welfare) { ?>
                            <?php  if(is_array($job['welfare'])) { foreach($job['welfare'] as $welfare) { ?>
                                <span class="am-badge am-badge-secondary"><?php  echo $config['welfare'][$welfare];?></span>
                            <?php  } } ?>
                        <?php  } else { ?>
                                <span class="am-badge am-badge-default">无</span>
                        <?php  } ?>
			    	</p>
			    	<p class="am-text-default amtxt">工作地点：&nbsp;&nbsp;<?php  echo $job['workaddress'];?></p>
			    	<p class="am-text-default amtxt">招聘人数：&nbsp;&nbsp;<?php  echo $job['nums'];?>人</p>
			    	<p class="am-text-default amtxt">学历要求：&nbsp;&nbsp;<?php  echo $config['educational'][$job['educational']];?></p>
			    	<p class="am-text-default amtxt">工作年限：&nbsp;&nbsp;<?php  echo $config['workexperience'][$job['workexperience']];?></p>
			    	<hr style="margin: 5px 0">
			    	<h4 style="margin: 0"><strong>职位描述</strong></h4>
			    	<p><?php  echo htmlspecialchars_decode($job['description']);?></p>
			    	<hr style="margin: 5px 0">
					<h4 style="margin: 0"><?php  echo $company['contact'];?></h4>
	    			<p style="margin: 0">
	    				<font color="red"><?php  echo $company['mobile'];?></font>
	    				<a href="tel:<?php  echo $company['mobile'];?>"><img class="am-circle" src="../addons/q_3354988381_rencai/template/static/images/phone.jpg" width="18px" height="18px"></a>
	    			</p>            
	    			<hr>
                    <div class="am-g">
                        <div class="am-u-sm-6">
                            <?php  if($iscollect) { ?>
                            <button type="button" class="am-btn am-btn-default am-btn-block">已收藏</button>
                            <?php  } else { ?>
                            <button type="button" class="am-btn am-btn-success am-btn-block" id="collect">收藏职位</button>
                            <?php  } ?>
                        </div>
                        <div class="am-u-sm-6">
                            <?php  if($isapply) { ?>
                            <button type="button" class="am-btn am-btn-default am-btn-block">已申请</button>
                            <?php  } else { ?>
                            <button type="button" class="am-btn am-btn-success am-btn-block" id="apply">申请职位</button>
                            <?php  } ?>
                        </div>
                    </div>
			    </div>
			    <!-- 公司信息 --><?php  //echo $this->createMobileUrl('CompanyShow', array('companyid' => $company['id']));?>
			    <div class="am-tab-panel am-fade" id="tab2">
			    	<h4>
			    		<strong><?php  echo $company['name'];?></strong>
						<?php  if($company['isauth'] == 0) { ?>
							<span class="am-badge am-badge-default">未认证</span>
						<?php  } else if($company['isauth'] == 1) { ?>
							<span class="am-badge am-badge-success">电话认证</span>
						<?php  } else if($company['isauth'] == 2) { ?>
							<span class="am-badge am-badge-success">执照认证</span>	
						<?php  } else if($company['isauth'] == -1) { ?>
							<span class="am-badge">认证失败</span>
						<?php  } ?>                
					</h4>
			    	<p class="am-text-default amtxt">规模：&nbsp;&nbsp;<?php  echo $config['scale'][$company['scale']];?></p>
			    	<p class="am-text-default amtxt">性质：&nbsp;&nbsp;<?php  echo $config['companytype'][$company['type']];?></p>
			    	<p class="am-text-default amtxt">行业：&nbsp;&nbsp;<?php  echo $industry['name'];?></p>
                    <p class="am-text-default amtxt">所在城市：&nbsp;&nbsp;<?php  echo $company['province'];?><?php  echo $company['city'];?><?php  echo $company['district'];?></p>
                    
			    	<p class="am-text-default amtxt">地址：&nbsp;&nbsp;<?php  echo $company['address'];?>&nbsp;&nbsp;
                    <a href="<?php  echo $this->createMobileUrl('ShowCompanyMap', array('companyid' => $company['id']));?>">查看地图</a>
                    </p>
			    	<hr style="margin: 5px 0">
			    	<h4 style="margin: 5px 0"><strong>公司介绍</strong></h4>
			    	<p><?php  echo $company['description'];?></p>
			    </div>
			  </div>
			</div>
    	</div>

        <div class="am-u-sm-12"  style="margin-top:5px;background-color:#FFF">
            <?php  if(is_array($comments)) { foreach($comments as $comment) { ?>
            <article class="am-comment" style="margin-top:2px;background-color:#FFF"> <!-- 评论容器 -->
                <a href="">
                    <img class="am-comment-avatar" alt="" src="<?php  echo $persons[$comment['mid']]['headimgurl'];?>"/> <!-- 评论者头像 -->
                </a>
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta"> <!-- 评论元数据 -->
                            <a href="#link-to-user" class="am-comment-author"><?php  echo $persons[$comment['mid']]['username'];?></a> <!-- 评论者 -->
                            评论于 <time datetime=""><?php  echo $comment['dateline'];?></time>
                        </div>
                    </header>
                    <div class="am-comment-bd">
                        <?php  echo $comment['content'];?>
                    </div> <!-- 评论内容 -->
                </div>
            </article>
            <?php  } } ?>
        </div>

        <div class="am-u-sm-12" style="margin-top:5px;background-color:#FFF">
            <form action="" class="am-form am-form-horizontal" method="POST" data-am-validator>
                <input type="hidden" name="mid" value="<?php  echo $uid;?>">
                <input type="hidden" name="jobid" value="<?php  echo $job_id;?>">
                <div class="am-form-group" style="margin-bottom:2px">
                        <textarea name="content" minlength="2" maxlength="500" placeholder="发表你的评论" rows="5" required></textarea>
                </div>
                <div class="am-form-group">
                    <input type="button" id="comments_button" value="我要评论" class="am-btn am-btn-block am-btn-warning"/>
                </div>
            </form>

        </div>
    </div>

	<script>
        wx.ready(function () {
            sharedata = {
                title: "<?php  echo $company['name'];?>招聘<?php  echo $job['title'];?>",
                desc: "<?php  echo mb_substr(str_replace(chr(13).chr(10), '', strip_tags($job['description'])), 0, 30, 'utf-8');?>",
                link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']))?>",
                imgUrl: "<?php echo MODULE_URL;?>/template/static/images/share_img.jpg",
                success: function(){
                },
                cancel: function(){
                }
            };
            wx.onMenuShareAppMessage(sharedata);
            wx.onMenuShareTimeline(sharedata);
        });
    </script>
    <script>
        //收藏
        $("#collect").click(function(data){
        	$.get(
        		'<?php  echo $this->createMobileUrl("CollectJobAjax", array("job_id" => $job_id, "company_id" => $company['id']))?>',
        		{},
        		function (data){
        			if(data == '-3'){
						alert('您是企业用户，无法收藏');
					}
        			if(data == '-2'){
						alert('您还不是求职者，请先完善资料');
					}
					if(data == '-1'){
						alert('已经收藏');
					}        			
                    if(data == 1){
                        alert('收藏成功');
                    }
                    if(data == 0){
                        alert('收藏失败');
                    }
					return false;
        		}
        	);
        });
        
        //申请职位
        $("#apply").click(function(data){
            $.get(
                    '<?php  echo $this->createMobileUrl("ApplyJobAjax", array("job_id" => $job_id, "company_id" => $company['id']))?>',
                    {},
                    function (data){
            			if(data == '-3'){
    						alert('您是企业用户，无法申请');
    					}
            			if(data == '-2'){
    						alert('您还未成为求职者，请先完善资料');
    					}
    					if(data == '-1'){
    						alert('已经申请');
    					}        			
                        if(data == 1){
                            alert('申请成功');
                        }
                        if(data == 0){
                            alert('申请失败');
                        } 
						return false;   
                    }
                );            
        });
        //评论
        $("#comments_button").click(function(){
            $.ajax({
                type: "GET",
                dataType: 'html',
                url: '<?php  echo $this->createMobileUrl("CommentAjax");?>',
                data: $("form").serialize(),
                success:function(data){
                    if(data == '1'){
                        alert('评论成功，等待审核');
                    }
                    if(data == '-1'){
                        alert('评论失败');
                    }
                    if(data == '-2'){
                        alert('未注册成为求职者');
                    }
                    if(data == '-3'){
                        alert('企业用户无法评论');
                    }
                    location.reload();
                },
                error: function(data){
                    alert('评论失败');
                    return false;
                }
            });
        });

    </script>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>