
<link rel="stylesheet" href="public/css/flipTimer.css">
<script src="public/js/jquery.flipTimer.js"></script>


<div class="offer">
	<div class="discount">
		<div class="right">
			<span><?= $productinfo['price_discount']?></span>
		</div>
		<div class="center">
			<span style="line-height: 28px;"> تومان</span>
		</div>
		<div class="left">
			<span>تخفیف</span>
		</div>
	</div><!--discount-->
	<div class="flipTimer">
		<div class="hours"></div>
		<div class="minutes"></div>
		<div class="seconds"></div>
	</div><!--timer-->
</div><!--offer-->

<script>

    /*flip Timer*/
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $productinfo["date_end"]?>',
        callback: function () {
            $('#slider2_finished').fadeIn(300);
        }

    });
    /*flip Timer*/


</script>