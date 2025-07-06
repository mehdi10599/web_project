
<div class="introduction">
	<p>معرفی اجمالی محصول</p>
	<div class="tozihat">

		<?= $productinfo['introduction']?>


	</div><!--tozihat-->
	<div class="more">
		<span>مشاهده بیشتر</span>
	</div><!--more-->
</div><!--introduction-->

<script>

    /*more*/

    $('.more').click(function () {
        var intro = $('.introduction');
        var he=$('.introduction >p').height() + $('.introduction > .more').height()+ $('.introduction > .tozihat').height();

        if($(this).hasClass('active')){
            intro.animate({'maxHeight':'250px'},1000);
        }
        else{
            intro.animate({'maxHeight':he},1000);
        }
        $(this).toggleClass('active');
    });

    /*more*/
</script>