<?php
/**
 * @filesource : submit.php
 * @author : Shabeeb  <me@shabeebk.com>
 * @abstract : simple submission php form
 * @package sample file 
 * @copyright (c) 2014, Shabeeb
 * shabeebk.com
 * 
 *  */

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

$servername = "temp.renfrewtkmc.org";
$username = "tkmcWorker";
$password = "!TKMCWorker";
$dbname = "tkmcDB";

//create the connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//saving to database
//save query
$sql = "INSERT INTO Contact(email, message, name) VALUES ('$data->email', '$data->message', '$data->name')";


    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
//now i am just printing the values
echo "Name : ".$data->name."\n";
echo "Email : ".$data->email."\n";
echo "Message : ".$data->message."\n";

/*require("PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer;
$mail->SMTPDebug = 2;
echo !extension_loaded('openssl')?"Not Available":"Available";

//Enable SMTP debugging. 
                             
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "	mail.temp.tkmcrenfrew.org";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "tkmcContactSubmission@temp.tkmcrenfrew.org";                 
$mail->Password = "!HardDrive";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 25;                                   

$mail->From = $data->email;
$mail->FromName = $data->name;

$mail->addAddress('tp_ca@yahoo.com', 'Trevor Pereira');

$mail->isHTML(true);

$mail->Subject = "TKMC Canada Contact Submission";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = $data->message;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}*/

require("PHPMailer-master/PHPMailerAutoload.php");

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "trevorpereira95@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "COush9595";

//Set who the message is to be sent from
$mail->setFrom('$data->email', '$data->name');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('tp_ca@yahoo.com ', 'Trevor Pereira');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Subject = "TKMC Canada Contact Submission";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = $data->message;
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>
