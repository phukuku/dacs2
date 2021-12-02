<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php
session_start();
include_once('connect/connect.php');
if(isset($_SESSION['mail'])){
    $contact_id=$_GET['id'];
    $sql="DELETE FROM contact WHERE id=$contact_id";
    mysqli_query($conn, $sql);
    header('location: index.php?page_layout=contact');
}
else{
    die("Ban khong co quyen");
}
?>

