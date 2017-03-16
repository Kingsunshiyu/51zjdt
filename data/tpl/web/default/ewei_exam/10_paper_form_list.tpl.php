<?php defined('IN_IA') or exit('Access Denied');?><div class="panel panel-default">
	<div class="panel-heading">编辑试题</div>
  	<div class="panel-body">
		<div class="form-group">
         	<label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷标题</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  echo $item['title'];?>
			</div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷年份</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  echo $item['year'];?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷分制</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  echo $type_item['score'];?>分
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">试卷时间</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  echo $type_item['times'];?>分钟
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">当前题数</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  if(is_array($types)) { foreach($types as $key => $value) { ?>
				<?php  if($value['has'] == 1) { ?>
				<?php  echo $types_config[$key];?>(<?php  echo $now_question_data[$key]['num'];?>/<?php  echo $value['num'];?>道)&nbsp;&nbsp;
				<?php  } ?>
				<?php  } } ?>
			</div>
   		</div>
        <div class='form-group'>
         	<div class="col-sm-11 col-xs-12 ">
            	<div id="item_div" tabindex="-1" class="panel-body table-responsive">
    			<table class='table table-bordered' style="margin-top:10px;">
        		<?php  $i = 0;?>
        		<?php  if(is_array($types)) { foreach($types as $key => $value) { ?>
            	<?php  if($value['has'] == 1) { ?>
					<tr>
						<td colspan="3"><H4><?php  echo $types_config[$key];?> (<?php  echo $now_question_data[$key]['num'];?>/<?php  echo $value['num'];?>道)</H4>
							<?php  if($now_question_data[$key]['num'] < $value['num']) { ?>
							<label class="inline">
								<a href='<?php  echo $this->createWebUrl('question', array('op'=>'edit','paperid'=>$id,'referer'=>1,'type_key'=>$key));?>'>添加新的<?php  echo $types_config[$key];?></a>
								&nbsp;&nbsp;&nbsp;
								<a href='<?php  echo $this->createWebUrl('question', array('type'=>$key,'add_paper'=>1,'referer'=>1,'paperid'=>$id));?>'>从已有<?php  echo $types_config[$key];?>列表中选择</a>
								&nbsp;&nbsp;&nbsp;
								<a href='<?php  echo $this->createWebUrl('pool', array('type'=>$key,'add_paper'=>1,'referer'=>1,'paperid'=>$id));?>'>自动填充所有试题</a>
							</label>
							<?php  } ?>
						</td>
					</tr>

            	<?php  if($key == 1) { ?>
            	<?php  if(is_array($question_item)) { foreach($question_item as $k => $v) { ?>
                <?php  if($v['type'] == $key) { ?>
                <?php  $i++?>
					<tr>
						<td>第<?php  echo $i;?>题：<input type="text" value="<?php  echo $v['displayorder'];?>" this_id="<?php  echo $v['id'];?>" class="question_order form-control" name="displayorder[<?php  echo $v['id'];?>]"></td>
						<td>
							<input type='text' class='form-control' name='question[]' value="<?php  echo $v['question'];?>" disabled=""/>

						</td>
						<td>
							<label class="inline">
								<a class="btn btn-default btn-sm" href='<?php  echo $this->createWebUrl('question', array('op'=>'edit','id'=>$v['id'],'paperid'=>$id,'referer'=>1));?>'><i class='fa fa-edit'></i>编辑</a>
								&nbsp;&nbsp;
								<a class="btn btn-default btn-sm" href='javascript:void(0);' this_id="<?php  echo $v['id'];?>" class="del_question"><i class='fa  fa-times'></i> 删除</a>
							</label>
						</td>
					</tr>
                <?php  } ?>
            	<?php  } } ?>
            	<?php  } ?>

            	<?php  if($key == 2) { ?>
            	<?php  if(is_array($question_item)) { foreach($question_item as $k => $v) { ?>
                <?php  if($v['type'] == $key) { ?>
                <?php  $i++?>
					<tr>
						<td>第<?php  echo $i;?>题：<input type="text" value="<?php  echo $v['displayorder'];?>" this_id="<?php  echo $v['id'];?>" class="question_order form-control" name="displayorder[<?php  echo $v['id'];?>]"></td></td>
						<td>
							<input type='text' class='form-control' name='question' value="<?php  echo $v['question'];?>" disabled=""/>
						</td>
						<td>
							<label class="inline">
								<a class="btn btn-default btn-sm" href='<?php  echo $this->createWebUrl('question', array('op'=>'edit','id'=>$v['id'],'paperid'=>$id,'referer'=>1));?>'><i class='fa fa-edit'></i>  编辑</a>
								&nbsp;&nbsp;
								<a class="btn btn-default btn-sm" href='javascript:void(0);' this_id="<?php  echo $v['id'];?>" class="del_question"><i class='fa fa-times'></i> 删除</a>
							</label>
						</td>
					</tr>
                <?php  } ?>
            	<?php  } } ?>
            	<?php  } ?>
            	<?php  if($key == 3) { ?>
            	<?php  if(is_array($question_item)) { foreach($question_item as $k => $v) { ?>
                	<?php  if($v['type'] == $key) { ?>
                	<?php  $i++?>
					<tr>
						<td>第<?php  echo $i;?>题：<input type="text" value="<?php  echo $v['displayorder'];?>" this_id="<?php  echo $v['id'];?>" class="question_order form-control" name="displayorder[<?php  echo $v['id'];?>]"></td></td>
						<td>
							<input type='text' class='form-control' name='question' value="<?php  echo $v['question'];?>" disabled=""/>
						</td>
						<td>
							<label class="inline">
								<a class="btn btn-default btn-sm" href='<?php  echo $this->createWebUrl('question', array('op'=>'edit','id'=>$v['id'],'paperid'=>$id,'referer'=>1));?>'><i class='fa fa-edit'></i>  编辑</a>
								&nbsp;&nbsp;
								<a class="btn btn-default btn-sm" href='javascript:void(0);' this_id="<?php  echo $v['id'];?>" class="del_question"><i class='fa fa-times'></i> 删除</a>
							</label>
						</td>
					</tr>
                	<?php  } ?>
            	<?php  } } ?>
            	<?php  } ?>
            <?php  } ?>
        <?php  } } ?>
        <!--<tr>-->
        <!--<td><span class="white">*</span>第1题：</td>-->
        <!--<td>-->
        <!--<input type='text' class='form-control' name='question' value=""/>  <label class="radio inline">-->
        <!--<input type="radio" name="answer1" class='answer1' value="1" <?php  if($item['answer']==1) { ?>checked<?php  } ?> />正确-->
        <!--</label>-->
        <!--<label class="radio inline">-->
        <!--<input type="radio" name="answer1" class='answer1'  value="0" <?php  if($item['answer']==0) { ?>checked<?php  } ?>/>错误-->
        <!--</label>-->
        <!--</td>-->
        <!--<td>-->
        <!--<a href='#'><i class='icon-remove'></i></a>-->
        <!--</td>-->
        <!--</tr>-->
    			</table>
				</div>
			</div>
		</div>
	</div>
</div>
   