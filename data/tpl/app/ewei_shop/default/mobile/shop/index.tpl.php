<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title><?php  echo $set['name'];?></title>
<style type="text/css">
    body {margin:0px; background:#eee; font-family:'微软雅黑'; -moz-appearance:none;}
    .top {overflow: hidden; position:relative;}
    .top .bgimg {height:auto; position:relative;}
    .top .bgimg img { width:100%; position: relative;}
    .top .list {position:absolute;right:10px;top:10px;height:35px; width:auto; line-height:50px; font-size:16px; text-align:right; color:#efefef; margin-right:10px;}
    .top .topbar {height:220px; width:100%; position:absolute; bottom:-30px; left:0px; z-index:2;}
    .top .topbar .logo {height:80px; width:80px; padding:4px; border:1px solid #fff; border-radius:45px; margin:auto;}
    .top .topbar .logo img {height:70px; width:70px; padding:4px; border:1px solid #fff; border-radius:70px; margin:auto;}
    .top .topbar .shop_name {height:30px; width:auto; background:rgba(0,0,0,0.1); padding:0px 15px; margin:10px auto; font-size:16px; color:#fff; line-height:30px; text-align:center; display:table; border-radius:15px;}
    .top .topbar .menu {height:45px; width:100%; background:rgba(0,0,0,0.3);}
    .top .topbar .menu .nav {height:40px; width:25%; padding-top:5px; float:left; text-align:center; font-size:12px; color:#fff;}
    .top .topbar .menu .navon {height:37px; border-bottom:3px solid #dd2322;}
    .top .topbar .menu .nav i {font-size:18px;}
    .search {height:40px; width:97%; margin:5px; background:#fff; color:#ccc; line-height:40px; font-size:14px; text-align:center;}



    .title {height:40px; width:94%; background:#fff; padding:0px 3%; font-size:16px; color:#666; line-height:40px;}
    .goods {height:auto; min-height:100px; width:100%; background:#fff; overflow:hidden;float:left;padding-bottom:40px;} 
    .goods .good {overflow:hidden; width:46%; padding:0px 2% 10px; float:left;}
    .goods .good .img {width:100%;overflow:hidden;}
    .goods .good .img img {width:100%;height:120px;}
    .goods .good .name {height:20px; width:100%; font-size:15px; line-height:20px; color:#666; overflow:hidden;}
    .goods .good .price {height:20px; width:100%; color:#f03; font-size:14px;}
    .goods .good .price span {color:#aaa; font-size:12px; text-decoration:line-through;}

    .copyright {height:40px; width:100%; text-align:center; line-height:30px; font-size:12px; color:#999; padding:10px 0 0; float: left;}
    /*.bottom_menu {height:50px; width:100%; background:#f90; position:fixed; bottom:0px; left:0px; z-index:1;}*/
 

    .banner {overflow:hidden;position:relative;height:auto;}
     .banner  .main_image{width:100%;position:relative;top:0;left:0;}
  .banner .main_image ul{} 
  .banner .main_image li{float:left;}
  .banner .main_image li img{display:block;width:100%; }
  .banner .main_image li a{display:block;width:100%;}

    div.flicking_con{position:absolute;bottom:10px;z-index:1;width:100%;height:12px;}
    div.flicking_con .inner { width:100%;height:9px;text-align:center;}
    div.flicking_con a{position:relative; width:10px;height:9px;background:url('../addons/ewei_shop/template/mobile/default/static/images/dot.png') 0 0 no-repeat;display:inline-block;text-indent:-1000px}
    div.flicking_con a.on{background-position:0 -9px}
    #index_loading { width:94%;padding:10px;color:#666;text-align: center;float:left;}
    
    .class1 {background:#fff; border-top:1px solid #eee; border-bottom:1px solid #eee;overflow:hidden;margin-bottom:10px;}
.class1 .class2 {height:85px; width:25%; float:left;}
.class1 .class2:active {background:#f7f7f7;}
.class1 .class2 .class3 {height:70px; width:80px; margin:auto;}
.class1 .class2 .class3 .ico {height:40px; width:40px; margin:10px 15px 10px 15px; line-height:40px; text-align:center; color:#fff; font-size:18px;}
.class1 .class2 .class3 .ico img { width:50px;height:50px;}
.class1 .class2 .class3 .text {height:20px; width:80px; font-size:12px; color:#999; text-align:center; line-height:20px;overflow:hidden;}

</style>
<div id='list_contanier'></div>
<div id='container'></div>
 

<script id='tpl_index' type='text/html'>

    <div class="top">
        <div class="bgimg"><img src="<%if set.img%><%set.img%><%else%>../addons/ewei_shop/template/mobile/default/static/images/bg.jpg<%/if%>"></div>
<!--        <div class="list" onclick="location.href='<?php  echo $this->createMobileUrl('shop/category')?>'"><i class="fa fa-list"></i> 分类</div>-->
        <div class="topbar">
            
            <div class="logo"><img src="<%if set.logo%><%set.logo%><%else%>../addons/ewei_shop/template/mobile/default/static/images/logo.png<%/if%>"></div>
            <div class="shop_name"><%set.name%></div>
            <div class="menu">
                <div class="nav navon"><i class="fa fa-home"></i><br>首页</div>
                <div class="nav"  data-op='all'><i class="fa fa-suitcase"></i><br>全部商品</div>
                <div class="nav"  data-op='discount'><i class="fa fa-tags"></i><br>促销商品</div>
                <div class="nav"  data-op='notice'><i class="fa fa-volume-up"></i><br>店铺公告</div>
            </div>
        </div>
    </div>

    <div class='search'><i class="fa fa-search"></i> 在店铺内搜索</div>
    <%if advs.length>0%>
    <div class="banner">

        <%if advs.length>1%>
        <div class="flicking_con"><div class="inner">
            <%each advs as value index %>
            <a class="<%if index==0%>on<%/if%>" href="#@"><%index%></a>
            <%/each%>
            </div>
        </div>
        <%/if%>
        <div class="main_image" id='banner'>
            <ul>
                <%each advs as adv %>
                <li <%if adv.link%>onclick="location.href='<%adv.link%>'"<%/if%>> <img src="<%adv.thumb%>"></li>
                <%/each%>
            </ul>
        </div>
    </div>
    <%/if%>
    
   
    <%if category.length>0%>
    <div class="title">推荐分类</div>
    <div class="class1">
        <%each category as value%>
        <a href="<%value.url%>">
            <div class="class2">
                <div class="class3">
                    <div class="ico ico1"><img src='<%value.thumb%>' /></div>
                    <div class="text"><%value.name%></div>
                </div>
            </div>
        </a>
       <%/each%>
    </div>
    <%/if%>
    
    <div class="title">推荐宝贝</div>
    <div class="goods">
        <div id='goods_container'></div>
    </div>
     
     <!--搜索-->
    <div class="search1"> 
                <div class="topbar1">
                    <div class='right'>
                        <button class="sub1"><i class="fa fa-search"></i></button>
                        <div class="home1">取消</div>
                    </div>
                    <div class='left_wrap'> 
                        <div class='left'>
                            <input type="text" id='keywords' class="input1" placeholder='搜索: 输入商品关键词'/>
                        </div>
                    </div>
                </div>
                <div id='search_container' class='result1'>
        </div>
        
</script>

<script id='tpl_goods_list' type='text/html'>

    <%each goods as g%>
    <div class="good" data-goodsid='<%g.id%>'>
        <div class='img'><img src="<%g.thumb%>"></div>
        <div class="name"><%g.title%></div>
        <div class="price">￥<%g.marketprice%> <%if g.productprice>0 && g.marketprice!=g.productprice%><span>￥<%g.productprice%></span><%/if%></div>
    </div>
    <%/each%>

</script>
 <script id='tpl_search_list' type='text/html'>
     <ul>
     <%each list as value%>
        <li><i class="fa fa-angle-right"></i> <a href="<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%value.id%>"><%value.title%></a></li>
        <%/each%>
    </ul> 
</script>
<script language='javascript'>
    var page = 1;
    var loaded = false;
    var stop = true;
    var scrolling = false;
    require(['core', 'tpl'], function (core, tpl) {
    
        core.json('shop/index', {}, function (json) {
            var result = json.result;
       
            $('#container').html(tpl('tpl_index', result));
          
            $('.nav').click(function () {
                $('.nav').removeClass('navon');
                $(this).addClass('navon');
                var op = $(this).data('op');
                if (op == 'all') {
                    location.href = core.getUrl('shop/list');
                } else if (op == 'discount') {
                    location.href = core.getUrl('shop/list', {isdiscount: 1});
                } else if (op == 'notice') {
                    location.href = core.getUrl('shop/notice');
                }
            });
        
            if (result.advs.length > 0) {
                
            //   $('.banner').height($('.main_image').find('img').height());
                
                require(['jquery','jquery.touchslider','swipe'], function ($) {
              
                    
                    new Swipe($('#banner')[0], {
			speed:300,
			auto:4000,
			callback: function(){
			  
                                 $(".flicking_con  .inner  a").removeClass("on").eq(this.index).addClass("on");
		}
	  }); 
       
                    
                
                })
            } 
            function getGoods(type) {

                core.json('shop/index', {'op': 'goods', page: page}, function (gjson) {
                    var result = gjson.result;
                    if (result.status == 0) {
                        core.message('服务器内部错误', core.getUrl('shop'), 'error');
                        return;
                    }
                    stop = true;
                    $('#index_loading').remove();
                    $('#goods_container').append(tpl('tpl_goods_list', result));
    $('.good img').each(function(){
                $(this).height($(this).width());
            })
                        $('.good').unbind('click').click(function(){
                            location.href = core.getUrl('shop/detail',{id:$(this).data('goodsid') });
                        })
                     
                    if (result.goods.length < result.pagesize && scrolling) {

                        $('#goods_container').append('<div id="index_loading">已经加载全部商品</div>');
                        loaded = true;
                        $(window).scroll = null;
                        return;
                    }
 
 

                    $(window).scroll(function () {

                        if (loaded) {
                            return;
                        }
                        totalheight = parseFloat($(window).height()) + parseFloat($(window).scrollTop());
                        if ($(document).height() <= totalheight) {
                            if (stop == true) {
                                stop = false;scrolling=true; 
                                $('#goods_container').append('<div id="index_loading"><i class="fa fa-spinner fa-spin"></i> 正在加载更多商品</div>');
                                page++;
                                getGoods('display');
                            }
                        }
                    });
                });
            }

                $('.search').click(function(){

                          $(".search1").animate({bottom:"0px"},100);
                          $('#keywords').unbind('keyup').keyup(function(){
                                   var keywords = $.trim( $(this).val());
                                   if(keywords==''){
                                       $('#search_container').html("");         
                                       return;
                                   }
                                   core.json('shop/util',{op:'search',keywords:keywords }, function (json) {
                                        var result = json.result;
                                        if(result.list.length>0){
                                           $('#search_container').html(tpl('tpl_search_list',result));    
                                        }
                                        else{
                                           $('#search_container').html("");         
                                        }

                                     }, true);
                           });
                           $('.search1 .sub1').unbind('click').click(function(){
                                   var keywords = $.trim( $('#keywords').val());
                                   var url = core.getUrl('shop/list',{keywords:keywords});
                                   location.href=  url;
                            });
                           $('.search1 .home1').unbind('click').click(function(){
                                $(".search1").animate({bottom:"-100%"},100);
                           });
                       });

       
            getGoods();

        }, true);
    });
</script>
<?php  $show_copyright=true;$show_footer=true;$footer_current ='first'?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>