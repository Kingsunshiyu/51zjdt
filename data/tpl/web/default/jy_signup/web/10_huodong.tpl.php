<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/nav', TEMPLATE_INCLUDEPATH)) : (include template('web/nav', TEMPLATE_INCLUDEPATH));?>

<style>
	.nameSpan{display: inline-block;width: 10%}
	.leftW{margin-left: 10%}
	#gbin1-list{margin-bottom: 10px}
</style>

<ul class="nav nav-tabs">
    <li<?php  if($op == 'display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('huodong');?>">活动管理</a></li>
    <li<?php  if($op == 'add') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('huodong',array('op'=>'add','id'=>$_GPC['id']));?>">添加活动</a></li>
</ul>
<div class="main">
	<?php  if($op =="display") { ?>
		<div class="panel panel-info">
		<div class="panel-heading">筛选</div>

		<div class="panel-body">

			<form action="./index.php" method="get" class="form-horizontal" role="form">

				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
	        	<input type="hidden" name="m" value="jy_signup" />
	        	<input type="hidden" name="do" value="huodong" />

				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
					</div>
				</div>

				<div class="form-group">
				 	<div class=" col-xs-12 col-sm-2 col-lg-2">

						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>

					</div>
				</div>
			</form>
		</div>
    	</div>
    <?php  } ?>

	<?php  if($op == 'display') { ?>
	<div class="panel panel-default">
		<div class="panel-heading">活动详细数据  |  总数:<?php  echo count($list)?></div>
		<div class="panel-body table-responsive">

		    <form action="" method="post" enctype="multipart/form-data">

			<table class="table table-hover">

				<thead class="navbar-inner">

					<tr>
						<th  style="width:5%;">排序</th>
						<th  style="width:10%;">活动标题</th>
						<th  style="width:10%;">所属门店</th>
						<th style="width:20%;">活动地址</th>
						<th style="width:10%;">所属区域</th>
						<th  style="width:10%;">活动拥有评论</th>
						<th  style="width:10%;">活动状态</th>
						<th style="width:10%;">操作</th>
					</tr>

				</thead>
				<tbody id="main">
					<?php  if(is_array($list)) { foreach($list as $item) { ?>

					<tr>
						<td>
							<input type="text" name="displayorder[<?php  echo $item['id'];?>]" style="width:90%" value="<?php  echo $item['displayorder'];?>" />
			            </td>
						<td>
							<p><?php  echo $item['hdname'];?></p>
			            </td>
			            <td>
							<p><?php  echo $item['name'];?></p>
			            </td>
						<td style="white-space:normal; word-break:break-all;overflow:hidden">
							<p><?php  echo $item['address'];?></p>
						</td>
						<td>
							<?php  echo $item['province'];?>-<?php  echo $item['city'];?>
						</td>
						<td>
							<p><?php  echo $item['pl'];?></p>
						</td>
						<td>
							<?php  if($item['endtime']<time()) { ?>已结束<?php  } ?>
							<?php  if($item['starttime']>time()) { ?>未开始<?php  } ?>
							<?php  if($item['starttime']<=time() && $item['endtime']>time()) { ?>进行中<?php  } ?>
						</td>
						<td>
							<span>
								<a href="<?php  echo $this->createWebUrl('huodong',array('op'=>'add','id'=>$item['id']));?>"><div class="btn btn-info">编辑</div></a>&nbsp;
								<a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('huodong',array('op'=>'del','id'=>$item['id']));?>"><div class="btn btn-danger">删除</div></a>
							</span>
						</td>
					</tr>
					<?php  } } ?>
					<tr>
						<td colspan="8">
							<a href="<?php  echo $this->createWebUrl('huodong', array('op' => 'add'))?>"><div class="btn btn-success">添加活动</div></a>
						</td>
					</tr>
					<tr>
						<td colspan="8">
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
							<input type="submit" class="btn btn-primary" name="submit" value="提交" />
						</td>
					</tr>
				</tbody>
			</table>
			<?php  echo $pager;?>
			</form>
	    </div>

	</div>

	<?php  } ?>

	<?php  if($op == 'add') { ?>
		<form action="" method="post" class="form-horizontal form"
		enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
		<div class="panel panel-info">

			<div class="panel-heading">
				编辑活动
			</div>
			<div class="panel-body">
				<?php  if(!empty($item['id'])) { ?>
		        <div class="form-group">
		          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">访问地址</label>
		          <div class="col-sm-8 col-xs-12">
		            <a href="<?php  echo $_W['siteroot'] . 'app/' .substr($this->createMobileUrl('detail', array('id' => $item['id'], 'weid' => $weid)),2)?>" target="_blank"><?php  echo $_W['siteroot'] . 'app/' .substr($this->createMobileUrl('detail', array('id' => $item['id'], 'weid' => $weid)),2)?></a>
		          </div>
		        </div>
		        <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-7 col-xs-12">
						<a href="<?php  echo $this->createWebUrl('pl', array('id' =>$item['id'] , 'op'=>'add'))?>"><div class="btn btn-info">该活动评论</div></a>
					</div>
				</div>
		        <?php  } ?>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动标题</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="hdname" class="form-control" value="<?php  echo $item['hdname'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动介绍图</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_multi_image('thumb', $item['thumb']);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动类型</label>
					<div class="col-sm-7 col-xs-12">
						<?php  if(is_array($hdcate)) { foreach($hdcate as $row) { ?>
							<input type="radio" name="hdcateid" value="<?php  echo $row['id'];?>" <?php  if($row['id']==$item['hdcateid']) { ?>checked<?php  } ?>/><?php  echo $row['name'];?>&nbsp;
						<?php  } } ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动所属门店</label>
					<div class="col-sm-7 col-xs-12">
						<?php  if(is_array($mendian)) { foreach($mendian as $row) { ?>
							<input type="radio" name="mendianid" value="<?php  echo $row['id'];?>" <?php  if($row['id']==$item['mendianid']) { ?>checked<?php  } ?>/><?php  echo $row['mendianname'];?>&nbsp;
						<?php  } } ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动可参与人数</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="renshu" class="form-control" value="<?php  echo $item['renshu'];?>" />
						<span>0代表活动数量为无限</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="time" class="form-control"
							   value="<?php  echo $item['time'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间区间</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_daterange('time2', array('start'=>date('Y-m-d',$item['starttime']),'end'=>date('Y-m-d',$item['endtime'])));?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动地址</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="address" class="form-control"
							   value="<?php  echo $item['address'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航地址</label>
					<div class="col-sm-7 col-xs-12">
						<?php  $location=array('lng'=>$item['lng'],'lat'=>$item['lat'])?>

						<?php  echo tpl_form_field_coordinate('location',$location);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名截止时间</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_date('deadline', date('Y-m-d H:i',$item['deadline']) , true);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">区域选择</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_district('reside', array('province' => $item['province'], 'city' => $item['city'], 'district' => $item['dist'] ));?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动门票价钱</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="price" class="form-control" value="<?php  echo $item['price'];?>" />
						<span>如果为0代表无需门票</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动参与人数数量</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo $item['num'];?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动使用评论</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo $item['pl'];?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动人气（喜欢）</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="sc" class="form-control" value="<?php  echo $item['sc'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动浏览量</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="pv" class="form-control" value="<?php  echo $item['pv'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动描述</label>
					<div class="col-sm-7 col-xs-12">
						<textarea class="form-control" name="description" id="description" rows="5"><?php  echo $item['description'];?></textarea>
						<span class="help-block">
		                    小工具:
		                    <a href="http://wxedit.yead.net/" target="_blank" title="新窗口打开">易点微信编辑器</a> &nbsp;
		                    <a href="http://www.135editor.com/" target="_blank" title="新窗口打开">135微信编辑器</a> &nbsp;(利用第三方编辑器，获得更好显示效果)
		                 </span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名提交资料</label>
					<div class="col-sm-7 col-xs-12 gbin1-list">
						<?php  if(empty($ziliao)) { ?>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="mail"><span>邮箱</span></div> -->
							<div><span class="nameSpan">邮箱：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1mail" <?php  if(!empty($ziliao_arr2) && in_array('mail',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0mail" <?php  if(!empty($ziliao_arr) && in_array('mail',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="qq"><span>qq</span></div> -->
							<div><span class="nameSpan">qq：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1qq" <?php  if(!empty($ziliao_arr2) && in_array('qq',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0qq" <?php  if(!empty($ziliao_arr) && in_array('qq',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="wechat"><span>微信号</span></div> -->
							<div><span class="nameSpan">微信号：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1wechat" <?php  if(!empty($ziliao_arr2) && in_array('wechat',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0wechat" <?php  if(!empty($ziliao_arr) && in_array('wechat',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="weibo"><span>新浪微博号</span></div> -->
							<div><span class="nameSpan">新浪微博号：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1weibo" <?php  if(!empty($ziliao_arr2) && in_array('weibo',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0weibo" <?php  if(!empty($ziliao_arr) && in_array('weibo',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="age"><span>年龄</span></div> -->
							<div><span class="nameSpan">年龄：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1age" <?php  if(!empty($ziliao_arr2) && in_array('age',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0age" <?php  if(!empty($ziliao_arr) && in_array('age',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="sex"><span>性别</span></div> -->
							<div><span class="nameSpan">性别：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1sex" <?php  if(!empty($ziliao_arr2) && in_array('sex',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0sex" <?php  if(!empty($ziliao_arr) && in_array('sex',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="company"><span>所在单位</span></div> -->
							<div><span class="nameSpan">所在单位：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1company" <?php  if(!empty($ziliao_arr2) && in_array('company',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0company" <?php  if(!empty($ziliao_arr) && in_array('company',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
							<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="education"><span>学历</span></div> -->
							<div><span class="nameSpan">学历：</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1education" <?php  if(!empty($ziliao_arr2) && in_array('education',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
								<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0education" <?php  if(!empty($ziliao_arr) && in_array('education',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
							</div>
						</div>
						<?php  } else { ?>
							<?php  if(is_array($ziliao)) { foreach($ziliao as $z) { ?>
								<?php  if($z['ziliao']=='mail') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="mail"><span>邮箱</span></div> -->
										<div><span class="nameSpan">邮箱：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1mail" <?php  if(!empty($ziliao_arr2) && in_array('mail',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0mail" <?php  if(!empty($ziliao_arr) && in_array('mail',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='qq') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="qq"><span>qq</span></div> -->
										<div><span class="nameSpan">qq：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1qq" <?php  if(!empty($ziliao_arr2) && in_array('qq',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0qq" <?php  if(!empty($ziliao_arr) && in_array('qq',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='wechat') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="wechat"><span>微信号</span></div> -->
										<div><span class="nameSpan">微信号：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1wechat" <?php  if(!empty($ziliao_arr2) && in_array('wechat',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0wechat" <?php  if(!empty($ziliao_arr) && in_array('wechat',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='weibo') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="weibo"><span>新浪微博号</span></div> -->
										<div><span class="nameSpan">新浪微博号：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1weibo" <?php  if(!empty($ziliao_arr2) && in_array('weibo',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0weibo" <?php  if(!empty($ziliao_arr) && in_array('weibo',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='age') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="sex"><span>性别</span></div> -->
										<div><span class="nameSpan">性别：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1sex" <?php  if(!empty($ziliao_arr2) && in_array('sex',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0sex" <?php  if(!empty($ziliao_arr) && in_array('sex',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='sex') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="age"><span>年龄</span></div> -->
										<div><span class="nameSpan">年龄：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1age" <?php  if(!empty($ziliao_arr2) && in_array('age',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0age" <?php  if(!empty($ziliao_arr) && in_array('age',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='company') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="company"><span>所在单位</span></div> -->
										<div><span class="nameSpan">所在单位：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1company" <?php  if(!empty($ziliao_arr2) && in_array('company',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0company" <?php  if(!empty($ziliao_arr) && in_array('company',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z['ziliao']=='education') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="education"><span>学历</span></div> -->
										<div><span class="nameSpan">学历：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1education" <?php  if(!empty($ziliao_arr2) && in_array('education',$ziliao_arr2)) { ?>checked<?php  } ?>>必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0education" <?php  if(!empty($ziliao_arr) && in_array('education',$ziliao_arr)) { ?>checked<?php  } ?>>可选</span>
										</div>
									</div>
								<?php  } ?>
							<?php  } } ?>
							<?php  if(is_array($ziliao2)) { foreach($ziliao2 as $z) { ?>
								<?php  if($z=='mail') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="mail"><span>邮箱</span></div> -->
										<div><span class="nameSpan">邮箱：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1mail" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0mail" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='qq') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="qq"><span>qq</span></div> -->
										<div><span class="nameSpan">qq：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1qq" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0qq" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='wechat') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="wechat"><span>微信号</span></div> -->
										<div><span class="nameSpan">微信号：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1wechat" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0wechat" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='weibo') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="weibo"><span>新浪微博号</span></div> -->
										<div><span class="nameSpan">新浪微博号：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1weibo" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0weibo" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='age') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="sex"><span>性别</span></div> -->
										<div><span class="nameSpan">性别：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1sex" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0sex" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='sex') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="age"><span>年龄</span></div> -->
										<div><span class="nameSpan">年龄：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1age" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0age" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='company') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="company"><span>所在单位</span></div> -->
										<div><span class="nameSpan">所在单位：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1company" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0company" >可选</span>
										</div>
									</div>
								<?php  } ?>
								<?php  if($z=='education') { ?>
									<div class="form-control" id="gbin1-list" style="overflow:hidden;height:auto">
										<!-- <div class="contentDiv"><input type="checkbox" name="ziliao[]" value="education"><span>学历</span></div> -->
										<div><span class="nameSpan">学历：</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="1education" >必选</span>
											<span class="CheckedSpan leftW"><input type="checkbox" name="ziliao[]" value="0education" >可选</span>
										</div>
									</div>
								<?php  } ?>
							<?php  } } ?>
						<?php  } ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<input name="submit" type="submit" value="提交" class="btn btn-primary span3">
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>
			</div>
		</div>

	</form>
	<script>
		$("input[name='ziliao[]']").bind("click",function(){
			var index = $("input[name='ziliao[]']").index(this);
			if($(this).is(":checked")){
				$(this).parent().siblings().find("input").prop("checked",false);
			}
		});
		$(".CheckedSpan").bind("click",function(event){
			var self = this;
			if(event.target==self){
				if($(self).find("input").is(":checked")){
					$(self).find("input").prop("checked",false);
				}else{
					$(self).siblings().find("input").prop("checked",false);
					$(self).find("input").prop("checked",true);
				}
	        }
		});
	</script>

	<script type="text/javascript" src="../addons/jy_signup/js/jquery.sortable.js"></script>
	<script>
		$('.gbin1-list').sortable().bind('sortupdate', function() {});
	</script>

	<?php  if(!empty($id)) { ?>
	<script type="text/javascript" src="../addons/jy_signup/js/jquery.qrcode.js"></script>

	<script>
		window.onload = function(){
			jQuery(function(){
		        jQuery('#code').qrcode("<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('hexiao',array('id'=>$id)),2)?>");
		    })
		}
	</script>
	<?php  } ?>
	<script>
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('#description')[0]);
		});
	});
	</script>
	<?php  } ?>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>