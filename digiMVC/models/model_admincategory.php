<?php

class model_admincategory extends Model
{
	public $allChildrenIds = array();

	function __construct()
	{
		parent::__construct();
	}

	function getCategory()
	{
		$sql = "select * from tbl_category";
		$res = $this->doSelect($sql);
		return $res;
	}

	function getChildren($idcategory)
	{
		$sql = "select * from tbl_category where parent=?";
		$res = $this->doSelect($sql, array( $idcategory ));
		return $res;
	}

	function getParent($idcategory)
	{
		$catInfo = $this->categoryInfo($idcategory);
		$parntfield = $catInfo['parent'];
		$all_parents = array( $catInfo );
		while ($parntfield != 0) {
			$sql = "select * from tbl_category where id=?";
			$row = $this->doSelect($sql, array( $parntfield ), 1);
			$parntfield = $row['parent'];
			array_push($all_parents, $row);
		}

		return $all_parents;
	}

	function categoryInfo($id)
	{
		$sql = "select * from tbl_category where id=?";
		$res = $this->doSelect($sql, array( $id ), 1);
		return $res;
	}

	function addCategory($title, $parent, $edit, $id)
	{
		if ($edit == '') {
			$sql = "insert into tbl_category (title,parent) values (?,?)";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(1, $title);
			$stmt->bindValue(2, $parent);
			$stmt->execute();
			header("location:" . URL . "admincategory/");
		}
		else {
			$sql = "update tbl_category  set title=?,parent=? where id=?";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(1, $title);
			$stmt->bindValue(2, $parent);
			$stmt->bindValue(3, $id);
			$stmt->execute();
		}
	}

	function getChildsIds($ids)
	{
		$childrensIds = array();
		foreach ($ids as $id) {

			$childrens = $this->getChildren($id);

			foreach ($childrens as $children) {
				array_push($childrensIds, $children['id']);
			}

		}
		return $childrensIds;
	}/*آرایه ای از آیدی دسته ها را میگیرد و فزرندان آن دسته ها را به دست می آورد و آرایه ای از آیدی فرزندان سطح اول آنها را برمیگرداند*/

	function deleteCategory($ids, $idcategory)
	{
		$this->allChildrenIds = array_merge($this->allChildrenIds, $ids);
		do {
			$childrensIds = $this->getChildsIds($ids);

			$this->allChildrenIds = array_merge($this->allChildrenIds, $childrensIds);

			$ids = $childrensIds;

		} while (count($childrensIds) != 0);


		$sql = "delete from tbl_category where id in ";
		$this->deleteArrayQuery($sql,$this->allChildrenIds);

		if ($idcategory != 0) {
			header("location:" . URL . "admincategory/showchildren/" . $idcategory);
		}
		else {
			header("location:" . URL . "admincategory/");
		}

	}/*یک یا چند دسته بندی به همراه زیر مجموعه آنها را حذف میکند*/

	function getAttr($categoryId, $parentId)
	{
		$sql = "select * from tbl_attr where idcategory=? and parent=?";
		$res = $this->doSelect($sql, array( $categoryId, $parentId ));
		return $res;
	}

	function addattr($data, $categoryId, $parentId, $editId)
	{
		if ($editId == "") {
			$sql = "insert into tbl_attr (title,idcategory,parent) values (?,?,?) ";
			$values = array( $data['title'], $categoryId, $data['parent'] );
			$this->doQuery($sql, $values);
			header("location:" . URL . "admincategory/showattr/" . $categoryId . "/" . $parentId);
		}
		else {
			$sql = "update tbl_attr set title=?,idcategory=?,parent=? where id = ?";
			$values = array( $data['title'], $categoryId, $data['parent'], $editId );
			$this->doQuery($sql, $values);
			header("location:" . URL . "admincategory/showattr/" . $categoryId . "/" . $parentId . "/" . $editId);
		}
	}

	function getAttrInfo($attrId)
	{
		$sql = "select * from tbl_attr where id=?";
		$res = $this->doSelect($sql, array( $attrId ), 1);
		return $res;
	}

	function deleteAttr($Ids,$categoryId,$parentAttrId)
	{
		$sql= "select * from tbl_attr where idcategory = ?";
		$attrRows = $this->doSelect($sql,array($categoryId));/*تمام ویژگی های مربوط به این دسته بندی در جدول ویژگی ها*/

		foreach ($attrRows as $row)
		{
			if (in_array($row['parent'],$Ids))
			{
				array_push($Ids,$row['id']);
			}
		}

		$sql = "delete from tbl_attr where id in ";
		$this->deleteArrayQuery($sql,$Ids);
		header("location:".URL."admincategory/showattr/".$categoryId."/".$parentAttrId);

	}

}

?>
