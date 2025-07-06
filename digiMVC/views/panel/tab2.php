
<div style=" display: block;">
	<table cellspacing="0">
		<tbody>
		<tr>
			<td>ردیف</td>
			<td>کد</td>
			<td>تاریخ</td>
			<td>مبلغ</td>
			<td>وضعیت</td>
			<td>عملیات پرداخت</td>
			<td>نوع</td>
			<td>جزییات</td>
		</tr>
		<?php
		$order = $data['order'];
		$i=1;
		foreach ($order as $row) {
			$status=$row['status'];
			?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $row['id'] ?></td>
				<td><?= $row['id'] ?></td>
				<td style="font-family: tahoma;"><?= number_format($row['amount']); ?></td>
				<td>
					<?= $row['title'];	?>
				</td>
				<td><a href="checkout/index/<?= $row['id']?>">صفحه پرداخت</a></td>
				<td>سفارش</td>
				<td class="details">
					<img onclick="showDetails(this);" src="public/images/orderdetailsopen.png">
				</td>
			</tr>
			<tr class="subTr">
				<td colspan="8">
					<div class="subDetails">
						<table cellspacing="0">
							<tbody>
							<tr>
								<td>کالا</td>
								<td>تعداد</td>
								<td>قیمت واحد</td>
								<td>قیمت کل</td>
								<td>تخفیف کل</td>
								<td>مبلغ کل</td>
							</tr>
							<?php
							$basket=unserialize($row['basket']);
							foreach ($basket as $row2){
								$price=$row2['price'];
								$tedad=$row2['tedad'];
								$discount=$row2['discount']*$price/100;
								$priceAll=$price*$tedad;
								$discountAll=$discount*$tedad;
								$priceFinal=$priceAll-$discountAll;
							?>
							<tr>
								<td><?= $row2['title'] ?></td>
								<td><?= $row2['tedad'] ?></td>
								<td><?= $row2['price'] ?></td>
								<td><?= $priceAll ?></td>
								<td><?= $discountAll ?></td>
								<td><?= $priceFinal ?></td>
							</tr>
							<?php } ?>
							</tbody>
						</table>

						<div class="order_steps">
							<div class="dashed">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div><!--dashed-->
							<ul>
								<li class="<?php if ($status>=2){echo "active";}?>">
									<span class="circle"></span><!--circle-->
									<span class="line"></span><!--circle-->
									<span class="title">تایید سفارش</span><!--circle-->
								</li>
								<li class="<?php if ($status>=4){echo "active";}?>">
									<span class="circle"></span><!--circle-->
									<span class="line"></span><!--circle-->
									<span class="title">پرداخت</span><!--circle-->
								</li>
								<li class="<?php if ($status>=5){echo "active";}?>">
									<span class="circle"></span><!--circle-->
									<span class="line"></span><!--circle-->
									<span class="title">پردازش انبار</span><!--circle-->
								</li>
								<li class="<?php if ($status>=6){echo "active";}?>">
									<span class="circle"></span><!--circle-->
									<span class="line"></span><!--circle-->
									<span class="title">آماده ارسال</span><!--circle-->
								</li>
								<li class="<?php if ($status>=7){echo "active";}?>">
									<span class="circle"></span><!--circle-->
									<span class="title">ارسال شده</span><!--circle-->
								</li>
							</ul>
							<div class="dashed">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div><!--dashed-->
						</div><!--order_steps-->

						<div class="more">
							<table cellspacing="0">
								<tbody>
								<tr>
									<td>
										روش ارسال :
										<?php
										if ($row['post_type']==1){echo "پست پیشتاز";}
										else if ($row['post_type']==2){echo "پست سفارشی";}
										?>

									</td>
									<td>
										زمان ارسال :
									-
									</td>
									<td>
										کد مرسوله :
										<?= $row['barcode'] ?>
									</td>
								</tr>
								<tr>
									<td>
										آدرس تحویل :
										<?= $row['address'] ?>
									</td>
									<td>
										تحویل گیرنده :
										<?= $row['family'] ?>
									</td>
									<td>
										شماره تماس:
										<?= $row['mobile'] ?>
									</td>
								</tr>
								</tbody>
							</table>
						</div><!--more-->

					</div><!--subDetails-->
				</td>
			</tr>
			<?php
			$i++;
		}
		?>
		</tbody>
	</table>
</div>



<script>

    /*order details*/
    function showDetails(tag){
        var imgTag = $(tag);
        var nextTr = imgTag.parents("tr").next();
        nextTr.fadeToggle(0);

        imgTag.toggleClass("active");
        if(imgTag.hasClass("active")){
            imgTag.attr("src","public/images/orderdetailsclose.png");
        }
        else {
            imgTag.attr("src","public/images/orderdetailsopen.png");
        }
    }
    /*order details*/

</script>