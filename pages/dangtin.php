<?php  
   include_once('connect/connect.php');

   if (defined("user")){ 
    if(isset($_POST['submit'])){
        $numberHouse=$_POST['numberHouse'];
        $imgage=$_FILES['image']['name'];
        $imgage_tmp=$_FILES['image']['tmp_name'];
        $price=$_POST['price'];
        $area=$_POST['area'];
        $description=$_POST['description'];
        $typeid=$_POST['typeId'];
        $quantityFloor=$_POST['quantityFloor'];
        $quantityBed=$_POST['quantityBed'];
        $quantityBath=$_POST['quantityBath'];
        $province=$_POST['province'];
        $district=$_POST['district'];
        $ward=$_POST['ward'];     
        $date=date("d-m-Y");


        // Dung lượng cho phép upload lên
        $maxsize = 104857600; // 100MB

        // Lưu vào thư mục trên máy tính
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file_video"]["name"];

        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

        if( in_array($videoFileType,$extensions_arr) ){

        // Điều kiện kiểm tra dung lượng file
        if(($_FILES['file_video']['size'] >= $maxsize) || ($_FILES["file_video"]["size"] == 0)) {
          $error = '<div class="alert alert-danger" style="color:red">File quá lớn, Vui lòng bỏ file nhỏ thôi !</div>';
        }else{
        // Tiếp hành Upload
        if(move_uploaded_file($_FILES['file_video']['tmp_name'],$target_file)){

        $sql="INSERT INTO imformation(numberHouse,image,video,price,area,description,typeId,
        quantityFloor,quantityBed,quantityBath,province_id,district_id,ward_id,user_id,created_at) 
        VALUE('$numberHouse','$imgage','$target_file','$price','$area','$description','$typeid',
        '$quantityFloor','$quantityBed','$quantityBath','$province','$district','$ward','$user_id','$date')";//$user_id lấy từ index.php
        move_uploaded_file($imgage_tmp,'img/'.$imgage);
        $query=mysqli_query($conn,$sql);
        header("Location: index.php?page_layout=quanli_tin");
        //$success = '<div class="alert alert-success" style="color:red">Bạn đã đăng bài viết thành công !</div>';
        }
        }
        }else{
         $error = '<div class="alert alert-danger" style="color:red">Lỗi định dạng file !</div>';
        }


        
      }

    }else{
         // echo'<script> alert("Bạn phải đăng nhập");</script>';    
         $error = '<div class="alert alert-danger" style="color:red">Bạn phải đăng nhập trước khi đăng tin !</div>';
    }
?>


  <!--/ Intro Single star /-->
 <section class="intro-single">
    <div class="container">
      <div class="row" style="margin-top:-30px">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Đăng tin mới</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="trangchu.html">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
               Đăng tin
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <!--/ Intro Single star /-->

<div class="container">
     <?php if (isset($error)) {
                        echo $error;
                    }; ?>

     <?php if (isset($success)) {
                        echo $success;
                    }; ?>

            <form method="POST" enctype="multipart/form-data">
               <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="">Tỉnh/Thành phố</label>
                       <select class="form-control" onchange="getDistrictList(this.value)"
                        name="province" id="province" required>
                            <option value="0">Tỉnh/Thành phố</option>  

                       </select>
               </div>

              <div class="form-group col-md-4">
                  <label for="">Quận/huyện</label>
                      <select class="form-control" onchange="getWardList(this.value)" 
                        name="district" id="district" required> 
                          <option value="0">Quận/huyện</option>
                      </select>
                </div>
          
                 <div class="form-group col-md-4">
                     <label for="">Phường/Xã</label>
                      <select class="form-control" name="ward" id="ward" required>
                      <option value="" selected="">Phường/Xã</option>
                      
               </select>
                 </div>

                <div class="form-group col-md-12">
                    <label for="text">Số nhà - Đường</label>
                    <input type="text" name="numberHouse" class="form-control" placeholder="Số nhà - Đường" required
                    value='<?php if(isset($_POST['numberHouse']) && $_POST['numberHouse'] != NULL){ echo $_POST['numberHouse']; } ?>'>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label for="">Nhu cầu</label>
                        <select class="form-control" name="typeId" required="">
                            <?php 
                               $sql_type="SELECT * FROM type";  
                                $kt_type=mysqli_query($conn,$sql_type);
                                while($row_type= mysqli_fetch_assoc($kt_type)){ ?>
        <option value="<?php echo $row_type['typeId'];?>"><?php echo $row_type['sell_rent'];?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                  
                
                <div class="form-group col-md-6">
                    <label for="file">Ảnh tổng quan ngôi nhà</label><br>
                    <input type="file" name="image" required multiple>
                </div>

                 <div class="form-group col-md-6">
                    <label for="file">Video</label><br>
                   <input type='file' name='file_video' >
                </div>
        
                 <div class="form-group col-md-4">
                    <label for="">Số tầng</label>
                    <input type="number" name="quantityFloor" class="form-control" min="1" required=""
                     value='<?php if($_POST['quantityFloor'] != NULL){ echo $_POST['quantityFloor']; } ?>'>
                </div>
                 <div class="form-group col-md-4">
                    <label for="">Phòng ngủ</label>
                    <input type="number" name="quantityBed" class="form-control" min="1" required=""
                     value='<?php if($_POST['quantityBed'] != NULL){ echo $_POST['quantityBed']; } ?>'>
                </div>
                 <div class="form-group col-md-4">
                    <label for="">Phòng tắm</label>
                    <input type="number" name="quantityBath" class="form-control" min="1" required=""
                     value='<?php if($_POST['quantityBath'] != NULL){ echo $_POST['quantityBath']; } ?>'>
                </div>
     
                <div class="form-group col-md-6">
                    <label for="">Diện tích (m <sup>2</sup>)</label>
                    <input type="number" name="area" class="form-control" min="1" required=""
                     value='<?php if($_POST['area'] != NULL){ echo $_POST['area']; } ?>'>
                </div>
    
                <div class="form-group col-md-6">
                  <label for="number">Giá Khoảng</label>
                  <input type="text" name="price"class="form-control" placeholder="Giá khoảng" required
                   value='<?php if(isset($_POST['description']) && $_POST['price'] != NULL){ echo $_POST['price']; } ?>'>
                </div>

                <div class="form-group col-md-12">
                    <label for="">Thông tin tổng quát(ghi rõ cách liên lạc)</label>
            <textarea type="text-area"rows="3" name="description" class="form-control" placeholder="Thông tin chi tiết về nhà" required="">
<?php if(isset($_POST['description']) && $_POST['description'] != NULL){ echo $_POST['description']; } ?></textarea>
                </div>          
                
        <div class="tile-footer" >
            <button class="btn btn-primary" name="submit" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Đăng tin</button>
            <button class="btn btn-primary" type="reset" onclick="submit()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
         </div>

                <div class="form-group col-md-12" style="color:red">Lưu ý: Đăng thông tin đúng sự thật nếu không sẽ bị xóa bài</div>
              
            </div>
      </form>     
</div>
  <!--/ Intro Single End /-->
