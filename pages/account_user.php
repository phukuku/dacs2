
<?php 
include_once('connect/connect.php');
// $mail=$_SESSION['mail'];

// $sql="SELECT*FROM user WHERE user_mail='$mail'";
// $query=mysqli_query($conn, $sql);
// $row=mysqli_fetch_array($query);

if(isset($_POST['sbm1'])){
        $user_full=$_POST['user_full'];
        $user_pass=$_POST['user_pass'];
        $user_phone=$_POST['user_phone'];

        if($_FILES['user_image']['name']==""){
            $user_image = $row['user_image'];
        }else{
            $user_image = $_FILES['user_image']['name'];
            $image_tmp=$_FILES['user_image']['tmp_name'];
            move_uploaded_file($image_tmp,'img/'.$user_image);
        }
      
        $sql="UPDATE user SET user_full='$user_full',user_pass='$user_pass',user_image='$user_image',user_phone='$user_phone' WHERE user_mail='$mail'";
        $query=mysqli_query($conn, $sql);
        header('location: index.php?page_layout=account_user');
       
    }
?>


 <section class="intro-single">
    <div class="container">
      <div class="row" style="margin-top:-30px">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Tài khoản: <?php echo $row['user_full'];?></h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="?page_layout=trangchu">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
              Thông tin tài khoản
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <!--/ Intro Single star /-->

<div class="container">

    <form method="POST" enctype="multipart/form-data">
         <div class="form-row">

         <div class="form-group col-md-12">
             <label>Họ & Tên</label>             
             <input type="text" name="user_full" required class="form-control" value="<?php echo $row['user_full'];?>">
         </div>

         <div class="form-group col-md-12">
            <label>Email</label>
            <input type="text" value="<?php echo $row['user_mail'];?>" class="form-control" disabled>
         </div>
         
         <div class="form-group col-md-12">
            <label>Số điện thoại</label>
            <input type="text" name="user_phone" value="<?php echo $row['user_phone'];?>" class="form-control">
         </div>

         <div class="form-group col-md-12">
            <label>Ảnh đại diện</label><br>
            <input type="file" name="user_image"> <br><br>
             <img height="70px" width="70px" style="border-radius:50%" src="img/<?php echo $row['user_image']; ?>">
         </div>

         <div class="form-group col-md-12">
            <label>Mật khẩu</label>
            <input type="text" name="user_pass" required  class="form-control">
          </div>

          <div class="form-group col-md-12">
             <label>Nhập lại mật khẩu</label>
             <input type="text" name="user_re_pass" required  class="form-control">
          </div>

         <div class="tile-footer">
            <button class="btn btn-primary" name="sbm1" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
            <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
         </div>

            </div>
      </form>     
</div>
  <!--/ Intro Single End /-->
     

