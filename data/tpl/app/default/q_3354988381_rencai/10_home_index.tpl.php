<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>





<?php  if($big_ad_lists) { ?>

<!-- 幻灯片大 -->

<div data-am-widget="slider" class="am-slider am-slider-c2" data-am-slider='{directionNav:true}'>

    <ul class="am-slides">

        <?php  if(is_array($big_ad_lists)) { foreach($big_ad_lists as $bigad) { ?>

        <li>

            <a href="<?php echo $bigad['link'] != '' ? $this->createMobileUrl('AdGo', array('aid' => $bigad['id'])) : 'javascript:;';?>">

                <img src="<?php  echo $this->get_rencai_pic($bigad['url']);?>">

                <?php  if($bigad['name']) { ?><div class="am-slider-desc"><?php  echo $bigad['name'];?></div><?php  } ?>

            </a>

        </li>

        <?php  } } ?>

    </ul>

    <ol class="am-control-nav am-control-paging">

        <?php  if(is_array($big_ad_lists)) { foreach($big_ad_lists as $k => $v) { ?>

        <li><a class=""><?php  echo $k;?></a><i></i></li>

        <?php  } } ?>

    </ol>

</div>

<?php  } ?>





<?php  if($small_ad_lists) { ?>

<!-- 幻灯片小 -->

<div class="am-slider am-slider-default am-slider-carousel" data-am-flexslider="{controlNav:false, itemWidth:160, itemMargin: 5}" style="margin-bottom:5px">

    <ul class="am-slides" style="padding: 10px 0">

        <?php  if(is_array($small_ad_lists)) { foreach($small_ad_lists as $smallad) { ?>

        <li><a href="<?php echo $smallad['link'] != '' ? $this->createMobileUrl('AdGo', array('aid' => $smallad['id'])) : 'javascript:;';?>"><img style="height:55px" src="<?php  echo $this->get_rencai_pic($smallad['url']);?>"></a></li>

        <?php  } } ?>

    </ul>

</div>

<?php  } ?>



<?php  if($isopenindextop && $top_lists) { ?>

<!-- 置顶 -->

<div class="am-btn am-btn-block am-btn-primary  am-text-left am-icon-rss-square">&nbsp;&nbsp;置顶职位</div>

<?php  if(false) { ?>

<div class="am-panel am-panel-default" style="margin-bottom:2px">

    <div class="am-panel-bd am-icon-arrow-up" style="font-size: 1.8rem;padding: 1rem;font-weight: bold">置顶职位</div>

</div>

<?php  } ?>

<div data-am-widget="list_news" class="am-list-news am-list-news-default" style="margin: 0">

    <ul class="am-list" style="margin-bottom: 0.6rem">

        <?php  if(is_array($top_lists)) { foreach($top_lists as $job) { ?>

        <li class="am-g am-list-item-desced" onclick="location.href='<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']));?>';" style="padding-left: 1rem">

            <a class="am-list-item-hd ">

                <img src="../addons/q_3354988381_rencai/template/static/images/top.gif">&nbsp;<?php  echo $job['title'];?>&nbsp;<font color="red"><?php  echo $config['payroll'][$job['payroll']];?></font>

            </a>

            <div class="am-list-item-text" style="font-size: 1.4rem">

                <?php  echo $top_companys[$job['mid']]['name'];?>

                <?php  if($top_companys[$job['mid']]['isauth'] == 0) { ?>

                <span class="am-badge am-badge-default">未认证</span>

                <?php  } else { ?>

                <span class="am-badge am-badge-success">已认证</span>

                <?php  } ?>

            </div>

            <div class="am-list-item-text" style="max-height: 5.6rem">

                <?php  if(is_array($job['welfare'])) { foreach($job['welfare'] as $key => $welfare) { ?>

                <span type="button" class="am-btn am-btn-default am-btn-xs am-radius" style="background-color: #FFF;padding: 0.4rem;margin: 2px"><?php  echo $config['welfare'][$welfare];?></span>

                <?php  } } ?>

            </div>

        </li>

        <?php  } } ?>

    </ul>

</div>

<?php  } ?>







<?php  if($isopenindexhot && $hot_jobs) { ?>

<!-- 热门职位 -->

<div class="am-btn am-btn-block am-btn-warning am-text-left am-icon-rss-square">&nbsp;&nbsp;热门职位 </div>

<?php  if(false) { ?>

<div class="am-panel am-panel-default" style="margin-bottom:2px;">

    <div class="am-panel-bd am-icon-fire" style="font-size: 1.8rem;padding: 1rem;font-weight: bold">热门职位推荐</div>

</div>

<?php  } ?>

<div data-am-widget="list_news" class="am-list-news am-list-news-default" style="margin: 0">

    <ul class="am-list" style="margin-bottom:0.4rem">

        <?php  if(is_array($hot_jobs)) { foreach($hot_jobs as $job) { ?>

        <li class="am-g am-list-item-desced" onclick="location.href='<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']));?>';" style="padding-left: 1rem">

            <a class="am-list-item-hd ">

                <img src="../addons/q_3354988381_rencai/template/static/images/hot.gif">&nbsp;<?php  echo $job['title'];?>&nbsp;<font color="red"><?php  echo $config['payroll'][$job['payroll']];?></font>

            </a>

            <div class="am-list-item-text" style="font-size: 1.4rem">

                <?php  echo $hot_companys[$job['mid']]['name'];?>

                <?php  if($hot_companys[$job['mid']]['isauth'] == 0) { ?>

                <span class="am-badge am-badge-default">未认证</span>

                <?php  } else { ?>

                <span class="am-badge am-badge-success">已认证</span>

                <?php  } ?>

            </div>           

            <div class="am-list-item-text">

                <?php  if(is_array($job['welfare'])) { foreach($job['welfare'] as $key => $welfare) { ?>

                <span type="button" class="am-btn am-btn-default am-btn-xs am-radius" style="background-color: #FFF;padding: 0.4rem"><?php  echo $config['welfare'][$welfare];?></span>

                <?php  } } ?>

            </div>

        </li>

        <?php  } } ?>

    </ul>

</div>

<?php  } ?>



<?php  if($last_jobs) { ?>

<!-- 最新招聘职位 -->

<div class="am-btn am-btn-block am-btn-danger am-text-left am-icon-rss-square">&nbsp;&nbsp;最新职位</div>

<?php  if(false) { ?>

<div class="am-panel am-panel-default" style="margin-bottom:2px">

    <div class="am-panel-bd am-icon-rss" style="font-size: 1.8rem;padding: 1rem;font-weight: bold">最新招聘职位</div>

</div>

<?php  } ?>

<div data-am-widget="list_news" class="am-list-news am-list-news-default" style="margin: 0">

    <ul class="am-list">

        <?php  if(is_array($last_jobs)) { foreach($last_jobs as $job) { ?>

        <li class="am-g am-list-item-desced" onclick="location.href='<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']));?>';" style="padding-left: 1rem">

            <a class="am-list-item-hd ">

                <img src="../addons/q_3354988381_rencai/template/static/images/new.gif">&nbsp;<?php  echo $job['title'];?>&nbsp;<font color="red"><?php  echo $config['payroll'][$job['payroll']];?></font>

            </a>

            <div class="am-list-item-text" style="font-size: 1.4rem">

                <?php  echo $last_companys[$job['mid']]['name'];?>

                <?php  if($last_companys[$job['mid']]['isauth'] == 0) { ?>

                <span class="am-badge am-badge-default">未认证</span>

                <?php  } else { ?>

                <span class="am-badge am-badge-success">已认证</span>

                <?php  } ?>

            </div>             

            <div class="am-list-item-text" style="max-height: 5.6rem">

                <?php  if(is_array($job['welfare'])) { foreach($job['welfare'] as $key => $welfare) { ?>

                <span type="button" class="am-btn am-btn-default am-btn-xs am-radius" style="background-color: #FFF;padding: 0.4rem;margin: 2px"><?php  echo $config['welfare'][$welfare];?></span>

                <?php  } } ?>

            </div>

        </li>

        <?php  } } ?>

    </ul>

</div>

<?php  } ?>



<?php  if($companys_positions) { ?>

<?php 

if ($getFieldsSaveValArr[$sh_field_name]['show']) {

    if ($getFieldsSaveValArr[$sh_field_name]['user_label']) {

       echo '<div class="am-btn am-btn-block am-btn-success am-text-left">&nbsp;&nbsp;';

       echo $getFieldsSaveValArr[$sh_field_name]['user_label'];

   } else {

       list($sh_field_name, $rmk) = explode('|', $allFieldsArr['sys'][$sh_field_name]);

       echo '<div class="am-btn am-btn-block am-btn-success am-text-left am-icon-hdd-o">&nbsp;&nbsp;';

       echo $sh_field_name;

   }

   echo '</div>';

}

?>



<?php  if(false) { ?>

<div class="am-panel am-panel-default" style="margin-bottom:2px;margin-top:-15px">

    <div class="am-panel-bd am-icon-thumbs-o-up" style="font-size: 1.8rem;padding: 1rem;font-weight: bold">名企推荐</div>

</div>

<?php  } ?>

<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-gallery-default" data-am-gallery="{ pureview: true }" style="margin-top: 0.4rem;background-color:#FFF">

    <?php  if(is_array($companys_positions)) { foreach($companys_positions as $p) { ?>

    <li>

        <div class="am-gallery-item">

            <a href="<?php  echo $this->createMobileUrl('CompanyShow', array('companyid' => $p['id']));?>"  style="display: block;position: relative">

                <div style="width: 100%;height: 100%;position: absolute;z-index: 1"></div>

                <?php  if($p['logo']) { ?>

                <img src="<?php  echo $atturl;?><?php  echo $p['logo'];?>" alt="<?php  echo $p['name'];?>" style="width: 160px; height: 120px"/>

                <?php  } else { ?>

                <div style="width: 160px; height: 120px;background-color: #d1d1d1;font-size:1.2rem "><?php  echo $p['name'];?></div>

                <?php  } ?>

                <h3 class="am-gallery-title"><?php  echo $p['name'];?></h3>

            </a>

        </div>

    </li>

    <?php  } } ?>

</ul>

<?php  } ?>

<script>

    wx.ready(function () {

        sharedata = {

            title: "<?php  echo $_W['mobile']['share']['index_title'];?>",

            desc: "<?php  echo $_W['mobile']['share']['index_desc'];?>",

            link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('Index')?>",

            imgUrl: "<?php  echo $this->get_rencai_pic($_W['mobile']['share']['index_pic']);?>",

            success: function(){

            },

            cancel: function(){

            }

        };

        wx.onMenuShareAppMessage(sharedata);

        wx.onMenuShareTimeline(sharedata);

    });

</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>