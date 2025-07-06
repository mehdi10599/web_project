
<aside>
	<h3>گوشی موبایل</h3>
	<div class="aside_contaner">
		<ul class="aside_nav">
			<li>
				<a href="#">کالای دیجیتال</a>
				<ul>
					<li>
						<a href="#">موبایل</a>
						<ul>
							<li>
								<a href="#">گوشی موبایل</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>

		<div class="aside_line"></div><!--aside_line-->

		<ul class="filter_search">

			<li class="filter_search_head">بر اساس نوع</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span>
							سیستم عامل اندروید
						</span>
				</label>
			</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span>
							سیستم عامل ios
						</span>
				</label>
			</li>

		</ul><!--filter_search-->

		<div class="aside_line"></div><!--aside_line-->

		<ul class="filter_search">

			<li class="filter_search_head">بر اساس سازنده</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span>
							اپل
						</span>
				</label>
			</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span>
							سامسونگ
						</span>
				</label>
			</li>

		</ul><!--filter_search-->

		<div class="aside_line"></div><!--aside_line-->

		<ul class="filter_search">

			<li class="filter_search_head">بر اساس رنگ</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span class="color_filter">
							<b style="background-color: black;"></b>
							مشکی
						</span>
				</label>
			</li>

			<li>
				<label class="check_label">
					<i></i>
					<input class="Checkbox_input" type="checkbox">
					<span class="color_filter">
							<b style="background-color: red;"></b>
							قرمز
						</span>
				</label>
			</li>

		</ul><!--filter_search-->

	</div><!--aside_contaner-->
</aside>

<script>


    /*check boxes*/

    $(".check_label").click(function () {
        if ($(this).find(".Checkbox_input").is(":checked")) {
            $(this).find("i").addClass("checked_input");
        } else {
            $(this).find("i").removeClass("checked_input");
        }
    });

    /*check boxes*/
</script>