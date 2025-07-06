<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?= URL ?>">
	<meta charset="UTF-8">
	<title>فروشگاه اینترنتی دیجیکالا</title>
	<link rel="stylesheet" href="public/css/header.css">
	<link rel="stylesheet" href="public/css/footer.css">
	<script src="public/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
	<div id="header">
		<div id="header_right">
			<div id="header_right_top">
				<span id="login_top"></span>
				<a id="login_top_a" class="fontsm" href="<?= URL?>login">فروشگاه اینترنتی دیجیکالا، وارد شوید</a>
				<span id="signup_top"></span>
				<a id="signup_top_a" class="fontsm" href="<?= URL?>register">ثبت نام کنید </a>
			</div>
			<div id="header_right_bottom">
				<div id="basket_top">
					<div id="basket_top_right"></div>
					<div id="basket_top_left" class="fontsm">
						<a href="#">
							سبد خرید
							<span>0</span>
						</a>
					</div>
				</div>
				<div id="search_top">
					<input type="text" class="fontsm" placeholder="کالا،برند یا محصول مورد نظر خود را جستجو کنید...">
					<span></span>
				</div>
			</div>
		</div>
		<div id="header_left">
			<a href="index/index">
				<img src="public/images/logo.png" width="149px" height="40px" alt="logo">
			</a>
		</div>
	</div>
</header>

<nav>
	<div id="menu_top">
		<ul>
			<li data-timer="1">
				<a href="#" class="fontsm">
					کالای دیجیتال
					<span class="menu_arrow"></span>
				</a>
				<ul class=" fontvs topmenu2">
					<li data-timer="2">

						<a href="#">
							موبایل
						</a>

						<div class="topmenu3">
							<div>
								<ul class="topmenu3_col">
									<li>گوشی موبایل</li>
									<li>Apple</li>
									<li>Sumsung</li>
								</ul>
							</div>
							<div></div>
							<div></div>
							<div></div>
							<img src="public/images/mobile.png" alt="mobile">
						</div>

					</li>
					<li data-timer="3">

						<a href="#">
							تبلت و کتابخوان
						</a>

						<div class="topmenu3">
							<div>
								<ul class="topmenu3_col">
									<li> تبلت</li>
									<li>تبلت 1</li>
									<li>تبلت 2</li>
								</ul>
							</div>
							<div></div>
							<div></div>
							<div></div>
							<img src="public/images/tablet-ebook-reader.png" alt="tablet">
						</div>

					</li>
				</ul>
			</li>
			<li data-timer="4">
				<a href="#" class="fontsm">
					لوازم خانگی
					<span class="menu_arrow"></span>
				</a>
				<ul class="fontvs topmenu2">
					<li data-timer="5">
						<a href="#">
							صوتی تصویری
						</a>
						<div class="topmenu3">
							<div>
								<ul class="topmenu3_col">
									<li> صوتی تصویری</li>
									<li>صوتی تصویری 1</li>
									<li>صوتی تصویری 2</li>
								</ul>
							</div>
							<div></div>
							<div></div>
							<div></div>
							<img src="public/images/video-audio-entertainment.png" alt="mobile">
						</div>
					</li>
					<li data-timer="6">
						<a href="#">
							لوازم خانگی برقی
						</a>
						<div class="topmenu3">
							<div>
								<ul class="topmenu3_col">
									<li> لوازم خانگی برقی</li>
									<li>لوازم خانگی برقی 1</li>
									<li>لوازم خانگی برقی 2</li>
								</ul>
							</div>
							<div></div>
							<div></div>
							<div></div>
							<img src="public/images/mobile.png" alt="mobile">
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
