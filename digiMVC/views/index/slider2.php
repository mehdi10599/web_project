<link rel="stylesheet" href="public/css/flipTimer.css">
<script src="public/js/jquery.flipTimer.js"></script>


<div id="slider2">
	<div id="slider2_content">

		<div id="slider2_finished">
			تمام شد !
		</div>

		<div class="flipTimer">
			<!--<div class="days"></div>-->
			<div class="hours"></div>
			<div class="minutes"></div>
			<div class="seconds"></div>
		</div><!--flipTimer-->

		<?php

		$result = $data[1];
		$date_end = $data[2];

		foreach ($result as $row) {
			?>

			<a class="item" href="<?= URL ?>product/index/<?= $row['id'] ?>">
				<div class="slider2_content_right">
					<p class="title">جشنواره ماه نو</p>
					<div class="price_info">
						<div class="price_info_right">
							<?= $row['price']; ?>
						</div>
						<div class="price_info_left">
							<span><?= $row['finalprice']; ?></span>
							<span>تومان</span>
						</div>
					</div>
					<p class="slider2_content_right_features">
						توان : 2.5 وات
					</p>
					<p class="slider2_content_right_features">
						مقاوم در برابر ضربه
					</p>
				</div><!--slider2_content_right-->
				<div class="slider2_content_left">
					<p><?= $row['title']; ?></p>
					<img src="public/images/products/<?= $row['id']; ?>/product_220.jpg"/>
				</div><!--slider2_content_left-->
			</a>


			<?php
		}
		?>
	</div><!--slider2_content-->
	<div id="slider2_navigator">
		<ul>


			<?php

			$result = $data[1];

			foreach ($result as $row) {
				?>

				<li><?= $row['title']; ?></li>

				<?php
			}
			?>
		</ul>
	</div><!--slider2_navigator-->
</div><!--slider2-->

<script>


    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $date_end; ?>',
        callback: function () {
            $('#slider2_finished').fadeIn(300);
        }

    });


    // slider2
    var slider2 = $("#slider2");
    var slider2_content = $('#slider2_content');
    var slider2_items = slider2_content.find('.item');
    var slider2_navigator = slider2.find("#slider2_navigator ul li");
    var next_slide2 = 1;
    var slider_num2 = slider2_items.length;
    var timeOut2 = 3000;

    function slider_2() {
        if (next_slide2 > slider_num2) {
            next_slide2 = 1;
        }
        if (next_slide2 < 1) {
            next_slide2 = slider_num2;
        }
        slider2_navigator.removeClass("active");
        slider2_navigator.eq(next_slide2 - 1).addClass("active");
        slider2_items.hide();
        slider2_items.eq(next_slide2 - 1).fadeIn(300);

    }

    slider_2();

    var slider_Interval2 = setInterval(function () {
        next_slide2++;
        slider_2();
    }, timeOut2);

    slider2.mouseleave(function () {
        clearInterval(slider_Interval2);
        slider_Interval2 = setInterval(function () {
            next_slide2++;
            slider_2();
        }, timeOut2)
    });


    function gotoslide2(index) {
        next_slide2 = index;
        slider_2();
    }

    $('#slider2_navigator ul li').click(function () {
        clearInterval(slider_Interval2);
        var index = $(this).index();
        gotoslide2(index + 1);
    });


    // slider2


</script>