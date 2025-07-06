
<?php
$questions = $data[0];
$answers =$data[1];
?>

	<div class="question_register">
		<h4>پرسش خود را مطرح نمایید</h4>
		<textarea></textarea>
		<button>ثبت پرسش</button>
	</div><!--question_register-->

	<div class="questions">
		<div class="question_sort">
			<span> پرسش ها و پاسخ ها</span>
		</div><!--question_sort-->
<?php
foreach ($questions as $question){
?>
		<div class="question">

			<div class="question_header">
				<div class="right_q">
					<i></i>
					<span>پرسش</span>
				</div><!--right_q-->
				<div class="Name">
					<span>مهدی  </span>
					<span><?= $question['tarikh']; ?></span>
				</div><!--Name-->

			</div><!--question_header-->

			<div class="question_content">

				<p>
					<?= $question['matn']; ?>
				</p>
				<div class="answer">
					<div class="answer_header">
						<i></i>
						<span>پاسخ : </span>

					</div>
					<p>
						<?php
						$questionid=$question['id'];
						$answer=$answers[$questionid];
						echo $answer['matn'];
						?>
					</p>
				</div>

			</div><!--question_content-->

		</div><!--question-->
<?php } ?>
	</div><!--questions-->

