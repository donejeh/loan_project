<?php 
$conn= new mysqli('localhost','root','','loan')or die("Could not connect to mysql".mysqli_error($con));

function sendPhpMail($receiver_email, $receiver_name, $subject, $message)
{
    
    $headers  = "From: testsite <mail@loan.test>\n";
    $headers .= "Cc: testsite <mail@loan.test>\n"; 
    $headers .= "X-Sender: testsite <mail@loan.test>\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: mail@loan.test\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
   

    @mail($receiver_email, $subject, $message, $headers);
}
if (isset($_SESSION['login_id']) && $_SESSION['login_type']==3) {
	$id =$_SESSION['login_id'];
	$qry = mysqli_query($conn,"SELECT * FROM  borrowers where user_id='$id' ");
	$row = mysqli_fetch_array($qry);
	$_SESSION['kyc_status'] = $row['kyc_status'];
    $_SESSION['kyc_front'] = $row['kyc_front'];
    $_SESSION['kyc_back'] = $row['kyc_back'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
 
    foreach ($row  as $key => $value) {
        $_SESSION['b_'.$key] = $value;
    }

}
