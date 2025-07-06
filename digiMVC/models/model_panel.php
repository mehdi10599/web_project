<?php


class model_panel extends Model
{
	private $userId;
	function __construct()
	{
		parent::__construct();
		self::sessionInit();
		$this->userId=self::sessionGet("userId");
	}

	function getuserInfo()
	{
		$sql="select * from tbl_user where id=?";
		$userInfo=$this->doSelect($sql,array($this->userId),1);

		return$userInfo;
	}

	function getStat()
	{

		$sql="select * from tbl_order where userid=?";
		$orderInfo=$this->doSelect($sql,array($this->userId));
		$orderNum=count($orderInfo);

		$sql="select * from tbl_order where userid=? and status=1";
		$orderInfo=$this->doSelect($sql,array($this->userId));
		$order_taeed=count($orderInfo);

		$sql="select * from tbl_order where userid=? and status=2";
		$orderInfo=$this->doSelect($sql,array($this->userId));
		$order_pardazesh=count($orderInfo);

		$sql="select * from tbl_comment where user=? ";
		$commentInfo=$this->doSelect($sql,array($this->userId));
		$commentNum=count($commentInfo);

		$sql="select * from tbl_message where userid=? and status=0 ";
		$messageInfo=$this->doSelect($sql,array($this->userId));
		$message_unread=count($messageInfo);

		$statArray=array(
			"orderNum"=>$orderNum,
			"order_taeed"=>$order_taeed,
			"order_pardazesh"=>$order_pardazesh,
			"commentNum"=> $commentNum,
			"message_unread"=> $message_unread
			);

		return $statArray;

	}

	function getMessage()
	{
		$sql="select * from tbl_message where userid=?";
		$message=$this->doSelect($sql,array($this->userId));

		foreach ($message as $row)
		{
			$sql="update tbl_message set status=1 where id=?";
			$this->doQuery($sql,array($row['id']));
		}

		return $message;
	}

	function getOrder()
	{
		$sql="select tbl_order.*,tbl_order_status.title 
		from tbl_order 	left join tbl_order_status on tbl_order.status=tbl_order_status.id	where userId=?";
		$order=$this->doSelect($sql,array($this->userId));

		return$order;
	}

	function getFolder()
	{
		$sql="select * from tbl_favorit where userid=? and parent=0";
		$folder = $this->doSelect($sql,array($this->userId));

		return $folder;
	}

	function getFavorit($folderId)
	{
		if ($folderId != 0) {
			$sql = "select tbl_favorit.*,tbl_product.title as productTitle
		from tbl_favorit LEFT JOIN tbl_product on tbl_favorit.idproduct=tbl_product.id
		where userid=? and parent=? ";
		}
		elseif ($folderId == 0)
		{
			$sql = "select tbl_favorit.*,tbl_product.title as productTitle
		from tbl_favorit LEFT JOIN tbl_product on tbl_favorit.idproduct=tbl_product.id
		where userid=? and parent!=? ";
		}

		$folderItems=$this->doSelect($sql,array($this->userId,$folderId));

		return $folderItems;
	}

	function saveEdit($folderId,$title)
	{

		$sql="update tbl_favorit set title=? where id=?";
		$this->doQuery($sql,array($title,$folderId));

	}

	function deleteFavorit($favoritId)
	{
		$sql="delete from tbl_favorit where id=?";
		$this->doQuery($sql,array($favoritId));
	}

	function getCommets()
	{
		$userId=$this->userId;
		$sql="select tbl_comment.* , tbl_product.title as productTitle from tbl_comment LEFT JOIN 
		tbl_product on tbl_comment.idproduct=tbl_product.id where user=?";
		$comments = $this->doSelect($sql,array($userId));

		return $comments;
	}

	function deleteComment($idComment)
	{
		$userId=$this->userId;
		$sql="delete from tbl_comment where id=? and user=?";
		$this->doQuery($sql,array($idComment,$userId));
	}

}




















