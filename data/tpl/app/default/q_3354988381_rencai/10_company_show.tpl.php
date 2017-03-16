<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .amtxt {margin: 5px 0 0 0}
</style>
<div class="am-g" style="margin:-2px 0 10px 0">
    <div class="col-xs-12" style="">
        <img class="am-radius" alt="<?php  echo $company['name'];?>（公司形象照待上传）" src="<?php  echo $this->get_rencai_pic($company['avatar']);?>" width="100%" height="180px"/>
    </div>

    <div  style="background-color:#FFF">
        <div class="am-tabs" data-am-tabs="{noSwipe: 1}">
            <div class="am-tabs-bd">
                <!-- 公司信息 -->
                <div class="am-tab-panel am-fade" id="tab2">
                    <h4>
                        <strong><?php  echo $company['name'];?></strong>
                        <?php  if($company['isauth'] == 0) { ?>
                        <span class="am-badge am-badge-default">未认证</span>
                        <?php  } else { ?>
                        <span class="am-badge am-badge-success">已认证</span>
                        <?php  } ?>
                    </h4>
                    <p class="am-text-default amtxt"><?php  echo $company['address'];?>&nbsp;&nbsp;<a href="<?php  echo $this->createMobileUrl('ShowCompanyMap', array('companyid' => $company['id']));?>">查看地图</a></p>
                    <p class="am-text-default amtxt">行业：&nbsp;&nbsp;<?php  echo $industry['name'];?></p>
                    <p class="am-text-default amtxt">性质：&nbsp;&nbsp;<?php  echo $config['companytype'][$company['type']];?></p>
                    <p class="am-text-default amtxt">规模：&nbsp;&nbsp;<?php  echo $config['scale'][$company['scale']];?></p>
                    <p class="am-text-default amtxt">所在城市：&nbsp;&nbsp;<?php  echo $company['province'];?><?php  echo $company['city'];?><?php  echo $company['district'];?></p>
                </div>
            </div>
        </div>
        <h4 style="margin: 15px 0 0 5px;">
            <span style="border-left: 4px #ff8000 solid;height: 25px;display: inline-block;vertical-align: middle;margin-right: 10px;float: left;"></span>
            公司简介
        </h4>
        <p style="margin-left: 5px"><?php  echo $company['description'];?></p>

        <h4 style="margin-left: 5px"><?php  echo $company['contact'];?></h4>
        <p style="margin-left: 5px">
            <font color="red"><?php  echo $company['mobile'];?></font>
            <a href="tel:<?php  echo $company['mobile'];?>"><img class="am-circle" src="../addons/q_3354988381_rencai/template/static/images/phone.jpg" width="18px" height="18px"></a>
        </p>

        <h4 style="margin-left: 5px;">
            <span style="border-left: 4px #ff8000 solid;height: 25px;display: inline-block;vertical-align: middle;margin-right: 10px;float: left;"></span>
            相关职位
        </h4>
        <div class="col-xs-12">
            <ul class="am-list" style="margin-left: 5px">
                <?php  if(is_array($other_jobs)) { foreach($other_jobs as $job) { ?>
                <li>
                    <a href="<?php  echo $this->createMobileUrl('JobShow', array('job_id' => $job['id']));?>">
                        <?php  echo $job['title'];?>
                        <span style="float: right;margin-right: 5px;color: red;font-weight: bold"><?php  echo $config['payroll'][$job['payroll']];?></span>
                    </a>
                </li>
                <?php  } } ?>
            </ul>
        </div>
    </div>
</div>
<script>
    wx.ready(function () {
        sharedata = {
            title: "<?php  echo $company['name'];?>",
            desc: "<?php  echo $company['description'];?>",
            link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('CompanyShow')?>",
            imgUrl: "<?php echo MODULE_URL;?>/template/static/images/share_img.jpg",
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