<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');
if(isset($_POST['sbm'])){
    $user_full=$_POST['user_full'];
    $user_mail=$_POST['user_mail'];
    $user_pass=$_POST['user_pass'];
    $user_re_pass=$_POST['user_re_pass'];
    $user_level=$_POST['user_level'];
    $date=date("d-m-Y");
    //pass
    if ($user_pass == $user_re_pass) {
        $user_pass = $_POST["user_pass"];
    } else {
        $error_pass = '<div class="alert alert-danger">Mat khau khong khop, hay thu mat khau khac</div>';
    }

        if (mysqli_num_rows(mysqli_query($conn, "SELECT*FROM user WHERE user_mail = '$user_mail'")) == 0) {
            if ($user_pass == $user_re_pass) {
                $user_mail = $_POST["user_mail"];
                echo $sql_user = "INSERT INTO user( user_full, user_mail, user_pass, user_level,user_image,created_at) value( '$user_full', '$user_mail', '$user_pass', '$user_level','images.png','$date' )";
                mysqli_query($conn, $sql_user);
                header("location: index.php?page_layout=user");
            }
        } else {
            $error = '<div class="alert alert-danger">Đã tồn tại email ' . $user_mail . ', hãy thử email khác</div>';
        }
    //  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>ADD user</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/main.css">
   
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">

       <main class="app-content">
      <div class="app-title">
      
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Quản lý thành viên</li>
          <li class="breadcrumb-item"><a href="#">Thêm thành viên</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Thêm thành viên</h3>
            <div class="tile-body">
                   <form role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ & Tên</label>             
                    <input name="user_full" required class="form-control" placeholder="">
                </div>

                <div class="form-group">
                  <label>Email</label>
                 <?php if (isset($error)) {
                                    echo $error;
                                } ?>
                   <input name="user_mail" required type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                   <?php
                                if (isset($error_pass)) {
                                    echo $error_pass;
                                }
                                ?>
                    <input name="user_pass" required type="text" class="form-control">
                </div>

                <div class="form-group">
                     <label>Nhập lại mật khẩu</label>
                     <input name="user_re_pass" required type="text" class="form-control">
                  </div>

                </div>
        
                <div class="form-group">
                   <label>Quyền</label>
                      <select name="user_level" class="form-control">
                         <option value=1>Admin</option>
                         <option value=2>Member</option>
                     </select>
                </div>

            <div class="tile-footer">
               <button class="btn btn-primary" name="sbm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
               <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
            </div>
            </form>
          </div>
        </div>
 
 </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


  </body>
</html>