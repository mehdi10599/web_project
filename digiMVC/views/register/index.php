<link rel="stylesheet" href="public/css/register.css">

<div class="main">

	<div id="register">

		<div class="top">
			<i></i>
			<h2>به دیجی کالا بپیوندید</h2>
		</div><!--top-->

		<div class="bottom">

			<div class="right">
				<div>
					<label>پست الکترونیکی</label>
					<input type="text">
				</div>
				<div>
					<label>رمز عبور</label>
					<input type="text">
				</div>
				<div style="margin: 15px 0 0 0;">
					<label class="check_label">
						<i></i>
						<input class="regCheckbox" type="checkbox">
						<span>
							قوانین را مطالعه نموده ام و موافق هستم
						</span>


					</label>

				</div>
				<div style="margin:0;">
					<label class="check_label">
						<i></i>
						<input class="regCheckbox" type="checkbox">
						<span>
							خبرنامه را برای من ارسال کن
						</span>

					</label>

				</div>
				<div style="margin: 0 0 20px 0;">
					<button>ثبت نام</button>
				</div>

			</div><!--right-->

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
