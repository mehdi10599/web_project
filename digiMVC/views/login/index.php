<link rel="stylesheet" href="public/css/login.css">
<?php
$loginError=$data['loginError'];

?>
<div class="main">

	<div id="register">

		<div class="top">
			<i></i>
			<h2> ورود به دیجی کالا </h2>

		</div><!--top-->

		<div class="bottom">

			<?php if ($loginError==1){	?>
				<h2 class="error">
					نام کاربری یا رمز عبور اشتباه میباشد !
				</h2>
			<?php } ?>
<form action="login/checkUser" method="post" style="display: inline;">
			<div class="right">
				<div>
					<label>پست الکترونیکی</label>
					<input type="text" name="email">
				</div>
				<div>
					<label>رمز عبور</label>
					<input type="text" name="password">
				</div>
				<div style="margin: 15px 0 0 0;">
					<label class="check_label">
						<i></i>
						<input class="regCheckbox" type="checkbox" name="">
						<span>
							مرا بخاطر بسپار
						</span>
					</label>
					<a class="forgetPass" href="#">رمز عبورم را فراموش کرده ام</a>
				</div>
				<div style="margin: 0 0 20px 0;">
					<button>ورود به دیجی کالا</button>
				</div>

			</div><!--right-->
</form>


			<div class="left">
				<div>سریع تر و ساده تر خرید کنید</div>
				<div>به سادگی سوابق خرید خود را مدیریت کنید</div>
				<div>لیست علاقه مندی های خود را بسازید و تغییرات آنها را دنبال کنید</div>
			</div><!--left-->

		</div><!--bottom-->

	</div><!--register-->

</div><!--main-->



<script>

    /*check boxes*/

    $(".check_label").click(function () {
        if($(this).find(".regCheckbox").is(":checked")){
            $(this).find("i").addClass("checked_input");
        }
        else{
            $(this).find("i").removeClass("checked_input");
        }
    });

    /*check boxes*/


</script>