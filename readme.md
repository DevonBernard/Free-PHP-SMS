## Description
This PHP library will allow anyone to easily send SMS messages to any <b>US-based</b> mobile phone number with a one line function call.

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
<ol>
<li> <b>senderEmail:</b> The email address you want the recipient to see the message coming from.</li>
<li> <b>message:</b> The text message you want to send. (160 character limit)</li>
<li> <b>phoneNumber:</b> The mobile phone number you want to send a SMS message to.</li>
<li> <b>carrier:</b> The service provider for the phone number being messaged. </li>
</ol>

## Demo
A live demo can be found at http://dbcoding.com/phpSMS

## Contributors
Devon Bernard
* dwbcoding@gmail.com
* [LinkedIn](https://www.linkedin.com/in/devonbernard)
* [@DBCoding](https://www.twitter.com/DBCoding)

## Notes
<ul>
<li>If all data is entered properly, but you select the wrong service carrier:
	<ul>
	<li>sendSMS() will return <b>true</b></li>
	<li>The recipient will <b>NOT</b> recieve the message you attempted to send them</li>
	</ul>
	</li>
<li>Possible future plans to try and build custom Carrier Lookup so it's not required to submit a carrier for each message</li>
</ul>
