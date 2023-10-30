
<?php
require('./../../connection.php');
// RESET REQUEST SUBMIT
 
$type = $_POST['type'];
if($type=="verify_otp"){
    $useremail = $conn->real_escape_string(strip_tags($_POST['email'])); //mail of user
    $otp = $conn->real_escape_string(strip_tags($_POST['otp'])); //mail of user
    $query = "SELECT * FROM user_otp WHERE user_email = '$useremail' AND otp = '$otp'";
    $query_res = mysqli_query($conn, $query);
    if(mysqli_num_rows($query_res)>0){
        $query2 = "UPDATE user_otp SET status=1 WHERE user_email = '$useremail' AND otp = '$otp'";
        mysqli_query($conn, $query2);
        $data=array("success" => 1);
    }
    else{
        $data=array("success" => 0);
    }
}

else if($type=="set_new_pass"){
    // $email = $_GET['mail'];
    $pwd = $conn->real_escape_string(strip_tags($_POST['pass']));
    $pwd_repeat = $conn->real_escape_string(strip_tags($_POST['cpass']));
    $email = $conn->real_escape_string(strip_tags($_POST['mail']));
    if($pwd == $pwd_repeat){

        $hash_pwd = md5($pwd);
        $query = "UPDATE `users` SET `password` = '$hash_pwd' WHERE `users`.`email` = '$email';";
        mysqli_query($conn, $query);
        $data=array("success" => 1);
        
    }
    else{
        $data=array("success" => 0);
    }
}

else if($type=="forget_password"){
    $email =$_POST['email'];
    $otp = rand(111111, 999999);
    $check = "SELECT * FROM users WHERE email = '$email'";
    $check_res = mysqli_query($conn, $check);
    if(!mysqli_num_rows($check_res)){
        $data=array("success" => 2);
        }
    else{
        $sql = "DELETE FROM user_otp WHERE user_email=?;";
        $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        $data=array("success" => 0);
        }
    else{
        mysqli_stmt_bind_param($stmt, "s",$email);
        mysqli_stmt_execute($stmt);
        }
        $sql = "INSERT INTO user_otp(user_email, otp, status) VALUES('$email', '$otp', '0')";
        mysqli_query($conn, $sql);

        session_start();
        $_SESSION["user_email"] = $email;

        include('./sendEmail.php');

        $to = $email;

        $subject = "Reset Your password.";

        $body = '<p>We received a password reset request. The otp to reset your password is below if you did not made this request, you can ignore this email</p>';
        $body .= '<p>Here is the password reset OTP: </p>';
        $body .= '<p>'.$otp.'</p>';

        sendEmail($to,$subject,$body);
        $data=array("success" => 1);
        }
}

echo json_encode($data);




?>
