<?php
class GF{




	public static function formatUrl($string,$encode=true)
	{
		//$string=strtolower(trim($string));
		//$string = strtolower(str_replace(" ","_",$string));
		$encode=false; //true = no encode; false= encode
		$string=trim($string);
		$string = str_replace(" ","-",$string);
		$string = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu','',$string);
		$string=preg_replace("/[\_]{2,}/",'-',$string);

		return ($encode==true)?rawurlencode(trim($string, '-')):trim($string, '-');
	}

	public static function randomStr($length){
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		return $randomString;
	}
	public static function memberinfo($memberid){
		$base = Base::getInstance();
		$member = new Member();

		$base->set('bind_id',$memberid);
		$resultReturn = $member->memberInfomationByID();
		return $resultReturn;
	}
	public static function randomNumb($length){
		$randomString = substr(str_shuffle("012345678901234567890123456789"), 0, $length);
		return $randomString;
	}
	public static function banklist(){
		$base = Base::getInstance();
		$db = DB2::getInstance();

		$result = $db->select("bank", "*", array(
				'status' => 'O'
		));

		return $result;
	}
	public static function bankinfo($bank_id){
		$base = Base::getInstance();
		$db = DB2::getInstance();

		$result = $db->get("bank", "*", array(
				'bank_id' => $bank_id
		));

		return $result;
	}
   public static function getGet($ids,$table,$fiels){
		$base = Base::getInstance();
		$db = DB2::getInstance();

		$result = $db->get($table, "*", array(
				$fiels => $ids
		));

		return $result;
	}
   public static function getvat(){
		$base = Base::getInstance();
		$db = DB2::getInstance();

		$result = $db->get("vat", "*", array(
				'status' => 'O'
		));
      $returnData = 0;
      if($result['vat_value']!=''){
         $returnData = $result['vat_value'];
      }

		return $returnData;
	}
   public static function orderstatus($orderid){
		$base = Base::getInstance();
		$db = DB2::getInstance();

		$result = $db->get("order", "*", array(
				'order_id' => $orderid
		));

      $orderstatusText = '';
      if($result['order_status']=='A'){
         $orderstatusText = 'สั่งซื้อแล้ว';
      }else if($result['order_status']=='B'){
         $orderstatusText = 'รอดำเนินการ';
      }else if($result['order_status']=='C'){
         $orderstatusText = 'ชำระเงินแล้ว';
      }else if($result['order_status']=='D'){
         $orderstatusText = 'กำลังจัดส่ง';
      }else if($result['order_status']=='E'){
         $orderstatusText = 'จัดส่งเรียบร้อย';
      }else if($result['order_status']=='F'){
         $orderstatusText = 'ยกเลิก';
      }else if($result['order_status']=='G'){
         $orderstatusText = 'ยกเลิกโดยระบบ';
      }else{
         $orderstatusText = 'ระบบขัดข้อง';
      }

		return $orderstatusText;
	}
	public static function orderid($number,$type){
		$base = Base::getInstance();

		$order_prefix = $base->get("ORDER_PREFIX");
		$order_num = $base->get('ORDER_NUM');
		if($type=='IN'){
			$order_pad = str_pad($number,$order_num,'0',STR_PAD_LEFT);
			return $order_prefix.$order_pad;
		}else{
			$order_number = str_replace($order_prefix,"",$number);
			return intval($order_number);
		}
	}

	public static function shipping($id){
		$base = Base::getInstance();

		$result = $db->get("shipping", "*", array(
				'ship_id' => $id
		));

		return $result;
	}
	public static function orderstatusx($id){
		$base = Base::getInstance();
		$text = '';
		if($id=='W'){
			$text = '<span class="text-w">รอชำระเงิน</span>';
		}
		if($id=='P'){
			$text = $text = '<span class="text-p">ชำระเงินแล้ว</span>';
		}
		if($id=='C'){
			$text = $text = '<span class="text-c">ยกเลิก</span>';
		}

		return $text;
	}

	public static function viewipaddress(){
		$ipaddress = '';
	    if ($_SERVER['HTTP_CLIENT_IP'])
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_X_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if($_SERVER['HTTP_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if($_SERVER['REMOTE_ADDR'])
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';

	    return $ipaddress;
	}

	public static function print_r($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}


	public static function quote($value){
		$db = DB::getInstance()->condb();
		return $db->Quote(trim($value));
	}

	public static function htmlchar($value){
		return htmlspecialchars(trim($value));
	}

	public static function trimArray($str){
		$ret = array();
		$arr = explode("<br />",nl2br($str));
		$arr = array_map('_ctrim', array_filter($arr));
		return $arr;
	}


	 public static function  array_sort($array, $on, $order=SORT_ASC){
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
			foreach ($array as $k => $v) {
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if ($k2 == $on) {
							$sortable_array[$k] = $v2;
						}
					}
				} else {
					$sortable_array[$k] = $v;
				}
			}

			switch ($order) {
				case SORT_ASC:
					asort($sortable_array);
				break;
				case SORT_DESC:
					arsort($sortable_array);
				break;
			}
			$i = 0;
			foreach ($sortable_array as $k => $v) {
				$new_array[$i] = $array[$k];
				//print $i."<BR>";
				$i++;
			}
		}

		return $new_array;
	}

	public function  ShowDate($ymd,$tm=NULL){
	global $db;

	if($ymd != "0000-00-00 00:00:00" && $ymd != "0000-00-00"  && !empty($ymd ) ){

		$d = substr($ymd,8,2);
		$m = substr($ymd,5,2);
		$y = substr($ymd,0,4);
		$t = ($tm) ? ' '.substr($ymd,11,8) : "";


		if(!empty($_SESSION['L_LANG'])){
			$flag = $_SESSION['L_LANG'];

			$sql = "SELECT date_format FROM localizationlanguage WHERE flag='$flag'";
			$res = $db->Execute($sql);
			$date_format = $res->fields["date_format"];
			$sql = "SELECT format_id, format_one, format_two, format_three, format_character
						FROM localizationdateformat WHERE format_id=$date_format";
			$res = $db->Execute($sql);
			$format_one = $res->fields['format_one'];
			$format_two = $res->fields['format_two'];
			$format_three = $res->fields['format_three'];
			$format_character = !empty($res->fields['format_character']) ? $res->fields['format_character'] : " ";

			$sql = "SELECT month_code, monthshort_$flag, monthfull_$flag
						FROM localizationmonth WHERE month_code='$m'";
			$res = $db->Execute($sql);
			$month_code = $res->fields['month_code'];
			$monthshort = $res->fields['monthshort_'.$flag];
			$monthfull = $res->fields['monthfull_'.$flag];

			//case $format_one
			if($format_one=="dd"){
				$format_one = $d;
			}else if($format_one=="mm"){
				$format_one = $m;
			}else if($format_one=="mmm"){
				$format_one = $monthshort;
			}else if($format_one=="mmmm"){
				$format_one = $monthfull;
			}else if($format_one=="yy"){
				if($flag=="th"){
					$format_one = substr(($y+543),-2);
				}else{
					$format_one = substr($y,-2);
				}
			}else if($format_one=="yyyy"){
				if($flag=="th"){
					$format_one = ($y+543);
				}else{
					$format_one = $y;
				}
			}

			//case $format_two
			if($format_two=="dd"){
				$format_two = $d;
			}else if($format_two=="mm"){
				$format_two = $m;
			}else if($format_two=="mmm"){
				$format_two = $monthshort;
			}else if($format_two=="mmmm"){
				$format_two = $monthfull;
			}else if($format_two=="yy"){
				if($flag=="th"){
					$format_two = substr(($y+543),-2);
				}else{
					$format_two = substr($y,-2);
				}
			}else if($format_two=="yyyy"){
				if($flag=="th"){
					$format_two = ($y+543);
				}else{
					$format_two = $y;
				}
			}

			//case $format_three
			if($format_three=="dd"){
				$format_three = $d;
			}else if($format_three=="mm"){
				$format_three = $m;
			}else if($format_three=="mmm"){
				$format_three = $monthshort;
			}else if($format_three=="mmmm"){
				$format_three = $monthfull;
			}else if($format_three=="yy"){
				if($flag=="th"){
					$format_three = substr(($y+543),-2);
				}else{
					$format_three = substr($y,-2);
				}
			}else if($format_three=="yyyy"){
				if($flag=="th"){
					$format_three = ($y+543);
				}else{
					$format_three = $y;
				}
			}

			$show_date = $format_one.$format_character.$format_two.$format_character.$format_three.$t;
		}else{
			$show_date = $ymd;
		}

			return $show_date;
		}else{
			return "-";
		}
	}

	public static function masterdata($group_id){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();


 		//$group_id = $base->get('_ids');

 		if($group_id!=''){
			$sql = "SELECT * FROM project_master WHERE id=".GF::quote($group_id);


			$db->SetFetchMode(ADODB_FETCH_ASSOC);
			$res = $db->Execute($sql);
			$arrReturn = array();
			$arrReturn['id'] = $res->fields['id'];
			$arrReturn['master_name'] = $res->fields['master_name'];
			$arrReturn['group_id'] = $res->fields['group_id'];


			return $arrReturn;
		}else{
			return NULL;
		}
	}
	public static function masterdataList($group_id){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

		$sql = "SELECT * FROM project_master WHERE status='O' AND active_status='O' AND group_id=".GF::quote($group_id)." ORDER BY id ASC";
		$res = $db->Execute($sql);


		$arrReturn = array();
		$i = 0;
		while(!$res->EOF){
			$arrReturn[$i]['id'] = $res->fields['id'];
			$arrReturn[$i]['master_name'] = $res->fields['master_name'];
			$arrReturn[$i]['group_id'] = $res->fields['group_id'];
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;
	}
	public static function langdefault(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();

		$sql = "SELECT * FROM project_language WHERE status='O' AND `default`='A'";
		$res = $db->Execute($sql);

		return 	$res->fields['lang_prefix'];

	}
	public static function langlist(){
 		$module = new Module();
		return 	$module->languageList();

	}

   public static function getOrderNo(){
     $db = DB::getInstance()->condb();
     $dat = date('Ym');
     $sql = "SELECT * FROM project_order_document WHERE doc_date='$dat'";
     $res = $db->Execute($sql);
     if(!empty($res->fields['id'])){
        $id = $res->fields['id'];
        $date = $res->fields['doc_date'];
        $no = $res->fields['doc_no'];
        $order_no = $date.str_pad($no,4,'0',STR_PAD_LEFT);
        $sqlUp = "UPDATE project_order_document SET doc_no=doc_no+1 WHERE id='$id'";
        $resUp = $db->Execute($sqlUp);
        return 	$order_no;
     }else{
        $sqlIn = "INSERT INTO project_order_document(
                                         doc_date,
                                         doc_no
                                         )VALUE(
                                         ".GF::quote($dat).",
                                         '1'
                                         )";
        $resIn = $db->Execute($sqlIn);
        $id = $db->Insert_ID();
        $sqlUp = "UPDATE project_order_document SET doc_no=doc_no+1 WHERE id='$id'";
        $resUp = $db->Execute($sqlUp);
        $order_no = $dat.str_pad('1',4,'0',STR_PAD_LEFT);
        return 	$order_no;
     }
   }
	public static function _districtByID($province_id){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();
 		$sql = "SELECT * FROM amphures WHERE PROVINCE_ID=".GF::quote($province_id);
		$res = $db->Execute($sql);
 		$i = 0;
 		$arrReturn = array();
		while(!$res->EOF){
			$arrReturn[$i]['AMPHUR_ID'] = $res->fields['AMPHUR_ID'];
			$arrReturn[$i]['AMPHUR_NAME'] = GF::htmlchar($res->fields['AMPHUR_NAME_'.GF::langdefault()]);
			$arrReturn[$i]['GEO_ID'] = $res->fields['GEO_ID'];
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;	
	}
	public static function _subdistrictByID($id){ 
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();
 		$sql = "SELECT * FROM districts WHERE AMPHUR_ID=".GF::quote($id);
 		$res = $db->Execute($sql);
 		$i = 0;
 		$arrReturn = array();
		while(!$res->EOF){
			$arrReturn[$i]['DISTRICT_ID'] = $res->fields['DISTRICT_ID'];
			$arrReturn[$i]['DISTRICT_NAME'] = GF::htmlchar($res->fields['DISTRICT_NAME_'.GF::langdefault()]);
			$arrReturn[$i]['GEO_ID'] = $res->fields['GEO_ID'];
			$i++;
			$res->MoveNext();
		}
		$res->Close();
		return 	$arrReturn;	
	}


}



/*-----------------------------------------------------*/
#Global callback functions
/*-----------------------------------------------------*/
function _ctrim($n){
	return trim($n, "\x00..\x1F");
}
