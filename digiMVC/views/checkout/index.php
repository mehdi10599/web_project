
<link rel="stylesheet" href="public/css/checkout.css">

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
				<li class="active">
					<span class="circle"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">بازبینی سفارش</span><!--circle-->
				</li>
				<li class="active">
					<span class="circle" style="border: 2px solid green;"></span><!--circle-->
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

<?php
$orderInfo=$data['orderInfo'];
$basket=$orderInfo['basket'];
$basket=unserialize($basket);
$time_sabt=$orderInfo['time_sabt'];
$pastTime=time()-$time_sabt;
$mohlat=mohlatpay*3600;
if ($pastTime>$mohlat){
?>
	<div class="showError">
		خطا ! <br>
		مهلت ثبت این سفارش گذشته است . حداکثر مهلت پرداخت سفارشات
		<?= mohlatpay ?>
		ساعت میباشد!
	</div>
<?php } ?>
		<div class="table_Info" style="margin-top: 80px;">
			<h3>مشخصات محصولات خریداری شده</h3>
		<table id="products" cellspacing="0">
			<thead>
			<tr>
				<td>نام محصول</td>
				<td>رنگ</td>
				<td>گارانتی</td>
				<td>تعداد</td>
				<td>قیمت</td>
				<td>تخفیف</td>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($basket as $row){

			?>
			<tr>
				<td><?=$row['title']?></td>
				<td><?=$row['colorTitle']?></td>
				<td><?=$row['guarantyTitle']?></td>
				<td><?=$row['tedad']?></td>
				<td><?=$row['price']*$row['tedad']?></td>
				<td><?=$row['discountTotal']*$row['tedad']?></td>
			</tr>

			<?php } ?>
			</tbody>
		</table>
		</div><!--table_Info-->
<div class="row">
	<p>
		وضعیت پرداخت :
		<?php
		if ($orderInfo['pay']==0){echo "پرداخت نشده";}
		elseif ($orderInfo['pay']==1){echo "پرداخت شده";}
		?>
	</p>
	<p>
		نوع ارسال :
		<?php
		if ($orderInfo['post_type']==1){echo " پست پیشتاز";}
		elseif ($orderInfo['pay']==2){echo " پست سفارشی";}
		?>
	</p>
	<p>
		شماره سفارش :
		<?php
		echo $orderInfo['beforepay'];
		?>
	</p>
	<p>
		شماره تراکنش :
		<?php
		echo $orderInfo['afterpay'];
		?>
	</p>
	<p>
		مبلغ قابل پرداخت :
		<?php
		echo $orderInfo['amount'];
		?>
	</p>

	<?php
	if ($orderInfo['pay']==0 and $pastTime<$mohlat){
	?>
	<p>
		<a class="btn_green" href="checkout/payonline/<?= $orderInfo['id']?>">
			پرداخت آنلاین
		</a>
		<a class="btn_green" href="checkout/creditcard/<?= $orderInfo['id']?>">
			پرداخت کارت به کارت
		</a>
	</p>
	<?php } ?>
</div>
		<div class="table_Info">
			<h3>مشخصات تحویل گیرنده</h3>

		<table id="address" cellspacing="0">
			<thead>
			<tr>
				<td>نام تحویل گیرنده</td>
				<td>استان</td>
				<td>شهر</td>
				<td>آدرس</td>
				<td>موبایل</td>
				<td>شماره ثابت</td>
				<td>کد پستی</td>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?=$orderInfo['family'];?></td>
				<td><?=$orderInfo['ostan'];?></td>
				<td><?=$orderInfo['city'];?></td>
				<td><?=$orderInfo['address'];?></td>
				<td><?=$orderInfo['mobile'];?></td>
				<td><?=$orderInfo['tel'];?></td>
				<td><?=$orderInfo['code_posti'];?></td>
			</tr>
			</tbody>
		</table>
		</div><!--table_Info-->


	</div><!--sabad-->
</div><!--main-->



















