<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/search.css" rel="stylesheet" />
<style type="text/css">
.no-content {
    padding: .6rem 0;
    text-align: center;
    color: #ddd;
    font-size: .16rem;
}
.no-content .ico-none {
    display: inline-block;
    margin-bottom: .1rem;
    width: 54px;
    height: 55px;
    background: url(../addons/fy_lesson/template/mobile/images/ico-order-none.png) no-repeat;
}
</style>
<?php  if($ctype==1) { ?>
<div class="content">
	<?php  if(!empty($lessonlist)) { ?>
	<div class="c_part cf">
		<div class="con">
		</div>
	</div>
	<?php  } else { ?>
	<div class="no-content"><i class="ico-none ico"></i><div>您还没有收藏任何课程~</div></div>
	<?php  } ?>
</div>

<div id="loading" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<div style="font-size:.12rem; text-align:center; <?php  if(empty($lessonlist)) { ?>display:none<?php  } ?>;">
	<a href="javascript:void(0);" id="btn_Page">点击加载更多</a>
</div>

<script type="text/javascript">
var i = 1; //设置当前页数，全局变量
var ajaxurl = "<?php  echo $this->createMobileUrl('collect', array('op'=>'ajaxgetlesson','ctype'=>1));?>";
var attachurl = "<?php  echo $_W['attachurl'];?>";
var lessonurl = "<?php  echo $this->createMobileUrl('lesson');?>";
var loading = document.getElementById("loading");
$(function () {
    //根据页数读取数据  
    function getData(page) {  
        i++; //页码自动增加，保证下次调用时为新的一页。  
        $.get(ajaxurl, {page: page}, function (data) {  
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
        var mainDiv =$(".con");
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {  
            chtml += '<a href="' + lessonurl + '&id=' + result[j].id + '" class="pic">';  
			chtml += '	<dl class="list">';
			chtml += '		<dt><img src="' + attachurl + result[j].images + '" alt="' + result[j].bookname + '"></dt>';
			chtml += '		<dd>';
			chtml += '			<p class="s_tit">' + result[j].bookname + '</p>';
			chtml += '			<div class="s_ext">';
			chtml += '				<span>共<em class="n">' + result[j].seccount + '</em>节课</span>&nbsp;&nbsp;';
			chtml += '				<span class="ml20"><em style="color:#3BC0B6;">' + result[j].price + '</em></span>&nbsp;&nbsp;';
			chtml += '				<span><em style="color:#4A45FB;">' + result[j].buynum_total + '</em>人已学习</span>';
			chtml += '			</div>';
			chtml += '		</dd>';
			chtml += '	</dl>';
			chtml += '</a>'; 
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
<?php  } else if($ctype==2) { ?>
<style type="text/css">
.te2{-webkit-line-clamp: 3;}
.course-list.wider .item img{width:.7rem;height:.7rem;}
.course-list .title{height:auto;font-weight:bold;}
.course-list .info{color:#777;}
</style>
<div class="order-container">
	<?php  if(!empty($teacherlist)) { ?>
	<div class="swiper-container swiper-container-horizontal swiper-container-autoheight">
        <div class="swiper-wrapper">
            <div id="box_status_0" class="swiper-slide swiper-slide-active">
                <ul id="courselist" class="order-list">
				</ul>
            </div>
        </div>
    </div>
	<?php  } else { ?>
	<div class="no-content"><i class="ico-none ico"></i><div>您还没有收藏任何讲师~</div></div>
	<?php  } ?>
</div>
<div id="loading" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<div style="font-size:.12rem; text-align:center;<?php  if(empty($teacherlist)) { ?>display:none<?php  } ?>">
	<a href="javascript:void(0);" id="btn_Page">点击加载更多</a>
</div>

<script type="text/javascript">
var i = 1; //设置当前页数，全局变量
var ajaxurl = "<?php  echo $this->createMobileUrl('collect', array('op'=>'ajaxgetteacher','ctype'=>2));?>";
var attachurl = "<?php  echo $_W['attachurl'];?>";
var teacherurl = "<?php  echo $this->createMobileUrl('teacher');?>";
var loading = document.getElementById("loading");
$(function () {
    //根据页数读取数据  
    function getData(page) {  
        i++; //页码自动增加，保证下次调用时为新的一页。  
        $.get(ajaxurl, {page: page}, function (data) {  
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
            chtml += '<li>';  
			chtml += '	<div class="course-list row2 wider">';
			chtml += '		<a href="' + teacherurl + '&teacherid=' + result[j].id + '" class="item">';
			chtml += '			<img src="' + attachurl + result[j].teacherphoto + '" alt="' + result[j].teacher + '">';
			chtml += '			<div class="vbox">';
			chtml += '				<h3 class="title te2 flex">' + result[j].teacher + '</h3>';
			chtml += '				<p class="info te2">讲师介绍：' + result[j].teacherdes + '</p>';
			chtml += '			</div>';
			chtml += '		</a>';
			chtml += '	</div>';
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
<?php  } ?>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $sharelink['title'];?> - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php  echo $sharelink['desc'];?>",
		link: "<?php  echo $shareurl;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sharelink['images'];?>",
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
