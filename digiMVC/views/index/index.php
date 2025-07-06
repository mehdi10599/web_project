<link rel="stylesheet" href="public/css/index.css">


<div class="main">

	<?php
		require_once "banner_top.php";
		require_once "sidebar_right.php";
	?>

	<div id="content">


		<?php
			require_once "slider_top.php";
			require_once "services_features.php";
			require_once "slider2.php";
			require_once "only_in_digikala.php";
			require_once "direct_access.php";
			require_once "porbazdid.php";
			require_once "porforoosh.php";
			require_once "jadidtarinha.php";
		 ?>


	</div><!--content-->

</div><!--main-->


<script>

	/*slider_scrol*/
	function scrollslider(direction,tag){

        var sliderscrollMain = $(tag).parent(".sliderscroll_bottum").find(".sliderscroll_main");
        var sliderscrollMainUl = sliderscrollMain.find("ul");
        var sliderscrollMainUlLi = sliderscrollMainUl.find("li");
        var sliderItemNumbers = sliderscrollMainUlLi.length;
        var sliderNumbers = Math.ceil(sliderItemNumbers/4);
        var maxNegativeMargin = -(sliderNumbers-1)*760;

        sliderscrollMainUl.css("width",sliderItemNumbers*190);

	    var marginRightOld = parseFloat(sliderscrollMainUl.css("margin-right"));
        var marginRightNew;
        
        if(direction == "next"){
	        marginRightNew = marginRightOld-760;
	        if(marginRightNew < maxNegativeMargin){
	            marginRightNew = 0;
			}
		}
	    if(direction == "prev"){
            marginRightNew = marginRightOld+760;
            if(marginRightNew > 0){
                marginRightNew = maxNegativeMargin;
            }
		}
        sliderscrollMainUl.animate({"marginRight":marginRightNew},1000);
	}

	/*slider_scrol*/

</script>
