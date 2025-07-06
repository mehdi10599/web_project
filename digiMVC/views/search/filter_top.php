
<div class="filter_items_bar"></div><!--filter_items_bar-->


<ul class="filter_top">
	<li>
		<span>تعداد سیم کارت</span>
		<ul class="filter_undermenu">
			<li data-id="0">
				<i></i>
				نمایش همه
			</li>
			<li data-id="1">
				<i></i>
				یک
			</li>
			<li data-id="2">
				<i></i>
				دو
			</li>
			<li data-id="3">
				<i></i>
				سه
			</li>
		</ul>
	</li>
	<li>
		<span>حافظه داخلی</span>
		<ul class="filter_undermenu">
			<li data-id="4">
				<i></i>
				نمایش همه
			</li>
			<li data-id="5">
				<i></i>
				یک مگابایت
			</li>
			<li data-id="6">
				<i></i>
				دو مگابایت
			</li>
			<li data-id="7">
				<i></i>
				سه مگابایت
			</li>
			<li data-id="8">
				<i></i>
				چهار مگابایت
			</li>
			<li data-id="9">
				<i></i>
				پنج مگابایت
			</li>
			<li data-id="10">
				<i></i>
				شش مگابایت
			</li>
			<li data-id="11">
				<i></i>
				هفت مگابایت
			</li>
			<li data-id="12">
				<i></i>
				هشت مگابایت
			</li>
			<li data-id="13">
				<i></i>
				نه مگابایت
			</li>
			<li data-id="14">
				<i></i>
				ده مگابایت
			</li>
		</ul>
	</li>
</ul><!--search_navigator-->

<div class="aside_line"></div><!--aside_line-->


<script>


    /*filter_top*/

    //li hover slideDown
    $('.filter_top li').hover(function () {
        $(".filter_undermenu", this).slideDown(200);
    }, function () {
        $(".filter_undermenu", this).slideUp(200);
    });
    //li hover slideDown


    //li square hover
    var filter_items = $('.filter_undermenu li');

    filter_items.hover(function () {
        $('i', this).addClass('filter_hovered');
    }, function () {
        $('i', this).removeClass('filter_hovered');
    });
    //li square hover

    //li add/remove to/from topDiv
    filter_items.click(function () {
        var title = $(this).parents('li').find('> span').text();
        var value = $(this).text();
        var id = $(this).attr("data-id");
        var filter_item = $(".filter_items_bar").find('span[data-id="' + id + '"]');
        var number = filter_item.length;
        if (number > 0) {
            filter_item.remove();
        } else {
            var x = '<span data-id=' + id + '>' + title + ':' + value + '<i onclick="remove_filters(this);"></i></span>';
            $('.filter_items_bar').append(x);
        }

        $('i', this).toggleClass('filter_selected');
    });

    function remove_filters(tag) {
        var span = $(tag).parent("span");
        var id = span.attr("data-id");
        span.remove();
        $(".filter_undermenu").find('li[data-id="' + id + '"]').find('i').toggleClass('filter_selected');

    }
    //li add/remove to/from topDiv


    /*End filter_top*/


</script>