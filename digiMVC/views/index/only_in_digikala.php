

<div class="sliderscroll">

	<div class="sliderscroll_top">
		<h3>فقط در دیجیکالا</h3>
	</div><!--sliderscroll_top-->

	<div class="sliderscroll_bottum">

		<div class="sliderscroll_prev" onclick="scrollslider('prev',this);">
			<span></span>
		</div><!--sliderscroll_prev-->

		<div class="sliderscroll_main">
			<ul>


				<?php

				$slider = $data[3];

				foreach ($slider as $row) {
					?>


					<li class="sliderscroll_main_item">
						<a href="<?= URL ?>product/index/<?= $row['id'] ?>">
							<img src="public/images/products/<?= $row['id']; ?>/product_220.jpg">
						</a>
						<img src="public/images/exclusive-blue.png">
						<p><?= $row['title']; ?></p>
						<p><?= $row['price']; ?></p>
					</li>

					<?php
				}
				?>


			</ul>
		</div><!--sliderscroll_main-->

		<div class="sliderscroll_next"  onclick="scrollslider('next',this);">
			<span></span>
		</div><!--sliderscroll_next-->

	</div><!--sliderscroll_bottum-->

</div><!--sliderscroll_onlyDigikala-->

