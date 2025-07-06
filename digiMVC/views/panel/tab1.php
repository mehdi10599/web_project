
<div>
	<table cellspacing="0">
		<tbody>
		<tr>
			<td>ردیف </td>
			<td>کد</td>
			<td>تاریخ</td>
			<td>عنوان</td>
			<td>متن</td>
			<td>وضعیت</td>
		</tr>
		<?php
		$message=$data['message'];
		$i=1;
		foreach ($message as $row) {
			?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $row['id'] ?></td>
				<td><?= $row['tarikh'] ?></td>
				<td><?= $row['title'] ?></td>
				<td><?= $row['matn'] ?></td>
				<td>
					<?php
					if ($row['status']==1){echo "خوانده شده";}
					if ($row['status']==0){echo "خوانده نشده";}
					?>
				</td>
			</tr>
			<?php
			$i++;
		}
		?>
		</tbody>
	</table>
</div>