

<link rel="stylesheet" href="public/js/scroll/jquery.mCustomScrollbar.css">
<script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
<script src="public/3d/jsc3d.js"></script>
<script src="public/3d/jsc3d.touch.js"></script>
<script src="public/3d/jsc3d.webgl.js"></script>




<div class="dark"></div><!--dark-->
<div class="gallery">
	<h4>
		گوشی سامسونگ مدل xyz
		<i></i>
	</h4>
	<div class="show_img">
		<img src="">
		<canvas id="cv" width="565" height="430"></canvas>
	</div><!--show_img-->
	<div class="nav_img">
		<ul>

			<?php
			foreach ($gallery as $row){
			if ($row['threed']==1) {
				?>
				<li class="active" data-image-url="">
					<img src="public/images/products/<?= $row['idproduct']; ?>/<?= $row['img']; ?>">
					<i class="icon_3d"></i>
				</li>
				<?php
			}else{
				?>
			<li class="active"
				data-image-url="public/images/products/<?= $row['idproduct']; ?>/gallery/large/<?= $row['img']; ?>">
				<img src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/<?= $row['img']; ?>">
			</li>

			<?php }} ?>
		</ul>
	</div><!--nav_img-->
</div><!--gallery-->



<script>
    /*3d Image*/
    var canvasTag = document.getElementById('cv');
    var viewer = new JSC3D.Viewer(canvasTag, {
        SceneUrl:"public/images/products/<?= $row['idproduct']; ?>/3d/bmw.obj",
        InitRotationX:-90,
        InitRotationY:120,
        InitRotationZ:0,
        RenderMode:'texturesmooth',
        BackgroundColor2:'#cccccc'
    });
    viewer.init();
    viewer.update();
    /*3d Image*/


    var navImage=$(".nav_img");
    var galleryWindow=$('.dark , .gallery');
    var galleryLi=$('.nav_img ul li');
    var mainImage=$(".show_img img");
    var image3d=$(".show_img canvas")

    navImage.mCustomScrollbar({
        setWidth:false,
        setHeight:false,
        axis:"y",
        scrollInertia:400,
        scrollButtons:{
            enable:true
        },
        advanced:{
            updateOnContentResize: true,
            updateOnImageLoad: true,
        },
        theme : "inset-2-dark"
    });


    function showgallery(index,src){
        galleryLi.removeClass('active');
        galleryLi.eq(index).addClass('active');

        if(src.length>0){
            mainImage.fadeIn(0);
            image3d.fadeOut(200);
            mainImage.attr("src",src);
        }
        else{
            mainImage.fadeOut(0);
            image3d.fadeIn(200);
        }
    }

    $(".galery li").click(function () {
        galleryWindow.fadeIn(300);
        var index=$(this).index();
        index++;
        var src=$(this).attr("data-image-url");
        showgallery(index,src);
    });


    $(".gallery h4 i, .dark").click(function () {
        galleryWindow.fadeOut(100);
    });

    galleryLi.click(function () {
        var index=$(this).index();
        var src=$(this).attr('data-image-url');
        showgallery(index,src);
    });


</script>