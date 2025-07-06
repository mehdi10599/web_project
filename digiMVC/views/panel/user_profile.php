<?php
$userInfo=$data['userInfo'];
?>
<div class="box">
	<div class="header">
		<i id="person_icon"></i>
		<span>اطلاعات کاربر</span>
	</div><!--header-->
	<table>
		<tr>
			<td><span class="title">نام و نام خانوادگی : </span><span class="value"><?= $userInfo['family'] ?></span></td>
			<td><span class="title">آدرس ایمیل : </span><span class="value"><?= $userInfo['email'] ?></span></td>
			<td><span class="title">کد ملی : </span><span class="value"><?= $userInfo['code_meli'] ?></span></td>
		</tr>
		<tr>
			<td><span class="title">تلفن ثابت : </span><span class="value"><?= $userInfo['tel'] ?></span></td>
			<td><span class="title">تلفن همراه : </span><span class="value"><?= $userInfo['mobile'] ?></span></td>
			<td><span class="title">محل سکونت :</span><span class="value"><?= $userInfo['adres'] ?></span></td>
		</tr>
		<tr>
			<td><span class="title">تاریخ تولد : </span><span class="value"><?= $userInfo['tavalod'] ?></span></td>
			<td>
				<span class="title">جنسیت : </span>
				<span class="value">
					<?php
						if ($userInfo['jensiat']==1) {echo "مرد";}
						elseif ($userInfo['jensiat']==2) {echo "زن";}
					?>
				</span>
			</td>
			<td>
				<span class="title">دریافت خبر نامه : </span>
				<span class="value">
					<?php
					if ($userInfo['khabarname']==0) {echo "خیر";}
					elseif ($userInfo['khabarname']==1) {echo "بله";}
					?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="btns">
				<a href="#"><img src="public/images/Edit.png"></a>
				<a href="#"><img src="public/images/ChangePassword.png"></a>
			</td>
		</tr>
	</table>
</div><!--box-->