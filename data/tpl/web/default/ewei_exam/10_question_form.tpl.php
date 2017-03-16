<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>


<div class="main">
    <ul class="nav nav-tabs">
        <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('question',array('op'=>'list'));?>">试题管理</a></li>
        <li <?php  if($op=='edit' && empty($item['id'])) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('question',array('op'=>'edit'));?>">添加试题</a></li>
        <?php  if($op=='edit' && !empty($item['id'])) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('question', array('op'=>'edit','id'=>$id));?>">编辑试题</a></li><?php  } ?>
        <li><a href='<?php  echo $this->createWebUrl('upload_question',array('poolid'=>$item['id']))?>'>导入试题</a></li>
    </ul>

    <form action="" class="form-horizontal form" id="data_from" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                试题编辑
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">难度</label>
                    <div class="col-sm-9 col-xs-12">
                        <select class='form-control' id='level' name='level'>
                            <option value ="1" <?php  if($item['level'] == 1 || $item['level'] == 0) { ?>selected="selected"<?php  } ?>>1</option>
                            <option value ="2" <?php  if($item['level'] == 2) { ?>selected="selected"<?php  } ?>>2</option>
                            <option value ="3" <?php  if($item['level'] == 3) { ?>selected="selected"<?php  } ?>>3</option>
                            <option value ="4" <?php  if($item['level'] == 4) { ?>selected="selected"<?php  } ?>>4</option>
                            <option value ="5" <?php  if($item['level'] == 5) { ?>selected="selected"<?php  } ?>>5</option>
                            <option value ="6" <?php  if($item['level'] == 6) { ?>selected="selected"<?php  } ?>>6</option>
                            <option value ="7" <?php  if($item['level'] == 7) { ?>selected="selected"<?php  } ?>>7</option>
                            <option value ="8" <?php  if($item['level'] == 8) { ?>selected="selected"<?php  } ?>>8</option>
                            <option value ="9" <?php  if($item['level'] == 9) { ?>selected="selected"<?php  } ?>>9</option>
                            <option value ="10" <?php  if($item['level'] == 10) { ?>selected="selected"<?php  } ?>>10</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属题库</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class='input-group'>
                            <input type="text" name="pool" maxlength="30" value="<?php  echo $pool['title'];?>" id="pool" class="form-control" readonly />
                            <input type='hidden' id='poolid' name='poolid' value="<?php  echo $pool['id'];?>" />
                            <span class='input-group-btn'>
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus1').modal();">选择</button>
                                <button class="btn btn-default" type="button" onclick="clear_pool()">清除</button>
                            </span>
                        </div>
                        <div id="modal-module-menus1" class="modal fade ">
                            <div class='modal-dialog'>
                                <div class='modal-content' style='width:920px;'>
                                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择试卷</h3></div>
                                    <div class="modal-body">
                                        <div class='input-group'>
                                            <input type="text" class="form-control" name="keyword" value="" id="search-kwd1" />
                                            <span class='input-group-btn'>
                                                <button type="button" class="btn btn-default" onclick="search_pools();">搜索</button>
                                            </span>
                                        </div>
                                        <div id="module-menus1"></div>
                                    </div>
                                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php  if($paper['id'] != '') { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属试卷</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="paper" maxlength="30" value="<?php  echo $paper['title'];?>" id="paper" class="form-control" readonly />
                        <input type='hidden' id='paperid' name='paperid' value="<?php  echo $paper['id'];?>" />
                        <span class="help-block">
                            <span id="page_score" style="color:red;<?php  if($paper['id'] == '') { ?>display: none;<?php  } ?>"><?php  echo $pager_str;?></span>
                        </span>
                    </div>
                </div>
                <?php  } ?>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题目类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <select class='form-control' id='qtype' name='type'>
                            <option value=''>--请选择题目类型--</option>
                            <?php  if(is_array($types_config)) { foreach($types_config as $key => $value) { ?>
                            <option id="option_<?php  echo $key;?>" class="option_class" value ="<?php  echo $key;?>" <?php  if($item['type'] == $key) { ?>selected="selected"<?php  } ?>><?php  echo $value;?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题目问题</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea style="height:100px;" id="question" name="question" class="form-control" cols="60"><?php  echo $item['question'];?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题目图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb',$item['thumb']);?>
                    </div>
                </div>

                <div class="form-group"  id="answer_isimg" style="display: none;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">答案类型</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class="radio-inline"><input type="radio" name="isimg" onclick="changeTo('text')" id='isimg' value="0" <?php  if($item['isimg'] == 0) { ?> checked="true" <?php  } ?>>文本</label>&nbsp;&nbsp;
                        <label class="radio-inline"><input type="radio" name="isimg" onclick="changeTo('image')" value="1" <?php  if($item['isimg'] == 1) { ?> checked="true" <?php  } ?>>文本+图片</label>&nbsp;&nbsp;
                    </div>
                </div>

                <div class="form-group item"  id="item_1"  style='<?php  if($item['type']!=1) { ?>display:none<?php  } ?>' >
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"> <!-- 判断题 --></label>
                <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline">
                        <input type="radio" name="answer1" class='answer1' value="1" <?php  if($item['answer']==1) { ?>checked<?php  } ?> />正确
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="answer1" class='answer1'  value="2" <?php  if($item['answer']==2) { ?>checked<?php  } ?>/>错误
                    </label>
                </div>
            </div>

            <div class="form-group item"  id="item_2"  style='<?php  if($item['type']!=2) { ?>display:none<?php  } ?>' >
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> <!--单选题--></label>
            <div class="col-sm-9 col-xs-12">
                <table class='table'>
                    <?php  if(is_array($answer_array)) { foreach($answer_array as $key => $value) { ?>
                    <tr>
                        <td style='width:50px;' valign='top'>
                            <label class="radio-inline">
                                <input type="radio" name="answer2" class="answer2" value="<?php  echo $value;?>" <?php  if($item['answer'] == "$value") { ?>checked<?php  } ?> /><?php  echo $value;?></label>
                        </td>
                        <td>
                            <input type='text' class='form-control items2' name='items2[]' value="<?php  echo $item['items'][$key];?>"  need="<?php  if($key < 4) { ?>true<?php  } else { ?>false<?php  } ?>"/>
                            <div class="item-image" <?php  if($item['isimg'] == 0) { ?>style="display:none;"<?php  } ?>>
                            <?php  echo tpl_form_field_image("img_items2_" . $key, $item['img_items'][$key]);?>
            </div>
            </td>
            <td></td>
            </tr>
            <?php  } } ?>
            </table>
        </div>
</div>

<div class="form-group item" id="item_3" style='<?php  if($item['type']!=3) { ?>display:none<?php  } ?>'>
<label class="col-xs-12 col-sm-3 col-md-2 control-label"><!--多选题--></label>
<div class="col-sm-9 col-xs-12">
    <table class='table'>
        <?php  if(is_array($answer_array)) { foreach($answer_array as $key => $value) { ?>
        <tr>
            <td style='width:50px;' valign='top'> <label class="checkbox-inline"><input type="checkbox" name="answer3[]" class="answer3"  value="<?php  echo $value;?>" <?php  if(stripos($item['answer'], "$value") > -1) { ?>checked<?php  } ?> /><?php  echo $value;?></label> </td>
            <td><input type='text' class='form-control items3' name='items3[]' value="<?php  echo $item['items'][$key];?>" need="<?php  if($key < 4) { ?>true<?php  } else { ?>false<?php  } ?>"/>
                <div class="item-image" <?php  if($item['isimg'] == 0) { ?>style="display:none;"<?php  } ?>>
                <?php  echo tpl_form_field_image("img_items3_" . $key, $item['img_items'][$key]);?>
                <br>
</div>
</td>
</tr>
<?php  } } ?>
</table>
</div>
</div>

<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label">讲解</label>
    <div class="col-sm-9 col-xs-12">
        <textarea style="height:100px;" id="explain" name="explain" class="form-control" cols="60"><?php  echo $item['explain'];?></textarea>
    </div>
</div>

</div>
</div>

<div class="form-group col-sm-12">
    <button type="button" class="btn btn-primary span3" name="submitsave" onclick="submit_next(0)" value="提交">提交</button>
    <?php  if($id == '') { ?>
    <button type="button" class="btn btn-primary span3" name="submitnext" onclick="submit_next(1)" value="提交并添加下一题">提交并添加下一题</button>
    <?php  } ?>
    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
    <input type="hidden" name="is_next" id="is_next" value="0" />
    <input type="hidden" name="old_type" id="old_type" value="<?php  echo $item['type'];?>" />
    <input type="hidden" name="referer" id="referer" value="<?php  echo $referer;?>" />
</div>

</form>
</div>

<script type="text/javascript">

    function changeTo(t){
        if(t=='image'){
            $(".item-image").show();
        }
        else{
            $(".item-image").hide();
        }
    }

    $(function(){
        $("#qtype").change(function(){
            var type = $(this).val();
            $(".item").hide();
            if(type!=''){
                $("#item_" + type).show();
            }
            if (type > 1) {
                $("#answer_isimg").show();
            } else {
                $("#answer_isimg").hide();
            }
        });
    });

    function submit_next(n){
        $("#is_next").val(n);
        $("#data_from").submit();
    }


    function clear_pool(){
        $("#poolid").val("");
        $("#pool").val("");
    }

    function search_pools() {
        $("#module-menus1").html("正在搜索....");
        $.post('<?php  echo $this->createWebUrl('pool',array('op'=>'query'));?>', {
            keyword: $.trim($('#search-kwd1').val())
        }, function(dat){
            $('#module-menus1').html(dat);
        });
    }

    function select_pool(o) {
        $("#poolid").val(o.id);
        $("#pool").val( o.title );
        $(".close").click();
    }

    function item_check() {
        var isimg = $('input:radio[name="isimg"]:checked').val();
        var type = $("#qtype").val();
        var flag = 1;
        if ($("#paperid").val() > 0 && ($("#old_type").val() != type)) {
            $.ajax({
                type: "POST",
                url: "<?php  echo $this->createWebUrl('question',array('op'=>'checkaddquestion'))?>",
                data: {type: type, paperid: $("#paperid").val()},
                async: false,
                dataType: "json",
                success: function (data) {
                    if (data.result != 1) {
                        flag = 0;
                        alert(data.msg);
                    }
                }
            });
        }

        if (flag == 0) {
            return false;
        }

        if (type == '1') {
            var checked = false;
            $(".answer1").each(function () {
                if ($(this).get(0).checked) {
                    checked = true;
                    return false;
                }
            });
            if (!checked) {
                Tip.focus(".answer1:eq(0)", "请选择正确答案!", "top");
                return false;
            }
        } else if (type == 2) {
            if (isimg == 0) {
                var ok = true;
                $(".items2").each(function () {
                    if ($(this).val() == '' && $(this).attr("need")=="true") {
                        Tip.focus($(this), "请填写选项!", "right");
                        ok = false;
                        return false;
                    }
                });
                if (!ok) {
                    return false;
                }
            }

            var checked = false;
            $(".answer2").each(function () {
                if ($(this).get(0).checked) {
                    checked = true;
                    return false;
                }
            });
            if (!checked) {
                Tip.focus(".answer2:eq(0)", "请选择一个答案!", "top");
                return false;
            }
        } else if (type == '3') {
            if (isimg == 0) {
                var ok = true;
                $(".items3").each(function () {
                    if ($(this).val() == '' && $(this).attr("need")=="true") {
                        Tip.focus($(this), "请填写选项!", "right");
                        ok = false;
                        return false;
                    }
                });
                if (!ok) {
                    return false;
                }
            }

            var checked = false;
            $(".answer3").each(function () {
                if ($(this).get(0).checked) {
                    checked = true;
                    return false;
                }
            });
            if (!checked) {
                Tip.focus(".answer3:eq(0)", "至少选择一个答案!", "top");
                return false;
            }
        }
        else if (type == '4') {
            var patrn = /(\[([\s\S]*?)\])/ig;
            if (!patrn.test($("#question").val())) {
                Tip.focus("question", "未找到填空数据，填空请用[]中括号括起来!", "right");
                return false;
            }
        }
        else if (type == 5) {
            if ($("#answer5").val() == '') {
                Tip.focus("answer5", "请填写标准答案!", "right");
                return false;
            }
        }

    }

    function formcheck(){
        if ($("#qtype").val().trim() == '') {
            Tip.focus("qtype", "请选择题目类型!", "right");
            return false;
        }
        if ($("#question").val().trim() == '') {
            Tip.focus("question", "请填写题目问题!", "right");
            return false;
        }
        return item_check();
    }

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
