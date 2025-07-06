<?php
require_once "views/admin/layout.php";
$all_category= $data['all_category'];
$all_color= $data['all_color'];
$all_guaranty= $data['all_guaranty'];

$productInfo=$data['productInfo'];
//print_r($productInfo);
//echo count($productInfo);
if (count($productInfo)==0)
{
	$productInfo['id']=$productInfo['title']=$productInfo['price']=$productInfo['cat']=$productInfo['introduction']=$productInfo['discount']=$productInfo['tedad_mojood']=$productInfo['colorInfo']=$productInfo['guarantyInfo']="";
	$edit=0;
}
else
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
		افزودن محصول جدید
		<?php }else{ ?>
		ویرایش محصول
		<?php } ?>
	</p>
	<form action="adminproduct/addproduct/<?= $productInfo['id'] ?>"
		  method="post" class="form_add_cat" enctype="multipart/form-data">
		<div class="row">

			<label> نام محصول :</label>
			<input type="text" name="title" value="<?= $productInfo['title'] ?>">

		</div><!--row-->
		<div class="row">

			<label>دسته والد :</label>
			<select name="idcategory" autocomplete="off">
				<option value="0">
					انتخاب کنید
				</option>
				<?php
				$catId=$productInfo['cat'];

				foreach ($all_category as $row) {
					if ($catId==$row['id'])
					{
						$selected=" selected ";
					}
					else
					{
						$selected="";
					}
					?>
					<option value="<?= $row['id']; ?>" <?= $selected; ?> >
						<?= $row['title']; ?>
					</option>
				<?php } ?>
			</select>

		</div><!--row-->

		<div class="row">

			<label> قیمت :</label>
			<input type="text" name="price" value="<?= $productInfo['price'] ?>">

		</div><!--row-->

		<div class="row">

			<label> تصویر :</label>
			<input type="file" name="image" value="">

			<?php if ($edit==1){ ?>
			<div class="show_img">
				<img src="public/images/products/<?=$productInfo['id']?>/product_220.jpg">
			</div>
			<?php } ?>

		</div><!--row-->

		<div class="row">

			<label> معرفی اجمالی محصول :</label>
			<textarea id="editor1" name="introduction"><?= $productInfo['introduction'] ?></textarea>

		</div><!--row-->
<script>
	CKEDITOR.replace("editor1",{});
</script>
		<div class="row">

			<label> تعداد موجود :</label>
			<input type="text" name="tedad_mojood" value="<?= $productInfo['tedad_mojood'] ?>">

		</div><!--row-->

		<div class="row">

			<label> میزان تخفیف (%) :</label>
			<input type="text" name="discount" value="<?= $productInfo['discount'] ?>">

		</div><!--row-->

		<div class="row">

			<label>انتخاب رنگ :</label>
			<select autocomplete="off" onchange=addcolor(this) >
				<option value="0">
					انتخاب کنید
				</option>
				<?php

				foreach ($all_color as $row) {

					?>
					<option  value="<?= $row['id']; ?>" >
						<?= $row['title']; ?>
					</option>
				<?php } ?>
			</select>
			<?php
			$productInfo['colorInfo']=array_filter($productInfo['colorInfo']);

			if ($productInfo['colorInfo']!=""){
			$colorInfo=$productInfo['colorInfo'];
			foreach ($colorInfo as $colorRow){?>

				<span class="span_selected">
					<?= $colorRow['title'];?>
					<input type="hidden" name="color[]" value="<?= $colorRow['id'];?>">
					<img src="public/images/close-icon.gif" onclick=removeTag(this)>
				</span>

			<?php } }?>

		</div><!--row-->
		<div class="row">

			<label>انتخاب گارانتی :</label>
			<select  autocomplete="off" onchange=addguaranty(this) >
				<option value="0">
					انتخاب کنید
				</option>
				<?php


				foreach ($all_guaranty as $row) {

					?>
					<option  value="<?= $row['id']; ?>" >
						<?= $row['title']; ?>
					</option>
				<?php } ?>
			</select>

			<?php
			$productInfo['guarantyInfo']=array_filter($productInfo['guarantyInfo']);
			if ($productInfo['guarantyInfo']!=""){
			$guarantyInfo=$productInfo['guarantyInfo'];
			foreach ($guarantyInfo as $guarantyRow){?>

				<span class="span_selected">
					<?= $guarantyRow['title'];?>
					<input type="hidden" name="guaranty[]" value="<?= $guarantyRow['id'];?>">
					<img src="public/images/close-icon.gif" onclick=removeTag(this)>
				</span>

			<?php } }?>
		</div><!--row-->

		<button class="btn_green">
			<?php
			if ($edit==0){
			?>
			ایجاد محصول
			<?php } else{?>
			ویرایش محصول
			<?php } ?>
		</button>
	</form>
<script>
	function addcolor(tag)
	{
	    var selectedOption = $(tag).find(":selected");
		var colorId = selectedOption.val();
		var colorName = selectedOption.text();
		var inputTag='<input type="hidden" name="color[]" value="'+colorId+'">';
		var colorTag='<span class="span_selected">'+colorName+''+inputTag+'<img src="public/images/close-icon.gif" onclick=removeTag(this)></span>';
		var rowTag=$(tag).parents("div.row");
		if (colorId != 0)
		{
            rowTag.append(colorTag);
		}
        var firstOption = $(tag).find("option:first-child");
        firstOption.attr("selected",false);
	}
	function addguaranty(tag)
	{
	    var selectedOption = $(tag).find(":selected");
		var guarantyId = selectedOption.val();
		var guarantyName = selectedOption.text();
		var inputTag='<input type="hidden" name="guaranty[]" value="'+guarantyId+'">';
		var guarantyTag='<span class="span_selected">'+guarantyName+''+inputTag+'<img src="public/images/close-icon.gif" onclick=removeTag(this)></span>';
		var rowTag=$(tag).parents("div.row");
		if (guarantyId != 0)
		{
            rowTag.append(guarantyTag);
		}
		var firstOption = $(tag).find("option:first-child");
		firstOption.attr("selected",false);
	}

	function removeTag(tag)
	{
		var closeTag=$(tag);
		var rowTag=closeTag.parents(".span_selected");
		var firstOption = closeTag.parents("div.row").find("select option:first-child");
		rowTag.remove();
		firstOption.attr("selected","seleced");
    }

</script>
</div><!--left-->
</div><!--content-->
</div><!--main-->




