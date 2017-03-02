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




?>
