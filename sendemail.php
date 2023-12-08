<?php

// Define some constants
define( "RECIPIENT_NAME", "GiaX GmbH" );
define( "RECIPIENT_EMAIL", "Info@giax.ch" );


// Read the form values
$success = false;
$userName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $userName && $senderEmail && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $username . " <" . $senderEmail . ">";
  $msgBody = " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: kontakt.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: startseite.html?message=Failed');	
}

?>