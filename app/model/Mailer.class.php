<?php
require $base->get('BASEDIR').'/assets/libs/PHPMailer/PHPMailerAutoload.php';
 class Mailer {
 	private static $instance = false;
 	public static function getInstance() {
	    if (!self::$instance) {
	      self::$instance = new Mailer();
	    }

	    return self::$instance;
	}
	
	public $setFromEmail;
	public $setFromName;
	public $addAddressEmail;
	public $addAddressName;
	public $addCCEmail;
	public $addCCName;
	public $addBCCEmail;
	public $addBCCName;
	public $Subject;
	public $msgHTML;
	public $msgBody;
	public $mutiAddress = array();
	
	private function _sendmail(){
		
		//date_default_timezone_set('Etc/UTC');
		$base = Base::getInstance();
		
		if($this->setFromEmail==''){
			$this->setFromEmail = $base->get('MAIL_USERNAME');
		}
		if($this->setFromName==''){
			$this->setFromName = 'Visioninter System';
		}

		
		$mail = new PHPMailer;
		
		$mail->isSMTP();
		
		$mail->SMTPDebug = $base->get('MAIL_UDEBUG');;
		
		$mail->Debugoutput = 'html';
		
		$mail->CharSet = 'utf-8';

		$mail->SMTPSecure = 'tls';  
		
		$mail->Host = $base->get('MAIL_HOST');
		
		$mail->Port = $base->get('MAIL_PORT');
		
		$mail->SMTPAuth = true;

		$mail->isHTML(true);
		
		$mail->Username = $base->get('MAIL_USERNAME');
		
		$mail->Password = $base->get('MAIL_PASSWORD');
		
		$mail->setFrom($this->setFromEmail, $this->setFromName);
		
		//$mail->addReplyTo('replyto@example.com', 'First Last');
		
		$mail->addAddress($this->addAddressEmail, $this->addAddressName);
		
		if(!empty($this->addCCEmail)){
			$mail->addCC($this->addCCEmail, $this->addCCName);
		}
		
		if(!empty($this->addBCCEmail)){
			$mail->addBCC($this->addBCCEmail, $this->addBCCName);
		}
		
		
		$mail->Subject = $this->Subject;
		
		$mail->msgHTML($this->msgHTML);

		$mail->Body = $this->msgHTML;

		// GF::print_r($this->msgHTML);exit();
		
		//$mail->AltBody = 'This is a plain-text message body';
		
		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    return 1;
		}
	}
	public function sendMail(){
		$base = Base::getInstance();
		$this->_renderTemplate();
		$resultreturn = $this->_sendmail();
		return $resultreturn;
	}
	public function SendingToNoti(){
		
		$resultreturn = $this->_SendingToNoti();
		return $resultreturn;
	}
	public function SendingToNotiAccount(){
		
		$resultreturn = $this->_SendingToNotiAccount();
		return $resultreturn;
	}
	
	private function _renderTemplate(){
		$base = Base::getInstance();
		//$mailHTML = file_get_contents($base->get('BASEDIR').'/app/view/italasia/utility_ui/mail.htm');
		
		//$img_header = $base->get('BASEURL')."/assets/images/notification_header.png";
		//$img_footer = $base->get('BASEURL')."/assets/images/notification_footer.png";
		
		//$mailHTML = str_replace('{HEADER}',$img_header,$mailHTML);
		//$mailHTML = str_replace('{FOOTER}',$img_footer,$mailHTML);
		$mailHTML = $this->msgBody;//str_replace('{MAIL_BODY}',$this->msgBody,$mailHTML);
		
		$this->msgHTML = $mailHTML;
	
	}
	private function _multiSending(){
		$base = Base::getInstance();
		$this->_renderTemplate();
		
		if(count($this->mutiAddress)>=1){
			foreach($this->mutiAddress as $email){
				$this->addAddressEmail = $email['email'];
				$this->addAddressName = $email['name'];
				$resultreturn = $this->_sendmail();
			}
			return true;
		}else{
			return true;
		}
	}
	private function _SendingToNoti(){
		$base = Base::getInstance();
		$this->_renderTemplate();
		
		$memberList = $this->_groupNotification();
		$this->Subject = '[Admin Notification]'.$this->Subject;
		foreach($memberList as $memberTo){
			if(is_array($memberTo)){
				foreach($memberTo as $vlaues){
					$this->addAddressEmail = $vlaues['user_email'];
					$this->addAddressName = $vlaues['user_name'];
					
					$resultreturn = $this->_sendmail();
				}
			}
		}
		
	}
	private function _SendingToNotiAccount(){
		$base = Base::getInstance();
		$this->_renderTemplate();
		
		$memberList = $this->_accountNotification();
		//GF::print_r($memberList);
		$this->Subject = '[Account Notification]'.$this->Subject;
		foreach($memberList as $memberTo){
			if(is_array($memberTo)){
				foreach($memberTo as $vlaues){
					$this->addAddressEmail = $vlaues['user_email'];
					$this->addAddressName = $vlaues['user_name'];
					
					$resultreturn = $this->_sendmail();
				}
			}
		}
		
	}
	private function _groupNotification(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();
 		$member = new Member();
 		
 		$sql = "SELECT * FROM project_role WHERE status='O' AND email_notification='A'";
 		$res = $db->Execute($sql);
		$arrResult = array();
		$i = 0;
		while(!$res->EOF){
			
			$base->set('_role_id',$res->fields['id']);
			$memberList = $member->memberListByGroup();
			$arrResult[$i] = $memberList;
			
			$i++;
			$res->MoveNext();
		}
		$res->Close();

		return 	$arrResult;
	}
	private function _accountNotification(){
		$base = Base::getInstance();
 		$db = DB::getInstance()->condb();
 		$member = new Member();
 		
 		$sql = "SELECT * FROM project_role WHERE status='O' AND email_account='A'";
 		$res = $db->Execute($sql);
		$arrResult = array();
		$i = 0;
		while(!$res->EOF){
			
			$base->set('_role_id',$res->fields['id']);
			$memberList = $member->memberListByGroup();
			$arrResult[$i] = $memberList;
			
			$i++;
			$res->MoveNext();
		}
		$res->Close();

		return 	$arrResult;
	}
	
 }
?>