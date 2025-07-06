
<link rel="stylesheet" href="public/css/addcomment.css">

<script src="public/slider/jquery-ui.min.js"></script>
<script src="public/slider/slider.js"></script>
<link href="public/slider/style.css" rel="stylesheet">

<div class="main1">

	<?php
	$commentInfo=$data['commentInfo'];
//	echo "<pre>";
//	print_r($commentInfo);
//	echo "</pre>";
//	die();

	$commentParams=unserialize($commentInfo['param']);

	$params = $data['params'];

	$productInfo=$data['productInfo'];

	$params_count=sizeof($params);
	$right = ceil($params_count/2);
	$left = $params_count-$right;
	$right_params=array_slice($params,0,$right);
	$left_params=array_slice($params,$right,$left);
	/*
	echo "<pre>";
	print_r($params);
	echo "</pre>";
	*/
	?>

<form action="addcomment/savecomment/<?= $productInfo['id']?>" method="post">
	<div class="col-right">
		<img src="public/images/products/2/product_350.jpg">
	</div><!--col-right-->
	
	<div class="col-left">
		<h4>امتیاز شما به این محصول</h4>

		<div class="right_score">
			<?php
			foreach ($right_params as $right_param) {
				?>
				<div class="row_score">
					<span><?= $right_param['title'] ?></span>
					<input name="param<?= $right_param['id'] ?>"
						   data-val="<?= $commentParams[$right_param['id']] ?>"
						   type="hidden"
						   value="<?= $commentParams[$right_param['id']] ?>"
						   class="flat-slider">
				</div>
				<?php
			}
			?>
		</div><!--right_score-->
		<div class="left_score">
			<?php
			foreach ($left_params as $left_param) {
				?>
				<div class="row_score">
					<span><?= $left_param['title'] ?></span>
					<input name="param<?= $left_param['id'] ?>"
						   data-val="<?= $commentParams[$left_param['id']] ?>"
						   type="hidden"
						   value="<?= $commentParams[$left_param['id']] ?>"
						   class="flat-slider">
				</div>
				<?php
			}
			?>
		</div><!--left_score-->

	</div><!--col-left-->

	<div class="comment_main">
		<h4>دیگران را با نوشتن نقد ، بررسی و نظر خود، برای خرید این محصول راهنمایی کنید</h4>
		<div class="row_score">
			<input type="text" name="title" placeholder="عنوان نقد و بررسی (اجباری)" value="<?= $commentInfo['title'] ?>">
		</div>
		<div class="row_score">
			<input type="text" name="positive" placeholder="نقاط قوت" value="<?= $commentInfo['positive'] ?>">
		</div>
		<div class="row_score">
			<input type="text" name="negative" placeholder="نقاط ضعف" value="<?= $commentInfo['negative'] ?>">
		</div>
		<div class="row_score">
			<textarea placeholder="متن نقد و بررسی شما" name="matn"><?= $commentInfo['matn'] ?></textarea>
		</div>
		<div class="row_score" style="text-align: center;">
			<span class="btn_green" onclick="submitForm()">ثبت نظر</span>
		</div>
	</div><!--comment_main-->
</form>
</div><!--main1-->


<script>

	function submitForm()
	{
	    $("form").submit();
	}

    $('.flat-slider').flatslider({
        min: 1,
        max: 5,
        step: 1,
        value: 3,
        einheit: ' ',
        range: 'min',
		disabled:false
    });
</script>