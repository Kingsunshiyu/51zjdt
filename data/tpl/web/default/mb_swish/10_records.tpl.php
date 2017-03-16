<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('records');?>">用户祝福列表</a></li>
</ul>
<div class="main">
    <div class="panel panel-default">
        <audio id="player"></audio>
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <tr>
                    <th style="width:250px">OPENID</th>
                    <th style="width:250px">祝福</th>
                    <th>创建时间</th>
                </tr>
                <?php  if(is_array($ds)) { foreach($ds as $row) { ?>
                <tr>
                    <td><?php  echo $row['openid'];?></td>
                    <td>
                        <?php  if(is_array($row['wish'])) { ?>
                        <a class="btn btn-default btn-play" data-src="<?php  echo $row['wish']['url'];?>" href="javascript:;"><i class="fa fa-play"></i></a>
                        <?php  } else { ?>
                            <?php  if($row['wish'] == 'voice-0') { ?>
                            <a class="btn btn-default btn-play" data-src="<?php echo RESOURCE_URL;?>/static/media/dongbei.mp3" href="javascript:;"><i class="fa fa-play"></i></a>
                            预设东北方言
                            <?php  } ?>
                            <?php  if($row['wish'] == 'voice-1') { ?>
                            <a class="btn btn-default btn-play" data-src="<?php echo RESOURCE_URL;?>/static/media/sichuan.mp3" href="javascript:;"><i class="fa fa-play"></i></a>
                            预设四川方言
                            <?php  } ?>
                            <?php  if($row['wish'] == 'voice-3') { ?>
                            <a class="btn btn-default btn-play" data-src="<?php echo RESOURCE_URL;?>/static/media/wuhan.mp3" href="javascript:;"><i class="fa fa-play"></i></a>
                            预设武汉方言
                            <?php  } ?>
                            <?php  if($row['wish'] == 'voice-4') { ?>
                            <a class="btn btn-default btn-play" data-src="<?php echo RESOURCE_URL;?>/static/media/yueyu.mp3" href="javascript:;"><i class="fa fa-play"></i></a>
                            预设粤语
                            <?php  } ?>
                            <?php  if($row['wish'] == 'voice-2') { ?>
                            <a class="btn btn-default btn-play" data-src="<?php echo RESOURCE_URL;?>/static/media/taiwan.mp3" href="javascript:;"><i class="fa fa-play"></i></a>
                            预设台湾腔
                            <?php  } ?>
                        <?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i', $row['timecreated']);?></td>
                </tr>
                <?php  } } ?>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    <script>
        require(['jquery'], function($) {
            $('.btn-play').on('click', function() {
                var src = $(this).attr('data-src');
                $('#player').attr('src', src);
                $('#player')[0].play();
            });
        });
    </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
