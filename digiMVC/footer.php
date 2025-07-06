<?php
$option=Model::getoption();

?>



<footer>

	<div id="footer_top">
		<div class="main">
			<p>7 روز هفته ، 24 ساعت روز آماده پاسخگویی هستیم</p>
			<span class="email"><a href="#"><?= $option['email'];?></a></span>
			<span class="questions"><a href="#">سوالات متداول</a></span>
			<span class="tel"><a href="#"><?= $option['tel'];?></a></span>
		</div><!--main-->
	</div><!--footer_top-->

	<div id="footer_bottom">
		<div class="main">
			<div class="right">
				<ul>
					<li>
						<a href="#">راهنمای خرید از دیجی کالا</a>
					</li>
					<li>
						<a href="#">ثبت سفارش </a>
					</li>
					<li>
						<a href="#">رویه های ارسال سفارش</a>
					</li>
					<li>
						<a href="#">شیوه های پرداخت</a>
					</li>
					<li>
						<a href="#">معرفی دیجی بن</a>
					</li>
				</ul>
			</div><!--right-->
			<div class="center">
				<ul>
					<li>
						<a href="#">خدمات مشتریان</a>
					</li>
					<li>
						<a href="#">ثبت سفارش </a>
					</li>
					<li>
						<a href="#">رویه های ارسال سفارش</a>
					</li>
					<li>
						<a href="#">شیوه های پرداخت</a>
					</li>
					<li>
						<a href="#">معرفی دیجی بن</a>
					</li>
				</ul>
			</div><!--center-->
			<div class="left">
				<p>اولین نفری که مطلع میشود ، باشید !</p>
				<div class="email_subscribe">
					<input type="text" placeholder="لطفا ایمیل خود را وارد نمایید">
					<button>تایید ایمیل</button>
				</div>
				<div class="socials">
					<a href="#">
						<img src="public/images/ios_app_bg.png">
					</a>
					<a href="#">
						<img src="public/images/android_app_bg.png">
					</a>

					<div class="social_btn">
						<a href="#"  id="telegram"></a>
						<a href="#"  id="facebook"></a>
						<a href="#"  id="instagram"></a>
						<a href="#"  id="googleplus"></a>
						<a href="#"  id="tweeter"></a>
						<a href="#"  id="linkdin"></a>
						<a href="#"  id="aparat"></a>
					</div>

				</div>

			</div><!--left-->
		</div><!--main-->
	</div><!--footer_bottom-->

</footer>

<script>

    //menu_top

    var timer = {};
    var timer1 = {};
    $("#menu_top li").hover(function () {

        var tag = $(this);

        var timerAttr = tag.attr('data-timer');

        clearTimeout(timer[timerAttr]);

        timer[timerAttr] = setTimeout(function () {

            $(" > .topmenu2", tag).fadeIn(100);
            $(" > .topmenu3", tag).fadeIn(100);

        }, 500);


    }, function () {

        var tag = $(this);

        var timerAttr = tag.attr('data-timer');

        clearTimeout(timer[timerAttr]);

        timer[timerAttr] = setTimeout(function () {

            $(" > .topmenu2", tag).fadeOut(100);
            $(" > .topmenu3", tag).fadeOut(100);

        }, 500);

    });


    $("#menu_top>ul >li").hover(function () {

        var tag1 = $(this);

        var timerAttr = tag1.attr('data-timer');

        clearTimeout(timer1[timerAttr]);

        timer1[timerAttr] = setTimeout(function () {

            tag1.addClass("active_menu");

        }, 500);


    }, function () {

        var tag1 = $(this);

        var timerAttr = tag1.attr('data-timer');

        clearTimeout(timer1[timerAttr]);

        timer1[timerAttr] = setTimeout(function () {

            tag1.removeClass("active_menu");

        }, 500);

    });

    //menu_top

</script>

</body>
</html>