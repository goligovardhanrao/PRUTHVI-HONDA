<?php

// if( file_exists($php_email_form = '../assets/vendor/php-email-form/validate.js' )) {
//   include( $validate);
// } else {
//   die( 'Unable to load the "PHP Email Form" Library!');
// }



if(isset($_POST['Online'])) {
$email_to = "goligovardhanrao527@gmail.com";
$email_subject = "Pruthvi Honda";


//Errors to show if there is a problem in form fields.
function died($error) {
    echo "We are sorry that we can procceed your request due to error(s)";
    echo "Below is the error(s) list <br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
}                         
// validation expected data exists 
if(!isset($_POST['name']) ||
       !isset($_POST['email']) ||
       !isset($_POST['subject']) ||
       !isset($_POST['message']) ||
       !isset($_POST['phone'])||
       !isset($_POST['pickone']))
        {
    died('We are sorry to proceed your request due to error within form entries');   
}
$name = $_POST['name']; // required
$email = $_POST['email']; // required
$subject = $_POST['subject']; // not required
$message = $_POST['message']; // required
$phone= $_POST['phone']; // required
$pickone= $_POST['pickone']; // required

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 if(!preg_match($email_exp,$email)) {
$error_message .= 'You entered an invalid email<br />';
 }
$string_exp = "/^[A-Za-z .'-]+$/";
 if(!preg_match($string_exp,$name)) {
$error_message .= 'Invalid  name<br />';
 }
 
 function validating($phone){
  if(!preg_match('/^[0-9]{10}+$/', $phone)) {

$error_message .= ' phone number<br />';
  }else{

$error_message .= 'Sorry, Invalid phone number<br />';
  }
  }

// phone number 
// if(strlen($phone) >=5 && strlen($phone)<=10)
// {
//   $error_message .= 'Sorry, Invalid phone number<br />';

// }


if(!empty($_POST['pickone'])) {
  $selected = $_POST['pickone'];
  echo 'You have chosen: ' . $selected;
} else {
  echo 'Please select the value.';
}






 if(strlen($subject) < 2) {
$error_message .= 'Invalid comments<br />';
 }
 if(strlen($message) < 2) {
  $error_message .= 'Invalid comments<br />';
   }
 if(strlen($error_message) > 0) {
   died($error_message);
 }




$email_message = "Form details below.\n\n";
function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}
$email_message .= " Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email)."\n";
$email_message .= "phone: ".clean_string($phone)."\n";
$email_message .= "pickone: ".clean_string($pickone)."\n";
$email_message .= "subject: ".clean_string($subject)."\n";
$email_message .= "message: ".clean_string($message)."\n";

// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
 @mail($email_to, $email_subject, $email_message, $headers);
header('Location: ../index.html#booking');






//  if (mail ($email_to, $email_subject, $email_message, $headers)) { 
 
//   $success = "Message successfully sent";
// } else {
//    $success = "Message Sending Failed, try again";
// }

// Function definition
// function function_alert($headers) {
      
//   // Display the alert box 
//   echo "<script>alert('$headers');</script>";
// }


// Function call
// function_alert("Thank you for contacting us. We will be in touch with you very soon.");

?>
<!-- include your own success html here -->
Thank you for contacting us. We will be in touch with you very soon.
<!-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> -->
      
<?php
}
?>


