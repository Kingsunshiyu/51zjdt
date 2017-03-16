<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation== 'post') { ?>class="active"<?php  } ?>><a
		href="<?php  echo $this->createWebUrl('activityManger', array( 'op' => 'post'));?>">添加</a></li>
	<li <?php  if($operation== 'display') { ?>class="active"<?php  } ?>><a
		href="<?php  echo $this->createWebUrl('activityManger', array('op' => 'display'));?>">管理</a></li>

</ul>
<?php  if($operation == 'post') { ?>



 <div class="panel panel-default">
	<form action="" method="post" class="form-horizontal form"
		enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
		<div class="panel-heading">活动添加</div>

		<div class="panel-body">

			<div class="form-group">
				<label class="col-sm-1 control-label">活动名称</label>
				<div class="col-sm-11">
					<input type="text" name="acname" class="form-control"
						value="<?php  echo $item['name'];?>" /> <span class="help-block"></span>
				</div>


			</div>


			<div class="form-group">
				<label class="col-sm-1 control-label">开始时间</label>
				<div class="col-sm-5">

					<?php  echo tpl_form_field_date('begintime', $item['begintime'],true)?> <span class="help-block"></span>
				</div>
				
				
				<label class="col-sm-1 control-label">结束时间</label>
				<div class="col-sm-5">

					<?php  echo tpl_form_field_date('endtime', $item['endtime'], true)?> <span
						class="help-block"></span>
				</div>

			</div>

		

			<div class="form-group">
				<label class="col-sm-1 control-label">限制人数</label>
				<div class="col-sm-5">
					<input type="number" name="countlimit" class="form-control"
						value="<?php  echo $item['countlimit'];?>" /> <span class="help-block"></span>
				</div>
				
				
				<label class=" col-sm-1 control-label">已报名虚拟人数</label>
				<div class="col-sm-5">
					<input type="number" name="countvirtual" class="form-control" value="<?php  echo $item['countvirtual'];?>" /><span class="help-block"></span>
				</div>

			</div>

		


			<div class="form-group">
				<label class="col-sm-1  control-label">是否可以重复报名</label>
				<div class="col-sm-5">
					<label class="radio-inline"> <input type="radio"
						name="isrepeat" value="1" <?php  if($item['isrepeat'] ==1) { ?>checked="checked"<?php  } ?>> 是

					</label> <label class="radio-inline"> <input type="radio" name="isrepeat" value="0" <?php  if($item['isrepeat'] ==0) { ?>checked="checked"<?php  } ?>>否
					</label> <span class="help-block"></span>
				</div>
				
				
				<label class="col-sm-1 control-label">是否开启邮件提醒</label>
				<div class="col-sm-5">
					<label class="radio-inline">
					 <input type="radio" name="istip" value="1" <?php  if($item['istip'] == 1) { ?>checked="checked"<?php  } ?>>
						是


					</label> <label class="radio-inline"> 
					<input type="radio" name="istip" value="0" <?php  if($item['istip'] == 0) { ?>checked="checked"<?php  } ?>>否
					</label> <span class="help-block">需要到系统全局设置中设置正确的发送邮件！</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-1 control-label">活动宣传封面页</label>
				<div class="col-sm-11">
					<?php  echo tpl_form_field_image('ac_pic', $item['ac_pic']);?>
					
				 <span class="help-block">建议宽*高=640*1136</span>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-1 control-label">第一张幻灯片</label>
				<div class="col-sm-11">
					<?php  echo tpl_form_field_image('ppt1', $item['ppt1']);?>
					
				 <span class="help-block">建议宽*高=640*400</span>
				</div>
			</div>
			
			
			<div class="form-group">
				<label class="col-sm-1 control-label">第二张幻灯片</label>
				<div class="col-sm-11">
					<?php  echo tpl_form_field_image('ppt2', $item['ppt2']);?>
					
				 <span class="help-block">建议宽*高=640*400</span>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-1 control-label control-label">第三张幻灯片</label>
				<div class="col-sm-11">
					<?php  echo tpl_form_field_image('ppt3', $item['ppt3']);?>
					
				 <span class="help-block">建议宽*高=640*400</span>
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-1 control-label">联系电话</label>
				<div class="col-sm-5">
				
					<input type="text" name="tel" class="form-control" value="<?php  echo $item['tel'];?>" />
				</div>
				
				<label class="col-sm-1 control-label">Email</label>
				<div class="col-sm-5">
				
				<input type="text" name="email" class="form-control" value="<?php  echo $item['email'];?>" />
				</div>

			</div>
			
			
			<div class="form-group">
				<label class=" col-sm-1 control-label">活动举办地区</label>
				<div class="col-sm-5">
				
				 <select name="location_p" id="location_p" class="location"></select>
                    <select name="location_c" id="location_c" class="location"></select>
                    <select name="location_a" id="location_a" class="location"></select>
                    <script type="text/javascript" src="../addons/we7_activity/js/region_select.js"></script>
                    <script type="text/javascript">
                        var location_p = "<?php  if(!empty($item['location_p'])) { ?><?php  echo $item['location_p'];?><?php  } else { ?>广东省<?php  } ?>";
                        var location_c = "<?php  if(!empty($item['location_c'])) { ?><?php  echo $item['location_c'];?><?php  } else { ?>汕头市<?php  } ?>";
                        var location_a = "<?php  if(!empty($item['location_a'])) { ?><?php  echo $item['location_a'];?><?php  } else { ?>龙湖区<?php  } ?>";
                        new PCAS("location_p", "location_c", "location_a", location_p, location_c, location_a);
                    </script>
				</div>
				
				<label class="col-sm-1  control-label">活动举办地址</label>
				<div class="col-sm-5">
				
				 	<input type="text" name="address" id="address" class="form-control" value="<?php  echo $item['address'];?>" >
				</div>

			</div>
			
		
			
			<div class="form-group">
				<label class=" col-sm-1 control-label">经纬度</label>
				<div class="col-sm-11">
				
				 	 <div id="r-result">
                        <input type="text" id="lat" name="lat" > <input type="text" id="lng" name="lng">
                    </div>
                    <div class="input-append">
                        <input type="text" id="place" class="input-xlarge valid" name="place" value="汕头市龙湖区长平路127号" data-rule-required="true">
                        <button class="btn" type="button" id="positioning" onclick="bmap.searchMapByAddress($('#place').val())">搜索</button>
                    </div>
                    <span class="maroon" style="color: #f30;margin-left: 5px;">注意：这个只是模糊定位，准确位置请地图上标注!</span>
                    <div id="l-map" style="overflow: hidden; position: relative; z-index: 0; background-image: url(http://api.map.baidu.com/images/bg.png);width: 600px; height: 500px;margin-top: 10px; color: rgb(0, 0, 0); text-align: left;"></div>
				</div>
				
				

		</div>
			
			
			
			<div class="form-group">
			
			<label for="inputEmail3" class="col-sm-1 control-label">主办方</label>
    			<div class="col-sm-2">
    			<input type="text" name="zb" class="form-control" value="<?php  echo $item['zb'];?>" />
    		
  			  </div>
  			  
  			  <label for="inputEmail3" class="col-sm-1 control-label">承办方</label>
    			<div class="col-sm-2">
    			 <input type="text" name="cb" class="form-control" value="<?php  echo $item['cb'];?>" />
  			  </div>
  			  
  			  <label for="inputEmail3" class="col-sm-1 control-label">协办方</label>
    			<div class="col-sm-2">
    			 <input type="text" name="xb" class="form-control" value="<?php  echo $item['xb'];?>" />
  			  </div>
  			  
  			  <label for="inputEmail3" class="col-sm-1 control-label">参加对象</label>
    			<div class="col-sm-2">
    			<input type="text" name="cjdx" class="form-control" value="<?php  echo $item['cjdx'];?>" />
  			  </div>
    
			
		</div>
			
	
			<div class="form-group">
				<label class="col-sm-1 control-label control-label">活动说明</label>
				<div class="col-sm-11">
				
					<textarea name="acdes" class="form-control richtext" cols="20" rows="10"><?php  echo $item['acdes'];?></textarea>
				
				</div>
			</div>
	
	
			
			<div class="form-group">
				<div class="col-sm-11">
					<input name="submit" type="submit" value="提交" class="btn btn-primary">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
				
			</div>
			
		
		
			
		


		</div>

	</form>
</div>







<script type="text/javascript">


	
	require(['jquery','util'], function($, util){
		$(function(){
			var editor = util.editor($(".richtext")[0]);
	 
			
		});
	});
	


</script>


<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript"
	src="http://api.map.baidu.com/getscript?v=1.4&ak=&services=&t=20140102035142"></script>
<script type="text/javascript">
	$(function() {
		$(".location").change(function() {
			bmap.searchMapByPCD();
		});
	});
	new PCAS("location_p", "location_c", "location_a", location_p, location_c,
			location_a);
	var bmap = {
		'option' : {
			'lock' : false,
			'container' : 'l-map',
			'infoWindow' : {
				'width' : 250,
				'height' : 100,
				'title' : ''
			},
			'point' : {
				'lng' : "<?php  if($item['lng']!='0.0000000000' && !empty($item['lng'])) { ?><?php  echo $item['lng'];?><?php  } else { ?>116.735049<?php  } ?>",
				'lat' : "<?php  if($item['lat']!='0.0000000000' && !empty($item['lat'])) { ?><?php  echo $item['lat'];?><?php  } else { ?>23.367896<?php  } ?>"
			}
		},
		'init' : function(option) {
			var $this = this;
			$this.option = $.extend({}, $this.option, option);

			$this.option.defaultPoint = new BMap.Point($this.option.point.lng,
					$this.option.point.lat);
			$this.bgeo = new BMap.Geocoder();
			$this.bmap = new BMap.Map($this.option.container);
			$this.bmap.centerAndZoom($this.option.defaultPoint, 15);
			$this.bmap.enableScrollWheelZoom();
			$this.bmap.enableDragging();
			$this.bmap.enableContinuousZoom();
			$this.bmap.addControl(new BMap.NavigationControl());
			$this.bmap.addControl(new BMap.OverviewMapControl());
			//添加标注
			$this.marker = new BMap.Marker($this.option.defaultPoint);
			$this.marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {
				'offset' : new BMap.Size(10, -20)
			}));
			$this.marker.enableDragging();
			$this.bmap.addOverlay($this.marker);
			//$this.marker.setAnimation(BMAP_ANIMATION_BOUNCE);
			$this.showPointValue($this.marker.getPosition());
			//拖动地图事件
			$this.bmap.addEventListener("dragging", function() {
				$this.setMarkerCenter();
				$this.option.lock = false;
			});
			//缩入地图事件
			$this.bmap.addEventListener("zoomend", function() {
				$this.setMarkerCenter();
				$this.option.lock = false;
			});
			//拖动标记事件
			$this.marker.addEventListener("dragend", function(e) {
				$this.showPointValue();
				$this.showAddress();
				$this.bmap.panTo(new BMap.Point(e.point.lng, e.point.lat));
				$this.option.lock = false;
				$this.marker.setAnimation(null);
			});
		},
		'searchMapByAddress' : function(address) {
			var $this = this;
			$this.bgeo.getPoint(address, function(point) {
				if (point) {
					$this.showPointValue();
					$this.showAddress();
					$this.bmap.panTo(point);
					$this.setMarkerCenter();
				}
			});
		},
		'searchMapByPCD' : function(address) {
			//alert($('#location_p').val()+$('#location_c').val()+$('#location_a').val());
			var $this = this;
			$this.option.lock = true;
			$this.searchMapByAddress($('#location_p').val()
					+ $('#location_c').val() + $('#location_a').val());
		},
		'setMarkerCenter' : function() {
			var $this = this;
			var center = $this.bmap.getCenter();
			$this.marker.setPosition(new BMap.Point(center.lng, center.lat));
			$this.showPointValue();
			$this.showAddress();
		},
		'showPointValue' : function() {
			var $this = this;
			var point = $this.marker.getPosition();
			$('#lng').val(point.lng);
			$('#lat').val(point.lat);
		},
		'showAddress' : function() {
			var $this = this;
			var point = $this.marker.getPosition();
			$this.bgeo.getLocation(point, function(s) {
				if (s) {
					$('#place').val(s.address);
					if (!$this.option.lock) {
						//cascdeInit(s.addressComponents.province,s.addressComponents.city,s.addressComponents.district);
						new PCAS("location_p", "location_c", "location_a",
								s.addressComponents.province,
								s.addressComponents.city,
								s.addressComponents.district);
					}
				}
			});
		}
	};
	$(function() {
		var option = {};
		bmap.init(option);
	});
</script>



<?php  } else if($operation == 'display') { ?>
<div class="main">

	<div style="padding: 15px;">
		<table class="table table-hover table-striped table-condensed">
			<thead class="navbar-inner">
				<tr>
					<th style="text-align: center;width: 200px">名称</th>
					<th style="text-align: center;width: 150px">开始时间</th>
					<th style="text-align: center;width: 150px">结束时间</th>
					<th style="text-align: center;width: 80px">浏览次数</th>
					

					<th style="text-align: center; min-width: 500px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td style="text-align: center;"><a href="<?php  echo $_W[siteroot].'/app/'.$this->createMobileurl('activity',array("id"=>$item['id']))?>" target="_blank"><?php  echo $item['name'];?></td>
					
					<td style="text-align: center;"><?php  echo date('Y-m-d H:i:s', $item['begintime'])?></td>
					<td style="text-align: center;"><?php  echo date('Y-m-d H:i:s', $item['endtime'])?></td>
	
					<td style="text-align: center;"><?php  echo $item['visitsCount'];?></td>

					<td style="text-align: center;">
					<a
						href="<?php  echo $this->createWebUrl('noteManger', array('aid' => $item['id'], 'op' => 'display'))?>"
						title="说明项" class="btn btn-small">说明项</a>
						<a
						href="<?php  echo $this->createWebUrl('applyManger', array('name' => 'we7_activity', 'aid' => $item['id']))?>"
						title="报名用户" class="btn btn-small">报名用户</a>
						
						<a
						href="<?php  echo $this->createWebUrl('GuestManger', array('name' => 'we7_activity', 'aid' => $item['id'], 'op' => 'display'))?>"
						title="嘉宾管理" class="btn btn-small">嘉宾</a>
						<a
						href="<?php  echo $this->createWebUrl('dayManger', array('name' => 'we7_activity', 'aid' => $item['id'], 'op' => 'display'))?>"
						title="日程管理" class="btn btn-small">日程</a>
						
						<a
						href="<?php  echo $this->createWebUrl('activityManger', array('id' => $item['id'], 'op' => 'post'))?>"
						title="编辑" class="btn btn-small"><i class="glyphicon glyphicon-edit"></i></a> <a
						href="<?php  echo $this->createWebUrl('activityManger', array('id' => $item['id'], 'op' => 'delete'))?>"
						onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"
						class="btn btn-small"><i class="glyphicon glyphicon-remove"></i></a>
						
						</td>
				</tr>
				<?php  } } ?>
			</tbody>

		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } ?> <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
