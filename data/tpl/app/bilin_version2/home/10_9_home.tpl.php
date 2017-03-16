<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?> 
<body>
<div id="indexWrapper">
  <div id="IndexBGSlider" class="flexslider-bgslider">
    <ul class="slides">
      <?php  $site_slide_search = modulefunc('site', 'site_slide_search', array (
  'module' => '',
  'func' => 'site_slide_search',
  'return' => '',
  'item' => 'row',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 10,
  'acid' => 0,
)); if(is_array($site_slide_search)) { $i=0; foreach($site_slide_search as $i => $row) { $i++; $row['iteration'] = $i; ?>
      <li><img src="<?php  echo $row['thumb'];?>"></li>
      <?php  } } ?>
    </ul></div>
  <div id="BigHeadline">
    <h1><img src="<?php  echo $_W['styles']['indexbgimg'];?>"></h1>
  </div>
  <div id="MainNavHome">
    <div class="flexslider-nav">
      <ul class="slides">
        <li> <?php  $site_navs = modulefunc('site', 'site_navs', array (
  'func' => 'site_navs',
  'item' => 'nav',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 10,
  'acid' => 0,
)); if(is_array($site_navs)) { $i=0; foreach($site_navs as $i => $nav) { $i++; $nav['iteration'] = $i; ?> <a href="<?php  echo $nav['url'];?>"><?php  echo $nav['name'];?></a> <?php  } } ?> </li>
      </ul>
    </div>
  </div>
</div>

  <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?> 
</body>
</html>
    