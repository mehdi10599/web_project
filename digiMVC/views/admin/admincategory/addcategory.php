<?php
require_once "views/admin/layout.php";
$all_category = $data[0];
$current_cat_id = $data[1];
$edit = $data[2];
$categoryInfo = $data[3];
?>

<div class="left1">
	<p class="title">
		<?php
		if ($edit == '') {
			echo "افزودن دسته جدید";
		}
		else {
			echo "ویرایش دسته بندی";
		}


	/*	echo '$current_cat_id = '.$current_cat_id.'<br>';
		echo '$categoryInfo[\'parent\'] = '.$categoryInfo['parent'].'<br>';*/
		?>


	</p>
	<form action="admincategory/addcategory<?php if ($edit != '') {
		echo '/' . $categoryInfo['id'] . '/' . $edit;
	} ?>" method="post" class="form_add_cat">
		<div class="row">

			<label> نام دسته :</label>
			<input type="text" name="title" value=" <?php if ($edit != '') {
				echo $categoryInfo['title'];
			} ?> ">

		</div><!--row-->
		<div class="row">

			<label>دسته والد :</label>
			<select name="parent" autocomplete="off">
				<option value="0">
					انتخاب کنید
				</option>
				<?php
				$displayId = '';
				if ($edit == '') {
					$displayId = $current_cat_id;
				}
				else {
					$displayId = $categoryInfo['parent'];
				}

				foreach ($all_category as $row) {
					if ($displayId == $row['id']) {
						$x = " selected ";
					}
					else {
						$x = " ";
					}
					?>
					<option value="<?= $row['id']; ?>" <?= $x; ?>>
						<?= $row['title']; ?>
					</option>
				<?php } ?>
			</select>

		</div><!--row-->
		<button class="btn_green">

			<?php
			if ($edit == '') {
				?>
				ایجاد دسته
				<?php
			}
			else {
				?>
				ویرایش دسته

			<?php } ?>

		</button>
	</form>
</div><!--left-->
</div><!--content-->
</div><!--main-->