<?php
require $base->get('BASEDIR_F').'/assets/libs/PHPMailer/PHPMailerAutoload.php';
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
			$this->setFromName = 'บริษัท สยาม อะพาร่า จำกัด';
		}
		$mail = new PHPMailer;
		$mail->CharSet = 'utf-8';
		$mail->isSMTP();
		$mail->Host = $base->get('MAIL_HOST');
		$mail->SMTPAuth = true;
		$mail->Username = $base->get('MAIL_USERNAME');
		$mail->Password = $base->get('MAIL_PASSWORD');
		$mail->SMTPSecure = 'tls';
		$mail->SMTPDebug = $base->get('MAIL_UDEBUG');;
		
		$mail->Debugoutput = 'html';
		$mail->setFrom($this->setFromEmail, $this->setFromName);
		$mail->addReplyTo($this->setFromEmail, $this->setFromName);
		$mail->Port = $base->get('MAIL_PORT');
		$mail->addAddress($this->addAddressEmail, $this->addAddressName);
		if(!empty($this->addCCEmail)){
			$mail->addCC($this->addCCEmail, $this->addCCName);
		}
		if(!empty($this->addBCCEmail)){
			$mail->addBCC($this->addBCCEmail, $this->addBCCName);
		}
		$mail->Subject = $this->Subject;
		$mail->msgHTML($this->msgHTML);
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    return true;
		}
	}
	public function sendMail(){
		$base = Base::getInstance();
		$this->_renderTemplate();
		$resultreturn = $this->_sendmail();
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

	
 }
?>