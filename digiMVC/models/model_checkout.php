<?php

class model_checkout extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getOrderInfo($orderId)
	{
		$sql = "SELECT * FROM tbl_order WHERE id=?";
		$orderInfo = $this->doSelect($sql, array( $orderId ), 1);
		return $orderInfo;
	}

	function zarinpalcheckout($data)
	{
		$Status = $data['Status'];
		$Authority = $data['Authority'];
		$sql = "SELECT * FROM tbl_order WHERE beforepay=?";
		$order = $this->doSelect($sql, array( $Authority ), 1);
		$Amount = $order['amount'];
		$Payment = new Payment;
		$result = $Payment->zarinpalVerify($Amount, $Authority);
		$Status = $result['Status'];
		$Error = $result['Error'];
		$RefID = $result['RefID'];

		if ($Status == 100) {
			$sql = "UPDATE tbl_order SET pay=1,afterpay=? WHERE beforepay=?";
			$this->doQuery($sql, array( $RefID, $Authority ));
		}

		$sql = "SELECT * FROM tbl_order WHERE beforepay=?";
		$order = $this->doSelect($sql, array( $Authority ), 1);
		return $order;
	}

	function payOnline($orderId)
	{
		$orderInfo = $this->getOrderInfo($orderId);

		$paytype = $orderInfo['paytype'];
		if ($paytype == 4) {
			$sql = "update tbl_order set paytype=1 where id=?";
			$this->doQuery($sql, array( $orderId ));
			$paytype = 1;
		}

		if ($paytype == 1) {
			$Description = "پرداخت از دیجیکالا";
			$Amount = $orderInfo['amount'];
			$Mobile = $orderInfo['mobile'];
			$Payment = new Payment;
			$Request = $Payment->zarinpalRequest($Amount, $Description, "info@digikala.com", $Mobile);
			$Status = $Request['Status'];
			$Authority = $Request['Authority'];
			$beforepay = $Authority;
			$Error = $Request['Error'];
			if ($Status == 100) {
				header("location: https://www.zarinpal.com/pg/StartPay/' . $Authority");
			}
			else {
				header("location:" . URL . "checkout/showerror?Error=" . $Error . "&orderId=" . $orderId);
			}
		}//zarinpal
		if ($paytype == 2) {

		}//saman
		if ($paytype == 3) {

		}//pasargad


	}

	function creditcard($data, $orderId)
	{
		$day = $data['day'];
		$month = $data['month'];
		$year = $data['year'];
		$hour = $data['hour'];
		$minute = $data['minute'];
		$bank = $data['bank'];
		$cardnumber = $data['cardnumber'];

		$sql = "update tbl_order set pay_day=?,pay_month=?,pay_year=?,pay_hour=?,pay_minute=?,pay_bank_name=?,pay_card=?,paytype=4 where id=?";
		$params=array($day,$month,$year,$hour,$minute,$bank,$cardnumber,$orderId);
		$this->doQuery($sql,$params);
	}


}

?>
