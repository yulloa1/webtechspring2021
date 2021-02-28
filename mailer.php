<?PHP 
$to = "gshankar@babson.edu"; 
$subject = "Results from your Request Info form";
$headers = "From: Form Mailer";
$forward = 0;
$location = "";

$date = date ("l, F jS, Y"); 
$time = date ("h:i A"); 



$msg = "Below is the result of your feedback form. It was submitted on $date at $time.\n"; 
$msg2 = "Below is the result of your feedback form. It was submitted on $date at $time.<br>"; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	foreach ($_POST as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
		$msg2 .= ucfirst ($key) ." : ". $value . "<br>"; 
	}
}
else {
	foreach ($_GET as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
		$msg2 .= ucfirst ($key) ." : ". $value . "<br>"; 
	}
}

$sentmail = @mail($to, $subject, $msg, $headers); 
if($sentmail){
echo "Email Has Been Sent .";
}
else {
echo "Cannot Send Email. The message that would have been sent is:<br>";
echo $msg2;

}

if ($forward == 1) { 
    header ("Location:$location"); 
} 
else { 
    echo "Thank you for submitting our form. We will get back to you as soon as possible."; 
} 

?>