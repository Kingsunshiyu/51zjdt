<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paper',array('op'=>'list'));?>">试卷管理</a></li>
        <?php  if($op=='edit' && empty($item['id'])) { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('paper_type',array('op'=>'display'));?>">添加试卷</a></li>
        <!--<li class="active"><a href="<?php  echo $this->createWebUrl('paper',array('op'=>'edit'));?>">添加试卷</a></li>-->
        <?php  } ?>
        <?php  if($op=='editquestion' && !empty($item['id'])) { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('paper', array('op'=>'editquestion','id'=>$id));?>">编辑试题</a></li>
        <?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <input type="hidden" name="tid" value="<?php  echo $tid;?>">
        <!--<h5>试卷信息</h5>-->
        <div class="tab-content">
            <div class="tab-pane active" id="tab_basic">
                <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('paper_form_list', TEMPLATE_INCLUDEPATH)) : (include template('paper_form_list', TEMPLATE_INCLUDEPATH));?>
            </div>
        </div>
        <table class='tb' style="margin-top:10px;">
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn btn-primary span3" name="submit" value="提交排序">提交排序</button>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <script type="text/javascript">
        function drop_confirm(msg, url){
            if(confirm(msg)){
                window.location = url;
            }
        }

        $(function () {
            $('.del_question').click(function () {
                var id = $(this).attr('this_id');
                var msg = '您确定要将该题从此试卷删除吗?';
                var url = "<?php  echo $this->createWebUrl('question',array('op' => 'deleteFromPaper', 'paperid' => $id))?>" + "&id="+id;
                if(confirm(msg)){
                    window.location = url;
                }
            })

            $('#myTab a').click(function (e) {
                e.preventDefault();//阻止a链接的跳转行为
                $(this).tab('show');//显示当前选中的链接及关联的content
            })
        })
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>