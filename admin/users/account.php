
        <?php 
        include_once('connect/connect.php');
        if(isset($_POST['sbm'])){

        $user_full=$_POST['user_full'];
        $user_pass=$_POST['user_pass'];
        if($_FILES['user_image']['name']==""){
            $user_image = $row['user_image'];
        }else{
            $user_image = $_FILES['user_image']['name'];
            $image_tmp=$_FILES['user_image']['tmp_name'];
            move_uploaded_file($image_tmp,'img/'.$user_image);
        }
        

        $sql="UPDATE user SET user_full='$user_full',user_pass='$user_pass',user_image='$user_image' WHERE user_mail='$mail'";
        $query=mysqli_query($conn, $sql);
        header("location: index.php?page_layout=account");
                    
            }
        ?>


       <main class="app-content">
      <div class="app-title">
      
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Quản lý tài khoản</li>
          <li class="breadcrumb-item"><a href="#">Thông tin</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">ADMIN WEB: <?php echo $row['user_full'];?></h3>
            <div class="tile-body">
               <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ & Tên</label>             
                    <input type="text" name="user_full" required class="form-control" value="<?php echo $row['user_full'];?>">
                </div>

                <div class="form-group">
                  <label>Email</label>
                 <input type="text" name="user_mail" required value="<?php echo $row['user_mail'];?>" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label><br>
                    <input type="file" name="user_image"> <br><br>
                     <img height="70px" width="70px" style="border-radius:50%" src="img/<?php echo $row['user_image']; ?>">
                 </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                   <input type="text" name="user_pass" required  class="form-control">

                </div>

                <div class="form-group">
                     <label>Nhập lại mật khẩu</label>
                    <input type="text" name="user_re_pass" required  class="form-control">
                  </div>

                </div>
        

            <div class="tile-footer">
              <button class="btn btn-primary" name="sbm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
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
