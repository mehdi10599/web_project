
<div>
	<table cellspacing="0" class="nazrat">
		<tbody>
		<tr>
			<td>ردیف </td>
			<td>تاریخ</td>
			<td>کالا</td>
			<td>می پسندم</td>
			<td>مشاهده</td>
			<td>ویرایش</td>
			<td>حذف</td>
		</tr>
		<?php
		$comments=$data['comments'];
		$i=1;
		foreach ($comments as $row){
		?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $row['tarikh'] ?></td>
			<td><?= $row['productTitle'] ?></td>
			<td><?= $row['likecount'] ?></td>
			<td>
				<a href="product/index/<?= $row['idproduct'] ?>/3#comment<?= $row['id'] ?>">
				<img src="public/images/View.gif" >
				</a>
			</td>
			<td>
				<a href="addcomment/index/<?= $row['idproduct'] ?>">
				<img src="public/images/Edit.gif">
				</a>
			</td>
			<td>
				<img onclick="deleteComment(this,<?=$row['id']?>)" src="public/images/Delete.gif" style="border-radius: 50%;">
			</td>
		</tr>
		<?php $i++; } ?>
		</tbody>
	</table>
</div>

<script>

	function deleteComment(tag,idComment) {
		var trTag=$(tag).parents('tr');
		var url="panel/deleteComment/"+idComment;
		var data={};
		$.post(url,data,function (msg) {
			trTag.remove();
        })
    }

</script>
























