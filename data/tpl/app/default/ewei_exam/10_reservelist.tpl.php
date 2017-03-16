<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的预约</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-title" content="微考试"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection"/>
<style type="text/css">
    body{width:100%;}
    html, body, div, ul, ol, li, h1, h2, h3, h4, h5, form, fieldset, input, textarea, p, th, td, button, span, menu, section, nav {margin: 0; padding: 0;}
    button{ cursor:pointer;}
    a{text-decoration:none; color:#4a6c9a; font: 500 14px/1 "Microsoft Yahei";}
    ul, menu, dir {display: block;list-style-type:none;}
    header{ background:#e8e8e8 url(<?php  echo $this->_img_url?>btn_header_right_normal.png) repeat-x;  line-height:58px; height:58px; text-align:center; width:100%;}
	header h1{ display:block; color:#fff;font: 600 1.286em/2.8 "Microsoft Yahei";}
    header .return{ cursor:pointer; background:url(<?php  echo $this->_img_url?>ic_header_back.png) no-repeat scroll 10px 10px rgba(0, 0, 0, 0); background-size: 70% 60%;
    border-right:#7bb1f9 1px solid; width:50px; 
    height:58px; position:absolute; left:0px; top:0px;}
	header .xuan{ display:inline-block; text-align:center; position:absolute; width:50px; height:58px; line-height:58px; right:0px; top:0px; color:#FFF; font-family:"Microsoft Yahei"; font-size:14px; border-left:#7bb1f9 1px solid;}
    #nav{ background:#e8e8e8;}
    #nav .border{ background:url(<?php  echo $this->_img_url?>seperator_line_catalog_list.png) repeat-x; height:2px; width:100%;}
    #nav ul li,#nav ul li a{ overflow:hidden; display:block; height:68px; width:100%; }
   /* #nav ul li span{ display: list-item; width:66px; height:68px; float:left; }*/
    #nav ul li .finish{background:url(<?php  echo $this->_img_url?>paper_infos_finish.png) no-repeat scroll 20px 38px rgba(0, 0, 0, 0);}
    #nav ul li .doing{background:url(<?php  echo $this->_img_url?>paper_infos_doing.png) no-repeat scroll 20px 38px rgba(0, 0, 0, 0);}
    #nav ul li .title{ float:left; line-height:120%; height:50px; position:absolute; padding-left:20px; padding-top:12px; overflow:hidden; }
    #nav ul li .none{ background:none;}
    .more{height:60px; line-height:45px; background:#f2f2f2; width:100%; text-align:center; line-height:60px;}
    .more a{ display:block; line-height:60px;}
    .more a:hover{ background:#fff;}
    footer{ background:url(<?php  echo $this->_img_url?>footer_bg.PNG) repeat-x; height:16px; width:100%;position:fixed;bottom:0;}
    /*筛选部分*/
    #nav .shai{ display:; width:100%; background:#efefef;  height:74px; border-bottom:#dddddd 1px solid;font: 600 1.143em/40px "STXihei"; color:#555555;}
    #nav .shai .lei,.nian{ text-align:center; float:left;line-height:74px; width:45%; cursor:pointer;}
    #nav .shai .d_icon{ background:url(<?php  echo $this->_img_url?>ic_spec_arrow_down_day.png) no-repeat scroll 0px 13px rgba(0, 0, 0, 0); width:200px; height:74px; position:absolute;}
    #nav .shai .que{ float:left; border-radius:2px; height:40px; line-height:40px; color:#555; border:#ccc 1px solid; width:80px;font: 500 14px/1 "Microsoft Yahei"; background:#f3f2f2;  margin-top:20px; position:absolute; right:20px;}
    /*筛选弹出层*/
    .lei_box{ display:none; position:absolute; margin:0px 5%;width:90%; z-index:2; }
    .year_box{display:none; position:absolute; margin:0px 5%;width:90%; z-index:2;}
    .list{ background:#4b5978;border-radius:6px; opacity:0.9; color:#FFF; font: 500 14px/1 "Microsoft Yahei";  z-index:1; margin-top:14px;}
    .year_box{ height:750px; overflow: scroll;}
    .lei_box .arrow,.year_box .arrow{ background:url(<?php  echo $this->_img_url?>paper_filter_arrow.png) no-repeat; width:24px; height:16px;position:absolute;left:69%; z-index:2; }
    .year_box .arrow{left:19%;}
    .all,.off{ height:90px; border-bottom:#687391 1px solid; line-height:90px; margin:0px 20px; padding-left:10px; cursor:pointer;}
    .off{border:none;}
    .list .select{  background:url(<?php  echo $this->_img_url?>ic_course_bank_selected.png) no-repeat; background-position:right }
</style>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
</head>
<body>
  	<header>
    	<h1>我的预约</h1>
    	<div class="return" onclick="location.href='javascript:history.go(-1);'"></div>
    	<a class="xuan" href="<?php  echo $this->createMobileUrl('index')?>">首页</a>
  	</header>
  	<nav id="nav">
  	<div class="shai" style="display: none;">
     	<div class="nian"><span class="nian_title"><?php  echo $year_title;?></span><span class="d_icon"></span></div>
     	<div class="lei"><span class="lei_title"><?php  echo $cate_title;?></span><span class="d_icon"></span></div>
     	<button class="que">确定</button>
  	</div>
    <div id="d_list"></div>
    <div class="more" id="d_page" style="display: none;"><a style="" class="ui-link" href="javascript:;" id="d_more">点击加载更多</a></div>
  	</nav>
  	<footer></footer>
</body>
<script>
    $(function () {
        var year_value = '<?php  echo $year;?>';
        var cate_value = '<?php  echo $pcate;?>';
        var cate_name = '<?php  echo $cate_title;?>';
        var next_page = 0;
        function setClass() {
            if (year_value > 0) {
                $(".shai").show();
                $(".nian_title").html('<?php  echo $year_title;?>');
                $(".year_option").each(function(){
                    if ($(this).attr("this_id") == year_value) {
                        $(".year_option").removeClass("select");
                        $(this).addClass("select");
                        return false;
                    }
                });
            }
            if (cate_value > 0) {
                $(".shai").show();
                $(".lei_title").html('<?php  echo $cate_title;?>');
                $(".cate_option").each(function(){
                    if ($(this).attr("this_id") == cate_value) {
                        $(".cate_option").removeClass("select");
                        $(this).addClass("select");
                        return false;
                    }
                });
            }
        }
        setClass();
        function get_list(page) {
            //alert(1);
            //show_loading();
            $.post("<?php  echo $this->createMobileUrl('reservelist')?>", {ac: 'getDate', page: page}, function (data) {
                //alert(data);return false;
                //hide_loading();
                data = eval("(" + data + ")");
                if (data.result == 1) {
                    //alert(data.code);
                    $("#d_list").append(data.code);

                    if (data.total == 0) {
                        $("#no_list").show();
                    } else {
                        $("#no_list").hide();
                    }
                    if (data.isshow == 1) {
                        next_page = data.nindex;
                        $("#d_page").show();
                    } else {
                        $("#d_page").hide();
                    }
                }
            });
        }

        get_list(1);

        $("#d_more").click(function () {
            get_list(next_page);
        });

        $(".xuan").click(function () {
            $(".shai").toggle();
        });

        $(".nian").click(function () {
            $(".year_box").toggle();
            $(".lei_box").hide();
        });

        $(".lei").click(function () {
            $(".lei_box").toggle();
            $(".year_box").hide();
        });

        $(".year_option").click(function () {
            year_value = $(this).attr("this_id");
            //alert(year_value);
            if (year_value == 0) {
                var year_title = "年份";
            } else {
                var year_title = year_value+"年";
            }
            $(".nian_title").html(year_title);

            $(".year_option").removeClass("select");
            $(this).addClass("select");
            $(".year_box").hide();
        });

        $(".cate_option").click(function () {
            cate_value = $(this).attr("this_id");
            cate_name = $(this).html();

            if (cate_value == 0) {
                var cate_title = "分类";
            } else {
                var cate_title = cate_name;
            }
            $(".lei_title").html(cate_title);

            $(".cate_option").removeClass("select");
            $(this).addClass("select");
            $(".lei_box").hide();
        });

        $(".que").click(function () {
            $.post("<?php  echo $this->createMobileUrl('ajaxData')?>",{ac:'year', year_value:year_value, cate_value:cate_value, cate_name:cate_name},function(data){
                data  =eval("(" + data +")");
                if(data.result==1){
                    //location.href = data.url;
                    $("#d_list").empty();
                    get_list(1);
                }
            });
        });
        //$(".year_box").show();
    });
</script>
</html>
