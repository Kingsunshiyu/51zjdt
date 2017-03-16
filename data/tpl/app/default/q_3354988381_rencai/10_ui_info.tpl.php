<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1, user-scalable=0, user-scalable=no">
<title><?php  echo $_W['mobile']['share']['mobile_title'];?></title>
	<script src="<?php echo CURR_UI_DIR;?>jq/jquery-2.2.3.js"></script>
    <script src="<?php echo CURR_UI_DIR;?>jq/jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo CURR_UI_DIR;?>weui/style/weui.css"/>
    <link rel="stylesheet" href="<?php echo CURR_UI_DIR;?>weui/example.css"/>      
    <?php  echo register_jssdk()?>
</head>

<body ontouchstart>
<style type="text/css">
    body,html{height:100%;-webkit-tap-highlight-color:transparent}.page,body{background-color:#fbf9fe}.page{overflow-y:auto;-webkit-overflow-scrolling:touch}
</style>

<div class="weui_msg">
    <div class="weui_icon_area"><i class="<?php  echo $ui_info_arr['icon'];?>"></i></div>
    <div class="weui_text_area">
        <h2 class="weui_msg_title"><?php  echo $ui_info_arr['msg_title'];?></h2>
		<p class="weui_msg_desc"><?php  echo $ui_info_arr['msg_desc'];?></p>
    </div>

    <div class="weui_extra_area"><?php  echo $_W['page']['footer'];?></div>
</div>
<script src="<?php echo CURR_UI_DIR;?>weui/weui.js"></script>     
<?php  if($ui_info_arr['go_url']) { ?>
	<script>
    function go_location_url() {
        location.href = '<?php  echo $ui_info_arr['go_url'];?>';
    }
    $(function(){
        setTimeout(go_location_url, 1000 * 3);
    });
    </script>
<?php  } ?>  
<script type="text/javascript">
wx.ready(function(){
	wx.hideAllNonBaseMenuItem();
});
</script> 
</body>
</html>
