<?php
	require("./phpSMS.php");
	if($_POST['phone']){
		$phone = $_POST['phone'];
		$result = sendSMS($phone['hostEmail'], $phone['message'], $phone['number'], $phone['carrier']);
	}
?>
<html>
	<head>
		<title>Free PHP SMS</title>
		<link rel="stylesheet" type="text/css" href="./main.css" />
	</head>
	<body>
		<div class="mainContent">
		<div style="width:100%;text-align:center;font-size:25px;margin-bottom:10px;">Free PHP SMS Sender</div>
		<form action="" method="POST">
			<div class="inputTitle">Phone Number:</div><input type="text" name="phone[number]" placeholder="5550001234" <?php echo "value='{$phone['number']}'"; ?> ><br/>
			
			<div class="inputTitle">Phone Carrier:</div>
			<select name="phone[carrier]" style="width:205px;">
				<option value="">Select Carrier</option>
			<?php 
				$carriers = getCarriers();
				foreach($carriers as $carrier => $domain){
					echo "<option value='{$carrier}'";
					if($phone['carrier'] == $carrier){
						echo "selected";
					}
					echo ">{$carrier}</option>";
				}
			?>
			</select>
			
			<div class="inputTitle">Sender Email:</div><input type="email" name="phone[hostEmail]" placeholder="you@example.com" <?php echo "value='{$phone['hostEmail']}'"; ?> ><br/>
			
			<div class="inputTitle" style="width: 100%;text-align: center;">Message: </div><br/>
			<textarea name="phone[message]"><?php echo $phone['message']; ?></textarea><br/>
			<div style="width:100%;text-align:center;margin:20px 0 0 0;">
				<input type="submit" value="Send Message">
			</div>
		</form>
		
	<?php 
	if($phone){
		if(!empty($result->errors)){
			echo '<div class="error">Errors: <ul>';
      			foreach($result->errors as $error){
      				echo '<li>' . $error . '</li>';
      			}
      			echo '</ul></div>';
		}else{
			echo '<div class="success">Successfully sent message</div>';
		}
	}
	?>
	</div>
	<div id="title" style="min-width:800px;font-size:25px;">Devon Bernard (2014)</div>
	</body>
</html>