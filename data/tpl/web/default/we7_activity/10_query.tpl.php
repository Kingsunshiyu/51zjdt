<?php defined('IN_IA') or exit('Access Denied');?><table >
	<tbody>
		<?php  if(is_array($ds)) { foreach($ds as $item) { ?>
		<tr>
			<td title="<?php  echo $item['name'];?>"><?php  echo $item['name'];?></td>
			<td style="width: 200px;text-align: right;"><a href="javascript:;" onclick='select_entry(<?php  echo json_encode($item['entry']);?>)'>添加</a></td>
		</tr>
		<?php  } } ?>
	</tbody>
</table>
