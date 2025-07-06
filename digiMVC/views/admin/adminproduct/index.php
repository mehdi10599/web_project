<?php
require_once "views/admin/layout.php";
$product = $data['product'];
//print_r($product);

?>

<div class="left1">
<p class="title">

مدیریت محصولات

</p>

<a href="adminproduct/addproduct" class="btn_green addcategory">
	افزودن
</a>

<a  class="btn_green deletecategory" onclick="sendForm();">
	حذف
</a>
	<form action="adminproduct/deleteproduct/" method="post">
	<table class="list" cellspacing="0">
		<tr>
			<td>ردیف</td>
			<td> عنوان  </td>
			<td>قیمت</td>
			<td>تخفیف</td>
			<td>ویرایش</td>
			<td>گالری</td>
			<td>نقد</td>
			<td>ویژگی</td>
			<td>انتخاب</td>
		</tr>
		<?php

		foreach ($product as $row){
		?>
		<tr>
			<td><?= $row['id'];?></td>
			<td><?= $row['title'];?></td>
			<td><?= $row['price'];?></td>
			<td><?= $row['discount'];?></td>
			<td>
				<a href="adminproduct/addproduct/<?=$row['id'];?>">
					<img src="public/images/edit_icon.ico" width="25px">
				</a>
			</td>
			<td>
				<a href="adminproduct/gallery/<?=$row['id'];?>">
					گالری
				</a>
			</td>
			<td>
				<a href="adminproduct/naghd/<?=$row['id'];?>">
					<img src="public/images/view_icon.png" width="25px">
				</a>
			</td>
			<td>
				<a href="adminproduct/attr/<?= $row['cat']?>/<?=$row['id'];?>">
					<img src="public/images/view_icon.png" width="25px">
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