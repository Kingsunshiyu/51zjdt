<?php defined('IN_IA') or exit('Access Denied');?><table class="table table-hover" style="min-width:850px;">
	<tbody>
		<?php  if(is_array($ds)) { foreach($ds as $item) { ?>
		<tr>
			<td><a href="javascript:;" onclick='select_pool(<?php  echo json_encode($item);?>)'><?php  echo $item['title'];?></a></td>
			<td style="width:80px;"><a href="javascript:;" onclick='select_pool(<?php  echo json_encode($item);?>)'>选择</a></td>
		</tr>
		<?php  } } ?>
	</tbody>
</table>
