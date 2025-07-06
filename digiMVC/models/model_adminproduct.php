<?php

class model_adminproduct extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getProduct()
	{
		$sql = "select * from tbl_product";
		$res = $this->doSelect($sql);
		return $res;
	}

	function getCategory()
	{
		$sql = "select * from tbl_category";
		$res = $this->doSelect($sql);
		return $res;
	}

	function getColor()
	{
		$sql = "select * from tbl_color";
		$res = $this->doSelect($sql);
		return $res;
	}

	function getGuaranty()
	{
		$sql = "select * from tbl_guaranty";
		$res = $this->doSelect($sql);
		return $res;
	}

	function addProduct($data, $productId)
	{

		$title = $data['title'];
		$cat = $data['idcategory'];
		$price = $data['price'];
		$introduction = $data['introduction'];
		$tedad_mojood = $data['tedad_mojood'];
		$discount = $data['discount'];
		$color = array();
		if (isset($data['color'])) {
			$color = $data['color'];
		}
		$color = implode(",", $color);
		$guaranty = array();
		if (isset($data['guaranty'])) {
			$guaranty = $data['guaranty'];
		}
		$guaranty = implode(",", $guaranty);


		if ($productId == "") {
			$sql = "insert into tbl_product (title,price,cat,introduction,tedad_mojood,discount,color,guaranty) values (?,?,?,?,?,?,?,?)";
			$values = array( $title, $price, $cat, $introduction, $tedad_mojood, $discount, $color, $guaranty );
			$this->doQuery($sql, $values);
			header("location:" . URL . "adminproduct/");

			$productId = parent::$conn->lastInsertId();
			mkdir("public/images/products/".$productId."/");

		}
		else {
			$sql = "update tbl_product set title=?,price=?,cat=?,introduction=?,tedad_mojood=?,discount=?,color=?,guaranty=? where id=?";
			$values = array( $title, $price, $cat, $introduction, $tedad_mojood, $discount, $color, $guaranty, $productId );
			$this->doQuery($sql, $values);
		}



		$myfile=$_FILES['image'];
		$fileName=$myfile['name'];
		$fileTmp=$myfile['tmp_name'];
		$fileSize=$myfile['size'];
		$fileType=$myfile['type'];

		$mainDir = "public/images/products/".$productId."/";
		$newName= "Product";
		$ext = pathinfo($fileName,PATHINFO_EXTENSION);
		$targetMain = $mainDir.$newName.".".$ext;
		$submitOK=1;

		if ($fileSize>5242880)/*5MB*/
		{
			$submitOK=0;
		}
		if ($fileType!="image/jpeg" and $fileType!="image/jpg")
		{
			$submitOK=0;
		}

		if ($submitOK==1)
		{
			move_uploaded_file($fileTmp,$targetMain);

			$target220 = $mainDir.$newName."_220.".$ext;
			$this->create_thumbnail($targetMain,$target220,220,220);
			$target350 = $mainDir.$newName."_350.".$ext;
			$this->create_thumbnail($targetMain,$target350,350,350);
		}







	}

	function deleteProduct($Ids)
	{

		$sql = "delete from tbl_product where id in ";
		$this->deleteArrayQuery($sql, $Ids);

		$sql = "delete from tbl_naghd where idproduct in ";
		$this->deleteArrayQuery($sql, $Ids);

		header("location:" . URL . "adminproduct/");
	}

	function getproductInfo($productId)
	{
		$sql = "select * from tbl_product where id=?";
		$res = $this->doSelect($sql, array( $productId ), 1);


		$color = $res['color'];
		$color = explode(",", $color);
		$colorInfo = array();
		foreach ($color as $idcolor) {
			$sql = "select * from tbl_color where id=?";
			$colorRow = $this->doSelect($sql, array( $idcolor ), 1);
			array_push($colorInfo, $colorRow);
		}
		$res['colorInfo'] = $colorInfo;

//		$color=$res['color'];

		$guaranty = $res['guaranty'];
		$guaranty = explode(",", $guaranty);
		$guarantyInfo = array();
		foreach ($guaranty as $idguaranty) {
			$sql = "select * from tbl_guaranty where id=?";
			$guarantyRow = $this->doSelect($sql, array( $idguaranty ), 1);
			array_push($guarantyInfo, $guarantyRow);
		}
		$res['guarantyInfo'] = $guarantyInfo;

		return $res;
	}

	function getnaghdInfo($productId)
	{

		$sql = "select * from tbl_naghd where idproduct=?";
		$res = $this->doSelect($sql, array( $productId ));

		return $res;
	}

	function addnaghd($data, $productId, $naghdId)
	{
		if ($naghdId == '') {
			$sql = "insert into tbl_naghd (title,description,idproduct) values (?,?,?)";
			$values = array( $data['title'], $data['description'], $productId );
			$this->doQuery($sql, $values);
			header("location:" . URL . "adminproduct/naghd/" . $productId);
		}
		else {
			$sql = "update tbl_naghd set title=?,description=? where id=? ";
			$values = array( $data['title'], $data['description'], $naghdId );
			$this->doQuery($sql, $values);
		}
	}

	function getnaghdRowInfo($naghdId)
	{
		$sql = "select * from tbl_naghd where id=?";
		$res = $this->doSelect($sql, array( $naghdId ), 1);

		return $res;
	}

	function deletenaghd($Ids, $productId)
	{

		$IN = str_repeat("?,", count($Ids) - 1);
		$IN = $IN . "?";

		$sql = "delete from tbl_naghd where id in (" . $IN . ")";
		$stmt = self::$conn->prepare($sql);
		foreach ($Ids as $key => $value) {
			$stmt->bindValue($key + 1, $value);
		}
		$stmt->execute();

		header("location:" . URL . "adminproduct/naghd/" . $productId);
	}

	function getCategoryAttr($categoryId, $productId)
	{
		$sql = "select tbl_attr.*,tbl_product_attr.value from tbl_attr left join tbl_product_attr on 
		tbl_attr.id=tbl_product_attr.idattr and tbl_product_attr.idproduct=? 
		where tbl_attr.idcategory=? and tbl_attr.parent != 0";

		$attr = $this->doSelect($sql, array( $productId, $categoryId ));

		return $attr;
	}/*گرفتن ویژگی های محصول به همراه مقادیر آن ویژگی ها*/

	function addAttr($data,$productId)
	{
		$Ids=$data['id'];/*آیدی ویژگی ها*/
		foreach ($Ids as $id)
		{
			$sql = "delete from tbl_product_attr where idproduct=? and idattr=? ";
			$this->doQuery($sql,array($productId,$id));
		}/*حذف ویژگی های قبلی*/
		foreach ($Ids as $id)
		{
			$attrVal=$data['value'.$id];
			$sql= "insert into tbl_product_attr (idproduct,idattr,value) values (?,?,?)";
			$this->doQuery($sql,array($productId,$id,$attrVal));
		}/*افزودن ویژگی های جدید*/
	}

	function getGallery($productId)
	{
		$sql = "select * from tbl_gallery where idproduct=?";
		$res = $this->doSelect($sql,array($productId));

		return $res;
	}

	function addgallery($productId,$myfile)
	{

		$fileName=$myfile['name'];
		$fileTmp=$myfile['tmp_name'];
		$fileSize=$myfile['size'];
		$fileType=$myfile['type'];

		$mainDir = "public/images/products/".$productId."/gallery/";
		$newName= time().rand(1000,9999);
		$ext = pathinfo($fileName,PATHINFO_EXTENSION);
		$targetLarge = $mainDir."large/".$newName.".".$ext;
		$submitOK=1;

		if ($fileSize>5242880)/*5MB*/
		{
			$submitOK=0;
		}
		if ($fileType!="image/jpeg" and $fileType!="image/jpg")
		{
			$submitOK=0;
		}

		if ($submitOK==1)
		{
			move_uploaded_file($fileTmp,$targetLarge);

			$targetSmall = $mainDir."small/".$newName.".".$ext;
			$this->create_thumbnail($targetLarge,$targetSmall,115,115);

			$sql = " insert into tbl_gallery (img,idproduct) values (?,?)";
			$params = array($newName.".".$ext,$productId);
			$this->doQuery($sql,$params);
		}

	}

	function deleteGallery($Ids)
	{
		foreach ($Ids as $galleryid)
		{
			$sql = "select * from tbl_gallery where id=?";
			$galleryRow = $this->doSelect($sql,array($galleryid),1);
			$fileName = $galleryRow['img'];
			$dir = "public/images/products/".$galleryRow['idproduct']."/gallery/";
			$dirSmall=$dir."small/".$fileName;
			$dirLarge=$dir."large/".$fileName;
			unlink($dirSmall);
			unlink($dirLarge);
		}

		$sql = "delete from tbl_gallery where id in ";
		$this->deleteArrayQuery($sql,$Ids);
	}

}

?>






















