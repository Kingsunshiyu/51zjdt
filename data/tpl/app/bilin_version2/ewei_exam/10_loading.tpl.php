<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .loading_mask {position:fixed;;top:0;background:#000; width:100%;height:120%;opacity: 0.3;filter:alpha(opacity=0.3); visibility: hidden;}
    .loading_gif { position:fixed;;top:50%;left:40%;width:100px;height:100px; visibility: hidden;}
</style>
<div class="loading_mask"></div>
<div class="loading_gif"><img src="../addons/ewei_exam/images/loading2.gif" /></div>
<script language="javascript">
        function showloading(){
            $(".loading_mask").css("visibility","visible");
            $(".loading_gif").css("visibility","visible");
        }
        function hideloading(){
            $(".loading_mask").css("visibility","hidden");
            $(".loading_gif").css("visibility","hidden");
        }
</script>