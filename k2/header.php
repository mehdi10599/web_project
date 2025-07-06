<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?= URL ?>">
	<meta charset="UTF-8">
	<title>INDUSTIAL ROPE ACCESS K2</title>
	<link rel="stylesheet" href="public/css/header.css">
	<link rel="stylesheet" href="public/css/footer.css">
	<script src="public/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
	<div id="header">

		<div id="header_left">
			<a href="index/index">
				<img src="public/images/logo.png" width="149px" height="40px" alt="logo">
			</a>
		</div>

		<nav>
			<div class="menuItems" data-timer="1">
				<a href="#">Home</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="2">
				<a href="#">projects</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="3">
				<a href="#">our services</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="4">
				<a href="#">training</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="5">
				<a href="#">blog</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="6">
				<a href="#">about us</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="7">
				<a href="#">contact us</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
			<div class="menuItems" data-timer="8">
				<a href="#">language</a>
				<ul>
					<li>Turkce</li>
					<li>English</li>
					<li>Arabic</li>
					<li>Persian</li>
				</ul>
			</div>
		</nav>
	</div><!--header-->

	<script>
		var timer ={};
		$("nav .menuItems").hover(function () {
		    tag = $(this);
		    timerIndex=tag.attr("data-timer");
		    clearTimeout(timer[timerIndex]);
		    timer[timerIndex]=setTimeout(function () {
                tag.find("ul").slideDown(200);
            },200)

        },function () {
            tag = $(this);
            timerIndex=tag.attr("data-timer");
            clearTimeout(timer[timerIndex]);
			tag.find("ul").slideUp(150);
        });

	</script>
</header>

