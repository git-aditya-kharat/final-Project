<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include './../../connection.php';
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['token']) && !empty($_POST['token']))
    {
        $token=$_POST['token'];
        $sql="INSERT INTO `fcm_tokens`(`token`) VALUES ('$token') ON DUPLICATE KEY UPDATE `token`='$token'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $data="success";
        }else{
            $data="failure";
        }
    }
    else{
        $data="fcm_token required";
    }
}
else{
     header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
    exit;
}

echo json_encode($data);
exit;
?>