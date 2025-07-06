<?php
require_once "views/admin/layout.php";
$categoryInfo = $data['categoryInfo'];
$mainattr = $data['mainattr'];
$parentId = $data['parentId'];
$parentInfo = $data['parentInfo'];
$attrInfo = $data['attrInfo'];/*اطلاعات سطری از جدول ویژگی ها که باید ویرایش شود*/

$edit = 0;
if (isset($attrInfo['title']))
{
	$edit=1;
}
?>

<div class="left1">
	<p class="title">
		<?php
		if ($edit == 0) {
			echo " افزودن ویژگی جدید به :";
		}
		else {
			echo "ویرایش ویژگی";
		}
		?>

		(
		<a href="admincategory/showchildren/<?= $categoryInfo['parent'] ?>">
			دسته :
			<?= $categoryInfo['title'] ?>
		</a>
		>>

		<a href="admincategory/showattr/<?= $categoryInfo['id'] ?>">
			عناوین اصلی ویژگی ها
		</a>
<?php if ($parentId!=0){ ?>
			>>

			<a href="admincategory/showattr/<?= $categoryInfo['id'] ?>/<?= $parentId ?>">
				زیرویژگی :
				<?= $parentInfo['title']; ?>
			</a>
		<?php } ?>

		)

	</p>
	<form action="admincategory/addattr/<?= $categoryInfo['id'] ?>/<?= $parentId ?>/<?= $attrInfo['id'] ?>" method="post" class="form_add_cat">
		<div class="row">

			<label> نام ویژگی :</label>
			<input type="text" name="title" value=" <?= $attrInfo['title']  ?> ">

		</div><!--row-->
		<div class="row">

			<label>ویژگی والد :</label>
			<select name="parent" autocomplete="off">
				<option value="0">
					انتخاب کنید
				</option>
				<?php
				foreach ($mainattr as $row) {
					if ($parentId == $row['id']) {
						$selected = " selected ";
					}
					else {
						$selected = "";
					}
					?>
					<option value="<?= $row['id']; ?>" <?= $selected ?>>
						<?= $row['title']; ?>
					</option>
				<?php } ?>
			</select>

		</div><!--row-->
		<button class="btn_green">

			<?php
			if ($edit == '') {
				?>
				ایجاد ویژگی
				<?php
			}
			else {
				?>
				ویرایش ویژگی

			<?php } ?>

		</button>
	</form>
</div><!--left-->
</div><!--content-->
</div><!--main-->