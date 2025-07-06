
<link rel="stylesheet" href="public/css/product.css">


<div class="main">
	<div id="product">
		<?php
			$gallery = $data['gallery'];

			$productinfo = $data['productinfo'];
			if($productinfo['special']==1){
				require_once "offer.php";
			}

			require_once "details.php";
		?>

	</div><!--product-->

	<?php
		require_once "introduction.php";
		require_once "offer_slider.php";
		require_once "tabs.php";
	?>


</div><!--main-->




<?php
	require_once "gallery_modal.php";
?>