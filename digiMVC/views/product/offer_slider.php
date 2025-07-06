

<div class="sliderscroll">

	<div class="sliderscroll_top">
		<h3>خریداران این محصول ، محصولات زیر را نیز خریده اند</h3>
	</div><!--sliderscroll_top-->

	<div class="sliderscroll_bottum">

		<div class="sliderscroll_prev" onclick="scrollslider('prev',this);">
			<span></span>
		</div><!--sliderscroll_prev-->

		<div class="sliderscroll_main">
			<ul>

				<?php
				$onlyDigi=$data['onlyDigi'];
				foreach ($onlyDigi as $row)
				{
				?>


					<li class="sliderscroll_main_item">
						<a href="<?= URL ?>product/index/<?= $row['id'] ?>">
							<img src="public/images/products/<?= $row['id']; ?>/product_220.jpg">
						</a>
						<img src="public/images/exclusive-blue.png">
						<p><?= $row['title']; ?></p>
						<p><?= $row['price']; ?></p>
					</li>

				<?PHP } ?>

			</ul>
		</div><!--sliderscroll_main-->

		<div class="sliderscroll_next"  onclick="scrollslider('next',this);">
			<span></span>
		</div><!--sliderscroll_next-->

	</div><!--sliderscroll_bottum-->

</div><!--sliderscroll_onlyDigikala-->







<script>


    /*slider_scrol*/


    function scrollslider(direction,tag){

        var sliderscrollMain = $(tag).parent(".sliderscroll_bottum").find(".sliderscroll_main");
        var sliderscrollMainUl = sliderscrollMain.find("ul");
        var sliderscrollMainUlLi = sliderscrollMainUl.find("li");
        var sliderItemNumbers = sliderscrollMainUlLi.length;
        var sliderNumbers = Math.ceil(sliderItemNumbers/5);
        var maxNegativeMargin = -(sliderNumbers-1)*1080;

        sliderscrollMainUl.css("width",sliderItemNumbers*216);

        var marginRightOld = parseFloat(sliderscrollMainUl.css("margin-right"));
        var marginRightNew;

        if(direction == "next"){
            marginRightNew = marginRightOld-1080;
            if(marginRightNew < maxNegativeMargin){
                marginRightNew = 0;
            }
        }
        if(direction == "prev"){
            marginRightNew = marginRightOld+1080;
            if(marginRightNew > 0){
                marginRightNew = maxNegativeMargin;
            }
        }
        sliderscrollMainUl.animate({"marginRight":marginRightNew},1000);
    }

    /*slider_scrol*/

</script>