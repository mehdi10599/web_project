<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="public/js/jquery-3.3.1.min.js"></script>
	<script src="public/slider/jquery-ui.min.js"></script>
	<script src="public/slider/slider.js"></script>
	<link href="public/slider/style.css" rel="stylesheet">
	<title>slider</title>
</head>
<body>
	<input type="hidden" class="flat-slider">
<script>
	$(".flat-slider").flatslider({
        min: 1,
        max: 5,
        valuesssss: 3,
        step: 1
	});
</script>
</body>
</html>