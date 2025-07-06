<?php


class model_showcart4 extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function codeTakhfif($codeTakhfif)
	{
		$sql = "SELECT * FROM tbl_code WHERE code=? and used=0";
		$res = $this->doSelect($sql,array($codeTakhfif));
		$darsad=0;
		if (count($res)>0)
		{
			$istrue=true;
			$darsad=$res[0]['darsad'];
		}
		else
		{
			$istrue=false;
		}
		$result=array($istrue,$darsad);

		return $result;
	}

	function getTotalPrice($code)
	{

		$basketInfo = $this->getBasketInfo();
		$totalPrice=$basketInfo[1];
		$totalDiscount=$basketInfo[2];

		$discountPriceCode=0;
		$codeDiscount=$this->codeTakhfif($code);
		$discountDarsad=$codeDiscount[1];
		$discountPriceCode=($totalPrice-$totalDiscount)*$discountDarsad/100;

		return $finalPrice=$totalPrice-$totalDiscount-$discountPriceCode;
	}

	function saveOrder($data)
	{
		echo "<meta charset='utf8'>";
		$paytype=$data['paytype'];
		$codetakhfif=$data['codetakhfif'];
		$code=$this->codeTakhfif($codetakhfif);
		if ($code[0])
		{
			$darsad=$code[1]/100;
		}
		else
		{
			$darsad=0;
		}


		Model::sessionInit();
		$addressInfo=Model::sessionGet("addressInfo");
		$addressInfo=unserialize($addressInfo);
		$userId=Model::sessionGet("userId");
		$postInfo=Model::sessionGet("postInfo");
		$postInfo=unserialize($postInfo);
		$postType=$postInfo['id'];
		$postPrice=0;

		$family=$addressInfo['family'];
		$ostan=$addressInfo['ostan'];
		$city=$addressInfo['shahr'];
		$code_posti=$addressInfo['codeposti'];
		$address=$addressInfo['address'];
		$mobile=$addressInfo['mobile'];
		$tel=$addressInfo['tel'];

		$basketInfo=$this->getBasketInfo();
		$basket=$basketInfo[0];
		$basket=serialize($basket);
		$totalPrice=$basketInfo[1];
		$totalDiscount=$basketInfo[2];


		$amount=$totalPrice-$totalDiscount+$postPrice-($totalPrice-$totalDiscount)*$darsad;
		$Description="پرداخت از سایت دیجیکالا";
		$beforepay="";

		if ($paytype==1)
		{
			$Payment = new Payment;
			$Request=$Payment->zarinpalRequest($amount,$Description,"info@digikala.com",$mobile);
			$Status=$Request['Status'];
			$Authority=$Request['Authority'];
			$beforepay=$Authority;
			$Error=$Request['Error'];
		}
		$time=time();

		$sql="INSERT INTO tbl_order
		 (family,ostan,city,code_posti,mobile,tel,userid,post_type,address,basket,amount,post_price,status,beforepay,paytype,time_sabt) 
		 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$params=array($family,$ostan,$city,$code_posti,$mobile,$tel,$userId,$postType,$address,$basket,$amount,$postPrice,1,$beforepay,$paytype,$time);
		$this->doQuery($sql,$params);

		if ($paytype==1)
		{
			if ($Status==100)
			{
				header("location: https://www.zarinpal.com/pg/StartPay/' . $Authority");
			}
			else
			{
				header("location:".URL."showcart4/index/".$Status);
			}
		}


		if ($paytype==4)
		{
			$sql="SELECT * FROM tbl_order ORDER BY id DESC limit 1";
			$order = $this->doSelect($sql,array(),1);
			header("location:".URL."checkout/index/".$order['id']);
		}



	}

}










































