<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li class="active"><a href="javascript:;">微人才微招聘参数设置</a> </li>
		<li class="">
        <a style="color:#F00">注：首次安装会自动生成初始数据，如未生成请多刷新几次当前页，如还没有就更新一下缓存。</a>
        </li>        
	</ul>
	
    <form class="form-horizontal form" id="form2" action="" method="post">

        <div class="panel panel-success">
        	<div class="panel-heading">基础数据配置</div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">简历置顶有效期（天）</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="resume_validity" rows="5"><?php  echo $this->module['config']['resume_validity']?></textarea>
                </div>
                <div><em>一行一条，下同</em></div>
            </div>        
            <div class="panel-body">
                <label class="col-sm-4 control-label">薪资</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="payroll" rows="5"><?php  echo $this->module['config']['payroll']?></textarea>
                </div>
                <div><em></em></div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">福利</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="welfare" rows="5"><?php  echo $this->module['config']['welfare']?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">学历</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="educational" rows="5"><?php  echo $this->module['config']['educational']?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">职位类型（全职/兼职）</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="positiontype" rows="5"><?php  echo $this->module['config']['positiontype']?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">工作经验</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="workexperience" rows="5"><?php  echo $this->module['config']['workexperience']?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">公司性质</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="companytype" rows="5"><?php  echo $this->module['config']['companytype']?></textarea>
                </div>
            </div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">公司规模</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="scale" rows="5"><?php  echo $this->module['config']['scale']?></textarea>
                </div>
            </div>
        </div>


        <div class="panel panel-success">
        	<div class="panel-heading">手机端相关参数配置</div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">是否开启首页“置顶职位功能”</label>
                <div class="col-sm-4">
                    <select class="form-control" name="isopenindextop">
                        <option value="1" <?php  if($settings['isopenindextop'] == 1) { ?>selected<?php  } ?>>是</option>
                        <option value="0" <?php  if(isset($settings['isopenindextop']) && $settings['isopenindextop'] == 0) { ?>selected<?php  } ?>>否</option>
                    </select>
                </div>
            </div>        
            <div class="panel-body">
                <label class="col-sm-4 control-label">是否开启首页“热门职位推荐”</label>
                <div class="col-sm-4">
                    <select class="form-control" name="isopenindexhot">
                        <option value="1" <?php  if($settings['isopenindexhot'] == 1) { ?>selected<?php  } ?>>是</option>
                        <option value="0" <?php  if(isset($settings['isopenindexhot']) && $settings['isopenindexhot'] == 0) { ?>selected<?php  } ?>>否</option>
                    </select>
                </div>
            </div>

            <div class="panel-body">
                <label class="col-sm-4 control-label">首页“置顶职位”条数</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php  echo $this->module['config']['indextopnums']?>" class="form-control" name="indextopnums">
                </div>
            </div>

            <div class="panel-body">
                <label class="col-sm-4 control-label">首页“热门职位推荐”条数</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php  echo $this->module['config']['indexhotnums']?>" class="form-control" name="indexhotnums">
                </div>
            </div>

            <div class="panel-body">
                <label class="col-sm-4 control-label">首页“最新招聘职位”条数</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php  echo $this->module['config']['indexlastnums']?>" class="form-control" name="indexlastnums">
                </div>
            </div>

            <div class="panel-body">
                <label class="col-sm-4 control-label">首页“名企推荐”条数</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php  echo $this->module['config']['indexcompanynums']?>" class="form-control" name="indexcompanynums">
                </div>
            </div>

        </div>

        <!--<div class="panel panel-default">-->
            <!--<div class="panel-heading">首页分类一行几列？</div>-->
            <!--<div class="panel-body">-->
                <!--<label class="col-sm-4 control-label">几列？</label>-->
                <!--<div class="col-sm-4">-->
                    <!--<input type="text" value="<?php  echo $this->module['config']['colspan']?>" class="form-control" name="colspan">-->
                    <!--<em>考虑到分类的名字长短问题，容易出现折行，请自行设置(此设置项只对<font color="red">分类</font>有效)</em>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <div class="panel panel-success">
        	<div class="panel-heading">关注相关配置</div>
	        <div class="panel-body">
	        	<label class="col-sm-4 control-label">请上传你公众号的二维码</label>
	            <div class="col-sm-4">
	                <?php  echo tpl_form_field_image('qrcode', $settings['qrcode']);?>
	            </div>
	        </div>
			<div class="panel-body">
                <label class="col-sm-4 control-label">用户通过链接进入平台时的借权配置</label>
                <div class="col-sm-6">
                当前公众号为认证订阅号时，需申请微信开放平台，将您的当前订阅号与服务号捆绑到一起，然后再配置服务号如下信息。
                <div class="help-block"><div style="width:100px; float:left; margin-top:11px">Appid：</div><input class="form-control" type="text" name="svs_appid" value="<?php  echo $this->module['config']['svs_appid']?>" style="width:360px; display:inline" /></div>

                <div class="help-block"><div style="width:100px; float:left; margin-top:11px">Appsecret：</div><input class="form-control" type="text" name="svs_appsecret" value="<?php  echo $this->module['config']['svs_appsecret']?>" style="width:360px; display:inline" /></div>

                </div>           
            </div> 
        
            <div class="panel-body">
            	<label class="col-sm-4 control-label">认证联系电话</label>
             	<div class="col-sm-4">
                	<input type="text" value="<?php  echo $this->module['config']['telephone']?>" class="form-control" name="telephone">
	             </div>
            </div>
			<div class="panel-body">
                <label class="col-sm-4 control-label">开启GPS定位用户功能</label>
                <div class="col-sm-6">
                <input type="checkbox" value="Y" name="open_gps" <?php  if($this->module['config']['open_gps']=='Y') { ?>checked="checked"<?php  } ?> />&nbsp;是
				<br />用户进入时将开始定位用户当前位置，招聘/求职信息只显示当前用户的所在城市数据
                </div>           
            </div> 
			<div class="panel-body">
                <label class="col-sm-4 control-label">默认城市设置</label>
                <div class="col-sm-6">
            <select id="p"  name="cfg_dft_p" class="form-control" style=" width:30%;display:inline; float:left"></select>
            <select id="c"  name="cfg_dft_c" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select>  
            <select id="d"  name="cfg_dft_d" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select> 
            <br />添加企业、求职意向时的默认显示城市
                </div>           
            </div>             
            
<script type="text/javascript">
require(['jquery', 'district'], function($, d){
	$(function(){
		d.render(
			{province: $('#p')[0], city: $('#c')[0], district: $('#d')[0]},
			{province: '<?php  echo $this->module['config']['cfg_dft_p']?>', city: '<?php  echo $this->module['config']['cfg_dft_c']?>', district: '<?php  echo $this->module['config']['cfg_dft_d']?>'},
			{withTitle: true}
		);
	});
});
</script>  
                        
        </div>  

        <div class="panel panel-success">
        	<div class="panel-heading">企业相关配置</div>
            <div class="panel-body">
                <label class="col-sm-4 control-label">新注册企业用户是否自动审核</label>
                <div class="col-sm-4">
                    <select class="form-control" name="isopenaudit">
                        <option value="1" <?php  if($settings['isopenaudit'] == 1) { ?>selected<?php  } ?>>是</option>
                        <option value="0" <?php  if(isset($settings['isopenaudit']) && $settings['isopenaudit'] == 0) { ?>selected<?php  } ?>>否</option>
                    </select>
                </div>
                <em>“是”：后台会自动审核企业可以直接发布职位信息；“否”：需要后台人工审核，之后才能发布职位信息。</em>
            </div>

            <div class="panel-body">
            	<label class="col-sm-4 control-label">企业查看简历数初始免费数</label>
             	<div class="col-sm-4">
                	<input type="text" value="<?php  echo $this->module['config']['viewresumenums']?>" class="form-control" name="viewresumenums">
	            </div>
                <div class="col-sm-4">
                    <em>手机端新企业注册时默认的初始值</em>
                </div>
            </div>

            <div class="panel-body">
            	<label class="col-sm-4 control-label">是否开启营业执照</label>
             	<div class="col-sm-4">
	              <select class="form-control" name="isopenlicense">
	                <option value="1" <?php  if($settings['isopenlicense'] == 1) { ?>selected<?php  } ?>>是</option>
	                <option value="0" <?php  if($settings['isopenlicense'] == 0) { ?>selected<?php  } ?>>否</option>
	              </select>
	             </div>
            </div>
            
             <div class="panel-body">
            	<label class="col-sm-4 control-label">营业执照/企业LOGO/企业封面允许上传最大值</label>
             	<div class="col-sm-4">
	              <input type="text" value="<?php  echo $this->module['config']['maxfilesize']?>" class="form-control" name="maxfilesize">
	              <p><em>0:为不限制。默认2M。单位：M，直接输入数字</em></p>
	             </div>
                <div class="col-sm-4">
                    <em>此处需要服务器配置支持，否则上传报错。</em>
                </div>
            </div> 
            <div class="panel-body">
                <label class="col-sm-4 control-label">企业可给每位求职者发邀请</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="invites_per_member" placeholder="0为不限制" value="<?php  echo $this->module['config']['invites_per_member']?>" class="form-control"/>
                        <span class="input-group-addon">次</span>
                    </div>                   
                </div>                
            </div> 
                        
            <div class="panel-body">
                <label class="col-sm-4 control-label">企业最低充值金额</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="miniaddmoney" value="<?php  echo $this->module['config']['miniaddmoney']?>" class="form-control"/>
                        <span class="input-group-addon">元</span>
                    </div>                   
                </div>                
            </div>             
            <div class="panel-body">
                <label class="col-sm-4 control-label">查看一次简历扣款</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" name="price_per_resume" placeholder="" value="<?php  echo $this->module['config']['price_per_resume']?>" class="form-control"/>
                        <span class="input-group-addon">元</span>
                    </div>   
                    <div class="help-block" style="">查看同一简历不重复扣款</div>                
                </div>                
            </div>                      
        </div> 

        <div class="panel panel-success">
        	<div class="panel-heading">上传图片控制</div>
           <div class="panel-body">
                <label class="col-sm-4 control-label">头像允许上传最大值</label>
                <div class="col-sm-4">
                  <input type="text" value="<?php  echo $this->module['config']['headimgurlsize']?>" class="form-control" name="headimgurlsize">
                  <p><em>0:为不限制。默认2M。单位：M，直接输入数字</em></p>
                 </div>
            </div> 
            
            <div class="panel-body">
                <label class="col-sm-4 control-label">头像尺寸宽度</label>
                <div class="col-sm-4">
                    <input type="text" value="<?php  echo $this->module['config']['headimgurlwidth']?>" class="form-control" name="headimgurlwidth">
                    <p><em>系统将按此尺寸进行缩略。建议尺寸为200。</em></p>
                    <p><em>(Tips:头像尺寸：最好是正方形 200X200，最清晰的头像，但具体取决于用户上传)</em></p>
                 </div>
            </div>
        </div>  

        <div class="panel panel-success">
        	<div class="panel-heading">主题配置</div>
            <div class="panel-body">
            	<label class="col-sm-4 control-label">手机端-首页标题</label>
             	<div class="col-sm-4">
					<input type="text" value="<?php echo $this->module['config']['mobile_index_title'] ? $this->module['config']['mobile_index_title'] : '微人才微招聘';?>" class="form-control" name="mobile_index_title">
	             </div>
            </div>  
            <div class="panel-body">
            	<label class="col-sm-4 control-label">手机端-底部导航和发布页背景颜色</label>
             	<div class="col-sm-6">
                    <?php  echo tpl_form_field_color('footer_nav_bgcolors', $this->module['config']['footer_nav_bgcolors']);?>
                    <div class="help-block" style="">默认：#0e76ad，推荐：#AD0E56</div>
	             </div>
            </div>  

                
            <div class="panel-body">
            	<label class="col-sm-4 control-label">是否开启兼职模块</label>
             	<div class="col-sm-4">
	              <select class="form-control" name="show_part_time">
	                <option value="1" <?php  if($settings['show_part_time'] == 1) { ?>selected<?php  } ?>>是</option>
	                <option value="0" <?php  if($settings['show_part_time'] == 0) { ?>selected<?php  } ?>>否</option>
	              </select>
	             </div>
            </div>
            <div class="panel-body">
            	<label class="col-sm-4 control-label">是否开启二手市场模块</label>
             	<div class="col-sm-4">
	              <select class="form-control" name="show_used_market">
	                <option value="1" <?php  if($settings['show_used_market'] == 1) { ?>selected<?php  } ?>>是</option>
	                <option value="0" <?php  if($settings['show_used_market'] == 0) { ?>selected<?php  } ?>>否</option>
	              </select>
	             </div>
            </div>

        </div> 
        
        <div class="panel panel-success">
        	<div class="panel-heading">模板消息对接配置</div>
            <div class="panel-body">
            	<label class="col-sm-4 control-label">调用消息通知插件时的授权密钥</label>
             	<div class="col-sm-4">
					<input type="text" value="<?php  echo $this->module['config']['notify_auth_key']?>" class="form-control" name="notify_auth_key">
	             </div>
            </div>        
            

        </div> 
                

                
        <div class="form-group col-sm-12">
            <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
            <input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
        </div>
    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>