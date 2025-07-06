
<div>
	<div class="folder_box">
		<ul>
			<li onclick="getfavorit(0)">
				<img src="public/images/folder_documents_all.png">
				<span>همه پوشه ها</span>
			</li>
			<?php
			$folder=$data['folder'];
			foreach ($folder as $row) {
				?>
				<li onclick="getfavorit(<?=$row['id']?>)">
					<img src="public/images/folder_documents_all.png">
					<span class="foldertitle"><?= $row['title'] ?></span>
					<img class="edit_img" onclick="startEdit(this)" src="public/images/Edit.gif">
					<span class="btn_green btn_save" onclick="saveEdit(<?= $row['id'] ?>,this)">ذخیره</span>
				</li>
				<?php
			}
			?>
		</ul>
		<div class="folder_content">
			<ul>

			</ul>
		</div><!--folder_content-->
	</div><!--folder_box-->
</div>




<script>
/*حذف محصولات از پوشه ها*/
	function deleteFavorit(favoritId,tag)
	{
	    var deleteTag=$(tag);
	    var liTag=deleteTag.parents("li");
        var url="panel/deleteFavorit";
        var data={"favoritId":favoritId};
        $.post(url,data,function (msg) {
			liTag.remove();
        });

	}

/*ذخیره نام جدید پوشه ها*/
    function saveEdit(folderId,tag)
    {
        var saveTag=$(tag);
        var liTag=saveTag.parent("li");
        var inputTag=liTag.find("input");
        var title=inputTag.val();
        var url="panel/saveEdit";
        var data={"folderId":folderId,"title":title};
        $.post(url,data,function (msg) {
            inputTag.remove();
            liTag.append('<span class="foldertitle">'+title+'</span>');
            saveTag.fadeOut(100);
        });
    }

/*جلوگیری از اجرای ajax با کلیک بر بروی دکمه های ویرایش و ذخیره*/
	$(".folder_box ul li .edit_img,.folder_box ul li .btn_save").click(function (e) {
		e.stopPropagation();
    });

/*شروع ویرایش : حذف تگ اسپن و افزودن اینپوت و دکمه ذخیره/ جلوگیری از اجرای ajax هنگام کلیک بر روی اینپوت*/
	function startEdit(tag) {
		var imgTag=$(tag);
		var liTag=imgTag.parent("li");
		var spanTitle=liTag.find(".foldertitle");
		var title=spanTitle.text();
		spanTitle.remove();
		liTag.find("input").remove();
		liTag.append('<input type="text" value="'+title+'" autofocus>');
		liTag.find(".btn_save").fadeIn(100);
        $(".folder_box ul li input").click(function (e) {
            e.stopPropagation();
        });
    }

/*گرفتن محصولات مربوط به پوشه ای که روی ان کلیک شده به صورت ایجکس و نمایش انها*/
	function getfavorit(folderId)
	{
		var url="panel/getfavorit";
		var data={'folderId':folderId};
		$.post(url,data,function (msg) {
			var folderContent=$(".folder_content ul");
            folderContent.html("");
			$.each(msg,function (index,value)
			{
				var item='<li>\n' +
                    '<div class="image">\n' +
                    '<img src="public/images/products/'+value['idproduct']+'/Product_220.jpg">\n' +
                    '</div><!--image-->\n' +
                    '<div class="left">\n' +
                    '<h4>'+value['productTitle']+'<img class="edit" src="public/images/Edit.gif">\n' +
                    '<img class="delete" onclick="deleteFavorit('+value['id']+',this)" src="public/images/Delete.gif">\n' +
                    '</h4>\n' +
                    '<p class="description">\n' +
                    'توضیحات کاربر در مورد این مورد این محصول ....\n' +
                    '</p>\n' +
                    '</div><!--left-->\n' +
                    '</li>';

				folderContent.append(item);

            });
        },'json');
    }

    /*folders*/
    var folder_li = $(".folder_box ul li");
    folder_li.click(function () {
        folder_li.removeClass("active");
        $(this).addClass("active");
    });
    /*folders*/

</script>
