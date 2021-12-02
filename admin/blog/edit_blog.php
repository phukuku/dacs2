<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');

  $id=$_GET['id'];
    $sql_up="SELECT * FROM blog WHERE blog_id=$id";
    $kt_up=mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($kt_up);

    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $sologan=$_POST['sologan'];

 if($_FILES['image']['name']==""){
            $image = $row_up['image'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp=$_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,'img/'.$image);
        }
        $description=$_POST['description'];
         $date=date("Y-m-d");
        $sql="UPDATE blog SET title='$title',sologan='$sologan',image='$image',description='$description',created_at='$date' WHERE blog_id='$id'";
        $query1=mysqli_query($conn,$sql);
        header('location: index.php?page_layout=blog');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bất Động Sản</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
    <main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="index.php?page_layout=blog">Quản lý blog</a></li>
          <li class="breadcrumb-item ">Chỉnh sửa blog</li>
        </ul>
      </div>
   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa blog</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">            
                <form role="form" method="post" enctype="multipart/form-data">                           
                                                                 
                    <div class="form-group">
                        <label for="">Chủ đề</label>
                        <input  name="title" class="form-control" required value="<?php echo $row_up['title'] ?>">
                    </div>
                             
                    <div class="form-group">
                            <label for="">Tiêu đề</label>
                             <input name="sologan" class="form-control" required value="<?php echo $row_up['sologan'] ?>">
                    </div>

                    <div class="form-group">
                           <label for="file">Ảnh blog</label><br>
                           <input type="file" name="image"> <br>
                              <br>
                            <div>
                                <img src="img/<?php echo $row_up['image'];?>" width="30%" height="30%">
                            </div>
                    </div>                         

                   <div class="form-group">
                       <label for="">Bài viết</label>
            <textarea rows="5" name="description" class="form-control" required ><?php echo $row_up['description']?> </textarea>
                   </div>
                
            <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
            <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                  
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