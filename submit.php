<?php


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

//send an email to let us know a new contact request has been added

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
//$mail->Host = 'smtp.gmail.com';
//$mail->Host = 'a2plcpnl0866.prod.iad2.secureserver.net';
// use
$mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "tkmccanada@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "!HardDrive";

//Set who the message is to be sent from
$mail->setFrom($data->email, $data->name);


//Set who the message is to be sent to
$mail->addAddress('tp_ca@yahoo.com ', 'Trevor Pereira');


$mail->isHTML(true);
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Subject = "TKMC Canada Contact Submission";
$mail->Body = "<h3>Contact Submission</h3>
                <div><span>The message is:   $data->message</span></div>
                <div><span>Their email is:   $data->email</span></div>";


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>
