<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $for) { ?>
            	 <li class="section-1px " onclick="window.location.href='<?php  echo $this->createMobileUrl('forum_topic',array('id'=>$for['id']))?>'">  
            	 	<div class="detail-text-content <?php  if(!empty($for['thumb'])) { ?>haspic<?php  } else { ?>nopic<?php  } ?>">  
            	 		<?php  if(!empty($for['thumb'])) { ?>
            	 		<div class="act-img img-gallary  hide-bg">  
            	 			<img style="min-width:80px;height:80px;" src="<?php  echo tomedia($for['thumb']['0'])?>">   
            	 			<div class="pic-count-tips"><?php  echo $for['thumb_num'];?>图 </div>  
            	 		</div>  
            	 		<?php  } ?>
            	 		<div class="text-container"> 
            	 			<h3 class="text">
            	 				<?php  if($for['tab'] == 'new') { ?>
            	 				<div class="post-tags"><label class="new">新</label></div>
            	 				<?php  } ?>
            	 				<?php  if($for['tab'] == 'jing') { ?>
            	 					<div class="post-tags"><label class="best">精</label></div>
            	 				<?php  } ?>
            	 				<?php  if($for['tab'] == 'begging') { ?>
            	 				<div class="post-tags"><label class="rec">赏</label></div>
            	 				<?php  } ?>
            	 				<?php  echo cutstr(strip_tags(trim($for['title'])),15,'...');?>
            	 				<?php  if($for['tab'] == 'begging') { ?>
            	 				<div class="post-tags">
            	 					<label class="best">【<?php  echo cutstr($for['ctitle'],8)?>】<?php  echo $for['begging_money'];?>元</label>
            	 				</div>
            	 				<?php  } ?>
            	 			</h3> 
            	 			<div class="list-content "><?php  if(!empty($for['thumb'])) { ?>&nbsp;<?php  } ?><?php  echo cutstr(strip_tags($for['content']),65,'...');?></div> 
            	 			
            	 		</div> 
            	 		<div class="info ">  
	            	 		<div> 
		            	 		<span class="nick"> 
		            	 			<span class="single-ellipsis" style="max-width: 150px;">  <?php  if(!empty($for['author']['nickname'])) { ?><?php  echo cutstr($for['author']['nickname'],8)?> <?php  } else { ?>游客<?php  } ?></span> 
		            	 			<span class="ver-middle"> <span class="honour border-1px">&nbsp;<?php  echo cutstr($for['ctitle'],5)?></span> </span> 
		            	 		</span> 
	            	 		</div>
	            	 		<div class="fl-right"> 
	            	 			<i class="read-icon"></i> 
	            	 			<span class="read-num-text"><?php  echo $for['lnum']?></span> 
	            	 			<i class="reply-icon"></i> 
	            	 			<span class="reply-num-text" style="margin-right: 0;"><?php  echo $for['replynum']?></span> 
	            	 		</div>  
            	 		</div> 
            	 	</div>   
            	 </li>
            	 <?php  } } ?>