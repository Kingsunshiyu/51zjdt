<?php defined('IN_IA') or exit('Access Denied');?><h2>[<?php  echo $types_config[$question_info['type']];?>]</h2>
<p class="timu">第<?php  echo $pindex;?>题.<?php  echo $question_info['question'];?>
<?php  if($question_info['thumb'] != '') { ?>
<br>
<img src="<?php  echo img_url($question_info['thumb'])?>" alt="" style="display:inline-block; width:100%; margin-top:10px;"/>
<?php  } ?>
</p>
<?php  if($question_info['type'] == 1) { ?>
<ul>
    <li><label><input name="answer1" type="radio" value="1" <?php  if($item['answer']==1) { ?>checked<?php  } ?>/> 正确 </label> </li>
    <li><label><input name="answer1" type="radio" value="2" <?php  if($item['answer']==2) { ?>checked<?php  } ?>/> 错误  </label> </li>
</ul>
<?php  } else if($question_info['type'] == 2) { ?>
<ul>
    <?php  if(is_array($answer_array)) { foreach($answer_array as $key => $value) { ?>
    <?php  if($key <4 || ($key >=4 && (!empty($question_info['items'][$key]) || !empty($question_info['img_items'][$key])) )) { ?>
    <li>
        <label><input name="answer2" type="radio" value="<?php  echo $value;?>" <?php  if($item['answer'] == "$value") { ?>checked<?php  } ?>/> <?php  echo $value;?>.<?php  echo $question_info['items'][$key];?> </label> 
        <?php  if($question_info['isimg'] == 1 && !empty($question_info['img_items'][$key])) { ?>
        <br>
        <img src="<?php  echo img_url($question_info['img_items'][$key])?>" alt=""/>
        <?php  } ?>
    </li>
    <?php  } ?>
    <?php  } } ?>
</ul>
<?php  } else if($question_info['type'] == 3) { ?>
<ul>
    <?php  if(is_array($answer_array)) { foreach($answer_array as $key => $value) { ?>
    <?php  if($key <4 || ($key >=4 && (!empty($question_info['items'][$key]) || !empty($question_info['img_items'][$key])) )) { ?>
    <li>
        <label><input name="answer3[]" type="checkbox" value="<?php  echo $value;?>" <?php  if(stripos($item['answer'], "$value") > -1) { ?>checked<?php  } ?>/> <?php  echo $value;?>.<?php  echo $question_info['items'][$key];?> </label>

        <?php  if($question_info['isimg'] == 1 && !empty($question_info['img_items'][$key])) { ?>
        <br>
        <img src="<?php  echo img_url($question_info['img_items'][$key])?>" alt=""/>
        <?php  } ?>
    </li>
    <?php  } ?>
    <?php  } } ?>
</ul>
<?php  } ?>
<div class="jieshi">
</div>
<input type="hidden" name="questionid" id="questionid" value="<?php  echo $question_info['id'];?>" />
<input type="hidden" name="type" id="type" value="<?php  echo $question_info['type'];?>" />
<input type="hidden" name="btime" id="btime" value="<?php  echo time()?>" />

