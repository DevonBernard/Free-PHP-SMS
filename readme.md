## Description
This PHP library will allow anyone to easily send SMS messages to any US-based mobile phone number with a one line function call.

## Installation Instructions
Download **phpSMS.php** and include it on any page you want to send SMS messages.

### Simple Example
```
<?php
	require_once("./phpSMS.php");
	$result = sendSMS($_POST['senderEmail'], $_POST['message'], $_POST['phoneNumber'], $_POST['carrier']);

	if(!empty($result->errors)){
		foreach($result->errors as $error){
			echo $error . "\n";
		}
	}else{
		echo "SMS Message successfully sent\n";
	}
?>
```
sendSMS has four parameters (all required):
1. senderEmail: The email address you want the recipient to see the message coming from.
2. message: The text message you want to send. (160 character limit)
3. phoneNumber: The mobile phone number you want to send a SMS message to.
4. carrier: The service provider for the phone number being messaged. 

## Demo
A live demo can be found at http://dbcoding.com/phpSMS

## Contributors
Devon Bernard
* dwbcoding@gmail.com
* [LinkedIn](https://www.linkedin.com/in/devonbernard)
* [@DBCoding](https://www.twitter.com/DBCoding)
