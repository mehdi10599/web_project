<?php
require_once "views/admin/layout.php";

$productInfo=$data['productInfo'];
$naghdRowInfo=$data['naghdRowInfo'];
$edit=0;
if (isset($naghdRowInfo['title']))
{
	$edit=1;
}
?>
<script src="public/ckeditor/ckeditor.js"></script>
<div class="left1">
	<p class="title">
		<?php
		if ($edit==0){
			?>
			افزودن نقد جدید
		<?php }else{ ?>
			ویرایش نقد
		<?php } ?>

		<span style="color: red;">
			(
			<?= $productInfo['title']; ?>
			)
		</span>

	</p>
	<form action="adminproduct/addnaghd/<?= $productInfo['id'] ?>/<?= $naghdRowInfo['id']; ?>" method="post" class="form_add_cat">
		<div class="row">

			<label> عنوان نقد:</label>
			<input type="text" name="title" value="<?= $naghdRowInfo['title']; ?>">

		</div><!--row-->

		<div class="row">

			<label> متن کامل :</label>
			<textarea id="editor1" name="description"><?= $naghdRowInfo['description']; ?></textarea>

		</div><!--row-->
		<script>
            CKEDITOR.replace("editor1",{});
		</script>

		<button class="btn_green">
			<?php
			if ($edit==0){
				?>
				افزودن نقد
			<?php } else{?>
				ویرایش نقد
			<?php } ?>
		</button>
	</form>

</div><!--left-->
</div><!--content-->
</div><!--main-->




