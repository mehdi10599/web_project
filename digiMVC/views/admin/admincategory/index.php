<?php
require_once "views/admin/layout.php";
$category = $data['category'];
//print_r($category);
$parent=array();
if (isset($data['parents'])){
	$parents=$data['parents'];
	$parents=array_reverse($parents);
	$parent_size=sizeof($parents);
	$counter=0;
	$current_cat=$parents[$parent_size-1];
}

?>

<div class="left1">
	<p class="title">

		مدیریت دسته ها
		<?php
		if (isset($parents)){
			?>
			(
			<?php
			foreach ($parents as $row){

				?>
				<a href="admincategory/showchildren/<?= $row['id'];?>" style="">
					<?= $row['title'];?>
				</a>

				<?php
				$counter++;
				if ($counter<$parent_size){echo " >>> ";}
			}
			?>
			)
		<?php } ?>
	</p>

	<a href="admincategory/addcategory/<?php if (isset($current_cat)){echo $current_cat['id'];} ?>" class="btn_green addcategory">
		افزودن
	</a>

	<a  class="btn_green deletecategory" onclick="sendForm();">
		حذف
	</a>
	<form action="admincategory/deleteCategory/<?= @$category[0]['parent']; ?>" method="post">
		<table class="list" cellspacing="0">
			<tr>
				<td>ردیف</td>
				<td> عنوان دسته </td>
				<td>مشاهده زیر دسته ها</td>
				<td>مشاهده ویژگی ها</td>
				<td>ویرایش دسته ها</td>
				<td>انتخاب</td>
			</tr>
			<?php

			foreach ($category as $row){
				?>
				<tr>
					<td><?= $row['id'];?></td>
					<td><?= $row['title'];?></td>
					<td><a href="admincategory/showchildren/<?= $row['id']; ?>">مشاهده </a></td>
					<td><a href="admincategory/showattr/<?= $row['id']; ?>">مشاهده </a></td>
					<td>
						<a href="admincategory/addcategory/<?= $row['id']; ?>/edit">
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