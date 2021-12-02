<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php
session_start();
include_once('connect/connect.php');
if(isset($_SESSION['mail'])){
    $blog_id=$_GET['id'];
    $sql="DELETE FROM blog WHERE blog_id=$blog_id";
    mysqli_query($conn, $sql);
    header('location: index.php?page_layout=blog');
}
else{
    die("Ban khong co quyen");
}
?>

