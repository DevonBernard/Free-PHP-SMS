<?php
	class resultObject {
		public $success;
		public $errors;
		
		public function appendError($error){
			$this->errors[] = $error;
		}
		public function setStatus($status){
			$this->success = $status;
		}
		public function __construct(){
			$errors = array();
		}
	}
	
	function getCarriers() {
		$carriers = [
			"alltel" => "message.alltel.com",
			"att" => "txt.att.net",
			"boost" => "myboostmobile.com",
			"cellularone" => "cell1.textmsg.com",
			"cingular" => "cingularme.com",
			"comcast" => "comcastpcs.textmsg.com",
			"metropcs" => "metropcs.sms.us",
			"nextel" => "messaging.nextel.com",
			"sprint" => "messaging.sprintpcs.com",
			"tmobile" =>  "tmomail.net",
			"tracfone" => "txt.att.net",
			"uscellular" => "email.uscc.net",
			"verizon" => "vtext.com",
			"virginmobile" => "vmobl.com",
			"weblinkwireless" => "airmessage.net"
		];
		return $carriers;
	}
	
	function carrierDomain($carrier){
		$carriers = getCarriers();		
		if(array_key_exists($carrier, $carriers)){
			return $carriers[$carrier];
		}else{
			return false;
		}
	}
	
	function formatPhoneNumber($number) {
		return preg_replace("/[^\d]/", "", $number);
	}

	function sendSMS($hostEmail, $message, $number, $carrier=NULL){
		$result = new resultObject;
		
		if(!$hostEmail){
			$result->appendError("Host email required");
		}else{
			if (!filter_var($hostEmail, FILTER_VALIDATE_EMAIL)) {
				$result->appendError("Invalid host email");
			}
		}
		
		if(!$number){
			$result->appendError("Phone number required");
		}else{
			if(strlen(formatPhoneNumber($number)) == 10){
				$number = formatPhoneNumber($number);
			}else{
				$result->appendError("Phone number must be exactly 10 characters long");
			}
		}
		
		if(!$message){
			$result->appendError("Message required");
		}else{
			if(strlen($message) > 160){
				$result->appendError("Message cannot be greater than 160 characters");
			}
		}	
		
		if(!$carrier){
			$result->appendError("Phone carrier required");
		}	
		
		$headers = 'From: ' . $hostEmail . '\r\n';
    		$from = "-f" . $hostEmail;
		if(empty($result->errors)){
			$domain = carrierDomain($carrier);
			if(mail($number."@".$domain, '', $message, $headers, $from)){
				$result->setStatus(true);
			}else{
				$result->setStatus(false);
				$result->appendError("Unable to send SMS");
			}
			
		}else{
			$result->setStatus(false);
		}
		
		return $result;
	}
?>