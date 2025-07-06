
	<link rel="stylesheet" href="public/css/showcart4.css">

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
				<li>
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
$Status = $data['Status'];
if ($Status!=""){
?>
	<div class="showError">
		خطا ! <br>
		<?php
		$zarinpalErrorsArray=unserialize(zarinpalErrors);
		echo $Error=$zarinpalErrorsArray[$Status];
		 ?>
	</div>

<?php } ?>
<form action="showcart4/saveorder" method="post">
		<div class="head">
			<h4>کد تخفیف </h4>
		</div><!--head-->

		<div class="code">
			<table cellspacing="0">
				<tr>
					<td style="width: 70%;">
						<span style="font-size: 12pt; font-weight: bold;">کد تخفیف دیجیکالا دارم </span>
						<br>
						<span style="font-size: 10pt;">اگر مایل هستید از کد تخفیف دیجیکالا استفاده کنید، کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت مبلغ آن از جمع کل قابل پرداخت کسر می شود</span>
					</td>
					<td style="width: 20%;">
						<input type="text" name="codetakhfif" id="code_takhfif">
						<img src="public/images/OK.jpg" class="takhfifOK" >
						<img src="public/images/NOK.png" class="takhfifNOK" >
					</td>
					<td style="width: 10%;">
						<span class="btn_green" onclick="codetakhfif()">ثبت کد تخفیف</span>
					</td>
				</tr>
			</table>
		</div><!--code-->



		<div class="head">
			<h4>کد هدیه</h4>
		</div><!--head-->

		<div class="code">
			<table cellspacing="0">
				<tr>
					<td style="width: 70%;">
						<span style="font-size: 12pt; font-weight: bold;">کد هدیه دیجیکالا دارم </span>
						<br>
						<span style="font-size: 10pt;">اگر مایل هستید از کد هدیه دیجیکالا استفاده کنید، کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت مبلغ آن از جمع کل قابل پرداخت کسر می شود</span>
					</td>
					<td style="width: 20%;">
						<input type="text">
					</td>
					<td style="width: 10%;">
						<span class="btn_green" style="background-color: blue;">ثبت کد هدیه</span>
					</td>
				</tr>
			</table>
		</div><!--code-->


		<div class="totalprice">
			<table>
				<tr>
					<td>مبلغ قابل پرداخت</td>
					<td><span id="finalPrice">184,500</span> تومان</td>
				</tr>
			</table>
		</div><!--totalprice-->


		<div class="head">
			<h4>روش پرداخت </h4>
		</div><!--head-->

		<div class="pay_method">

			<div class="shiveErsal">
				<table cellspacing="0" class="active">
					<tr>
						<td class="circle" style="position: relative;width: 5%;">
							<i></i>
							<span></span>
						</td>
						<td>
							<div style="font-size: 12pt;margin: 15px;margin-top: 0;">پرداخت اینترنتی</div>
							<span class="bank_pay">
								<i class="circle_inner active"></i>
								<input type="radio" name="paytype" value="1" checked="checked">
								درگاه پرداخت  زرین پال
							</span>
							<span class="bank_pay">
								<i class="circle_inner "></i>
								<input type="radio" name="paytype" value="2">
								درگاه پرداخت بانک سامان
							</span>
							<span class="bank_pay">
								<i class="circle_inner"></i>
								<input type="radio" name="paytype" value="3">
								درگاه پرداخت بانک پارسیان
							</span>
						</td>
					</tr>
				</table>
				<table cellspacing="0">
					<tr>
						<td class="circle" style="position: relative;width: 5%;">
							<i></i>
							<input type="radio" name="paytype" value="4">
							<span></span>
						</td>
						<td>
							<div style="font-size: 12pt;margin: 15px;margin-top: 0;">کارت به کارت</div>
							<span class="pay_sub">شما میتوانید وجه سفارش خود را به صورت انتقال وجه کارت به کارت پرداخت نمایید</span>
						</td>
					</tr>
				</table>
				<table cellspacing="0">
					<tr>
						<td class="circle" style="position: relative;width: 5%;">
							<i></i>
							<input type="radio" name="paytype" value="5">
							<span></span>
						</td>
						<td>
							<div style="font-size: 12pt;margin: 15px;margin-top: 0;">واریز به حساب</div>
							<span class="pay_sub">شما میتوانید وجه سفارش خود را با مراجعه به شعب بانک و وایز مبلغ به حساب دیجیکالا پرداخت نمایید</span>
						</td>
					</tr>
				</table>
			</div><!--shiveErsal-->

		</div><!--pay_method-->

		<div class="btns">
			<a class="btn_green" onclick="submitForm()" style="background-color: blue;">پرداخت و تکمیل خرید</a>
			<a href="#" class="btn_green">بازگشت </a>
		</div>
</form>
	</div><!--sabad-->
</div><!--main-->

<script>

	function submitForm()
	{
	    $("form").submit();
	}

	/* دستورات مربوط به اینپوت های radio و دایره های جدول نوع پرداخت */
	$(".shiveErsal table :not(table:first-of-type) td.circle").click(function () {
        $(".circle_inner").removeClass("active");

        $("input[name=paytype]").attr("checked",false);
        $(this).find("input[name=paytype]").attr("checked",true);

    });

	$(".shiveErsal table:first-of-type td.circle").click(function () {
		$(this).next("td").find(".bank_pay:first-of-type .circle_inner").addClass("active");

        $("input[name=paytype]").attr("checked",false);
        $(this).next("td").find(".bank_pay:first-of-type input[name=paytype]").attr("checked",true);

    });

	$("td.circle").click(function () {
		$("td.circle").parents("table").removeClass("active");
		$(this).parents("table").addClass("active");

    });

	$(".circle_inner").click(function () {
        $("td.circle").parents("table").removeClass("active");
        $(this).parents("table").addClass("active");
		$(".circle_inner").removeClass("active");
		$(this).addClass("active");

		$("input[name=paytype]").attr("checked",false);
		$(this).next("input[name=paytype]").attr("checked",true);
    });
    /* دستورات مربوط به اینپوت های radio و دایره های جدول نوع پرداخت */



	function calculateFinalPrice() {
        var code = $("#code_takhfif").val();
		var url="showcart4/getTotalPrice/"+code;
		var data={};
		$.post(url,data,function (msg) {
			$("#finalPrice").text(msg);
        })
    }
    calculateFinalPrice();


	function codetakhfif() {
		var code = $("#code_takhfif").val();
		var url = "showcart4/codetakhfif/"+code;
		var data = {};
		$.post(url,data,function (msg) {
			if (msg==true)
			{
                $("#code_takhfif").addClass("green").removeClass("red");
                $(".takhfifOK").show();
                $(".takhfifNOK").hide();

			}
			else
			{
                $("#code_takhfif").addClass("red").removeClass("green");
                $(".takhfifNOK").show();
                $(".takhfifOK").hide();
			}
            calculateFinalPrice();
        })
    }


</script>


















