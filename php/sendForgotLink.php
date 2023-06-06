<?php
// get the email input from the form
//$email = isset($_POST['email']) ? $_POST['email'] : '';
if($_POST['email']==""){
    echo 'nothing';
    exit();
}
$email=$_POST['email'];
// establish database connection
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "se";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if the email exists in the fans table
$sql_fans = "SELECT * FROM fans WHERE email='$email'";
$result_fans = mysqli_query($conn, $sql_fans);

// check if the email exists in the managers table
$sql_managers = "SELECT * FROM manager WHERE email='$email'";
$result_managers = mysqli_query($conn, $sql_managers);

if (mysqli_num_rows($result_fans) > 0 || mysqli_num_rows($result_managers) > 0) {

    //***********NEED SETUP FOR SMTP************* 


    // email exists in either table, send the password reset link
    // generate a unique token for the password reset link
    // $token = md5(uniqid(rand(), true));

    // send the password reset link to the user's email
    // $to = $email;
    // $subject = "Password reset link for your account";
    // $message = "Click the following link to reset your password: http://realmadrid.com/reset_password.php?token=$token";
    // $headers = "From: webmaster@realmadrid.com" . "\r\n" .
    //            "Reply-To: webmaster@realmadrid.com" . "\r\n" .
    //            "X-Mailer: PHP/" . phpversion();

    // mail($to, $subject, $message, $headers);

    echo "sent";

} else {
    echo "no-email";
}
mysqli_close($conn);
?>
