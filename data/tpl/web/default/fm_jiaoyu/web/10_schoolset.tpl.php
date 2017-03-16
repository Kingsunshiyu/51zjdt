<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'post') { ?>
<div class="main">
<form class="form-horizontal form" id="form1" action="" method="post" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active" ><a href="#tab_basic">基本设置</a></li>
				<li><a href="#tab_gongn">功能管理</a></li>
				<li><a href="#tab_muban">模板设置</a></li>
				<li><a href="#tab_baom">报名设置</a></li>
				    <?php  if($reply['is_recordmac'] ==1) { ?>
                <li><a href="#tab_shid">考勤设置</a></li>
                <?php  } ?>
                <?php  if($_W['isfounder']) { ?>
                    <li><a href="#tab_highset">高级管理设置</a></li><?php  } ?>
			</ul>
		</div>
	</div>
	<!--微信端首页tips-->
    <?php  if(!empty($reply)) { ?>
	<div class="panel panel-default clip">
		<div class="panel-body">
			<p style="margin: 0px">
				<strong>微信端首页 :</strong>
				<a> <?php echo $_W['siteroot'] . 'app/index.php?i=' . $reply['weid'] . '&c=entry&schoolid=' . $reply['id'] . '&do=detail&m=fm_jiaoyu'?></a>
			</p>
		</div>
	</div>
	<?php  } ?>
    <!--微信端首页tips_end-->

	<div class="tab-content">
		<div class="tab-pane active" id="tab_basic">
			<div class="panel panel-info">
				<div class="panel-heading">
					基本信息
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>学校名称</label>
						<div class="col-sm-9">
							<input type="text" name="title" value="<?php  echo $reply['title'];?>" id="title" class="form-control" />
						</div>
					</div>
			
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">Logo</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('logo', $reply['logo'])?>
							<div class="help-block">如果使用优米考勤机必须为PNG格式图片否则设备上无法显示</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">图文消息缩略图</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('thumb', $reply['thumb'])?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">公告</label>
						<div class="col-sm-9">
							<input type="text" name="gonggao" value="<?php  echo $reply['gonggao'];?>" id="gonggao" class="form-control" />
							<div class="help-block">在学校首页显示,优米考勤机待机界面显示</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">校园二维码</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('qroce', $reply['qroce'])?>
							<div class="help-block">显示在手机端文章、教师中心、通知、公告/不设置直接显示本公众号二维码</div>
						</div>					
					</div>	
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">教师默认头像</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('tpic', $reply['tpic'])?>
							<div class="help-block">显示在所有没设置教师头像的所有页面（包括考勤机），如已设置教师头像则不生效</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">学生默认头像</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('spic', $reply['spic'])?>
							<div class="help-block">显示在所有没设置学生头像的所有页面（包括考勤机），如已设置学生头像则不生效</div>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">学校简介</label>
						<div class="col-sm-9">
							<input type="text" name="info" value="<?php  echo $reply['info'];?>" id="info" class="form-control" />
							<div class="help-block">在学校详细页及图文消息里显示显示</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">学校类型</label>
						<div class="col-sm-9">
							<select class="form-control" name="type" id="type">
								<option value="0">请选择</option>
								<?php  if(is_array($schooltype)) { foreach($schooltype as $item) { ?>
								<option value="<?php  echo $item['id'];?>" <?php  if($reply['typeid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">所属区域</label>
						<div class="col-sm-9">
							<select class="form-control" name="area" id="area">
								<option value="0">请选择</option>
								<?php  if(is_array($area)) { foreach($area as $item) { ?>
								<option value="<?php  echo $item['id'];?>" <?php  if($reply['areaid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">学校介绍</label>
						<div class="col-sm-9">
						   <?php  echo tpl_ueditor('content', $reply['content']);?>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">招生简章</label>
						<div class="col-sm-9">
						   <?php  echo tpl_ueditor('zhaosheng', $reply['zhaosheng']);?>
						</div>
					</div>				
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">电话</label>
						<div class="col-sm-9">
							<input type="text" name="tel" id="tel" value="<?php  echo $reply['tel'];?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
						<div class="col-sm-9">
							<input type="text" name="address" id="address" value="<?php  echo $reply['address'];?>" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_coordinate('baidumap', $reply)?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
						<div class="col-sm-9">
							<input type="text" name="ssort" value="<?php  echo $reply['ssort'];?>" id="ssort" class="form-control" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="tab_highset">
			<div class="panel panel-info"><div class="panel-heading">高级管理设置</div>
				<div class="panel-body">
					<?php  if($_W['isfounder']) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员帐号</label>
						<div class="col-sm-9">
							<select class="form-control" name="uid" id="uid">
								<option value="0">请选择</option>
								<?php  if(is_array($user)) { foreach($user as $row) { ?>
								<option value="<?php  echo $row['uid'];?>" <?php  if($reply['uid']==$row['uid']) { ?>selected<?php  } ?>><?php  echo $row['username'];?></option>
								<?php  } } ?>
							</select>
							<div class="help-block">选择要绑定的管理员帐号</div>
						</div>	
					</div>              
					<?php  } else { ?>
					<input type="hidden" name="uid" value="<?php  echo $_W['user']['uid'];?>" />				
					<?php  } ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用考勤设备</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_recordmac" value="1" <?php  if($reply['is_recordmac']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_recordmac" value="2" <?php  if($reply['is_recordmac'] ==2 || empty($reply['is_recordmac'])) { ?>checked<?php  } ?>>否
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用卡片库</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_cardlist" value="1" <?php  if($reply['is_cardlist']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_cardlist" value="2" <?php  if($reply['is_cardlist'] ==2 || empty($reply['is_cardlist'])) { ?>checked<?php  } ?>>否
							</label>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">允许学校创建收费项目</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_cost" value="1" <?php  if($reply['is_cost']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_cost" value="2" <?php  if($reply['is_cost'] ==2 || empty($reply['is_cost'])) { ?>checked<?php  } ?>>否
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>启用学校</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_show" value="1" <?php  if($reply['is_show']==1 || empty($reply)) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_show" value="0" <?php  if(isset($reply['is_show']) && empty($reply['is_show'])) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">是否将学校显示在学校列表页包括手机端</div>
						</div>
					</div>
				</div>	
			</div>		
		</div>
		<div class="tab-pane" id="tab_gongn">
			<div class="panel panel-info"><div class="panel-heading">功能管理</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用教室监控</label>
						<div class="col-sm-9">
							<input type="checkbox" value="<?php  echo $reply['is_video'];?>" name="is_video[]" data-id="" <?php  if($reply['is_video'] == 1) { ?>checked<?php  } ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否满员</label>
						<div class="col-sm-9">
							<input type="checkbox" value="<?php  echo $reply['is_hot'];?>" name="is_hot[]" data-id="" <?php  if($reply['is_hot'] == 1) { ?>checked<?php  } ?>>
							<div class="help-block">
								本校招生是否满员
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示食谱</label>
						<div class="col-sm-9">
							<input type="checkbox" value="<?php  echo $reply['is_rest'];?>" name="is_rest[]" data-id="" <?php  if($reply['is_rest'] == 1) { ?>checked<?php  } ?>>
							<div class="help-block">
								是否在前端显示食谱
							</div>
						</div>
					</div>			
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">班级圈审核</label>
						<div class="col-sm-9">
							<input type="checkbox" value="<?php  echo $reply['isopen'];?>" name="isopen[]" data-id="" <?php  if($reply['isopen'] == 1) { ?>checked<?php  } ?>>
							<div class="help-block">
								发布班级圈是否需要班主任审核(各班级必须有班主任或管理员)
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">选课方式</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="issale" value="1" <?php  if($reply['issale']==1 && !empty($reply)) { ?>checked="true"<?php  } ?>>购买方式
							</label>
							<label class="radio-inline">
								<input type="radio" name="issale" value="3" <?php  if($reply['issale']==3 && !empty($reply)) { ?>checked="true"<?php  } ?>>自由选课
							</label>
							<label class="radio-inline">
								<input type="radio" name="issale" value="5" <?php  if(empty($reply['issale']) || $reply['issale'] == 5) { ?>checked="true"<?php  } ?>>关闭
							</label>						
							<div class="help-block">
								购买方式：前端购买课程显示在订单列表以及我的在读课程<span style="color:red;font-weight:blod;">（必须认证服务号）</span>
						   </br>自由选课：不显示在订单中学,只显示在我的在读课程里<span style="color:red;font-weight:blod;">（自由报名课程）</span>
						   </br>说明：
						   </br>必须认证服务号使用在线购买
							</div>
						</div>
					</div>
				</div>		
			</div>		
		</div>		
		<div class="tab-pane" id="tab_muban">
			<div class="panel panel-info"><div class="panel-heading">模板管理</div>
				<div class="panel-body">
					<div class="form-group">	
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">公共模版</label>
						<div class="col-sm-2 col-lg-2">
							 <div class="input-group">					
								<input type="text" class="form-control" name="style1" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style1'];?><?php  } else { ?>common<?php  } ?>" />
								<div class="help-block">无需登录可以查看的页面目</br>录在addons/fm_jiaoyu/template/mobile/common</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
							 </div>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">学生中心</label>
						<div class="col-sm-2 col-lg-2">
							 <div class="input-group">					
								<input type="text" class="form-control" name="style2" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style2'];?><?php  } else { ?>students<?php  } ?>" />
								<div class="help-block">学生或家长登录才能查看的页面</br>目录在addons/fm_jiaoyu/template/mobile/students</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
							 </div>
						</div>
					</div>
					<div class="form-group">	
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">教师中心</label>
						<div class="col-sm-2 col-lg-2">
							 <div class="input-group">					
								<input type="text" class="form-control" name="style3" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style3'];?><?php  } else { ?>teacher<?php  } ?>" />
								<div class="help-block">需要教师登录后才能查看的页面</br>目录在addons/fm_jiaoyu/template/mobile/teacher</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
							 </div>
						</div>					
					</div>
				</div>
			</div>	
			<div class="panel panel-info"><div class="panel-heading">新模板首页按钮（只对greencom首页模板生效）</div>
				<table class="table table-hover">
					<thead class="navbar-inner">
					<tr>
						<th class="text-center" style="width:50px;">ID</th>
						<th class="text-center" style="width:150px;;">图标</th>
						<th class="text-center" style="width:150px">标题</th>
						<th class="text-center" style="width:200px;">链接</th>
						<th class="text-center" style="width:80px;">位置</th>
						<th class="text-center" style="width:80px;">排序</th>
						<th class="text-right" style="width:130px;">是否显示</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($icon)) { foreach($icon as $item) { ?>
						<tr>
							<td class="text-center" style="width:50px;"><?php  echo $item['id'];?></td>
							<td class="text-center" style="width:60px;">	
								<img src="<?php  echo tomedia($item['icon']);?>" style="width:40px !important;" />建议尺寸为80*80的图片
								<input type="text" class="form-control input-sm" name="iconurl[<?php  echo $item['id'];?>]" value="<?php  echo $item['icon'];?>" />
							</td>
							<td class="text-center" style="width:150px;">
								<input type="text" class="form-control input-sm" name="iconname[<?php  echo $item['id'];?>]" value="<?php  echo $item['name'];?>" />
							</td>
							<td style="width:200px; white-space:nowrap;overflow: visible">
								<div class="input-group">
									<input type="text" value="<?php  echo $item['url'];?>" name="url[<?php  echo $item['id'];?>]" class="form-control" autocomplete="off">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">选择链接 <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="javascript:" data-type="system" onclick="showLinkDialog(this);">系统菜单</a></li>
											<li><a href="javascript:" data-type="page" onclick="pageLinkDialog(this);">微页面</a></li>
											<li><a href="javascript:" data-type="article" onclick="articleLinkDialog(this)">文章及分类</a></li>
											<li><a href="javascript:" data-type="news" onclick="newsLinkDialog(this)">图文回复</a></li>
											<li><a href="javascript:" data-type="map" onclick="mapLinkDialog(this)">一键导航</a></li>
											<li><a href="javascript:" data-type="phone" onclick="phoneLinkDialog(this)">一键拨号</a></li>
										</ul>
									</span>
								</div>
							</td>
							<td class="text-center" style="width:80px;">
								<?php  if($item['place'] ==1) { ?>首页<?php  } else { ?>底部菜单<?php  } ?>
							</td>
							<td class="text-center" style="width:80px;">
								<input type="text" class="form-control input-sm" name="ssort[<?php  echo $item['id'];?>]" value="<?php  echo $item['ssort'];?>" />
							</td>
							<td class="text-right" style="width:130px;">
								<input type="checkbox" value="<?php  echo $item['status'];?>" name="status[]" data-id="<?php  echo $item['id'];?>" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>>
							</td>
						</tr>
					<?php  } } ?>
					</tbody>
				</table>
			</div>	
		</div>			
		<div class="tab-pane" id="tab_shid">
			<div class="panel panel-info"><div class="panel-heading">考勤基本设置</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用刷卡付费</label>
							<label class="radio-inline">
								<input type="radio" name="is_cardpay" value="1" <?php  if($reply['is_cardpay']== 1) { ?>checked<?php  } ?> id="credit4">是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_cardpay" value="2" <?php  if($reply['is_cardpay'] == 2 || empty($reply['is_cardpay'])) { ?>checked<?php  } ?> id="credit5">否
							</label>
							<div class="help-block"></div>
					</div>
					<div id="credit-status3" <?php  if($reply['is_cardpay'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
						<?php  if($_W['isfounder']) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">费用支付至</label>
							<div class="col-sm-2 col-lg-2">
								<select class="form-control" name="kqpayweid" id="kqpayweid">
									<option value="0">请选择收款账户</option>
									<?php  if(is_array($payweid)) { foreach($payweid as $row) { ?>
									<option value="<?php  echo $row['uniacid'];?>" <?php  if($card['payweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
									<?php  } } ?>
								</select>
							</div>
							<div class="help-block">付费至指定公众号设置的支付方式内，不设置这付费至当前公众号</div>
						</div>
						<?php  } ?>					
						<div class="form-group">	
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">续费价格</label>
							<div class="col-sm-2 col-lg-2">
								 <div class="input-group">					
									<input type="text" class="form-control" name="cardcost" value="<?php  echo $card['cardcost'];?>" />
									<div class="help-block">
										<span style="color:red;font-weight:bold;font-size:15px;">首次开卡线下收费,线上只负责卡计时续费</span>
									</div>
								 </div>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">计时方式</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input type="radio" name="cardtime" value="1" <?php  if($card['cardtime']==1) { ?>checked<?php  } ?> id="credit6">倒计时
								</label>
								<label class="radio-inline">
									<input type="radio" name="cardtime" value="2" <?php  if($card['cardtime']==2 || empty($card['cardtime'])) { ?>checked<?php  } ?> id="credit7">指定结束日期
								</label>
								<div class="help-block"><span style="color:red;font-weight:bold;font-size:15px;">无论选择那种计时方式，只要绑定卡后就开始按照本选择方式计时</span></div>
							</div>
						</div>
						<div id="credit-status5" <?php  if($card['cardtime'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">倒计时方式</label>
								<div class="col-sm-2 col-lg-2">
									<div class="input-group">							
										<input type="text" class="form-control" name="endtime1" value="<?php  echo $card['endtime1'];?>">
										<div class="help-block"><span class="label label-success">按天倒计时(必须是整数)</span></div>
									</div>
								</div>	
							</div>
						</div>
						<div id="credit-status6" <?php  if($card['cardtime'] == 2) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">指定结束日期</label>
								<div class="input-group">
									 <?php  if(!empty($item['endtime2'])) { ?>
										<?php  echo tpl_form_field_date('endtime2', date('Y-m-d', $card['endtime2']))?>
									 <?php  } else { ?>
										<?php  echo tpl_form_field_date('endtime2', date('Y-m-d', TIMESTAMP))?>
									 <?php  } ?>
									<div class="help-block">无论何时续费,皆在本日期停止使用本卡</div>	
								</div>
							</div>
						</div>						
					</div>					
				</div>	
			</div>		
			<div class="panel panel-info"><div class="panel-heading">考勤时段设置</div>
				<div class="panel-body">
					<div class="form-group">早晚
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">进校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('jxstart', $reply['jxstart'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('jxend', $reply['jxend'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>
					<div class="form-group">早晚
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">离校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('lxstart', $reply['lxstart'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('lxend', $reply['lxend'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>
					<div class="form-group">午间
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">进校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('jxstart1', $reply['jxstart1'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('jxend1', $reply['jxend1'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>
					<div class="form-group">午间
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">离校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('lxstart1', $reply['lxstart1'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('lxend1', $reply['lxend1'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>
					<div class="form-group">晚自习
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">进校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('jxstart2', $reply['jxstart2'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('jxend2', $reply['jxend2'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>
					<div class="form-group">晚自习
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">离校时段</label>
						<div class="col-sm-9 col-xs-9 col-md-4">
								<div class="input-group clockpicker" style="margin-bottom: 15px">
									<?php  echo tpl_form_field_clock('lxstart2', $reply['lxstart2'])?>
									<span class="input-group-addon">至</span>
									<?php  echo tpl_form_field_clock('lxend2', $reply['lxend2'])?>
									<span class="input-group-addon"></span>
								</div>
						</div>
					</div>					
				</div>	
			</div>
		</div>		
		<div class="tab-pane" id="tab_baom">
			<div class="panel panel-info"><div class="panel-heading">报名设置</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用前端报名</label>
							<label class="radio-inline">
								<input type="radio" name="is_sign" value="1" <?php  if($reply['is_sign']== 1) { ?>checked<?php  } ?> id="credit1">是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_sign" value="2" <?php  if($reply['is_sign'] == 2 || empty($reply['is_sign'])) { ?>checked<?php  } ?> id="credit0">否
							</label>
							<div class="help-block"></div>
					</div>			
					<div id="credit-status1" <?php  if($reply['is_sign'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要选择班级</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input type="radio" name="is_bj" value="1" <?php  if($sign['is_bj']==1) { ?>checked<?php  } ?>>是
								</label>
								<label class="radio-inline">
									<input type="radio" name="is_bj" value="2" <?php  if($sign['is_bj']==2 || empty($sign['is_bj'])) { ?>checked<?php  } ?>>否
								</label>
								<div class="help-block">报名时让家长选择学生班级,一般情况由管理审核时填写班级信息</div>
							</div>
						</div>					
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要输入身份证</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input type="radio" name="is_idcard" value="1" <?php  if($sign['is_idcard']==1) { ?>checked<?php  } ?>>是
								</label>
								<label class="radio-inline">
									<input type="radio" name="is_idcard" value="2" <?php  if($sign['is_idcard']==2 || empty($sign['is_idcard'])) { ?>checked<?php  } ?>>否
								</label>
								<div class="help-block">报名时身份证是否必填</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要输入生日</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input type="radio" name="is_bir" value="1" <?php  if($sign['is_bir']==1) { ?>checked<?php  } ?>>是
								</label>
								<label class="radio-inline">
									<input type="radio" name="is_bir" value="2" <?php  if($sign['is_bir']==2 || empty($sign['is_bir'])) { ?>checked<?php  } ?>>否
								</label>
								<div class="help-block">报名时生日是否必填</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名启用绑定</label>
							<div class="col-sm-9">
								<label class="radio-inline">
									<input type="radio" name="is_bd" value="1" <?php  if($sign['is_bd']==1) { ?>checked<?php  } ?>>是
								</label>
								<label class="radio-inline">
									<input type="radio" name="is_bd" value="2" <?php  if($sign['is_bd']==2 || empty($sign['is_bd'])) { ?>checked<?php  } ?>>否
								</label>
								<div class="help-block">报名时是否启用报名成功后直接绑定微信功能</div>
							</div>
						</div>
						<?php  if($_W['isfounder']) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名费用支付至</label>
							<div class="col-sm-2 col-lg-2">
								<select class="form-control" name="bmpayweid" id="bmpayweid">
									<option value="0">请选择收款账户</option>
									<?php  if(is_array($payweid)) { foreach($payweid as $row) { ?>
									<option value="<?php  echo $row['uniacid'];?>" <?php  if($sign['payweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
									<?php  } } ?>
								</select>
								
							</div>
							<div class="help-block">付费至指定公众号设置的支付方式内，不设置这付费至当前公众号</div>
						</div>
						<?php  } ?>
					</div>
				</div>	
			</div>		
		</div>		
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>	
	</div>
</form>
</div>
<script type="text/javascript">

	$('#credit1').click(function(){
		$('#credit-status1').show();
	});
	$('#credit0').click(function(){
		$('#credit-status1').hide();
	});
	$('#credit3').click(function(){
		$('#credit-status2').show();
	});
	$('#credit2').click(function(){
		$('#credit-status2').hide();
	});
	$('#credit4').click(function(){
		$('#credit-status3').show();
	});
	$('#credit5').click(function(){
		$('#credit-status3').hide();
	});
	$('#credit6').click(function(){
		$('#credit-status5').show();
		$('#credit-status6').hide();
	});
	$('#credit7').click(function(){
		$('#credit-status6').show();
		$('#credit-status5').hide();
	});

require(['jquery.qrcode', 'bootstrap.switch'], function($){

	$(':checkbox[name="is_video[]"]').bootstrapSwitch();
	$(':checkbox[name="is_video[]"]').on('switchChange.bootstrapSwitch', function(e, state){
		var is_video = this.checked ? 1 : 2;
		$.post("<?php  echo $this->createWebUrl('schoolset', array('op' => 'change1'))?>", {is_video: is_video}, function(resp){
			setTimeout(function(){
				//location.reload();
			}, 500)
		});
	});
	$(':checkbox[name="is_hot[]"]').bootstrapSwitch();
	$(':checkbox[name="is_hot[]"]').on('switchChange.bootstrapSwitch', function(e, state){
		var is_hot = this.checked ? 1 : 2;
		$.post("<?php  echo $this->createWebUrl('schoolset', array('op' => 'change2'))?>", {is_hot: is_hot}, function(resp){
			setTimeout(function(){
			}, 500)
		});
	});
	$(':checkbox[name="is_rest[]"]').bootstrapSwitch();
	$(':checkbox[name="is_rest[]"]').on('switchChange.bootstrapSwitch', function(e, state){
		var is_rest = this.checked ? 1 : 0;
		$.post("<?php  echo $this->createWebUrl('schoolset', array('op' => 'change3'))?>", {is_rest: is_rest}, function(resp){
			setTimeout(function(){
			}, 500)
		});
	});	
	$(':checkbox[name="isopen[]"]').bootstrapSwitch();
	$(':checkbox[name="isopen[]"]').on('switchChange.bootstrapSwitch', function(e, state){
		var isopen = this.checked ? 1 : 0;
		$.post("<?php  echo $this->createWebUrl('schoolset', array('op' => 'change4'))?>", {isopen: isopen}, function(resp){
			setTimeout(function(){
			}, 500)
		});
	});
	$(':checkbox[name="status[]"]').bootstrapSwitch();
	$(':checkbox[name="status[]"]').on('switchChange.bootstrapSwitch', function(e, state){
		var status = this.checked ? 1 : 2;
		var id = $(this).attr('data-id');
		$.post("<?php  echo $this->createWebUrl('schoolset', array('op' => 'change5'))?>", {id: id,status: status}, function(resp){
			setTimeout(function(){
			}, 500)
		});
	});	
});
</script>
<script type="text/javascript">
	function showLinkDialog(elm) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.linkBrowser(function(href){
				var multiid = "3";
				if (multiid) {
					href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
				}
				ipt.val(href);
			});
		});
	}
	function newsLinkDialog(elm, page) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.newsBrowser(function(href, page){
				if (page != "" && page != undefined) {
					newsLinkDialog(elm, page);
					return false;
				}
				var multiid = "3";
				if (multiid) {
					href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
				}
				ipt.val(href);
			}, page);
		});
	}
	function pageLinkDialog(elm, page) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.pageBrowser(function(href, page){
				if (page != "" && page != undefined) {
					pageLinkDialog(elm, page);
					return false;
				}
				var multiid = "3";
				if (multiid) {
					href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
				}
				ipt.val(href);
			}, page);
		});
	}
	function articleLinkDialog(elm, page) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.articleBrowser(function(href, page){
				if (page != "" && page != undefined) {
					articleLinkDialog(elm, page);
					return false;
				}
				var multiid = "3";
				if (multiid) {
					href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
				}
				ipt.val(href);
			}, page);
		});
	}
	function phoneLinkDialog(elm, page) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.phoneBrowser(function(href, page){
				if (page != "" && page != undefined) {
					phoneLinkDialog(elm, page);
					return false;
				}
				ipt.val(href);
			}, page);
		});
	}
	function mapLinkDialog(elm) {
		require(["util","jquery"], function(u, $){
			var ipt = $(elm).parent().parent().parent().prev();
			u.map(elm, function(val){
				var href = 'http://api.map.baidu.com/marker?location='+val.lat+','+val.lng+'&output=html&src=we7';
				var multiid = "3";
				if (multiid) {
					href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
				}
				ipt.val(href);
			});
		});
	}
</script>
<script type="text/javascript">
    function check() {
        if($.trim($('#title').val()) == '') {
            message('没有输入学校名称.', '', 'error');
            return false;
        }
        return true;
    }
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/common', TEMPLATE_INCLUDEPATH)) : (include template('web/common', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>