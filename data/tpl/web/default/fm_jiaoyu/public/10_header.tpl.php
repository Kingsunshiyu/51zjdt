<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header-base', TEMPLATE_INCLUDEPATH)) : (include template('public/header-base', TEMPLATE_INCLUDEPATH));?>
	<?php  if(!defined('IS_OPERATOR')) { ?>
		<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="position:static;">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="./?refresh"><i class="fa fa-reply-all"></i>返回系统</a></li>
					<?php  global $top_nav;?>
					<?php  if(is_array($top_nav)) { foreach($top_nav as $nav) { ?>
						<?php  if(!empty($_W['isfounder']) || empty($_W['setting']['permurls']['sections']) || in_array($nav['name'], $_W['setting']['permurls']['sections'])) { ?><li<?php  if(FRAME == $nav['name']) { ?> class="active"<?php  } ?>><a href="<?php  echo url('home/welcome/' . $nav['name']);?>"><i class="<?php  echo $nav['append_title'];?>"></i><?php  echo $nav['title'];?></a></li><?php  } ?>
					<?php  } } ?>
					<li <?php  if($action == 'emulator') { ?>class="active"<?php  } ?>>
						<a href="<?php  echo url('utility/emulator');?>" target="_blank"><i class="fa fa-mobile"></i> 模拟测试</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown topbar-notice">
						<a type="button" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge" id="notice-total">0</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dLabel">
							<div class="topbar-notice-panel">
								<div class="topbar-notice-arrow"></div>
								<div class="topbar-notice-head">
									<span>系统公告</span>
									<a href="<?php  echo url('article/notice-show/list');?>" class="pull-right">更多公告>></a>
								</div>
								<div class="topbar-notice-body">
									<ul id="notice-container"></ul>
								</div>
							</div>
						</div>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-group"></i><?php  echo $_W['account']['name'];?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php  if($_W['role'] != 'operator') { ?>
							<li><a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 编辑当前账号资料</a></li>
							<?php  } ?>
							<li><a href="<?php  echo url('account/display');?>" target="_blank"><i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a></li>
							<li><a href="<?php  echo url('utility/emulator');?>" target="_blank"><i class="fa fa-mobile fa-fw"></i> 模拟测试</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-user"></i><?php  echo $_W['user']['username'];?> (<?php  if($_W['role'] == 'founder') { ?>系统管理员<?php  } else if($_W['role'] == 'manager') { ?>公众号管理员<?php  } else { ?>公众号操作员<?php  } ?>) <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php  echo url('user/profile/profile');?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 我的账号</a></li>
							<?php  if($_W['role'] == 'founder') { ?>
							<li class="divider"></li>
							<li><a href="<?php  echo url('system/welcome');?>" target="_blank"><i class="fa fa-sitemap fa-fw"></i> 系统选项</a></li>
							<li><a href="<?php  echo url('system/welcome');?>" target="_blank"><i class="fa fa-cloud-download fa-fw"></i> 自动更新</a></li>
							<li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="fa fa-refresh fa-fw"></i> 更新缓存</a></li>
							<li class="divider"></li>
							<?php  } ?>
							<li><a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out fa-fw"></i> 退出系统</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<?php  if(empty($_COOKIE['check_setmeal']) && !empty($_W['account']['endtime']) && ($_W['account']['endtime'] - TIMESTAMP < (6*86400))) { ?>
			<div class="upgrade-tips" id="setmeal-tips">
				<a href="<?php  echo url('user/edit', array('uid' => $_W['account']['uid']));?>" target="_blank">
					您的服务有效期限：<?php  echo date('Y-m-d', $_W['account']['starttime']);?> ~ <?php  echo date('Y-m-d', $_W['account']['endtime']);?>.
					<?php  if($_W['account']['endtime'] < TIMESTAMP) { ?>
					目前已到期，请联系管理员续费
					<?php  } else { ?>
					将在<?php  echo ($_W['account']['endtime'] - strtotime(date('Y-m-d')))/86400?>天后到期，请及时付费
					<?php  } ?>
				</a><span class="tips-close" style="background:#d03e14;" onclick="check_setmeal_hide();"><i class="fa fa-times-circle"></i></span>
			</div>
			<script>
				function check_setmeal_hide() {
					util.cookie.set('check_setmeal', 1, 1800);
					$('#setmeal-tips').hide();
					return false;
				}
			</script>
		<?php  } ?>
	<?php  } else { ?>
		<script>
			require.config({
				baseUrl: '../../../web/resource/js/app'
			});
		</script>
		<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="position:static;">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="javascript:;" target="_blank"><?php  echo $_W['we7_wmall']['store']['title'];?></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-user"></i>我的账号 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php  echo $this->createWebUrl('clerk', array('op' => 'post', 'id' => $_W['we7_wmall']['clerk_id']));?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 我的账号</a></li>
							<li><a href="<?php  echo url('user/loginout');?>"><i class="fa fa-sign-out fa-fw"></i> 退出系统</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	<?php  } ?>
	<div class="container-fluid">
		<?php  if(defined('IN_MESSAGE')) { ?>
		<div class="jumbotron clearfix alert alert-<?php  echo $label;?>">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-lg-2">
					<i class="fa fa-5x fa-<?php  if($label=='success') { ?>check-circle<?php  } ?><?php  if($label=='danger') { ?>times-circle<?php  } ?><?php  if($label=='info') { ?>info-circle<?php  } ?><?php  if($label=='warning') { ?>exclamation-triangle<?php  } ?>"></i>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
					<?php  if(is_array($msg)) { ?>
						<h2>MYSQL 错误：</h2>
						<p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
						<p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
					<?php  } else { ?>
					<h2><?php  echo $caption;?></h2>
					<p><?php  echo $msg;?></p>
					<?php  } ?>
					<?php  if($redirect) { ?>
					<p><a href="<?php  echo $redirect;?>">如果你的浏览器没有自动跳转，请点击此链接</a></p>
					<script type="text/javascript">
						setTimeout(function () {
							location.href = "<?php  echo $redirect;?>";
						}, 3000);
					</script>
					<?php  } else { ?>
						<p>[<a href="javascript:history.go(-1);">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh">首页</a>]</p>
					<?php  } ?>
				</div>
		<?php  } else { ?>
		<div class="row">
			<?php  if(!defined('IS_OPERATOR')) { ?>
				<?php $frames = empty($frames) ? $GLOBALS['frames'] : $frames; _calc_current_frames($frames);?>
			<?php  } else { ?>
				<?php $frames = empty($frames) ? $GLOBALS['frames'] : $frames; mine_current_frames($frames);?>
			<?php  } ?>
			<?php  if(!empty($frames)) { ?>
				<div class="col-xs-12 col-sm-3 col-lg-2 big-menu">
					<div class="panel panel-default">
						<span style="width:13.3333337%; height:100px;display: table-cell; line-height:100px; vertical-align:middle;text-align: center;">
							<img style="width:100px;margin-top:10px;border-radius:50%;" alt="image" class="img-circle" src="<?php  echo tomedia($logo['logo'])?>" />
						</span>
						<span style="text-align:center;" class="block m-t-xs"><strong class="font-bold" style="color:green;"><?php  echo $logo['title'];?></strong></span>
						<span style="text-align:center;margin-bottom:10px;" class="text-muted text-xs block">
							<strong class="font-bold"><?php  echo $_W['user']['username'];?></strong>
							(<?php  if($_W['role'] == 'founder') { ?>系统管理员<?php  } else if($_W['role'] == 'manager') { ?>学校管理员<?php  } else { ?>学校管理员<?php  } ?>)
						</span>	
					</div>
					<?php  if(is_array($frames)) { foreach($frames as $k => $frame) { ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php  echo $frame['title'];?></h4>
							<a class="panel-collapse collapsed" data-toggle="collapse" href="#frame-<?php  echo $k;?>">
								<i class="fa fa-chevron-circle-down"></i>
							</a>
						</div>
						<ul class="list-group collapse in" id="frame-<?php  echo $k;?>">
							<?php  if(is_array($frame['items'])) { foreach($frame['items'] as $link) { ?>
							<?php  if(!empty($link['append'])) { ?>
							<li class="list-group-item<?php  echo $link['active'];?>" onclick="window.location.href = '<?php  echo $link['url'];?>';" style="cursor:pointer; overflow:hidden;" kw="<?php  echo $link['title'];?>">
								<a class="pull-right" href="<?php  echo $link['append']['url'];?>"><?php  echo $link['append']['title'];?></a>
								<?php  echo $link['title'];?>
							</li>
							<?php  } else { ?>
							<a class="list-group-item<?php  echo $link['active'];?>" href="<?php  echo $link['url'];?>" kw="<?php  echo $link['title'];?>"><?php  echo $link['title'];?></a>
							<?php  } ?>
							<?php  } } ?>
						</ul>
					</div>
					<?php  } } ?>
					<script type="text/javascript">
						require(['bootstrap'], function(){
							$('.ext-type').click(function(){
								var id = $(this).data('id');
								util.cookie.del('ext_type');
								util.cookie.set('ext_type', id, 8640000);
								location.reload();
								return false;
							});

							$('#search-menu input').keyup(function() {
								var a = $(this).val();
								$('.big-menu .list-group-item, .big-menu .panel-heading').hide();
								$('.big-menu .list-group-item').each(function() {
									$(this).css('border-left', '0');
									if(a.length > 0 && $(this).attr('kw').indexOf(a) >= 0) {
										$(this).parents(".panel").find('.panel-heading').show();
										$(this).show().css('border-left', '3px #428bca double');
									}
								});
								if(a.length == 0) {
									$('.big-menu .list-group-item, .big-menu .panel-heading').show();
								}
							});
						});
					</script>
				</div>
				<div class="col-xs-12 col-sm-9 col-lg-10">
					<?php  if(!defined('IS_OPERATOR')) { ?>
						<?php  if(CRUMBS_NAV == 2) { ?>
							<?php  global $module_types;global $module;global $ptr_title; global $site_urls; $m = $_GPC['m'];?>
							<ul class="nav nav-tabs">
								<li><a href="<?php  echo url('platform/reply', array('m' => $m));?>">管理<?php  echo $module['title'];?></a></li>
								<li><a href="<?php  echo url('platform/reply/post', array('m' => $m));?>"><i class="fa fa-plus"></i> 添加<?php  echo $module['title'];?></a></li>
								<?php  if(!empty($site_urls)) { ?>
									<?php  if(is_array($site_urls)) { foreach($site_urls as $site_url) { ?>
										<li <?php  if($_GPC['do'] == $site_url['do']) { ?> class="active"<?php  } ?>><a href="<?php  echo $site_url['url'];?>"> <?php  echo $site_url['title'];?></a></li>
									<?php  } } ?>
								<?php  } ?>
							</ul>
						<?php  } ?>
					<?php  } ?>
			<?php  } else { ?>
				<div class="col-xs-12 col-sm-12 col-lg-12">
			<?php  } ?>
		<?php  } ?>
