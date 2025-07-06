<?php

$naghd_info=$data[0];
foreach ($naghd_info as $row)
{
?>


	<div class="items">
		<i></i>
		<h4><?= $row['title']?></h4>
		<div class="item_container">
			<?= $row['description']?>
		</div><!--item_container-->
	</div><!--items-->

<?php } ?>

<script>


    $('.tab_content .items i').click(function () {
        var item = $(this).parents('.items');
        $(this).toggleClass('active');
        $('.item_container',item).slideToggle();
    });

</script>