<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');

    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $image=$_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $sologan=$_POST['sologan'];
        $description=$_POST['description'];
        $date=date("Y-m-d");
         //$date=date("Y-m-d H:i:s"); ngày giờ

        $sql="INSERT INTO blog(title,sologan,image,description,created_at) 
        VALUE('$title','$sologan','$image','$description','$date')";
        $query=mysqli_query($conn,$sql);
        move_uploaded_file($image_tmp,'img/'.$image);
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
  
<style >
    img{
        width: 30%;
        height: 30%;
        margin: 4px;
    }
</style>
 </head>
<body class="app sidebar-mini">
    <main class="app-content">
            
     <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Danh sách Blog</li>
          <li class="breadcrumb-item "><a href="#">Thêm blog mới</a></li>
        </ul>
      </div>

   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm blog mới</h1>
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
                        <input type="text" name="title" class="form-control" required="">
                    </div>

                     <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="sologan" class="form-control" required="">
                    </div>
                     <div class="form-group">
                            <label for="file">Ảnh blog</label><br>
                            <input type="file" name="image" id="upload" onchange="showImages()" />
                            <div id="displayImg">
                    </div>     


                     <div class="form-group">
                        <label for="">Viết bài</label>
                        <textarea type="text-area"rows="5" name="description" class="form-control" required=""></textarea>
                    </div>     
                    
        <div class="tile-footer">
            <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm blog mới</button>
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