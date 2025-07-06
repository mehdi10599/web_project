<?php
$basket = $data['basket']; /*تعداد و تمام اطلاعات محصول که در سبد خرید موجود است */
$totalPriceAll=$data['totalPriceAll']; /*قیمت کل محصولات موجود در سبد خرید*/
?>

	<link rel="stylesheet" href="public/css/showcart.css">

<div class="main">
	<div class="sabad">

		<div class="head">
			<h4>سبد خرید شما در دیجی کالا</h4>
			<a class="btn_green" href="showcart1">خرید خود را نهایی کنید</a>
		</div><!--head-->

		<div class="sabad_table">

			<table cellspacing="0">
				<thead>
				<tr>
					<td>شرح محصول</td>
					<td>تعداد</td>
					<td>قیمت واحد</td>
					<td>قیمت کل</td>
					<td></td>

				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($basket as $row){
				?>
				<tr>
					<td>
						<div class="right">
							<img src="public/images/products/<?= $row['id'] ?>/product_220.jpg">
						</div>
						<div class="left">
							<p>
								<?= $row['title']?>
							</p>
							<p>
								رنگ :
								<?php
								if (isset($row['colorTitle'])){ echo $row['colorTitle'] ;}
								else{echo "رنگ انتخاب نشده است";}
								?>
							</p>
							<p>
								گارانتی :
								<?php
								if (isset($row['guarantyTitle'])){ echo $row['guarantyTitle'];}
								else{echo "گارانتی انتخاب نشده است";}
								?>
							</p>
						</div>
					</td>
					<td>
						<div class="select_guaranti" >
							<span class="guar_title"> <?= $row['tedad']?> </span>
							<ul style="height: 150px;overflow: auto;">
								<?php
								for($i=1;$i<31;$i++) {
									?>
								<li onclick="updateBasket(<?= $i ?>,<?= $row['basketRow']?>,this)"> <?= $i ?> </li>

									<?php
								}
								?>
							</ul>
						</div><!--select_guaranti-->
					</td>
					<td>
						<span class="price"> <?= $row['price']?> </span>
						<span class="tuman"> تومان </span>
					</td>
					<td>
						<span class="price"> <?= $row['price']*$row['tedad'] ?> </span>
						<span class="tuman"> تومان </span>
					</td>
					<td class="remove" onclick="removeBasket(<?= $row['basketRow']?>)">
						<i></i>
					</td>
				</tr>
				<?php } ?>

				</tbody>
			</table>

		</div><!--sabad_table-->

		<div class="final_price">
			<div class="totalprice">
				<span>جمع کل خرید شما :</span>
				<span id="totalprice1"><?= $totalPriceAll ?></span>
				<span>تومان</span>
			</div><!--totalprice-->
			<div class="pardakhtprice">
				<span> مبلغ قابل پرداخت :</span>
				<span id="totalprice2"><?= $totalPriceAll ?></span>
				<span>تومان</span>
			</div><!--pardakhtprice-->
		</div><!--final_price-->
		<div class="btns">
			<a class="btn_green" href="showcart1" >خرید خود را نهایی کنید</a>
			<a href="#" class="btn_green">بازگشت به صفحه اصلی</a>
		</div>

	</div><!--sabad-->
</div><!--main-->


<script>


    function x(msg)
	{
        var basket=msg[0];
        var totalpriceall=msg[1];
        $(".sabad_table table tbody tr").remove();
        $.each(basket,function (index,value)
        {
            var id=value['id'];
            var title=value['title'];
            var tedad=value['tedad'];
            var price=value['price'];
            var basketRow=value['basketRow'];
            var color=value['colorTitle'];
            var guaranty=value['guarantyTitle'];

            var trTag = '<tr><td><div class="right"><img src="public/images/products/'+id+'/product_220.jpg"></div><div class="left"> <p> '+title+' </p> <p> رنگ : '+color+' </p> <p> گارانتی : '+guaranty+' </p> </div></td><td><div class="select_guaranti" ><span class="guar_title">'+tedad+'</span><ul style="height: 150px;overflow: auto;"> <?php for($i=1;$i<31;$i++) {?> <li onclick="updateBasket(<?= $i ?>,'+basketRow+',this)"> <?= $i ?> </li> <?php	}?> </ul></div></td><td><span class="price">'+price+'</span><span class="tuman"> تومان </span></td><td><span class="price"> '+price*tedad+' </span><span class="tuman"> تومان </span></td><td class="remove" onclick="removeBasket('+basketRow+')"> <i></i> </td></tr>';


            $(".sabad_table table tbody ").append(trTag);

        });

        $("#totalprice1").text(totalpriceall);
        $("#totalprice2").text(totalpriceall);

        $('.select_guaranti').click(function () {
            $("ul", this).slideToggle(300);
        });
	}//x



	function updateBasket(tedad,basketRow,tag)
	{
		var txt=$(tag).text();
		$(tag).parents(".select_guaranti").find(".guar_title").text(txt);
        $('.select_guaranti').click(function () {
            $("ul", this).slideToggle(300);
        });


	    var url="showcart/updatebasket";
	    var data={"tedad":tedad,"basketRow":basketRow};
        $.post
        (
            url,data,function (msg){
                x(msg);
            },
            "json"
        );

    } //updateBasket



    function removeBasket(basketId)
    {
        var url="showcart/deletebasket/"+basketId;
        var data={};
        $.post
        (
            url,data,function (msg){
                x(msg);
            },
            "json"
        );
    }//removeBasket



    /*select*/
    $('.select_guaranti').click(function () {
        $("ul", this).slideToggle(300);
    });
/*

    $('.select_guaranti ul li').click(function () {
        var txt = $(this).text();
        $('.select_guaranti .guar_title').text(txt);
    });
*/

    /*select*/
</script>
