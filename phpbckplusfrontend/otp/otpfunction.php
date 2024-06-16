<?php
include "../cors.php";
include '../dbconnection.php';
session_name('validseller');
session_start();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sendotp()
{
    echo "<script>alert('sendotp function called')</script>";
    global $conn;

    $otp = rand(100000, 999999);
    $_SESSION['otpcode'] = $otp;

    $recipientEmail = $_SESSION['signupemail'];
    $recipientName = $_SESSION['signupname'];

    $url = 'https://api.elasticemail.com/v2/email/send';

    try {
        echo "<script>alert('try block')</script>";

        $post = array(
            'from' => 'niranjandahal76@gmail.com',
            'fromName' => 'Ecommerce application',
            'apikey' => 'E9257D9B087596C2740C61B717789D7E58893C678465729719C4AB9ECDCFD9984655FD3B4E976B3C9072D3DAED50D185',
            'subject' => 'OTP VERIFICATION',
            'to' => "$recipientEmail",
            'bodyHtml' => "<h2> Hello, $recipientName Your OTP code is : $otp </h2>",
            'bodyText' => 'from the team wastemanagement',
            'isTransactional' => true
        );
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $_SESSION['sentotp'] = 'true';
        echo "<script>alert('An otp code was sent check spam folder $recipientEmail')</script>";
        // echo '<script>window.location.href="verifyotp.php"</script>';

        exit();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function verifyotp()
{
    $otpemail = $_SESSION['signupemail'];


    global $conn;
    $enteredOTP = mysqli_real_escape_string($conn, $_POST['otp']);
    $otpcode = $_SESSION['otpcode'];
    if ($enteredOTP == $otpcode) {
        echo '<script>alert("OTP verified successfully")</script>';
        // echo '<script>window.location.href="../sellers/sellersignup.php"</script>';

        exit();
    } else {
        echo "<script>alert('Wrong otp code $otpcode check spam folder for $otpemail')</script>";
        // echo '<script>window.location.href="verifyotp.php"</script>';
    }
}
