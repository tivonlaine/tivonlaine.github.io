<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    if(empty($name) || empty($email) || empty($message)){
        echo "Please fill in the required fields";
        exit;
}

$to="tivonrobla@gmail.com";

$subject= "New message from $name";

$email_content="Name: $name\n";
$email_content.="Email: $email\n";
$email_content.="Message: $message\n";

$headers="From: $name <$email>\r\n";
$headers.= "Reply-To: $email\r\n";
$headers.= "Content-Type: text/plain; charset=utf-8\r\n";

if(mail($to,$subject,$email_content,$message)){

    echo "Success sending message";
}else{
    echo "Failed sending message";
}

}else{
    header("Location: send_message.php");
    exit;
}