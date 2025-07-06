<link rel="stylesheet" href="public/css/showcart2.css">
<script src="public/js/city.js"></script>
<script src="public/js/mahale.js"></script>
	
<div class="main">
	<div class="showcart2">
		<div class="order_steps">
			<div class="dashed">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div><!--dashed-->
			<ul>
				<li class="active">
					<span class="circle"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">ورود به دیجیکالا</span><!--circle-->
				</li>
				<li class="">
					<span class="circle" style="border: 2px solid green;"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">اطلاعات ارسال سفارش</span><!--circle-->
				</li>
				<li>
					<span class="circle"></span><!--circle-->
					<span class="line"></span><!--circle-->
					<span class="title">بازبینی سفارش</span><!--circle-->
				</li>
				<li>
					<span class="circle"></span><!--circle-->
					<span class="title">اطلاعات پرداخت</span><!--circle-->
				</li>
			</ul>
			<div class="dashed">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div><!--dashed-->
		</div><!--order_steps-->

		<div class="choose_adres">
			<span class="head">
				انتخاب آدرس
				<span class="btn_green" id="btn_add_adres" onclick="addNewAddress()" style="background-color: #4c4b4b">افزودن آدرس جدید</span>
			</span><!--head-->
			<?php
			$i=1;
			$useraddressInfo=$data['useraddressInfo']; /* تمام ادرس های کاربر */
			foreach ($useraddressInfo as $row){
			?>

			<table cellspacing="0" class="table_address <?php if ($i==1){echo "active";}?>" data-address="<?= $row['id']?>">
				<tr>
					<td rowspan="3" class="circle address_select" style="position: relative;">
						<i></i>
						<span></span>
					</td>
					<td colspan="3">
						<?= $row['family']?>
					</td>
					<td rowspan="3" class="editremove">
						<table cellspacing="0">
							<tr>
								<td onclick="editaddress(<?= $row['id'] ?>)">
									<span></span>
								</td>
							</tr>
							<tr>
								<td onclick="deleteaddress(<?= $row['id'] ?>)">
									<span></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="width: 17%;">
						 استان :  <?= $row['ostan']?>
					</td>
					<td rowspan="2" style="color: #4c4b4b">
						<?= $row['address']?>
						<br/>
						کد پستی : <?= $row['codeposti']?>
					</td>
					<td style="width: 17%;">
						شماره تماس اضطراری : <?= $row['mobile']?>
					</td>
				</tr>
				<tr>
					<td style="width: 17%;">
						شهر : <?= $row['shahr']?>
					</td>
					<td style="width: 17%;">
						شماره تماس ثابت :  <?= $row['tel']?>
					</td>
				</tr>
			</table>

			<?php $i=0; } ?>

		</div><!--choose_adres-->

		<div class="shiveErsal">
			<span class="head">
				انتخاب شیوه ارسال
			</span><!--head-->
			<?php
			$j=1;
			$posttypeInfo=$data['posttypeInfo']; /* تمام روش های ارسال پستی  */
			foreach ($posttypeInfo as $row){
			?>
			<table cellspacing="0" class="table_post <?php if ($j==1){echo "active";} ?>" data-post="<?= $row['id']?>">
				<tr>
					<td class="circle select_post" style="position: relative;width: 5%;">
						<i></i>
						<span></span>
					</td>
					<td class="td2">
						<img src="public/images/post_48_icon.png">
						<div>
							<p><?= $row['title'] ?></p>
							<p><?= $row['description'] ?></p>
						</div>
					</td>
					<td class="hazine">
						<p>هزینه ارسال</p>
						<p>- تومان</p>
					</td>
				</tr>
			</table>
			<?php $j=0; } ?>
		</div>

		<div style=" margin: 25px ;text-align: left;">
			<a href="showcart3" class="btn_green" style="background-color: blue;">ذخیره اطلاعات و مرحله بعد</a>
		</div>

	</div><!--showcart1-->
</div><!--main-->


<div class="dark"></div><!--dark-->

<form action="" method="post" id="addAddress">
<div class="add_adres">
	<h4>
		افزودن آدرس جدید
		<i class="close"></i>
	</h4>
	<div class="row">
		<div class="right">
			<span>نام و نام خانوادگی گیرنده : </span>
		</div>
		<div class="left">
			<input name="family">
		</div>
	</div><!--row-->
	<div class="row">
		<div class="right">
			<span>شماره همراه : </span>
		</div>
		<div class="left">
			<input name="mobile">
		</div>
	</div><!--row-->
	<div class="row">
		<div class="right">
			<span>شماره ثابت : </span>
		</div>
		<div class="left">
			<input name="tel">
		</div>
	</div><!--row-->
	<div class="row">
		<div class="right">
			<span>استان / شهر : </span>
		</div>
		<div class="left">

			<select class="state" name="state" onchange="ostan(this);">
				<option>
					انتخاب استان
				</option>
				<option data-val="21">تهران</option>
				<option data-val="51">خراسان</option>
				<option data-val="31">اصفهان</option>
			</select>

			<span class="shahr">
                <select class="city" name="shahr" onchange="mahale(this);" >
                    <option value="">
                        انتخاب شهر
                    </option>
                </select>
            </span>
		</div>
	</div><!--row-->
	<div class="row">
		<div class="right">
			<span>محله : </span>
		</div>
		<div class="left">
			<span class="mahale">
				<select name="town" class="town">
					<option>انتخاب محله</option>
				</select>
			</span>
		</div>
	</div><!--row-->
	<div class="row" style="height: 120px;">
		<div class="right">
			<span>آدرس : </span>
		</div>
		<div class="left">
			<textarea name="address"></textarea>
		</div>
	</div><!--row-->
	<div class="row">
		<div class="right">
			<span>کد پستی : </span>
		</div>
		<div class="left">
			<input name="codeposti">
		</div>
	</div><!--row-->
	<div class="row">
		<div class="left" style="width: 330px;float: left;margin-top: 20px;">
			<span class="btn_green" onclick="submitForm()">ذخیره آدرس و بازگشت</span>
		</div>
	</div><!--row-->
</div><!--addadres-->
</form>

<script>

	function deleteaddress(idAddress)
	{
	    var url="showcart2/deleteaddress/"+idAddress;
	    var data={};
	    $.post(url,data,function (msg) {
			window.location="showcart2";
        });
	}


	/*Select PostType AND Address*/
	$(".address_select").click(function () {
	    $(".table_address").removeClass("active");
		$(this).parents(".table_address").addClass("active");
        setSessionAddress();

    });
	$(".select_post").click(function () {
	    $(".table_post").removeClass("active");
		$(this).parents(".table_post").addClass("active");
        setSessionPost();
    });
    /*Select PostType AND Address*/


	/*ذخیره اطلاعات ادرس و روش ارسال پستی که توسط کاربر انتخاب شده توسط ایجکس در سشن*/
    function setSessionAddress()
    {
        var addressId=$(".table_address.active").attr("data-address");
        var url="showcart2/setSessionAddress/"+addressId;
        var data={};
        $.post(url,data,function (msg) {
            console.log(msg);
        });
    }
    setSessionAddress();
    function setSessionPost()
    {
        var postId=$(".table_post.active").attr("data-post");
        var url="showcart2/setSessionPost/"+postId;
        var data={};
        $.post(url,data,function (msg) {
            console.log(msg);
        });
    }
    setSessionPost();
    /*ذخیره اطلاعات ادرس و روش ارسال پستی که توسط کاربر انتخاب شده توسط ایجکس در سشن*/



    /* باز کردن صفحه ویرایش آدرس کاربر و نمایش اطلاعات آن */
	var editAddressId=""; /*متغیر گلوبال جهت تشخیص ادیت یا افزودن آدرس*/
	function editaddress(addressId) {
	    editAddressId=addressId;
		var url="showcart2/getaddressInfo/"+addressId;
		var data={};
		$.post(url,data,function (msg) {
			console.log(msg);

            $("input[name=family]").val(msg['family']);
            $("input[name=mobile]").val(msg['mobile']);
            $("input[name=tel]").val(msg['tel']);
            $("textarea[name=address]").val(msg['address']);
            $("input[name=codeposti]").val(msg['codeposti']);

            var state=msg['ostan'];
            var city=msg['shahr'];
            var town=msg['mahale'];

            $(".state option").each(function (index) {
				var txt = $(this).text();
				// console.log(txt);
				if (txt==state)
				{
				    $(this).attr("selected","selected");
                     ostan($(".state"));
				}
            });
            $(".city option").each(function (index) {
				var txt = $(this).text();
				// console.log(txt);
				if (txt==city)
				{
				    $(this).attr("selected","selected");
                    mahale($(".city"));
				}
            });

            $(".town option").each(function (index) {
				var txt = $(this).text();
				// console.log(txt);
				if (txt==town)
				{
				    $(this).attr("selected","selected");
				}
            });


            $(".add_adres").fadeIn(300);
            $(".dark").fadeIn(300);


        },"json")

    }//editaddress
    /* باز کردن صفحه ویرایش آدرس کاربر و نمایش اطلاعات آن */


	/* ارسال اطلاعات فرم جهت ویرایش یا افزودن آدرس جدید به صورت AJAX */
	function submitForm()
	{
	    var url = "showcart2/addaddress/"+editAddressId;
	    var data=$("#addAddress").serializeArray();
	    $.post(url,data,function (msg) {
	        alert(msg);
			window.location="showcart2";/*رفرش کردن صفحه*/
        });
	}//submitForm
    /* ارسال اطلاعات فرم جهت ویرایش یا افزودن آدرس جدید به صورت AJAX */

	/* باز کردن صفحه فرم و پاک کردن اطلاعات لود شده هنگام ویرایش آدرس کاربر */
	function addNewAddress()
	{
	    editAddressId="";
	    $("#addAddress").trigger("reset"); /* ریست کردن اطلاعات موجود در فرم (خالی کردن فرم) */
        $(".add_adres").fadeIn(300);
        $(".dark").fadeIn(300);
	}//addNewAddress
    /* باز کردن صفحه فرم و پاک کردن اطلاعات لود شده هنگام ویرایش آدرس کاربر */

	/*دکمه بستن فرم آدرس کاربر*/
    $(".close").click(function () {
        $(".add_adres").fadeOut(300);
        $(".dark").fadeOut(300);
    });
    /*دکمه بستن فرم آدرس کاربر*/

</script>
