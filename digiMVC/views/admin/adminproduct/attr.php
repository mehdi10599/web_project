<?php
require_once "views/admin/layout.php";

$attr = $data['attr'];/*تمام زیر ویزگی های مربوط به دسته ای که محصول جزو آن دسته میباشد به همراه مقدار ویژگی*/
$productInfo = $data['productInfo'];/*اطلاعات محصول*/


?>
<script src="public/ckeditor/ckeditor.js"></script>
<div class="left1">
	<p class="title">

		ویژگی های محصول :

		<span style="color: red;">
			(
			<?= $productInfo['title']; ?>
			)
		</span>

	</p>
	<form action="" method="post" class="form_add_cat">
		<input type="hidden" name="submited">
		<?php
		foreach ($attr as $row){
		?>
		<div class="row">

			<label> <?= $row['title'] ?></label>
			<input type="text" name="<?= "value".$row['id'] ?>" value="<?= $row['value'] ?>">
			<input type="hidden" name="id[]" value="<?= $row['id'] ?>">

		</div><!--row-->
		<?php } ?>

		<button class="btn_green">
			اجرای عملیات
		</button>
	</form>

</div><!--left-->
</div><!--content-->
</div><!--main-->




