<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-title" content="微考试"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection"/>
<style type="text/css">
	body{width:100%;}
	html, body, div, ul, ol, li, h1, h2, h3, h4, h5, form, fieldset, input, textarea, p, th, td, button, span, menu, section, nav {    margin: 0;    padding: 0;}
	a{text-decoration:none; color:#4a6c9a; font: 500 14px/1 "Microsoft Yahei";}
	ul, menu, dir {display: block;list-style-type:none;}
	header{ background:#e8e8e8 url(<?php  echo $this->_img_url?>btn_header_right_normal.png) repeat-x;  line-height:58px; height:58px;text-align:center; width:100%;}
	header h1{ display:block; color:#fff;font: 600 1.286em/2.8 "Microsoft Yahei";}
	header .return{ cursor:pointer; background:url(<?php  echo $this->_img_url?>ic_header_back.png) no-repeat scroll 10px 10px rgba(0, 0, 0, 0); background-size: 70% 60%;border-right:#7bb1f9 1px solid; width:50px;height:58px; position:absolute; left:0px; top:0px;}
	header .xuan{ display:inline-block; text-align:center; position:absolute; width:50px; height:58px; line-height:58px; right:0px; top:0px; color:#FFF; font-family:"Microsoft Yahei"; font-size:14px; border-left:#7bb1f9 1px solid;}
	header .time{ cursor:pointer; color:#FFF; background:url(<?php  echo $this->_img_url?>bg_quiz_timer.png) no-repeat; width:158px; height:39px; position:absolute; left:50%; margin:22px 0px 0px -79px;}
	header .time span{ background:url(<?php  echo $this->_img_url?>btn_quiz_begin.png) no-repeat;width:45px; height:45px; position:absolute; left:5px; top:-3px;}
	.jishi{ position:absolute; left:60px; top:-24px;}
	/*时间暂停弹窗*/
	.pop{   margin: 0 5%;  position: absolute;  width: 90%;  z-index: 2; height:300px; background:#fff; top:40%; border-radius: 8px; margin-top:-80px;}
	.pop_body{ color: #5C7FB4;font: 500 1.286em/2.8 "Microsoft Yahei"; text-align:left; margin:0px 20px 20px 20px;border-bottom: 1px solid #B5C9E5;}
	.pop_title{ margin:20px; text-align:left; line-height:28px;}
	.pop_head button{background:url(<?php  echo $this->_img_url?>btn_quiz_summit_normal.png) no-repeat; width:240px; height:54px;border: 0 none; margin-top:20px;  color:#FFF;font: 400 16px/2.8 "Microsoft Yahei";}
	.pop_head button:hover{background:url(<?php  echo $this->_img_url?>btn_quiz_summit_pressed.png) no-repeat; width:240px; height:54px;border: 0 none; margin-top:20px; color:#FFF;font: 400 16px/2.8 "Microsoft Yahei";}
	menu{ padding-bottom:10px;  background:url(<?php  echo $this->_img_url?>bg_home_hearder_tile.png) repeat scroll 0 0 rgba(0, 0, 0, 0); width: 100%; z-index:-1;}
	menu h2{ padding:40px 0px 20px 40px;color:#4a6c9a; font-size:16px;  }
	menu .timu{padding: 0px 40px 20px 40px;font: 500 18px/1 "Microsoft Yahei"; line-height:26px; border-bottom:#b5c9e5 2px solid;}
	menu ul li { display:block;  border-bottom:#b5c9e5 2px solid;font: 500 18px/1 "Microsoft Yahei"; line-height:120%; padding-left:40px; margin-top:30px; padding-bottom:30px;}
	/*解释层*/
	.right{ margin-bottom: -20px;background:url(<?php  echo $this->_img_url?>ic_right_indicator.png) no-repeat ; background-position:right; width:100%; height:45px;}
	.cuo{ margin-bottom: -20px; background:url(<?php  echo $this->_img_url?>ic_error_indicator.png) no-repeat ; background-position:right; width:100%; height:45px;}
	.jieshi{  margin:20px 20px 120px 20px; color:#FFF; border-radius:4px; background-color:#4f98f7; padding:10px;}
	.jieshi p{font:  14px/2 "Microsoft Yahei";}
	.jieshi p span{ color:#000;font:  14px/2 "Microsoft Yahei";}
	footer{ position: fixed; background:url(<?php  echo $this->_img_url?>footer_bg2.PNG) repeat-x; height:60px; width:100%;  bottom:0px;}
	footer ul li{ width:25%; float:left; height:60px; text-align:center;}
	footer ul li a{ display:block; position:absolute;width:25%; color:#5c7fb4; font: 500 14px/1 "Microsoft Yahei"; padding-top:15px;}
	footer ul li a span{ background:url(<?php  echo $this->_img_url?>ic_up.png) no-repeat; width:39px; height:33px;display:block; position:absolute; left:50%; margin-left:-18px; top:30px;}
	footer ul li a .f_icon{ background:url(<?php  echo $this->_img_url?>ic_f.png) no-repeat; background-size: 70%;}
	footer ul li a .d_icon{ background:url(<?php  echo $this->_img_url?>ic_down.png) no-repeat;background-size: 70%;}
	footer ul li a .up_icon{ background-size: 70%;}
	footer ul li a i{position:absolute; left:50%; margin-left:-15px; top:35px;}
	footer .choose{display:none; position:absolute; width:100%;}
	footer .choose ul{ position:absolute; bottom:-9px; background:url(<?php  echo $this->_img_url?>footerbg.PNG) repeat; width:98%; padding:10px 1% 10px 1% ; }
	footer .choose ul li{ background:#FFF repeat; width:50px; height:50px; border:#b8c7e8 2px solid; line-height:50px; margin:10px 20px 0px 0px;}
	footer .choose ul li a{ color:#000; display:block; width:52px; height:52px; line-height:52px; padding-top:0px;}
	footer .choose ul .get{   background:url(<?php  echo $this->_img_url?>ic_answer_sheet_done_dark.png) no-repeat scroll 14px 14px rgba(0, 0, 0, 0);}
	footer .choose ul .on{background:#FFF repeat;border:#f5a357 2px solid; }
	.clear{ clear:both; float:none;}
</style>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.form.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>common.js'></script>
</head>
<body>
<header>
	<h1>试卷讲解</h1>
    <div class="return" onclick="location.href='javascript:history.go(-1);'"></div>
    <!--<div class="time"><span class="stop"></span>-->
    <!--<div class="jishi"></div>-->
    <!--</div>-->
    <!--<div class="tan">-->
    <!--<h3 id="msg_title">休息一下</h3>-->
    <!--<p class="pop_title"></p>-->
    <!--<div class="pop_head" id="close_tan"><button>继续作答</button></div>-->
    <!--<div class="pop_head" id="close_exam"><button>保存并离开</button></div>-->
    <!--</div>-->
    <a class="xuan" href="<?php  echo $this->createMobileUrl('index')?>">首页</a>
</header>
<menu>
    <div id="d_list"></div>
    <input type="hidden" name="paperid" id="paperid" value="<?php  echo $paperid;?>" />
    <input type="hidden" name="recordid" id="recordid" value="<?php  echo $recordid;?>" />
    <input type="hidden" name="now_page" id="now_page" value="<?php  echo $pindex;?>" />
    <input type="hidden" name="submit" value="1" />
    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
    <input type="hidden" name="count_flag" id="count_flag" value="0" />
</menu>
   <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('loading', TEMPLATE_INCLUDEPATH)) : (include template('loading', TEMPLATE_INCLUDEPATH));?>
<footer>
    <ul>
        <li><a href="javascript:void(0);" title="题目"><i><font id="now_num"><?php  echo $pindex;?></font>/<?php  echo $paper_info['total'];?></i>题目</a></li>
        <li id="previous_page"><a href="javascript:void(0);" title="上一题"><span class="up_icon"></span>上一题</a></li>
        <!--<li><a href="javascript:void(0);" title="收藏此题"><span class="f_icon"></span>收藏此题</a></li>-->
        <li id="next_page"><a href="javascript:void(0);" title="下一题"><span class="d_icon"></span>下一题</a></li>
    </ul>
</footer>
</body>
<script>
    $(function () {
        var next_page = 0;
        var paperid = '<?php  echo $paperid;?>';
        var recordid = '<?php  echo $recordid;?>';
        var now_page = '<?php  echo $pindex;?>';
        //点击上一页
        $("#previous_page").click(function () {
            if (now_page > 1) {
                var previous_page = now_page - 1;
                get_list(previous_page);
            }
        });
        //点击下一页
        $("#next_page").click(function () {
            get_list(next_page);
        });
        //$("#close_exam").click();
        //首次加载页面
        function load_data() {
            check_previou_page();
            get_list(now_page);
        }
        //是否显示上一页
        function check_previou_page() {
            if (now_page == 1) {
                $("#previous_page").hide();
            } else if (now_page > 1){
                $("#previous_page").show();
            }
        }
        function get_list(page) {
            showloading();
            $.post("<?php  echo $this->createMobileUrl('answer')?>", {ac: 'getDate', page: page, paperid: paperid, recordid: recordid}, function (data) {
                //alert(data);return false;
                hideloading();
                data = eval("(" + data + ")");
                if (data.result == 1) {
                    now_page = page;
                    $("#now_page").val(now_page);
                    $("#now_num").html(page);
                    check_previou_page();

                    $("#d_list").html(data.code);

                    if (data.isshow == 1) {
                        next_page = data.nindex;
                        $("#next_page").show();
                    } else {
                        $("#next_page").hide();
                    }
                } else {
                    alert(data.error);
                    return false;
                }
            });
        }
        load_data();
    });
</script>
</html>
