<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$co = dirname(getcwd(), 2);
include './../../connection.php';
session_start();
  
$type = $_POST['type'];

if ($type == "schedule_availibility") {
    $user_id=$_POST['user_id'];
    $date=$_POST['date'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    // $data=["user_id"=>$user_id,"date"=>$date,"st"=>$start_time,"et"=>$end_time];
  if (!empty($date) && !empty($start_time) && !empty($end_time) && !empty($user_id))
  {
    $check_sql="SELECT * FROM `advisor_schedule` WHERE schedule_date='$date' AND user_id='$user_id' AND (start_time <= '$start_time' AND start_time <= '$end_time' AND end_time >= '$start_time' AND end_time >= '$end_time' OR (start_time BETWEEN '$start_time' AND '$end_time' OR end_time BETWEEN '$start_time' AND '$end_time')) AND status!='cancelled'";
    $check_result=$conn->query($check_sql);
    if($check_result)
    {
      $row=$check_result->rowCount();
      if($row>0)
        $data = array("success" => 3);
      else
      {
        $sql="INSERT INTO `advisor_schedule`(`user_id`, `schedule_date`, `start_time`, `end_time`) VALUES ('$user_id','$date','$start_time','$end_time')";
        $result = $conn->query($sql);
        if($result){
          // $count=$result->rowCount();

          $data = array("success" => 1);

          }
        else{
          $data = array("success" => 0);
          }
        }
      }
      else{
        $data = array("success" => 0);
      }
    }
  else{
    $data = array("success" => 2);
  }
}
else if ($type == "register") {
    $name=$_POST['name'];
    $university=$_POST['cname'];
    $email=$_POST['mail'];
    $mobile=$_POST['mobile'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $user_role=$_POST['user_role'];
    $date=date("Y-m-d H:i:s");
    if($pass==$cpass){
      $npass=md5($pass);
      if(!empty($name) && !empty($university) && !empty($email) && !empty($mobile)){
        $checkemail="SELECT count(*) FROM `users` WHERE email='$email' AND status='1'";
        // $result=$checkemail->execute(array($email));
        // $result1=$result->fetchALL();
        $result1 = $conn->query($checkemail);
        if($result1->rowCount()<1){
            $data= array("success" => 3);
        }
        else{
          $insertsql=$conn->prepare("INSERT INTO `users`(`name`, `email`, `mobile`, `university_name`, `user_role`, `password`) VALUES (?,?,?,?,?,?)");
          if($insertsql->execute(array($name,$email,$mobile,$university,$user_role,$npass)))
          {
              $data= array("success" => 1);
          }
          else{
            $data= array("success" => 0);
          }
        }
      }
      else
        $data = array("success" => 2);
    }
    else
      $data = array("success" => 4);
}
else if ($type == "login") {
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
      if(!empty($email) && !empty($pass)){
        $npass=md5($pass);
        $sql="SELECT * FROM `users` Where email='$email' AND password='$npass' AND status='1'";
        $result=$conn->query($sql);
        if($result){
          if($result->rowCount()>0)
          {
          $row=$result->fetchALL();
          $_SESSION['id'] = $row[0]['id'];
          $data= array("success" => 1);
        }
        else
        {
          $data= array("success" => 0);
        }
        }
        else{
          $data= array("success" => 0);
        }
      }
    else
      $data = array("success" => 2);
}
else if ($type == "fetch_advisor_schedule") {
  $sql="SELECT * FROM `advisor_schedule` WHERE user_id=".$_SESSION['id'];
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['schedule_date'],$row['start_time'],$row['end_time'],$row['status'],$row['schedule_id']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }

}
else if ($type == "available_appointment") {
  $sql="SELECT a.*,u.name FROM `advisor_schedule` AS a INNER join `users` AS u ON u.id=a.user_id WHERE a.status='available'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['schedule_date'],$row['start_time'],$row['end_time'],$row['name'],$row['schedule_id']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
else if ($type == "book_appointment") {
  $schedule_id=$_POST['schedule_id'];
  $user_id=$_POST['user_id'];
  $status=$_POST['status'];
  $sql="INSERT INTO `appointment`(`user_id`, `schedule_id`, `status`) VALUES ('$user_id','$schedule_id','$status')";
  $result=$conn->query($sql);
  if($result)
  {
    $sql1="UPDATE `advisor_schedule` SET `status`='booked' WHERE schedule_id='$schedule_id'";
    $result1=$conn->query($sql1);
    if($result1){
      $data= array("success" => 1);
    }
    else{
      $data= array("success" => 2);
    }
  }
  else{
    $data=array("success" => 2);
  }
}
else if ($type == "appointment_history") {
  $user_id=$_POST['user_id'];
  $sql="SELECT ap.status,u.name as advisor_name,ads.schedule_date,ads.start_time,ads.end_time FROM `advisor_schedule` AS ads INNER join `users` AS u ON u.id=ads.user_id INNER JOIN `appointment` as ap ON ap.schedule_id=ads.schedule_id WHERE ap.user_id='$user_id'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['schedule_date'],$row['start_time'],$row['end_time'],$row['advisor_name'],$row['status']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
else if ($type == "manage_appointment") {
  $user_id=$_POST['user_id'];
  $sql="SELECT ap.*,u.name,ads.schedule_date,ads.schedule_id,ads.start_time,ads.end_time FROM `appointment` AS ap INNER join `users` AS u ON u.id=ap.user_id INNER JOIN advisor_schedule as ads ON ads.schedule_id=ap.schedule_id WHERE ads.user_id='$user_id'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['schedule_date'],$row['start_time'],$row['end_time'],$row['name'],$row['status'],$row['id'],$row['schedule_id']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
elseif ($type == "updateprofile") {
    $name = $_POST['name'];
    $university = $_POST['university'];
    $mobile=$_POST['mobile'];
    $uid=$_SESSION['id'];
    $sql="UPDATE `users` SET `name`='$name',`mobile`='$mobile',`university_name`='$university' WHERE id='$uid'";
    $result=$conn->query($sql);
    if($result)
      $data= array("success" => 1);
    else
      $data= array("success" => 0);
}
elseif ($type == "changepass") {
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $uid=$_SESSION['id'];
    if ($pass==$cpass)
    {
      $npass=md5($pass);
      $sql="UPDATE `users` SET `password`='$npass' WHERE id='$uid'";
      if($conn->query($sql))
        $data= array("success" => 1);
      else
        $data= array("success" => 0);
    }
    else{
      $data= array("success" => 2); 
    }
}
else if ($type == "delete_schedule") {
    $sid=$_POST['sid'];
    $sql ="UPDATE `advisor_schedule` SET `status`='cancelled' WHERE schedule_id='$sid'";
    $result=$conn->query($sql);
    if($result)
    {
      $sql1="UPDATE `appointment` SET `status`='cancelled' WHERE schedule_id='$sid'";
      $result1=$conn->query($sql1);
      if($result1)
      {
        $data= array("success" => 1);
      }
      else{
        $data= array("success" => 0);
      }
        }
        else{
          $data= array("success" => 0);
        } 
}
else if ($type == "Mark_appointment_done") {
  $schedule_id=$_POST['schedule_id'];
  $app_id=$_POST['app_id'];
  $user_id=$_POST['user_id'];
  $status=$_POST['status'];
  $sql="UPDATE `appointment` SET `status`='done' WHERE id='$app_id'";
  $result=$conn->query($sql);
  if($result)
  {
    $sql1="UPDATE `advisor_schedule` SET `status`='expired' WHERE schedule_id='$schedule_id'";
    $result1=$conn->query($sql1);
    if($result1){
      $data= array("success" => 1);
    }
    else{
      $data= array("success" => 0);
    }
  }
  else{
    $data=array("success" => 0);
  }
}
else if ($type == "Cancel_Appointment") {
  $schedule_id=$_POST['schedule_id'];
  $app_id=$_POST['app_id'];
  $user_id=$_POST['user_id'];
  $status=$_POST['status'];
  $sql="UPDATE `appointment` SET `status`='cancelled' WHERE id='$app_id'";
  $result=$conn->query($sql);
  if($result)
  {
    $sql1="UPDATE `advisor_schedule` SET `status`='available' WHERE schedule_id='$schedule_id'";
    $result1=$conn->query($sql1);
    if($result1){
      $data= array("success" => 1);
    }
    else{
      $data= array("success" => 0);
    }
  }
  else{
    $data=array("success" => 0);
  }
}
else if ($type == "fetch_students") {
  $sql="SELECT * FROM `users` WHERE user_role='3' AND status='1'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['name'],$row['email'],$row['mobile'],$row['id']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
else if ($type == "fetch_advisors") {
  $sql="SELECT * FROM `users` WHERE user_role='2' AND status='1'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['name'],$row['email'],$row['mobile'],$row['id']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
else if ($type == "delete_user") {
  $user_id=$_POST['user_id'];
  $sql="UPDATE `users` SET `status`='0' WHERE id='$user_id'";
  $result=$conn->query($sql);
  if($result)
  {
    $sql1="UPDATE `appointment` SET `status`='cancelled' WHERE user_id='$user_id' AND status='upcoming'";
    $result1=$conn->query($sql1);
    if($result1){
      $data= array("success" => 1);
    }
    else{
      $data= array("success" => 0);
    }
  }
  else{
    $data=array("success" => 0);
  }
}
else if ($type == "delete_advisor") {
  $user_id=$_POST['user_id'];
  $sql="UPDATE `users` SET `status`='0' WHERE id='$user_id'";
  $result=$conn->query($sql);
  if($result)
  {
    $sql1="UPDATE `appointment` SET `status`='cancelled' WHERE user_id='$user_id' AND status='upcoming'";
    $result1=$conn->query($sql1);
    if($result1){
      $sql2="UPDATE `advisor_schedule`SET `status`='expired' WHERE user_id='$user_id'";
      $result2=$conn->query($sql2);
      if($result2)
      {
        $data= array("success" => 1);
      }
      else
      $data= array("success" => 0);
    }
    else{
      $data= array("success" => 0);
    }
  }
  else{
    $data=array("success" => 0);
  }
}
else if ($type == "appointment_report") {
  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $sql="SELECT ap.status as apstatus,ap.id,ads.*,(SELECT name FROM users WHERE id=ads.user_id) AS advisor_name,u.name FROM `appointment` AS ap INNER JOIN advisor_schedule AS ads ON ap.schedule_id=ads.schedule_id INNER JOIN users AS u ON ap.user_id=u.id WHERE ads.schedule_date BETWEEN '$from_date' AND '$to_date'";
  $result=$conn->query($sql);
  if($result)
  {
   $rows = $result->fetchAll();
    $i=1;
    foreach($rows as $row) {
      $data['data'][] = array($i,$row['schedule_date'],$row['start_time'],$row['end_time'],$row['name'],$row['advisor_name'],$row['apstatus']);
      $i=$i+1;
    }
  }
  else{
    $data['data'][]=[];
  }
}
  echo json_encode($data);
?>