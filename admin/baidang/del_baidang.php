
<?php
session_start();
include_once('connect/connect.php');
if(isset($_SESSION['mail'])){
    $id_table=$_GET['id'];
    $sql="DELETE FROM imformation WHERE id_table=$id_table";
    mysqli_query($conn, $sql);
    header('location: index.php?page_layout=baidang');
}
else{
    die("Ban khong co quyen");
}
?>

