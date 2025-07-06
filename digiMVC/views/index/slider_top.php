<div id="slider_top">
	<span class="prev"></span>
	<span class="next"></span>

	<div id="slider_top_main">
		<?php

		$slider = $data[0];

		foreach ($slider as $slider1) {
			?>

			<a class="item" href="<?= $slider1['link']; ?>">
				<img src="<?= $slider1['src']; ?>">
			</a>

			<?php
		}
		?>

	</div><!--slider_top_main-->

	<div id="slider_top_navigator">
		<ul>
			<li>
				محصول کالای خواب
			</li>
			<li>
				لوازم جانبی دوربین
			</li>
			<li>
				سری جدید vaio
			</li>
			<li>
				کتب معنوی
			</li>
			<li>
				لوازم خانگی
			</li>
		</ul>
	</div><!--slider_top_navigator-->
</div><!--slider_top-->


<script>

    // slider_top

    var slider_top = $("#slider_top");
    var slider_top_main = $('#slider_top_main');
    var slider_top_items = slider_top_main.find('.item');
    var slider_top_navigators = slider_top.find("#slider_top_navigator ul li");
    var next_slide = 1;
    var slider_num = slider_top_items.length;
    var timeOut = 3000;

    function slider() {
        if (next_slide > slider_num) {
            next_slide = 1;
        }
        if (next_slide < 1) {
            next_slide = slider_num;
        }
        slider_top_navigators.removeClass("active");
        slider_top_navigators.eq(next_slide - 1).addClass("active");
        slider_top_items.hide();
        slider_top_items.eq(next_slide - 1).fadeIn(300);

    }

    function gotoprev() {
        next_slide = next_slide - 1;
        slider();
    }

    function gotonext() {
        next_slide++;
        slider();
    }

    slider_top.find(".prev").click(function () {
        clearInterval(slider_Interval);
        gotoprev();
    });

    slider_top.find(".next").click(function () {
        clearInterval(slider_Interval);
        gotonext();
    });
    slider();

    var slider_Interval = setInterval(function () {
        next_slide++;
        slider();
    }, timeOut);

    slider_top.mouseleave(function () {
        clearInterval(slider_Interval);
        slider_Interval = setInterval(function () {
            next_slide++;
            slider();
        }, timeOut)
    });


    function gotoslide(index) {
        next_slide = index;
        slider();
    }

    $('#slider_top_navigator ul li').hover(function () {
        clearInterval(slider_Interval);
        var index = $(this).index();
        gotoslide(index + 1);
    }, function () {
    });

    // slider_top


</script>