
<link rel="stylesheet" href="public/css/checkout.css">

<div class="main">
	<div class="sabad">
<h3 style="border-bottom: 1px solid #ccc;">اطلاعات واریز کارت به کارت</h3>
		<?php
		$orderInfo=$data['orderInfo'];
		?>
<div class="row2">
	<form action="checkout/creditcard/<?=$orderInfo['id']?>" method="post">
	<span class="title">تاریخ : </span>
	<label>روز</label>
	<select name="day">
		<?php
		for ($i=1;$i<32;$i++)
		{
			?>
		<option value="<?=$i?>"><?=$i?></option>
		<?php
		}
		?>
	</select>
	<label>ماه</label>
	<select name="month">
		<?php
		for ($i=1;$i<13;$i++)
		{
			?>
		<option value="<?=$i?>"><?=$i?></option>
		<?php
		}
		?>
	</select>
	<label>سال</label>
	<select name="year">
		<option>1398</option>
		<option>1399</option>
	</select>

</div>

<div class="row2">
	<span class="title">زمان واریز : </span>
	<label>ساعت</label>
	<select name="hour">
		<?php
		for ($i=0;$i<24;$i++)
		{
			?>
		<option value="<?=$i?>"><?=$i?></option>
		<?php
		}
		?>
	</select>
	<label>دقیقه</label>
	<select name="minute">
		<?php
		for ($i=0;$i<60;$i++)
		{
			?>
		<option value="<?=$i?>"><?=$i?></option>
		<?php
		}
		?>
	</select>
</div>

<div class="row2">
	<span class="title"> نام بانک صادر کننده کارت : </span>
	<input type="text" name="bank">
</div>
<div class="row2">
	<span class="title"> شماره کارت : </span>
	<input type="text" name="cardnumber">
</div>

<div class="row2">
	<a class="btn_green" onclick="submitForm()">ثبت اطلاعات</a>
</div>
		</form>
	</div><!--sabad-->
</div><!--main-->

<script>
	function submitForm() {
		$('form').submit();
    }
</script>
















