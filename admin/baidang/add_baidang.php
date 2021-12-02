<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');

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

        $sql="INSERT INTO imformation(numberHouse,image,price,area,description,typeId,
        quantityFloor,quantityBed,quantityBath,province_id,district_id,ward_id) 
        VALUE('$numberHouse','$imgage','$price','$area','$description','$typeid',
        '$quantityFloor','$quantityBed','$quantityBath','$province','$district','$ward')";
        $query=mysqli_query($conn,$sql);
        move_uploaded_file($imgage_tmp,'img/'.$imgage);
        header('location: index.php?page_layout=baidang');



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
          <li class="breadcrumb-item "><a href="#">Thêm bài viết</a></li>
        </ul>
      </div>

   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm bài viết</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
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
                          </select>
                       </div>
                                               
                    <div class="form-group">
                        <label for="">Quận/huyện</label>
                            <select class="form-control" onchange="getWardList(this.value)" 
                                    name="district" id="district"> 
                              <option value="0">Quận/huyện</option>
                            </select>
                    </div>

                    <div class="form-group">
                             <label for="">Phường/Xã</label>
                              <select class="form-control" name="ward" id="ward">
                                 <option value="" selected="">Phường/Xã</option>            
                              </select>
                    </div>

                    <div class="form-group">
                        <label for="text">Số nhà - Đường</label>
                        <input type="text" name="numberHouse" class="form-control" placeholder="Số nhà - Đường" required>
                    </div>

               
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
                   
                          
                    <div class="form-group">
                            <label for="file">Ảnh tổng quan ngôi nhà</label><br>
                            <input type="file" name="image" required>
                    </div>     
              </div>
                                    

            <div class="col-md-6">          
                    <div class="form-group">
                        <label for="">Diện tích (m<sup>2</sup>)</label>
                        <input type="number" name="area" class="form-control" min="1" required="">
                    </div>
           
                    <div class="row">
                             <div class="form-group col-md-4">
                                <label for="">Số tầng</label>
                                <input type="number" name="quantityFloor" class="form-control" min="1" required="">
                            </div>

                             <div class="form-group col-md-4">
                                <label for="">Phòng ngủ</label>
                                <input type="number" name="quantityBed" class="form-control" min="1" required="">
                            </div>


                             <div class="form-group col-md-4">
                                <label for="">Phòng tắm</label>
                                <input type="number" name="quantityBath" class="form-control" min="1" required="">
                            </div>
                    </div>

                   <div class="form-group">
                       <label for="">Thông tin tổng quát</label>
                       <textarea type="text-area"rows="6" name="description" class="form-control" placeholder="" required=""></textarea>
                   </div>

               
                      <div class="form-group">
                         <label for="number">Giá Khoảng (VNĐ)</label>
                         <input name="price"class="form-control" placeholder="Giá khoảng"min="0" required>
                      </div>        
                  

            <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm mới</button>
            <button class="btn btn-primary" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
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