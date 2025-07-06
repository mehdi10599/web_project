<?php
class model_product extends model
{
	function __construct()
	{
		parent::__construct();
	}

	function product_info($id)
	{
		$sql="select * from tbl_product where id=?";
		$res =$this->doSelect($sql,array($id),1);
		if (isset($res['id'])) {
			$price = $res['price'];
			$discount = $res['discount'];
			$discount_res = $this->calcDiscount($discount, $price);
			$res['price_discount'] = $discount_res[0];
			$res['price_final'] = $discount_res[1];

			$date_end = $this->calcFlipDateEnd($res['time_special']);
			$res['date_end'] = $date_end;

			$colors_id = array_filter(explode(',', $res['color']));
			$all_color = array();
			foreach ($colors_id as $id) {
				$color = $this->color_info($id);
				array_push($all_color, $color);
			}
			$res['all_color'] = $all_color;

			$guarantys_id = array_filter(explode(',', $res['guaranty']));
			$all_guaranty = array();
			foreach ($guarantys_id as $id) {
				$guaranty = $this->guaranty_info($id);
				array_push($all_guaranty, $guaranty);
			}
			$res['all_guaranty'] = $all_guaranty;


			return $res;
		}
		else
		{
			return false;
		}
	}

	function color_info($id)
	{
		$sql="select * from tbl_color where id=?";
		$res=$this->doSelect($sql,array($id),1);
		return $res;
	}

	function guaranty_info($id)
	{
		$sql="select * from tbl_guaranty where id=?";
		$res=$this->doSelect($sql,array($id),1);
		return $res;
	}


	function onlyDigi()
	{
		$sql = "select * from tbl_product where onlydigikala=1";
		$res =$this->doSelect($sql);

		return $res;
	}

	function naghd_info($id)
	{
		$sql="select * from tbl_naghd where idproduct=?";
		$res = $this->doSelect($sql,array($id));

		return $res;
	}

	function fanni($idcategory,$id)
	{

		$sql="select * from tbl_attr where idcategory = ? and parent=0";
		$res = $this->doSelect($sql,array($idcategory));
		foreach ($res as $key=>$row)
		{
			$sql2="select tbl_attr.title , tbl_product_attr.value from tbl_attr left join tbl_product_attr
 on tbl_attr.id=tbl_product_attr.idattr and tbl_product_attr.idproduct=? where tbl_attr.idcategory = ? and tbl_attr.parent=? ";
			$res2 = $this->doSelect($sql2,array($id,$idcategory,$row['id']));
			$res[$key]['children']=$res2;
		}

		return $res;
	}

	 function comment_param($idcategory)
	 {
	 	$sql="select * from tbl_comment_param where idcategory=?";
	 	$res=$this->doSelect($sql,array($idcategory));

	 	return $res;
	 }

	 function getcomments($idproduct)
	 {
		 $sql="select * from tbl_comment where idproduct=?";
		 $res=$this->doSelect($sql,array($idproduct));

		 $avg = array();
		 foreach ($res as $row) {
			 $param = unserialize($row['param']);
			 foreach ($param as $idparam => $score) {
			 	if (!isset($avg[$idparam])){$avg[$idparam]=0;}
				$avg[$idparam]=$avg[$idparam]+$score;
			 }
		 }
		 $count=sizeof($res);
		 foreach ($avg as $key=>$val)
		 {
		 	$avg[$key]=($val/$count);
		 }

		 return array($res,$avg);
	 }

	 function getquestion($idproduct)
	 {
	 	$sql="select * from tbl_question where idproduct=? and parent=0";
	 	$questions=$this->doSelect($sql,array($idproduct));

	 	$sql="select * from tbl_question where parent!=0";
	 	$answers=$this->doSelect($sql);
	 	$answers_new=array();
	 	foreach ($answers as $key=>$answer)
		{
			$parent = $answer['parent'];
			$answers_new[$parent]=$answer;
		}


	 	return array($questions,$answers_new);
	 }

	 function getgallery($id)
	 {
	 	$sql="select * from tbl_gallery where idproduct=? order by threed desc ";
	 	$res = $this->doSelect($sql,array($id));

	 	return $res;
	 }

	 function addToBasket($productId,$colorId,$guarantyId)
	 {
	 	$cookie=self::getBasketCookie();

	 	$sql="select * from tbl_basket where cookie=? and idproduct=? and color=? and guaranty=? ";
	 	$params = array($cookie,$productId,$colorId,$guarantyId);
	 	$res=$this->doSelect($sql,$params,1);

	 	if (isset($res['id']))
		{
			$sql = "update tbl_basket set tedad=tedad+1 where cookie=? and idproduct=? and color=? and guaranty=?  ";
		}
		else
		{
			$sql = "insert into tbl_basket (cookie,idproduct,tedad,color,guaranty) values (?,?,1,?,?)";
		}
	 	$this->doQuery($sql,$params);
	 }

}

?>
