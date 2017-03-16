<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.red {float:left;color:red}
.white{float:left;color:#fff}
.tooltipbox {
    background:#fef8dd;border:1px solid #c40808; position:absolute; left:0;top:0; text-align:center;height:20px;
    color:#c40808;padding:2px 5px 1px 5px; border-radius:3px;z-index:1000;
}
.red { float:left;color:red}
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
        <!-- <div class="panel panel-default">
            <div class="panel-heading">
                参数设置
            </div>
            <div class="panel-body"> -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                   
                    <a href="<?php  echo $this->createWebUrl('set')?>" class="btn <?php  if($_GPC['do']=='set') { ?>btn-success<?php  } else { ?>btn-default<?php  } ?>"> 基础配置 </a>

                       <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fast')?>">快捷操作</a>  
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">主页面颜色色调</label>
                            <div class="col-sm-9 col-xs-12">
                                <?php  echo tpl_form_field_color('mainColor',$setting['mainColor'])?>
                               <br>
                           		<span style="color:red;">老版本使用，新版本暂时废弃！</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛名称</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" name="title" class="form-control" value="<?php  echo $setting['title'];?>" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛标签</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" name="tab" class="form-control" value="<?php  echo $setting['tab'];?>" />
                                <br>长度控制在6个字符以内
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛简介</label>
                            <div class="col-sm-9 col-xs-12">
                            	<textarea name="desc" class="form-control"><?php  echo $setting['desc'];?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">借用appid</label>
                            <div class="col-sm-9 col-xs-12">
                           		<input type="text" name="appid" class="form-control" value="<?php  echo $setting['appid'];?>" />
                           		<br>
                           		<span style="color:red;">推荐使用系统自带借用，不推荐使用在此借用，官方配置优先 ！</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">借用appselect</label>
                            <div class="col-sm-9 col-xs-12">
                           		<input type="text" name="sppsecret" class="form-control" value="<?php  echo $setting['sppsecret'];?>" />
                            	<br>
                           		<span style="color:red;">推荐使用系统自带借用，不推荐使用在此借用，官方配置优先 ！</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注链接</label>
                            <div class="col-sm-9 col-xs-12">
                           		<input type="text" name="subscribeurl" class="form-control" value="<?php  echo $setting['subscribeurl'];?>" />
                            	<br><span style="color:red;">请务必仔细填写本引导关注链接，用于 告诉用户为何关注你的公众账号！</span>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛logo</label>
                            <div class="col-sm-9 col-xs-12">
                                <?php  echo tpl_form_field_image('logo',$setting['logo'])?>
                                <br>尺寸为 120px * 120px
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片</label>
                            <div class="col-sm-9 col-xs-12">
                                <?php  echo tpl_form_field_image('bg',$setting['bg'])?>
                                <br>尺寸为 800 * 300px
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">管理组</label>
							<div class="col-sm-9 col-xs-12">
							
							<div class="btn-group" data-toggle="buttons">
					  
							  <label class="btn btn-default <?php  if(in_array(-1, (array)$setting['manager_group'])) { ?>active<?php  } ?>">
							    <input type="checkbox" name="manager_group[]" value="-1" <?php  if(in_array(-1, (array)$setting['manager_group'])) { ?>checked<?php  } ?>>游客(或未关注)
							  </label>
							  <?php  if($group) { ?>
							  <?php  if(is_array($group)) { foreach($group as $li) { ?>
							  <label class="btn btn-default <?php  if(in_array($li['groupid'], (array)$setting['manager_group'])) { ?>active<?php  } ?>">
							    <input type="checkbox" name="manager_group[]" value="<?php  echo $li['groupid']?>" <?php  if(in_array($li['groupid'], (array)$setting['manager_group'])) { ?>checked<?php  } ?>><?php  echo $li['title'];?>
							  </label>
							  <?php  } } ?>
							  <?php  } ?>
							</div>
								<br>
						管理组有前台删帖、加精、置顶、拉黑名单等权限<span style="color:red;">深色标示选中状态</span>
							</div>
						</div>
						
						<div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">敏感词过滤</label>
                            <div class="col-sm-9 col-xs-12">
                            	<textarea name="mingan" class="form-control"><?php  echo $setting['mingan'];?></textarea><br>
                            	多词汇请用&nbsp;|&nbsp;隔开
                            	
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">违法免责声明</label>
                            <div class="col-sm-9 col-xs-12">
                            	<?php  echo tpl_ueditor('content', $setting['content']);?>
                            	<br>发帖是底部显示的 违法免责声明
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">设置系统会员uid</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="sysuid" class="form-control" value="<?php  echo $setting['sysuid'];?>" />
                            	<br>
                            	所有系统后台发帖，默认均属于此人的帖子
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">发帖间隔设置（秒）</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="post_time" class="form-control" value="<?php  echo $setting['post_time'];?>" />
                            	<br>
                            	单位为秒，设置后，不能连续刷帖,0为不限制
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">回帖间隔设置（秒）</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="reply_time" class="form-control" value="<?php  echo $setting['reply_time'];?>" />
                            	<br>
                            	单位为秒，设置后，不能连续回帖,0为不限制
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛初始化会员数目</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="member_num" class="form-control" value="<?php  echo $setting['member_num'];?>" />
                            	
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">论坛初始化帖子数目</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="topic_num" class="form-control" value="<?php  echo $setting['topic_num'];?>" />
                            	
                            </div>
                        </div>
                        
                         <div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">开启分享提醒</label>
							<div class="col-sm-9 col-xs-12">
							
							<div class="btn-group" data-toggle="buttons">
					  
							  <label class="btn btn-default <?php  if($setting['isshare'] == 1) { ?>active<?php  } ?>">
							    <input type="radio" name="isshare" value="1" <?php  if($setting['isshare'] == 1) { ?>checked<?php  } ?>>开启
							  </label>
							  <label class="btn btn-default <?php  if($setting['isshare'] == 0) { ?>active<?php  } ?>">
							    <input type="radio" name="isshare" value="0" <?php  if($setting['isshare'] == 0) { ?>checked<?php  } ?>>禁止
							  </label>
							</div>
								<br>
						<span style="color:red;">深色标示选中状态</span>
							</div>
						</div>
						
						<div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信默认回复</label>
                            <div class="col-sm-9 col-xs-12">
                            	<textarea name="wechat" class="form-control"><?php  echo $setting['wechat'];?></textarea>
                            	<p class="help-block">当回复关键字没有搜索到相关帖子时的回复</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">开启回帖客服提醒</label>
							<div class="col-sm-9 col-xs-12">
							
							<div class="btn-group" data-toggle="buttons">
					  
							  <label class="btn btn-default <?php  if($setting['issend'] == 1) { ?>active<?php  } ?>">
							    <input type="radio" name="issend" value="1" <?php  if($setting['issend'] == 1) { ?>checked<?php  } ?>>开启
							  </label>
							  <label class="btn btn-default <?php  if($setting['issend'] == 0) { ?>active<?php  } ?>">
							    <input type="radio" name="issend" value="0" <?php  if($setting['issend'] == 0) { ?>checked<?php  } ?>>禁止
							  </label>
							</div>
								<br>
						<span style="color:red;">深色标示选中状态</span>
							</div>
						</div>
						<div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服电话</label>
                            <div class="col-sm-9 col-xs-12">
                            	<input type="text" name="tel" class="form-control" value="<?php  echo $setting['tel'];?>" />
                            	<p class="help-block">客服电话</p>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">帖子显示用户电话</label>
							<div class="col-sm-9 col-xs-12">
							
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-default <?php  if($setting['usermobile'] == 1) { ?>active<?php  } ?>">
							    <input type="radio" name="usermobile" value="1" <?php  if($setting['usermobile'] == 1) { ?>checked<?php  } ?>>开启
							  </label>
							  <label class="btn btn-default <?php  if($setting['usermobile'] == 0) { ?>active<?php  } ?>">
							    <input type="radio" name="usermobile" value="0" <?php  if($setting['usermobile'] == 0) { ?>checked<?php  } ?>>禁止
							  </label>
							</div>
								<br>
						<p class="help-block">如果开启则，用户帖子显示用户电话</p>
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启全站发帖审核</label>
                            <div class="col-sm-9 col-xs-12">
                            
                            <div class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default <?php  if($setting['post_topics'] == 1) { ?>active<?php  } ?>">
                                <input type="radio" name="post_topics" value="1" <?php  if($setting['post_topics'] == 1) { ?>checked<?php  } ?>>开启
                              </label>
                              <label class="btn btn-default <?php  if($setting['post_topics'] == 0) { ?>active<?php  } ?>">
                                <input type="radio" name="post_topics" value="0" <?php  if($setting['post_topics'] == 0) { ?>checked<?php  } ?>>禁止
                              </label>
                            </div>
                                <br>
                            <p class="help-block">如果开启则，需管理员审核方可显示</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

            <!-- </div>
        </div> -->
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>

<script language='javascript'>
	require(['jquery', 'util'], function($, u){
		$(function(){
			window.optionchanged = false;
	        $('#myTab a').click(function (e) {
	            e.preventDefault();//阻止a链接的跳转行为
	            $(this).tab('show');//显示当前选中的链接及关联的content
	        })
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>