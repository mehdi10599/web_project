
<link rel="stylesheet" href="public/css/checkout.css">

<div class="main">
	<div class="sabad">

		<?php
		$Error = $data['Error'];
		$orderId = $data['orderId'];
		if ($Error!=""){
			?>
			<div class="showError">
				خطا ! <br>
				<?php

				echo $Error;
				?>


			</div>
<div style="text-align: center;">

	<a class="btn_green" id="returnback" href="checkout/index/<?=$orderId?>">
		 بازگشت به صفحه قبل
	</a>
</div>

		<?php } ?>
	</div><!--sabad-->
</div><!--main-->


















