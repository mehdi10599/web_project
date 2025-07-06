
<div class="search_box">
	<input type="text">
	<span class="serch_icon"></span>

	<span class="exist">
				<span class="exist_fg"></span>
			</span>
	<span class="exist_txt">فقط نمایش کالاهای موجود</span>

	<div class="showtype">
		<span>نوع نمایش</span>
		<i class="type1"></i>
		<i class="type2"></i>
	</div><!--showtype-->
</div><!--search_box-->



<script>

    /*exist btn*/
    $('.exist').click(function () {
        $(this).toggleClass('active');
        $('.exist_fg',this).toggleClass('active');
    });
    /*End exist btn*/



    /*display type*/
    $('.showtype .type1').click(function () {

        $('#product').find('.product_items').addClass('display1');
        $(this).addClass("active");
        $('.showtype .type2').removeClass('active');

    });
    $('.showtype .type2').click(function () {

        $('#product').find('.product_items').removeClass('display1');
        $(this).addClass("active");
        $('.showtype .type1').removeClass('active');

    });

    /*End display type*/


</script>