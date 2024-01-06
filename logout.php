<?php
// Start the session
session_start();
include('includes/config.php');
include('includes/connect.php');

//Data from session 
$session_username = $_SESSION['username'];
$session_email = $_SESSION['email'];
$session_password = $_SESSION['password'];
$end_date = date("d-m-y");
$end_time = date("H:i");
if (isset($_SESSION['user_id'])) {
  $session_encrypid_u = md5($_SESSION['user_id']);
  //Getting user session default id
  $select_id = "SELECT * FROM `login_sessions` WHERE `session_id` = '$session_encrypid_u'";
  $result_id = $conn->query($select_id);
  if ($result_id->num_rows > 0) {
      // output data of each row
      while($row = $result_id->fetch_assoc()) {
        $user_id = $row['id'];
        //Updating the table
        $session_update = "UPDATE `login_sessions` 
          SET `session_id`= 'NA',`session_enddate`='$end_date',`session_endtime`='$end_time',`login_status`='NA' 
          WHERE `id` = '$user_id'";  
          if ($conn->query($session_update) === TRUE) {                   
              $_SESSION = array();
              session_destroy();
              header("Location: login.php");
            }
      }
    }
}
elseif (isset($_SESSION['admin_id'])) {
  $session_encrypid_a = md5($_SESSION['admin_id']);
  //Getting user session default id
  $select_id = "SELECT * FROM `login_sessions` WHERE `session_id` = '$session_encrypid_a'";
  $result_id = $conn->query($select_id);
  if ($result_id->num_rows > 0) {
      // output data of each row
      while($row = $result_id->fetch_assoc()) {
        $user_id = $row['id'];
        //Updating the table
        $session_update = "UPDATE `login_sessions` 
          SET `session_id`= 'NA',`session_enddate`='$end_date',`session_endtime`='$end_time',`login_status`='NA' 
          WHERE `id` = '$user_id'";  
          if ($conn->query($session_update) === TRUE) {                   
              $_SESSION = array();
              session_destroy();
              header("Location: admin_login.php");
            }
      }
    } 
}
else {}
?>
