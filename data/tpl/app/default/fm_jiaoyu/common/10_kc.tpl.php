<?php defined('IN_IA') or exit('Access Denied');?><!--正文导航-->
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta content="telephone=no" name="format-detection" /> 
        <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM">
        <style>
            body > a:first-child,body > a:first-child img{ width: 0px !important; height: 0px !important; overflow: hidden; position: absolute}
            body{padding-bottom: 0 !important;}
        </style>
        <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <title>找课程</title>
		<link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/weixin.css">
        <link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/reset.css">
        <script src="../addons/fm_jiaoyu/public/mobile/js/jquery.js"></script>
</head>
<body>

    <div id="wrap" class="teacher_inf">
        <dl id="main">
            <dd class="teacher_inf">
                <div class="teacher">
                    <div style=" background-image:url(<?php  echo tomedia($school['logo']);?>)"></div>
                </div>
                <ul>
                    <li><label>学&nbsp;&nbsp;&nbsp;&nbsp;校：</label><?php  echo $school['title'];?></li>
                    <li><label>学校类型：</label><?php  if(!empty($leixing[$school['typeid']])) { ?><?php  echo $leixing[$school['typeid']]['name'];?><?php  } ?></li>
                    <li><label>学校地址：</label><span><?php  echo $school['address'];?></span></li>
                </ul>               
                <div style="clear:both"></div>
            </dd>
            <dd class="teacher_count">
                <h3>课程列表</h3>
                <ul>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
                          <li class="<?php  if($item['end'] < TIMESTAMP) { ?>closed<?php  } ?>" onclick="chakan('<?php  echo $item['id'];?>');">
                                <h4><?php  echo $item['name'];?></h4><?php  if($item['is_hot'] == 1) { ?><p>精品课</p><?php  } ?>
                                <span> <?php  echo date('Y/m/d',$item['start'])?>-<?php  echo date('Y/m/d',$item['end'])?></span>
                                <span> <?php  if(!empty($category[$item['bj_id']])) { ?><?php  echo $category[$item['bj_id']]['sname'];?><?php  } ?></span>
                                <span> <?php  if(!empty($category[$item['km_id']])) { ?><?php  echo $category[$item['km_id']]['sname'];?><?php  } ?></span>
                                <!--通过hot、add和new分别设置热报、正在报名和新增 -->
								<?php  if($item['end']<TIMESTAMP) { ?>
								<div class="hot">
                                    <div style="font-size:12px;">已完</div>                                   
                                    <a href="<?php  echo $this->createMobileUrl('kcinfo', array('id' => $item['id'], 'schoolid' =>$schoolid), true)?>">查看详情</a>
                                </div>
								<?php  } else { ?>
                                <div class="add">
                                    <div style="font-size:12px;"><?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_kcbiao')." WHERE kcid = '".$item['id']."'")?>节</div>
                                    <span>剩余<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_kcbiao')." WHERE date>'".TIMESTAMP."' And kcid = '".$item['id']."'")?>节</span>
                                    <a href="<?php  echo $this->createMobileUrl('kcinfo', array('id' => $item['id'],'schoolid' =>$schoolid), true)?>">查看详情</a>
                                </div>
								<?php  } ?>
                           </li>
				<?php  } } ?>		   
                </ul>


            </dd>

        </dl>
    </div>
	   <?php  include $this->template('footer');?>  
    <script>
        $(document).ready(function(e) {
            $("#wrap").css("min-height", $(document).height())
        });
    </script>
	<script>

    function chakan(id) {

    window.location.href = "<?php  echo $this->createMobileUrl('kcinfo', array('schoolid' => $schoolid),true)?>" + "&id=" + id;

    }	
</script>	
</body>
</html>