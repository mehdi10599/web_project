<?php
require_once "views/admin/layout.php";
$productInfo = $data['productInfo'];/*تمام اطلاعات مربوط به محصول در جدول محصولات*/
$gallery = $data['gallery']; /*تمام سطر های مربوط به این محصول در جدول گالری*/

?>

<div class="left1">
	<p class="title">

		مدیریت تصاویر گالری محصول :

		<a><?= $productInfo["title"]; ?></a>

	</p>

<form action="adminproduct/gallery/<?=$productInfo['id']?>" enctype="multipart/form-data" method="post" id="addGallery">
	<input type="file" name="image">
	<a onclick="sendForm2()" class="btn_green addcategory">
		افزودن
	</a>
</form>
	<script>
        function sendForm2() {
            $("form#addGallery").submit();
        }
	</script>

	<a  class="btn_green deletecategory" onclick="sendForm3();">
		حذف
	</a>
	<form action="adminproduct/deletegallery/<?=$productInfo['id']?>" method="post" id="gallerylist">
		<table class="list" cellspacing="0">
			<tr>
				<td>ردیف</td>
				<td> تصویر</td>
				<td>انتخاب</td>
			</tr>
			<?php
			$i=1;
			foreach ($gallery as $row){
				?>
				<tr>
					<td><?= $i ?></td>
					<td>
						<img src="public\images\products\<?=$productInfo['id'] ?>\gallery\small\<?= $row['img'] ?>">
					</td>
					<td>

						<input type="checkbox" name="id[]" value="<?=$row['id'];?>">

					</td>
				</tr>
			<?php $i++; } ?>
		</table>
	</form>
	<script>
        function sendForm3() {
            $("#gallerylist").submit();
        }
	</script>

</div><!--left-->
</div><!--content-->
</div><!--main-->