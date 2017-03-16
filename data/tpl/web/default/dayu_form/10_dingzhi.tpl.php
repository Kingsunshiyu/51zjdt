<?php defined('IN_IA') or exit('Access Denied');?>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">感谢小烨</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="xiaoye" <?php  if($activity['skins'] == 'xiaoye') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">感谢网程</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="wangcheng" <?php  if($activity['skins'] == 'wangcheng') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">感谢淡然</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="d_danran" <?php  if($activity['skins'] == 'd_danran') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">感谢赛亚人</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="d_saiyaren" <?php  if($activity['skins'] == 'd_saiyaren') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <?php  if($_W['isfounder']) { ?>
  <div class="col-xs-2 col-md-2 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;" title="联系作者QQ：18898859">
      <a target="_blank" href="#">
      <div style="height:100px;overflow:hidden;padding-top:20px">
        <span style="padding:10px;font-size:30pt;border:1px dotted gray">
          <span class="glyphicon glyphicon-plus"></span>
        </span>
      </div>
      </a>
      <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">
        定制模板100元/个
      </span>
      <label>
        本信息仅超级管理员可见
      </label>
    </div>
  </div>
  <?php  } ?>