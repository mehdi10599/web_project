
	<link rel="stylesheet" href="public/css/showcart3.css">

<div class="main">

	<div class="sabad">

		<div class="order_steps">
			<div class="dashed">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div><!--dashed-->
			<ul>
				<li class="active">
					<span class="circle"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">ورود به دیجیکالا</span><!--circle-->
				</li>
				<li class="active">
					<span class="circle"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">اطلاعات ارسال سفارش</span><!--circle-->
				</li>
				<li>
					<span class="circle" style="border: 2px solid green;"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">بازبینی سفارش</span><!--circle-->
				</li>
				<li>
					<span class="circle"></span><!--circle-->
					<span class="title">اطلاعات پرداخت</span><!--circle-->
				</li>
			</ul>
			<div class="dashed">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div><!--dashed-->
		</div><!--order_steps-->


		<div class="head">
			<h4>سبد خرید شما در دیجی کالا
			</h4>
			<a href="showcart4" class="btn_green" style="background-color: blue;"> ثبت اطلاعات و ادامه خرید</a>
		</div><!--head-->

		<div class="sabad_table">

			<table cellspacing="0">
				<tbody>
				<tr>
					<td>شرح محصول</td>
					<td>تعداد</td>
					<td>قیمت واحد</td>
					<td>قیمت کل</td>
					<td></td>

				</tr>
				<?php
				$basketInfo=$data['basketInfo'];/*اطلاعات سبد خرید و جمع کل قیمت محصولات*/
				$basket=$basketInfo[0];
				foreach ($basket as $row){
				?>

				<tr>
					<td>
						<div class="right">
							<img src="public/images/products/<?=$row['id']?>/Product_220.jpg">
						</div>
						<div class="left">
							<p>
								<?= $row['title'] ?>
							</p>
							<p>
								رنگ :
								<?= $row['colorTitle'] ?>
							</p>
							<p>
								گارانتی :
								<?= $row['guarantyTitle'] ?>
							</p>
						</div>
					</td>
					<td>
						<span class="guar_title"><?= $row['tedad'] ?></span>
					</td>
					<td>
						<span class="price"><?= $row['price'] ?></span>
						<span class="tuman">تومان</span>
					</td>
					<td>
						<span class="price"><?= $row['price']*$row['tedad'] ?></span>
						<span class="tuman">تومان</span>
						<br>
						<span class="price" style="color: red">تخفیف  : <?= $row['discountTotal'] ?></span>
						<span class="tuman" style="color: red">تومان</span>
					</td>
					<td class="editbasket">
						<a href="showcart">
							<i></i>
						</a>
					</td>
				</tr>

				<?php } ?>
				</tbody>
			</table>
		</div><!--sabad_table-->



		<div class="head">
			<h4>خلاصه صورتحساب شما</h4>
		</div><!--head-->

		<div class="final_price">
			<div class="totalprice">
				<span>جمع کل خرید شما :</span>
				<span><?= $basketInfo[1] ?></span>
				<span>تومان</span>
			</div><!--totalprice-->
			<div class="sendprice">
				<span>هزینه ارسال ،بیمه و بسته بندی :</span>
				<span>0</span>
				<span>تومان</span>
			</div><!--totalprice-->
			<div class="discountprice">
				<span>جمع کل تخفیف :</span>
				<span><?= $basketInfo[2] ?></span>
				<span>تومان</span>
			</div><!--totalprice-->
			<div class="pardakhtprice">
				<span> مبلغ قابل پرداخت :</span>
				<span><?= $basketInfo[1]-$basketInfo[2] ?></span>
				<span>تومان</span>
			</div><!--pardakhtprice-->
		</div><!--final_price-->



		<div class="head">
			<h4>اطلاعات ارسال سفارش</h4>
		</div><!--head-->

	<?php
	$addressInfo=$data['addressInfo'];
	$postInfo=$data['postInfo'];
	?>

		<table class="send_info" cellspacing="0">
			<tr>
				<td><i></i></td>
				<td>
					این سفارش به :
					<span class="reviewSpan">
					<?= $addressInfo['family'] ?>
					</span>
					به آدرس :
					<span class="reviewSpan">
					<?= $addressInfo['address'] ?>
					</span>

					و شماره تماس :
					<span class="reviewSpan">
					<?= $addressInfo['mobile'] ?>
					</span>

					تحویل میگردد.


				</td>
			</tr>
			<tr>
				<td><i></i></td>
				<td>

					این سفارش از طریق پست :
					<span class="reviewSpan">
					<?= $postInfo['title'] ?>
					</span>
					با هزینه

					<span class="reviewSpan">
					0
					</span>
					تومان به شما تحویل داده خواهد شد

				</td>
			</tr>
		</table>

		<a href="showcart2" class="btn_green" style="float: left; margin: 8px;background-color: #4c4b4b;">ویرایش اطلاعات ارسال سفارش</a>



		<div class="btns" style="margin-top: 80px;">
			<a href="showcart4" class="btn_green" style="background-color: blue;">ثبت اطلاعات و ادامه خرید</a>
			<a href="showcart2" class="btn_green">بازگشت </a>
		</div>

	</div><!--sabad-->
</div><!--main-->


<script>

    /*select*/

    $('.select_guaranti').click(function () {
        $("ul", this).slideToggle(300);
    });

    $('.select_guaranti ul li').click(function () {
        var txt = $(this).text();
        $('.select_guaranti .guar_title').text(txt);
    });

    /*select*/
	


</script>
