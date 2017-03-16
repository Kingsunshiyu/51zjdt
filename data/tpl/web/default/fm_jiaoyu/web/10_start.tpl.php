<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<script src="../addons/fm_jiaoyu/public/web/js/jquery.easypiechart.js"></script>
<?php  if($operation == 'display') { ?>
<div class="clearfix">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>报名数</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php  echo $baom;?>人</h1>
                        <div class="stat-percent font-bold text-success"><?php  if($baom !=0 & $bm !=0) { ?><?php  echo sprintf('%.2f', $baom/$bm);?><?php  } else { ?>0.00<?php  } ?>%<i class="fa fa-bolt"></i>
                        </div>
                        <small>占总报名</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                   <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>班级圈消息</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php  echo $bjqz;?>条</h1>
                        <div class="stat-percent font-bold text-info"><?php  if($bjqz !=0 & $bjq !=0) { ?><?php  echo sprintf('%.2f', $bjqz/$bjq);?><?php  } else { ?>0.00<?php  } ?>%<i class="fa fa-bolt"></i>
                        </div>
                        <small>占总消息</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>考情总计</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php  echo $checklog;?>次</h1>
                        <div class="stat-percent font-bold text-navy"><?php  if($checklog !=0 & $kq !=0) { ?><?php  echo sprintf('%.2f', $checklog/$kq);?><?php  } else { ?>0.00<?php  } ?>%<i class="fa fa-bolt"></i>
                        </div>
                        <small>占总考勤</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>总收入额</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php  if(!empty($cose)) { ?><?php  echo $cose;?><?php  } else { ?>0<?php  } ?>元</h1>
                        <div class="stat-percent font-bold text-danger"><?php  if(!empty($cose)) { ?><?php  echo sprintf('%.2f', $cose/$ddzj);?>%<?php  } else { ?>0.00%<?php  } ?><i class="fa fa-bolt"></i>
                        </div>
                        <small>占总收入</small>
                    </div>
                </div>
            </div>
        </div>
<!-- 	
		<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
					<h5>订单</h5>
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-xs btn-white active">天</button>
							<button type="button" class="btn btn-xs btn-white">月</button>
							<button type="button" class="btn btn-xs btn-white">年</button>
						</div>
					</div>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-9">
							<div class="flot-chart">
								<div class="flot-chart-content" id="flot-dashboard-chart"></div>
							</div>
						</div>
						<div class="col-sm-3">
							<ul class="stat-list">
								<li>
									<h2 class="no-margins">2,346</h2>
									<small>订单总数</small>
									<div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 48%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">4,422</h2>
									<small>最近一个月订单</small>
									<div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 60%;" class="progress-bar"></div>
									</div>
								</li>
								<li>
									<h2 class="no-margins ">9,180</h2>
									<small>最近一个月销售额</small>
									<div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i>
									</div>
									<div class="progress progress-mini">
										<div style="width: 22%;" class="progress-bar"></div>
									</div>
								</li>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div> -->
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;"><h5>按日期筛选</h5></div>
				<div class="ibox-content">
					<form action="./index.php" method="get" class="form-horizontal" role="form" id="list">
						<input type="hidden" name="c" value="site">
						<input type="hidden" name="a" value="entry">
						<input type="hidden" name="m" value="fm_jiaoyu">
						<input type="hidden" name="do" value="start"/>
						<input type="hidden" name="op" value="display"/>
						<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>"/>
						<div class="form-group clearfix">
							<label class="col-xs-12 col-sm-2 col-md-1 control-label">时间范围</label>
							<div class="col-sm-7 col-lg-8 col-md-8 col-xs-12">
								<?php  echo tpl_form_field_daterange('addtime', array('start' => date('Y-m-d', $starttime), 'end' => date('Y-m-d', $endtime)));?>
								<input class="btn btn-sm btn-success" name="commit" type="submit" value="搜索">
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;"><h4><?php  if(!empty($_GPC['addtime'])) { ?><?php  echo date('Y-m-d', $starttime);?>至<?php  echo date('Y-m-d', $endtime)?><?php  } ?>数据统计</h4></div>
				<div class="account-stat" style="background-color: #ffffff;border-color: #e7eaec;border-style: solid solid none;border-width: 1px 0px;">
					<div class="account-stat-btn">
						<div class="col-12">已付总额<span><?php  echo $cose1;?>元</span></div>
						<div class="col-12">报名数<span><?php  echo $baomzj;?>人</span></div>
						<div class="col-12">考勤数<span><?php  echo $checklogzj;?>次</span></div>
						<div class="col-12">班级圈<span><?php  echo $bjqzj;?>条</span></div>	
						<div class="col-12">照片数<span><?php  echo $xczj;?>张</span></div>
						<div class="col-12">已绑教师<span><?php  echo $ybjs;?>人</span></div>
						<div class="col-12">已绑学生及家长<span><?php  echo $ybxs;?>人</span></div>
						<div class="col-12">教师人数<span><?php  echo $jszj;?>人</span></div>
						<div class="col-12">学生人数<span><?php  echo $xszj;?>人</span></div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="clearfix">
		<div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <h5><?php  if(!empty($_GPC['addtime'])) { ?><?php  echo date('Y-m-d', $starttime)?>至<?php  echo date('Y-m-d', $endtime)?><?php  } ?>交互功能使用率</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="echarts" id="echarts-pie-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="border-color: #e7eaec;border-style: solid solid none;">
                        <h5><?php  if(!empty($_GPC['addtime'])) { ?><?php  echo date('Y-m-d', $starttime)?>至<?php  echo date('Y-m-d', $endtime)?><?php  } ?>支付方式比例图</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="echarts" id="echarts-pie-chart-a"></div>
                    </div>
                </div>
            </div>
      </div>
	</div>
	<form class="form-horizontal" action="" method="post" onkeydown="if(event.keyCode == 13) return false;">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-text-center">
						<thead class="navbar-inner">
							<tr>
								<th width="300">时间</th>
								<th>营业额</th>
								<th>订单数</th>
								<th>在线支付</th>
								<th>现金支付</th>
								<th>查看详情</th>
							</tr>
						</thead>
						<tbody>
							<?php  if(is_array($return)) { foreach($return as $k => $dca) { ?>
							<tr>
								<th><?php  echo $k;?></th>
								<td><?php  echo sprintf('%.2f', $dca['cose']);?> 元</td>
								<td><?php  echo intval($dca['count']);?> 单</td>
								<td><?php  echo sprintf('%.2f', $dca['1']);?> 元</td>
								<td><?php  echo sprintf('%.2f', $dca['2']);?> 元</td>
								<td>
									<a href="<?php  echo $this->createWebUrl('payall', array('op' => 'display', 'schoolid' => $schoolid));?>" class="btn btn-success" target="_blank">详情</a>
								</td>
							</tr>
							<?php  } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="../addons/fm_jiaoyu/public/web/js/jquery.flot.js?v=2.1.4"></script>
<script src="../addons/fm_jiaoyu/public/web/js/echarts-all.js?v=2.1.4"></script>	
<script type="text/javascript">
$(function () {
	var templates = {
		b: {
			title: {
				text: '交互功能使用率',
				subtext: '比例图'
			},
			series: [{
				name: '交互功能使用率',
				data: []
			}]
		},
		a: {
			title: {
				text: '各种支付方式收入比例',
				subtext: '比例图'
			},
			series: [{
				name: '各种支付方式收入下单比例',
				data: []
			}]
		}
	};
	//第一
   // var pieChart = echarts.init(document.getElementById("echarts-pie-chart"));
    var pieoption = {
        title : {
            text: '',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['班级圈','在线报名','通知公告','打卡考勤','在线留言','相册','在线请假']
        },
        calculable : true,
        series : [
            {
                name:'交互功能',
                type:'pie',
                radius : '60%',
                center: ['50%', '60%'],
                data:[]
            }
        ]
    };
   	// pieChart.setOption(pieoption);
   	// $(window).resize(pieChart.resize);
	var GetChartData = function(type) {
		$('#echarts-pie-chart').html('');
		var schoolid = "<?php  echo $schoolid;?>";
		var url = "<?php  echo $this->createWebUrl('start');?>&op=" + type + "&schoolid=" + schoolid;
		var params = {
			'start': $('#list input[name="addtime[start]"]').val(),
			'end': $('#list input[name="addtime[end]"]').val()
		};
		$.post(url, params, function(data){
			var data = $.parseJSON(data);
			var ds = $.extend(true, {}, pieoption, templates[type]);
			ds.series[0].data = data.message.message;
			var pieChart = echarts.init($('#echarts-pie-chart')[0]);
			pieChart.setOption(ds);
			$(window).resize(pieChart.resize);
		});
	}
	GetChartData('b');
	//第二
	//var pieChart_a = echarts.init(document.getElementById("echarts-pie-chart-a"));	
    var pieoption_a = {
		title : {
			text: '',
			x:'center'
		},
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['银联支付','支付宝支付','百付宝支付','微信支付','现金支付','余额支付']
        },
        calculable : true,
        series : [
            {
                name:'支付方式',
                type:'pie',
                radius : '60%',
                center: ['50%', '60%'],
                data:[]
            }
        ]
    };
   	// pieChart_a.setOption(pieoption_a);
   	// $(window).resize(pieChart_a.resize);
	var GetChartData = function(type) {
		$('#echarts-pie-chart-a').html('');
		var schoolid = "<?php  echo $schoolid;?>";
		var url = "<?php  echo $this->createWebUrl('start');?>&op=" + type + "&schoolid=" + schoolid;
		var params = {
			'start': $('#list input[name="addtime[start]"]').val(),
			'end': $('#list input[name="addtime[end]"]').val()
		};
		$.post(url, params, function(data){
			var data = $.parseJSON(data);
			var ds = $.extend(true, {}, pieoption_a, templates[type]);
			ds.series[0].data = data.message.message;
			var myChart = echarts.init($('#echarts-pie-chart-a')[0]);
			myChart.setOption(ds);
			$(window).resize(myChart.resize);
		});
	}
	GetChartData('a');

   	 //增长趋势
            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "订单数",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth: 0
                    }

                }, {
                    label: "付款数",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth: 1,
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#838383"
                },
                yaxes: [{
                        position: "left",
                        max: 1070,
                        color: "#838383",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Arial',
                        axisLabelPadding: 3
                }, {
                        position: "right",
                        clolor: "#838383",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: ' Arial',
                        axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0,
                    color: '#838383'
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null,
                previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

    });


</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>