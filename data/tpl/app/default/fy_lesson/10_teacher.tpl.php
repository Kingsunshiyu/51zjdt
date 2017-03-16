<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 讲师课程
 * ============================================================================
-->
<?php  echo register_jssdk(false);?>
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/teacher.css" rel="stylesheet" />

<div id="cover" style="display:none;position:fixed;top:0;width:100%;height:100%;background:rgba(0,0,0,0.8);display:none;z-index:99999999;"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-guide.png" style="width:100%;"></div>

<div class="content agency">
    <div class="agency-head cbox">
        <img src="<?php  echo $_W['attachurl'];?><?php  echo $teacher['teacherphoto'];?>" class="pic">
        <div class="con flex">
            <div class="cbox">
                <h3 class="flex title te"><?php  echo $teacher['teacher'];?></h3>
                <a href="javascript:;" class="btn-share" id="share_btn"><i class="ico ico-share2"></i></a>
            </div>
            <ul class="data cbox">
                <li class="flex hbox">
                    <div class="num">
                        <p><?php  echo $total;?></p>课程数量
                    </div>
                    <span class="line"></span>
                    <div class="per">
                        <p><?php  echo $student_num;?></p>学生人数
                    </div>
                </li>
                <li id="btn-collect2">
                    <!-- 已收藏 加上类cur -->
                    <a href="javascript:;" class="link <?php  if(!empty($collect)) { ?>cur<?php  } ?>"><i class="ico ico-collect2"></i>收藏</a>
                </li>
            </ul>
        </div>
    </div>
    <a name="scroll_top"></a>
    <ul class="details-tab agency-tab">
        <li class="cur" tab-name="course"><a href="javascript:;">课程(<?php  echo $total;?>)</a></li>
        <li tab-name="js"><a href="javascript:;">介绍</a></li>
    </ul>

	<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;height:auto;">
		<div class="swiper-slide agency-con swiper-slide-active" id="detail-course" style="height:auto;">
			<div id="course_box">
				<ul id="courselist" class="course-list row2 wider shadow">
				</ul>
			</div>
		</div>

		<div class="swiper-slide agency-con swiper-slide-next" id="detail-school" style="height:auto;">
			<div id="school_box">
				<div class="agency-teachers shadow">
					<h3 class="g-title">讲师信息</h3>
					<ul class="comment">
						<li class="item">
							<a href="javascript:;" class="hbox">
								<div class="avatar">
									<img src="<?php  echo $_W['attachurl'];?><?php  echo $teacher['teacherphoto'];?>" class="" alt="">
								</div>
								<div class="right-box flex">
									<p class="praise te"><?php  echo $teacher['teacher'];?></p>
									<p class="info"><?php  echo $teacher['teacherdes'];?></p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="loading" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<div style="font-size:.12rem;text-align:center;">
	<a href="javascript:void(0);" id="btn_Page">点击加载更多</a>
</div>

<script type="text/javascript">
var i = 1; //设置当前页数，全局变量
var ajaxurl   = "<?php  echo $this->createMobileUrl('teacher', array('op'=>'ajaxgetlesson', 'teacherid'=>$teacherid));?>";
var lessonurl = "<?php  echo $this->createMobileUrl('lesson');?>";
var attachurl = "<?php  echo $_W['attachurl'];?>";
var loading = document.getElementById("loading");
var teacherself = "<?php  echo $teacherself;?>";
$(function () {
    //根据页数读取数据  
    function getData(page) {  
        i++; //页码自动增加，保证下次调用时为新的一页。  
        $.get(ajaxurl, {page: page }, function (data) {  
            if (data.length > 0) {
				loading.style.display = 'none';
                var jsonObj = JSON.parse(data);
                insertDiv(jsonObj);  
            }
        });  
       
    } 
    //初始化加载第一页数据  
    getData(1);

    //生成数据html,append到div中  
    function insertDiv(result) {  
        var mainDiv =$("#courselist");
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {  
            chtml += '<li class="item">';  
            chtml += '	<a href="' + lessonurl + '&id=' + result[j].id + '">'; 
			chtml += '		<img src="'+attachurl+result[j].images + '" alt="'+result[j].bookname+'">';
			chtml += '		<div class="con">';
			chtml += '			<h3 class="title te2">'+result[j].bookname+'</h3>';
			if(teacherself==1){
			chtml += '			<p class="lesson">共'+result[j].seccount+'节课&nbsp;(讲师收益:<em  class="money" style="color:#3BC0B6;">'+result[j].teacher_income+'%</em>)</p>';
			}else{
			chtml += '			<p class="lesson">共'+result[j].seccount+'节课</p>';
			}
			chtml += '			<div class="cbox">';
			chtml += '				<p class="flex money-box te"><em class="money">'+result[j].price+'</em></p>';
			chtml += '				<span class="num te">'+result[j].virtualandbuynum+'人已学</span>';
			chtml += '			</div>';
			chtml += '		</div>'; 
			chtml += '	</a>'; 
			chtml += '</li>'; 
        }
		mainDiv.append(chtml);
		if(result.length==0){
			document.getElementById("btn_Page").innerHTML="已全部加载完成";
		}
    }  
  
    //==============核心代码=============  
    var winH = $(window).height(); //页面可视区域高度   
  
    var scrollHandler = function () {  
        var pageH = $(document.body).height();  
        var scrollT = $(window).scrollTop(); //滚动条top   
        var aa = (pageH - winH - scrollT) / winH;  
        if (aa < 0.02) { 
            if (i % 1 === 0) {
                getData(i);  
                $(window).unbind('scroll');  
                $("#btn_Page").show();
            } else {  
                getData(i);  
                $("#btn_Page").hide();
            }  
        }  
    }  
    //定义鼠标滚动事件
    $(window).scroll(scrollHandler);
    //继续加载按钮事件
    $("#btn_Page").click(function () {
		loading.style.display = 'block';
        getData(i);
        $(window).scroll(scrollHandler);
    });
  
});  
</script>
<script type="text/javascript">
//切换tab
$(".agency-tab").on("click", 'li', function() {
	var $currItem = $(this),
	index = $currItem.index();

	$currItem.addClass('cur').siblings().removeClass('cur');
	$(".agency-con").hide().eq(index).show();
});

$('.btn-share').click(function(){
	$('#cover').fadeIn(200).unbind('click').click(function(){
		$(this).fadeOut(100);
	})
});

function GetQueryString(name){
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r!=null)return  unescape(r[2]); return null;
}

$("#btn-collect2").click(function(){
	var id = GetQueryString('teacherid');
	var ajaxurl = "<?php  echo $this->createMobileUrl('updatecollect', array('ctype'=>'teacher','openid'=>$openid));?>";
	$.ajax({
        type:'post',
        url:ajaxurl,
        data:{id:id},
        dataType:'json',     
        success:function(data){
            if(data=='1'){
				$("#btn-collect2 a").addClass("cur");
			}else if(data=='2'){
				$("#btn-collect2 a").removeClass("cur");
			}
        }
    });
});
</script>

<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $teacher['teacher'];?>讲师主页 - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php echo $shareteacher['title']?$shareteacher['title']:$teacher['teacherdes'];?>",
		link: "<?php  echo $url;?>&uid=<?php  echo $uid;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php echo $shareteacher['images']?$shareteacher['images']:$teacher['teacherphoto']?>",
		trigger: function (res) {},
		complete: function (res) {},
		success: function (res) {},
		cancel: function (res) {},
		fail: function (res) {}
	};
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
	wx.onMenuShareQZone(shareData);
	
});
</script>
<?php  include $this->template('_footer');?>
