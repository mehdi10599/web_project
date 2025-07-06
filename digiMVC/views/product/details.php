
<script src="public/js/jquery.elevatezoom.js"></script>


<div class="details">

	<div class="right">

		<div class="topicons">
			<i class="favorite"></i>
			<i class="share"></i>
		</div><!--topicons-->

		<div class="proimage">
			<img id="zoom_product" src="public/images/products/<?= $productinfo['id'] ?>/product_350.jpg"
				 data-zoom-image="public/images/products/<?= $productinfo['id'] ?>/product.jpg">
		</div><!--proimage-->
		<script>
            $('#zoom_product').elevateZoom({
                zoomWindowOffetx: -1015,
                zoomWindowOffety : -40,
                lensSize: 50,
                zoomWindowWidth: 600,
                zoomWindowHeight: 550,
                lensShape: 'round',
                scrollZoom: false,
                easing:false,
                lensFadeIn: true,
                lensFadeOut: true,
                tint: true,
                lensColour:"red",
                tintOpacity: 0.3,
                cursor:'pointer'
            });
		</script>

		<div class="galery">
			<ul>

				<?php

				foreach ($gallery as $row){
				if ($row['threed'] == 0) {

				?>

				<li data-image-url="public/images/products/<?= $row['idproduct']; ?>/gallery/large/<?= $row['img']; ?>">
					<img src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/<?= $row['img']; ?>">
				</li>

				<?php }}?>

				<li class="dots">
					<span></span>
				</li>
			</ul>
		</div><!--galery-->

	</div><!--right-->

	<div class="left">
		<div class="title">

			<h1><?= $productinfo['title'] ?></h1>

			<div class="rate">
				<div class="stars">
					<div class="blackstar"></div>
					<div class="redstar"></div>
				</div><!--stars-->
				<p>
					<span>4</span>
					از
					<span>80</span>
					رای
				</p>
			</div><!--rate-->

		</div><!--title-->
		<div class="right2">

			<div class="colors">
				<h4>انتخاب رنگ</h4>
				<ul>
					<?php
					$all_color=$productinfo["all_color"];
					foreach ($all_color as $color){
					?>
					<li>
						<span class="circle" data-id="<?= $color['id'] ?>" style="background-color: <?= $color['hex']?>;"></span>
						<span class="color_name"><?= $color['title']?></span>
					</li>
					<?php } ?>

				</ul>
			</div><!--colors-->

			<div class="guaranty">
				<h4>انتخاب گارانتی</h4>
				<div class="select_guaranti">
					<span class="guar_title">انتخاب گارانتی</span>
					<ul>

						<?php
						$all_guaranty=$productinfo["all_guaranty"];
						foreach ($all_guaranty as $guaranty){
						?>
						<li data-id="<?= $guaranty['id'] ?>"><?= $guaranty['title'] ?></li>
						<?php } ?>

					</ul>
				</div><!--select_guaranti-->
			</div><!--guaranty-->

			<div class="price">
				<div class="discount">
							<span>
								قیمت :
								<i><?= $productinfo['price'] ?></i>
								تومان
							</span>
					<div class="discount_box">
						<span>تخفیف</span>
						<span>
									<i><?= $productinfo['price_discount'] ?></i>
									 تومان
								</span>
					</div>
				</div><!--discount-->
				<div class="final_price">
					<i></i>
					<span>قیمت برای شما : </span>
					<b><?= $productinfo['price_final'] ?></b>
					<span>تومان</span>
				</div><!--final_price-->
			</div><!--price-->

			<div class="btns">
				<div class="compare">
					<span>مقایسه کن</span>
					<i></i>
				</div>
				<div class="addtobasket" onclick="addtobasket();">
					<i></i>
					<span>افزودن به سبد خرید</span>
				</div>
			</div><!--btns-->


<script>
    var guarantyId="";
	function addtobasket() {
        //AJAX Commands...

		var colorId=$(".colors span.circle.active").attr("data-id");

        var data={};
        var URL='<?= URL ?>product/addtobasket/<?= $productinfo["id"]; ?>/'+colorId+'/'+guarantyId;
        $.post(URL,data,function (msg) {
			alert(msg)
        });
        //End AJAX
    }
</script>



		</div><!--right2-->
		<div class="left2">
			<ul class="more_details">
				<li>
					تعداد سیم کارت :
					<span> دو سیم کارته </span>
				</li>
				<li>
					حافظه داخلی :
					<span> 32 گیگا بایت </span>
				</li>
			</ul>
			<p>
				<span>موارد بیشتر</span>
			</p>

			<div class="gifts">
				<p>
					هدایای همراه این کالا
				</p>
				<ul>
					<li>
						<img src="public/images/product5_1.jpg">
						<span>
									سرویس ویژه دیجیکالا : 7 روز ضمانت تعویض | pro plus glass protector for lenovo vibe shot
								</span>
					</li>
					<li>
						<img src="public/images/product5_1.jpg">
						<span>
									سرویس ویژه دیجیکالا : 7 روز ضمانت تعویض | pro plus glass protector for lenovo vibe shot
								</span>
					</li>
				</ul>

			</div><!--gifts-->

		</div><!--left2-->

		<div class="feature">
			<ul id="services_feature">
				<li>
					<a>
						<span>7 روز ضمانت بازگشت</span>
					</a>
				</li>
				<li>
					<a>
						<span>پرداخت در محل</span>
					</a>
				</li>
				<li>
					<a>
						<span>ضمانت اصل بودن کالا</span>
					</a>
				</li>
				<li>
					<a>
						<span>تحویل اکسپرس</span>
					</a>
				</li>
				<li>
					<a>
						<span>تضمین بهترین قیمت</span>
					</a>
				</li>
			</ul><!--services_feature-->
		</div><!--feature-->


	</div><!--left-->

</div><!--details-->

<script>

    /*select guaranti*/

    $('.select_guaranti').click(function () {
        $("ul", this).slideToggle(300);
    });

    $('.select_guaranti ul li').click(function () {
        var txt = $(this).text();
        guarantyId=$(this).attr("data-id");
        $('.select_guaranti .guar_title').text(txt);
    });
    /*select guaranti*/

    /*choose color*/
    $('.colors ul li').click(function () {
        $('.colors ul li .circle').removeClass("active");
        $('.circle', this).addClass("active");
    });
    /*choose color*/

</script>