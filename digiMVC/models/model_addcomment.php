<?php
class model_addcomment extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function productInfo($productId)
	{
		$sql="select * from tbl_product where id=?";
		$res=$this->doSelect($sql,array($productId),1);
		return $res;
	}

	function getParams($productId)
	{
		$productInfo=$this->productInfo($productId);
		$categoryId=$productInfo['cat'];
		$sql="select * from tbl_comment_param where idcategory=?";
		$params=$this->doSelect($sql,array($categoryId));
		return $params;
	}

	function savecomment($data,$productId)
	{
		$params=$this->getParams($productId);
		$params_score=array();
		foreach ($params as $row)
		{
//			echo $row['id']."<br>";
			$params_score[$row['id']]=$data["param".$row['id']];
		}
//		print_r($params_score);
		$title = $data['title'];
		$positive = $data['positive'];
		$negative = $data['negative'];
		$matn = $data['matn'];
		self::sessionInit();
		$userId=self::sessionGet("userId");

		$sql="select * from tbl_comment where user=? and idproduct=?";
		$commentRes=$this->doSelect($sql,array($userId,$productId));

		if (sizeof($commentRes)>0)
		{
			$sql = "update tbl_comment set title=?,matn=?,positive=?,negative=? ,param=? where id=?";
			$array=array($title,$matn,$positive,$negative,serialize($params_score),$commentRes['id']);
			$this->doQuery($sql,$array);
		}//update
		else
		{
			$sql = "insert into tbl_comment (title,matn,positive,negative,idproduct,param,user) VALUES (?,?,?,?,?,?,?)";
			$array=array($title,$matn,$positive,$negative,$productId,serialize($params_score),$userId);
			$this->doQuery($sql,$array);
		}//insert


		header("location:".URL."addcomment/index/".$productId);
	}

	function getComment($productId)
	{
		self::sessionInit();
		$userId=self::sessionGet("userId");
		$sql="select * from tbl_comment where user=? and idproduct=?";
		$commentInfo=$this->doSelect($sql,array($userId,$productId),1);

		return $commentInfo;
	}

}

?>
