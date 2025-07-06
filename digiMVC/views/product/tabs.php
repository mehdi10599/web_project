<?php
$activeTab = $data['activeTab'];
?>
<div id="tabs">
	<ul class="tab_ul">
		<li class="active">نقد و بررسی تخصصی</li>
		<li>مشخصات فنی</li>
		<li>نظرات کاربران</li>
		<li>پرسش و پاسخ</li>
	</ul><!--tab_ul-->
	<div class="tab_content">

		<div style=" display: block;"></div>

		<div></div>

		<div style="padding: 15px 0 0 0; "></div>

		<div style="padding:15px 0 0 0 ;"></div>

	</div><!--tab_content-->
</div><!--tabs-->


<script>

    /*tabs*/

    $('.tab_ul li').click(function() {
        tabsView($(this));
    });

    function tabsView (tag) {

        $('.tab_ul li').removeClass('active');
        tag.toggleClass('active');
        var index = tag.index();
        var content = $('.tab_content >div');
        content.css('display','none');
        content.eq(index).css('display','block');

        //AJAX Commands...
        var data={'index':index};
        var URL='<?= URL ?>product/tab/<?= $productinfo["id"]; ?>/<?= $productinfo['cat'] ?>';
        $.post(URL,data,function (msg) {
            content.eq(index).html(msg);
        });
        //End AJAX

    }

    $('.tab_ul li:nth-child(<?= $activeTab ?>)').trigger('click');//کلیک کردن با استفاده از دستورات jquery


    /*tabs*/

</script>