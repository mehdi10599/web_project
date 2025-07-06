<?php

$fanni=$data[0];

foreach ($fanni as $attr_parent)
{

?>

	<div class="fanni">
		<h4><?= $attr_parent['title']; ?></h4>
<?php
$children = $attr_parent['children'];
foreach ($children as $child)
{
?>
		<div class="row">
			<div class="right">
				<span><?= $child['title']; ?></span>
			</div><!--right-->
			<div class="left">
				<?php
				if ($child['value']=='')
				{
					echo "-";
				}
				else
				{
					echo $child['value'];
				}
				?>
			</div><!--left-->
		</div><!--row-->
<?php } ?>
	</div><!--fanni-->

<?php } ?>