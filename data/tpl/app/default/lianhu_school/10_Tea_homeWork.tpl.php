<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>作业发布-<?php  echo $_SESSION['school_name'];?></title>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('tea_common', TEMPLATE_INCLUDEPATH)) : (include template('tea_common', TEMPLATE_INCLUDEPATH));?>
    <link href="<?php echo MODULE_URL;?>style/css/line_css.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/mobile/style/style_nav.css">
</head>
<body>

<div class="top-wrap">
        <div class="fn-clear tr-box top bg_yellow" >
            <div class='text_center white'>作业发布</div>
        </div>
 </div> 
 
<div class='main' style="padding:10px 0 0 2%;padding-bottom: 60px;">
<form enctype="multipart/form-data" id="new_article" method="post" class="post-form" > 
<?php  if(is_array($result)) { foreach($result as $item) { ?>
     <div  class ='tea_class_line' >
			<input type='checkbox' style="padding-left:2%;" name='class_list[]' value='<?php  echo $item;?>'><?php  echo $this->result_result($item,$model,'name','msg');?>
      </div>
<?php  } } ?>
<div class='select_course'>
    <h1>选择课程：</h1>
    <select name='course_id'  style="border: 1px solid #999;">
        <?php  if(is_array($course_list)) { foreach($course_list as $row) { ?>
            <option value='<?php  echo $row['course_id'];?>'><?php  echo $row['course_name'];?></option>
        <?php  } } ?>
    </select>
</div>
    <div class='form-group in_text' >
        <textarea name="content" maxlength="1000" rows="5" placeholder="作业文字描述" style="border: 1px solid #999;" ></textarea>
        <div class='clear'></div>
      </div>
       <div class='form-group' style=''>
            <div id='img_list' style='margin-bottom:5px;'>
                <div class='clear'></div>
            </div>
            <div  class='hide' id='img_value'>
            </div>
             <div  class='hide' id='voice_value'>
            </div>           
            <div class='clear'></div>
         </div>
        <div class='form-group'>
             <div class="button button-primary button-rounded button-small" style='margin-bottom:5px;margin-left:10px;' id="chooseImage">选择照片</div>
             <div id='uploadImg' style='margin-bottom:5px;margin-left:10px;display:inline;'></div>
         </div>
        <div class='form-group'>
             <div class="button button-primary button-rounded button-small" style='margin-bottom:5px;margin-left:10px;' onclick='chooseVoice()'>开始录音</div>
             <div id='uploadVoice' style='margin-bottom:5px;margin-left:10px;display:inline;' ></div>
         </div>         
         <div class="article_sub" style='margin-bottom:20px;border-top:0px;width:80%;margin:auto; background:#009ffb;border-radius:8px; height:40px; border:none;' >
                <button type="submit" class="button button-action  button-rounded button-small " style="color:#fff; border:none; line-height:40px;">马上发布</button>
         </div>
    </form>
    <div class='voice_display' id='voice_display'>
        <div class='micro_voice_ico' ><i class="fa fa-microphone"></i><br>录音中...</div>
        <div id='voice_stop' class='button button-highlight button-rounded button-small'>停止录音</div>
     </div>
</div>
<script>
 var images = {
    localId: [],
    serverId: []
  };
  // 3 智能接口
  var voice = {
    localId: '',
    serverId: ''
  };
  document.querySelector('#chooseImage').onclick = function () {
    images.localId='';
    $('#img_list').html('');
    wx.chooseImage({
      success: function (res) {
        images.localId = res.localIds;
        $.each(images.localId,function(i,e){
            insertImg(e);
        });
          $("#uploadImg").html("上传");
          uploadImg();
      }
    });
  };
 function chooseVoice () {
    wx.startRecord({
      cancel: function () {
          alert('您拒绝授权录音');
      }
    });
    $("#voice_display").show();
  }
  //停止录音
   document.querySelector('#voice_stop').onclick = function () {
    wx.stopRecord({
      success: function (res) {
        voice.localId = res.localId;
        $("#voice_display").hide();
        uploadVoice();
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
  } 
 //上传录音
 function uploadVoice() {
    if (voice.localId == '') {
      return;
    }
    wx.uploadVoice({
      localId: voice.localId,
      success: function (res) {
        $("#uploadVoice").html("上传录音成功");
        insertVoiceValue(res.serverId);
        voice.serverId = res.serverId;
      }
    });
  };
function uploadImg(){
      $("#img_value").html('');
     if (images.localId.length == 0) {
        alert('请先选择图片');
        return;
    }
    var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
          i++;
          images.serverId.push(res.serverId);
          insertValue(res.serverId);
          if (i < length) {
             upload();
          }else{
              $("#uploadImg").html("上传成功");
          }
        },
        fail: function (res) {
           alert(JSON.stringify(res));
        }
      });
    }
    upload();     
  }
function insertImg(img_src){
    $('#img_list').prepend("<div style='background-size:cover; background-image:url("+img_src+");width:23%; height:100px;float:left;margin-left:2%;overflow: hidden; margin-bottom:5px;'></div>");
}
function insertValue(value){
    $("#img_value").prepend("<input type='hidden' name='img_value[]' value='"+value+"' >");
}
function insertVoiceValue(value){
    $("#voice_value").html("<input type='hidden' name='voice_value' value='"+value+"' >");
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jsweixin', TEMPLATE_INCLUDEPATH)) : (include template('jsweixin', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer_tea', TEMPLATE_INCLUDEPATH)) : (include template('footer_tea', TEMPLATE_INCLUDEPATH));?>