<?php
$statInfo = $data['statInfo'];
?>
<div class="box">
	<div class="header">
		<i id="report_icon"></i>
		<span>گزارش عملکرد </span>
	</div><!--header-->
	<table>
		<tr>
			<td>
				<span class="title">تعداد کل سفارشات : </span>
				<span class="value"><?= $statInfo['orderNum'] ?></span>
			</td>
			<td>
				<span class="title">تعداد کل دیجی بن دریافتی : </span>
				<span class="value">mrlvl</span>
			</td>
			<td>
				<span class="title">تعداد نظرات ارسال شده : </span>
				<span class="value"><?= $statInfo['commentNum'] ?></span>
			</td>
		</tr>
		<tr>
			<td>
				<span class="title">تعداد سفارشات در انتظار تایید : </span>
				<span class="value"><?= $statInfo['order_taeed'] ?></span>
			</td>
			<td>
				<span class="title">دیجی بن مصرفی : </span>
				<span class="value">mrlvl</span>
			</td>
			<td>
				<span class="title">تعداد نقد های ارسال شده :</span>
				<span class="value">mrlvl</span>
			</td>
		</tr>
		<tr>
			<td>
				<span class="title">سفارشات در حال پردازش : </span>
				<span class="value"><?= $statInfo['order_pardazesh'] ?></span>
			</td>
			<td>
				<span class="title">دیجی بن های باطل شده : </span>
				<span class="value">mrlvl</span>
			</td>
			<td>
				<span class="title">پیغام های خوانده نشده : </span>
				<span class="value"><?= $statInfo['message_unread'] ?></span>
			</td>
		</tr>

	</table>
</div><!--box-->

