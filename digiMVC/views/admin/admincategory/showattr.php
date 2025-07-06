<?php
require_once "views/admin/layout.php";
$attr = $data['attr'];
//print_r($attr);
$categoryInfo = $data['categoryInfo'];
$parentAttrInfo = $data['parentAttrInfo'];
$lvl=1;
if (isset($parentAttrInfo['title']))
{
	$lvl=2;
}

?>

<div class="left1">
	<p class="title">

		مدیریت ویژگی ها
(
		<a href="admincategory/showchildren/<?= $categoryInfo['parent'] ?>">
			دسته :
			<?= $categoryInfo['title'] ?>
		</a>
		>>

		<a href="admincategory/showattr/<?= $categoryInfo['id'] ?>">
			عناوین اصلی ویژگی ها
		</a>
	<?php if ($lvl==2){ ?>
	>>

		<a href="admincategory/showattr/<?= $categoryInfo['id'] ?>/<?= $parentAttrInfo['id']; ?>">
			زیرویژگی :
			<?= $parentAttrInfo['title']; ?>
		</a>
	<?php } ?>

)
	</p>

	<a href="admincategory/addattr/<?= $categoryInfo['id'] ?>/<?= $parentAttrInfo['id'] ?>" class="btn_green addcategory">
		افزودن
	</a>

	<a  class="btn_green deletecategory" onclick="sendForm();">
		حذف
	</a>
	<?php
	/*print_r($categoryInfo);
	print_r($attr);*/
	?>
	<form action="admincategory/deleteattr/<?= $categoryInfo['id'] ?>/<?= $parentAttrInfo['id'] ?>" method="post">
		<table class="list" cellspacing="0">
			<tr>
				<td>ردیف</td>
				<td> عنوان ویژگی </td>
				<?php if ($lvl==1){ ?>
				<td>مشاهده زیر ویژگی ها</td>
				<?php } ?>
				<td>ویرایش </td>
				<td>انتخاب</td>
			</tr>
			<?php

			foreach ($attr as $row){
				?>
				<tr>
					<td><?= $row['id'];?></td>
					<td><?= $row['title'];?></td>
					<?php if ($lvl==1){ ?>
					<td><a href="admincategory/showattr/<?= $categoryInfo['id'] ?>/<?= $row['id'] ?>">مشاهده </a></td>
					<?php } ?>
					<td>
						<a href="admincategory/addattr/
						<?= $categoryInfo['id'] ?>/
						<?php if ($lvl==2) { echo  $parentAttrInfo['id'];} else {echo "0";} ?>/
						<?= $row['id'] ?>
						">
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