<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');

  $id=$_GET['id'];
   $sql_province="SELECT * FROM province";
   $kt_province=mysqli_query($conn,$sql_province);
$row_province= mysqli_fetch_assoc($kt_province);

    $sql_up="SELECT * FROM imformation WHERE id_table=$id";
    $kt_up=mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($kt_up);

    if(isset($_POST['submit'])){
        $province=$_POST['province'];
        $district=$_POST['district'];
        $ward=$_POST['ward'];
        $numberHouse=$_POST['numberHouse'];
        if($_FILES['image']['name']==""){
            $imgage = $row_up['image'];
        }else{
            $imgage = $_FILES['image']['name'];
            $imgage_tmp=$_FILES['image']['tmp_name'];
            move_uploaded_file($imgage_tmp,'img/'.$imgage);
        }
        $quantityFloor=$_POST['quantityFloor'];
        $quantityBed=$_POST['quantityBed'];
        $quantityBath=$_POST['quantityBath'];
        $price=$_POST['price'];
        $area=$_POST['area'];
        $description=$_POST['description'];
        $type=$_POST['type'];
        $date=date("Y-m-d");
  
        $maxsize = 104857600; // 100MB
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file_video"]["name"];

        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

        if( in_array($videoFileType,$extensions_arr) ){

        // Điều kiện kiểm tra dung lượng file
        if(($_FILES['file_video']['size'] >= $maxsize) || ($_FILES["file_video"]["size"] == 0)) {
          $error = '<div class="alert alert-danger" style="color:red">File quá lớn, Vui lòng bỏ file nhỏ thôi !</div>';
        }else if(move_uploaded_file($_FILES['file_video']['tmp_name'],$target_file)){

        $sql="UPDATE imformation SET numberHouse='$numberHouse',province_id='$province',district_id='$district',
                     typeId='$type',ward_id='$ward',image='$imgage',video='$target_file',price='$price',area='$area',description='$description', 
                     quantityFloor= '$quantityFloor',quantityBed='$quantityBed',quantityBath='$quantityBath',created_at='$date'
                                      WHERE id_table='$id'";
        $query=mysqli_query($conn,$sql);
        //$success = '<div class="alert alert-success" style="color:red">Bạn đã cập nhật thành công !</div>';
        header('location: index.php?page_layout=baidang');
        //header("Refresh:0");
        }
    }
    else if($_FILES["file_video"]["name"] == ''){
       $sql="UPDATE imformation SET numberHouse='$numberHouse',province_id='$province',district_id='$district',
                     typeId='$type',ward_id='$ward',image='$imgage',price='$price',area='$area',description='$description', 
                     quantityFloor= '$quantityFloor',quantityBed='$quantityBed',quantityBath='$quantityBath',created_at='$date'
                                      WHERE id_table='$id'";
         $query=mysqli_query($conn,$sql);
         //$success = '<div class="alert alert-success" style="color:red">Bạn đã cập nhật thành công !</div>';
          header('location: index.php?page_layout=baidang');
         //header("Refresh:0");
    }
    else{
        $error = '<div class="alert alert-danger" style="color:red">Video ko hợp lệ. Vui lòng chọn video có đuôi mp4,avi,3gp,mov,mpeg !</div>';
    }


        
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Add baidang</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">

    <main class="app-content">

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Danh sách bài viết</li>
          <li class="breadcrumb-item "><a href="#">Chỉnh sửa bài viết</a></li>
        </ul>
      </div>
   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa bài viết</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
       <?php if (isset($error)) {
                echo $error;
            }; ?>
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">            
                <form role="form" method="post" enctype="multipart/form-data">

                <div class="row">
                   <div class="col-md-6">

                      <div class="form-group">  
                        <label for="">Tỉnh/Thành phố</label>
                          <select class="form-control" onchange="getDistrictList(this.value)"
                               name="province" id="province">
                              <option value="0">Tỉnh/Thành phố</option>
                                 <?php
                                  $sql_province="SELECT * FROM province";
                                  $kt_province=mysqli_query($conn,$sql_province);
                                  while($row_province= mysqli_fetch_assoc($kt_province)){ ?>
                  <option <?php if($row_up['province_id']==$row_province['province_id']){echo 'selected';}?> value=<?php echo $row_province['province_id'];?>><?php echo $row_province['provinceName'];?></option>
                            </option>
                                <?php }?>
                          </select>
                       </div>
                                               
                    <div class="form-group">
                        <label for="">Quận/huyện</label>
                            <select class="form-control" onchange="getWardList(this.value)" 
                                    name="district" id="district"> 
                              <option value="0">Quận/huyện</option>
                                <?php
                                 
                                  $sql_district="SELECT * FROM district";
                                  $kt_district=mysqli_query($conn,$sql_district);
                                  while($row_district= mysqli_fetch_assoc($kt_district)){ ?>
                  <option <?php if(($row_up['district_id']==$row_district['district_id'])){echo 'selected';}?> value=<?php echo $row_district['district_id'];?>><?php echo $row_district['districtName'];?></option>
                            </option>
                                <?php }?>
                            </select>
                    </div>

                    <div class="form-group">
                             <label for="">Phường/Xã</label>
                              <select class="form-control" name="ward" id="ward">
                                 <option value="" selected="">Phường/Xã</option> 
                               <?php
                                  $sql_ward="SELECT * FROM ward";
                                  $kt_ward=mysqli_query($conn,$sql_ward);
                                  while($row_ward= mysqli_fetch_assoc($kt_ward)){ ?>
            <option <?php if(($row_up['province_id']==$row_ward['province_id'])&&
                  ($row_up['district_id']==$row_ward['district_id'])&& ($row_up['ward_id']==$row_ward['ward_id']))
                  {echo 'selected';}?> value=<?php echo $row_ward['ward_id'];?>><?php echo $row_ward['wardName'];?></option>
                                <?php }?>       
                              </select>
                    </div>

                    <div class="form-group">
                        <label for="text">Số nhà - Đường</label>
                        <input type="text" name="numberHouse" class="form-control" required=""
                        value="<?php echo $row_up['numberHouse'] ?>">
                    </div>
                   
                      <div class="form-group">
                        <label for="">Nhu cầu</label>
                       <select name="type" class="form-control">
                            <?php
                              $sql_type="SELECT * FROM type";
                              $kt_type=mysqli_query($conn,$sql_type);
                              while($row_type= mysqli_fetch_assoc($kt_type)){ ?>
        
                          <option <?php if($row_up['typeId']==$row_type['typeId']){echo 'selected';}?> value=<?php echo $row_type['typeId'];?>><?php echo $row_type['sell_rent'];?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Diện tích (m<sup>2</sup>)</label>
                          <input type="number" name="area" class="form-control" min="1" required=""
                     value="<?php echo $row_up['area'] ?>">
                    </div>
           
                    <div class="row">
                             <div class="form-group col-md-4">
                                <label for="">Số tầng</label>
                              <input type="number" name="quantityFloor" class="form-control" min="1" required=""
                     value="<?php echo $row_up['quantityFloor'] ?>">
                            </div>

                             <div class="form-group col-md-4">
                                <label for="">Phòng ngủ</label>
                               <input type="number" name="quantityBed" class="form-control" min="1" required=""
                     value="<?php echo $row_up['quantityBed'] ?>">
                            </div>


                             <div class="form-group col-md-4">
                                <label for="">Phòng tắm</label>
                                 <input type="number" name="quantityBath" class="form-control" min="1" required=""
                     value="<?php echo $row_up['quantityBath'] ?>">
                            </div>
                    </div>

                           <div class="form-group">
                               <label for="">Thông tin tổng quát</label>
                              <textarea rows="4" name="description" class="form-control" required ><?php echo $row_up['description']?></textarea>
                           </div>
                        
                            <div class="form-group">
                                 <label for="number">Giá Khoảng (VNĐ)</label>
                                <input name="price"class="form-control" placeholder="Giá khoảng"min="0" required
                                   value="<?php echo $row_up['price'] ?>">
                            </div>       

                      </div>
                                    

            <div class="col-md-6"> 


                   <div class="form-group">
                            <label for="file">Ảnh tổng quan ngôi nhà</label><br>
                           <input type="file" name="image"> <br>
                              <br>
                             <div>
                                <img src="img/<?php echo $row_up['image'];?>" width="100%" height="250px">
                            </div>

                    </div>     

                    <div class="form-group">
                            <label for="file">Video</label><br>
                           <input type="file" name="file_video"> <br>
                              <br>
                             <div>
                                <video src="<?php echo $row_up['video'];?>" controls width='100%'></video>
                            </div>
                    </div>              
                   
                <div class="tile-footer">
                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Cập nhật</button>
                    <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                </div>

            </div>
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

    <script type="text/javascript">
        $(document).ready(function(){
       
       let tag ="provinceList"; 
       let select_menu=document.getElementById('province');
       $.ajax({
            url:"ajaxfile.php",
            dataType:"json",
            method:"post",
            data:{ 
               tag:tag
                 },
            success:function(response){
                
                response.forEach((row)=>{
                  
                    var option = document.createElement("option");
                    option.value = row['province_id'];
                    option.text = row['provinceName'];
                    select_menu.appendChild(option);
                })
            }
        })
  });
    
    
    function getDistrictList(provinceId)// get id from option province
    {
        let tag = "districtList";
        let itemMenu =document.getElementById('district');;

        
        $('#district').empty().append('<option>Quận/Huyện</option>');
        $('#ward').empty().append('<option>Phường/Xã</option>');

        $.ajax({
            url:"ajaxfile.php",
            dataType:"json",
            method:"post",
            data:{
              tag:tag,
              provinceId:provinceId
            },
            success:function(response){
                response.forEach((row)=>{
                    var option = document.createElement("option");
                    option.value = row['district_id'];
                    option.text = row['districtName'];
                    itemMenu.appendChild(option);
                })
            }
        })
    }

    function getWardList(districtsId)// get id from option district
    {
        let tag = "wardList";
        let modelMenu =document.getElementById('ward');

        //Removing all the select options and adding only one option in one go
        $('#ward').empty().append('<option>Phường/Xã</option>'); 

        $.ajax({
            url:"ajaxfile.php",
            dataType:"json",
            method:"post",
            data:{
              tag:tag,
              districtsId:districtsId
            },
            success:function(response){
                response.forEach((row)=>{ // lặp qua mảng
                    //console.log(index,item);
                    var option = document.createElement("option");
                    option.value = row['ward_id'];
                    option.text = row['wardName'];
                    modelMenu.appendChild(option);// list danh sách ra
                })
            }
        })
    }

    </script>
  </body>
</html>