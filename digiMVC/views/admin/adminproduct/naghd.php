<?php
require_once "views/admin/layout.php";
$productInfo = $data['productInfo'];
$naghInfo = $data['naghInfo'];
//print_r($naghInfo);
?>

<div class="left1">
	<p class="title">

نقد و بررسی محصول
		(
		<?= $productInfo['title']; ?>
		)
	</p>

	<a href="adminproduct/addnaghd/<?=$productInfo['id'];?>" class="btn_green addcategory">
		افزودن
	</a>

	<a  class="btn_green deletecategory" onclick="sendForm();">
		حذف
	</a>
	<form action="adminproduct/deletenaghd/<?=$productInfo['id'];?>" method="post">
		<table class="list" cellspacing="0">
			<tr>

				<td> عنوان  </td>
				<td>ویرایش</td>
				<td>انتخاب</td>
			</tr>
			<?php

			foreach ($naghInfo as $row){
				?>
				<tr>
					<td><?= $row['title'];?></td>
					<td>
						<a href="adminproduct/addnaghd/<?=$productInfo['id'];?>/<?= $row['id']; ?>">
							<img src="public/images/edit_icon.ico" width="25px">
						</a>
					</td>

					<td>

						<input type="checkbox" name="id[]" value="<?=$row['id'];?>">

					</td>
				</tr>
			<?php } ?>
		</table>
	</form>
	<script>
        function sendForm() {
            $("form").submit();
        }
	</script>

</div><!--left-->
</div><!--content-->
</div><!--main-->