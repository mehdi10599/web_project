
<div id="tabs">
	<ul class="tab_ul">
		<li>پیام های من</li>
		<li class="active">سفارشات من</li>
		<li>لیست مورد علاقه</li>
		<li>نقدهای من</li>
		<li>نظرات من</li>
		<li>دیجی بن های من</li>
	</ul><!--tab_ul-->
	<div class="tab_content">

		<?php
			require_once "tab1.php";
			require_once "tab2.php";
			require_once "tab3.php";
			require_once "tab4.php";
			require_once "tab5.php";
			require_once "tab6.php";
		?>


	</div><!--tab_content-->
</div><!--tabs-->

<script>

    /*tabs*/
    $('.tab_ul li').click(function () {
        $('.tab_ul li').removeClass('active');
        $(this).toggleClass('active');
        var index = $(this).index();
        var content = $('.tab_content >div');
        content.css('display', 'none');
        content.eq(index).css('display', 'block');
    });
    /*tabs*/

</script>