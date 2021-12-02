
<?php
ob_start();
include_once("connect/connect.php");
define('hang', true);
session_start();
if(isset($_SESSION['mail'])){
    $mail = $_SESSION['mail'];
  
    $sql = "SELECT*FROM user WHERE user_mail='$mail'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row['user_level'] == 1) {
        define("admin", true);
        include_once('admin/admin.php');
    
    } else {
        define("user", true);
        include_once('pages/index.php');
    }
}
else{
    include_once('pages/index.php');
}
?>