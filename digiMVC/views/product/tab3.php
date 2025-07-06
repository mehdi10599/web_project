
<?php
$comment_param = $data[0];
$comments=$data[1];
$comments_avg=$data[2];
?>

	<div class="comment_result">
		<p>
			امتیاز کاربران به :
			<span> گوشی سامسونگ مدل xyz</span>
		</p>
<?php
foreach ($comment_param as $row)
{
?>
		<div class="row">
			<span><?= $row['title'];?></span>
			<ul class="score_bars">

				<?php
				$idparam=$row['id'];
				$score_avg=$comments_avg[$idparam];
				$score_avg_part1=floor($score_avg);
				$total_li=$score_avg_part1;
				$score_avg_part2=$score_avg-$score_avg_part1;

				for ($i=0;$i<$score_avg_part1;$i++){
				?>
					<li>
						<span class="full"></span>
					</li>
				<?php
				}
				if($score_avg_part1<5) {
					?>
					<li>
						<span style="width: <?= $score_avg_part2 * 100 ?>%;"></span>
					</li>
					<?php
					$total_li++;
				}
				for ($i=0;$i<5-$total_li;$i++)
				{
				?>
				<li></li>
				<?php } ?>


			</ul>
		</div><!--row-->

<?php } ?>
	</div><!--comment_result-->

	<div class="comment_send">
		<h4>شما هم میتوانید نظر خود را ارسال نمایید</h4>
		<p>
			برای ثبت نظرات نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید.
			اگر این محصول را قبلا خریداری کرده باشید نظر شما به عنوان مالک محصول ثبت خواهد شد.
		</p>
		<button>نظر خود را بنویسید</button>
	</div><!--comment_send-->

	<div class="comments">
		<div class="comment_sort">
			<span>نظرات کاربران</span>
		</div><!--comment_sort-->



	<?php
	foreach ($comments as $comment){
	?>
		<div class="comment" id="comment<?= $comment['id'] ?>">

			<div class="comment_header">

				<div class="userName">
					<span>مهدی  </span>
					<span><?= $comment['tarikh']; ?></span>
				</div><!--userName-->

				<div class="likeDislike">
					<span>آیا این نظر مفید بود؟</span>
					<div class="like">
						<span><?= $comment['likecount']; ?></span>
					</div><!--like-->
					<div class="dislike">
						<span><?= $comment['dislikecount']; ?></span>
					</div><!--dislike-->

				</div><!--likeDislike-->
			</div><!--comment_header-->

			<div class="comment_content">

				<div class="user_vote">
					<div class="comment_result" style="width: 100%;">


						<?php
						$scores = unserialize($comment['param']);
						foreach ($comment_param as $param){

						?>

						<div class="row">
							<span><?= $param['title'];?></span>
							<ul class="score_bars">

								<?php
								$score = $scores[$param['id']];
								for($i=0;$i<$score;$i++)
								{
									?>
								<li>
									<span class="full"></span>
								</li>
								<?php
								}
								for($i=0;$i<5-$score;$i++)
								{
								?>
								<li></li>
								<?php } ?>
							</ul>
						</div><!--row-->

						<?php } ?>


					</div><!--comment_result-->
				</div><!--user_vote-->

				<div class="user_comment">

					<div class="title">
						<p><?= $comment['title']; ?></p>
					</div><!--title-->

					<div class="points">

						<div class="strong_points">
							<span>نقاط قوت</span>
							<ul>
								<li><?= $comment['positive']; ?></li>
							</ul>
						</div><!--strong_points-->

						<div class="weakness_points">
							<span>نقاط ضعف</span>
							<ul>
								<li><?= $comment['negative']; ?> </li>
							</ul>
						</div><!--weakness_points-->

					</div><!--points-->

					<div class="text_comment">
						<p>
							<?= $comment['matn']; ?>
						</p>
					</div><!--text_comment-->

				</div><!--user_comment-->

			</div><!--comment_content-->

		</div><!--comment-->


	<?php } ?>





	</div><!--comments-->


