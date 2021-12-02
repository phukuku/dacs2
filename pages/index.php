  <?php
include_once('connect/connect.php');
  if (isset($_POST['submitLogin'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user
    WHERE user_mail='$mail' AND user_pass='$pass'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
      $_SESSION['mail'] = $mail;
      //$_SESSION['pass'] = $pass;
      header('location: index.php');
    } else {
       echo'<script> alert("Tài khoản hoặc mật khẩu không đúng");</script>';
    }
  }
  ?>

<?php 
include_once('connect/connect.php');
if(isset($_POST['submitRegister'])){
    $user_full=$_POST['user_full'];
    $mail=$_POST['mail'];
    $user_pass=$_POST['user_pass'];
    $user_re_pass=$_POST['user_re_pass'];
    $user_level=$_POST['user_level'];
    $date=date("d-m-Y");
    if ($user_pass == $user_re_pass) {
        $user_pass = $_POST["user_pass"];
    } else {
       echo '<script> alert("Mật khẩu không khớp, vui lòng đăng ký lại");</script>';
 
    }

        if (mysqli_num_rows(mysqli_query($conn, "SELECT*FROM user WHERE user_mail = '$mail'")) == 0) {
            if ($user_pass == $user_re_pass) {
                $mail = $_POST["mail"];
                $sql_user = "INSERT INTO user(user_full, user_mail, user_pass, user_level, user_image,created_at) value( '$user_full', '$mail', '$user_pass', '$user_level','images.png','$date')";
                 mysqli_query($conn, $sql_user);
                 
                // echo'<script> alert("Tạo tại khoản thành công");</script>';
                $_SESSION['mail'] = $mail;
                header('location: index.php');
    
            }
        } else {
            echo '<script> alert("Email đã tồn tại, vui lòng đăng ký lại");</script>';
          
        }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>Bất Động Sản</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">  <!--Google Fonts-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icon-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">  <!--css carousel-->

  <link href="css/style.css" rel="stylesheet">
<style type="text/css">
  
        .grid-item{
        margin-bottom:15px;
        position:relative;
        font-size:14px;     /*col md 8*/
        text-align:center;     
        width:100%;
        height:260px;
        overflow:hidden;
        border-radius:5px;        
    }

        .grid-item a img{
        position:absolute;
        left:50%;                /*col md 4*/
        top:50%;
        min-height:100%;
        min-width:100%;
        border-radius:5px;
        transform:translate(-50%, -50%);
       }

        .grid-item a .backdrop-overlay{
        background-color:rgba(0,0,0,0.18); 
        position:absolute;
        width:100%;
        height:100%;
        padding:45px 20px /*đẩy chữ các quận lên*/
    }
        .grid-item a .backdrop-overlay .place-name{
        height:30px;/*khoảng cách 2 đoạn chữ trong ảnh*/
      
        transition:all 0.4s ease-in-out;
        transform:translateY(60px);/*đẩy chữ nhỏ lên*/
       
    }

        .grid-item a .backdrop-overlay .place-name h4{
       
       /* line-height:40px; dịch chữ xuống*/
        font-weight:600;
        font-size:24px;
        color:#fff;
        text-shadow:0 2px 4px rgba(0,0,0,0.5)}
   .grid-item a .backdrop-overlay .place-name span { /*gạch ngang bên dưới */
    width: 40px;
    height: 2px;
    background-color: #ffffff;
    display: inline-block;
    
}

      .grid-item a .backdrop-overlay .place-info{/*chữ nhỏ*/
   font-size:15px;
   color:#fff;
   transform:scale(0);
   transition:all 0.4s ease-in-out;
   margin-top:30px}


      .grid-item a .backdrop-overlay:hover .place-name{
   transform:translateY(0px);/*đẩy quận lên*/
}


      .grid-item a .backdrop-overlay:hover .place-info{ 
    /*dí chuột vô quận thì hiện ra*/
   
   transform:scale(1);

}

</style>
</head>

<body>

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="#">Bất Động<span class="color-b"> Sản</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav" style="margin-top:10px">
          <li class="nav-item">
            <a class="nav-link" href="?page_layout=trangchu">Trang chủ</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="?page_layout=thongtin">Thông tin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page_layout=blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page_layout=contact">Liên hệ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page_layout=dangtin">Đăng tin</a>
          </li>
     <?php if (defined("user")){ ?>
       
          <li class="nav-item dropdown" style="margin-top:-3px">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
          <?php
                $sql = "SELECT*FROM user WHERE user_mail='$mail'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                echo $row['user_full']; 
                $user_id=$row['user_id'];// khai báo user_id để lưu cho trang đăng tin và quan lí tin
           ?>
            <span><img height="35px" width="35px" style="border-radius:50%" src="img/<?php echo $row['user_image']; ?>"></span>
         </a>

             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?page_layout=account_user">Thông tin</a>
                <a class="dropdown-item" href="?page_layout=quanli_tin">Quản lí tin đăng</a>
                <a class="dropdown-item" href="?page_layout=output">Đăng xuất</a>   
              </div>
          </li>  
    <?php } 
     
     else { ?>
          <li class="nav-item" >
            <a class="nav-link" href="#tab_auth_login" data-toggle="modal" data-target="#modal_auth">Đăng nhập</a>
          </li>
        <?php } ?>
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>

  </nav>
  <!--/ Nav End /-->
 
<!--form login-->



<div class="modal fade" id="modal_auth" >
    <div class="modal-dialog modal-md"  >
        <div class="modal-content"  >
            <div class="row-fluid" >
                <div class="col-md-12" >
                    <div class="modal_auth_wrap" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul class="nav nav-tabs no-margin">
                       <li id="li_login" class="active" style="margin-left: 130px" ><a class="nav-link active" href="#tab_auth_login" data-toggle="tab">ĐĂNG NHẬP</a></li>
                       <li id="li_register" class=""><a class="nav-link" href="#tab_auth_register" data-toggle="tab">ĐĂNG KÝ</a></li>
                           
                        </ul>
                        <div class="tab-content">
    <div class="tab-pane fade in active show" id="tab_auth_login">
     <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Đăng nhập</h2>
            <div class="input-field">
              <i class="fa fa-user"></i>
              <input type="email"  placeholder="Email..." name="mail" required=""/>
            </div>
             <div class="input-field">
              <i class="fa fa-lock"></i>         
              <input class="pass" id="password" placeholder="Mật khẩu..." name="pass" type="password" required="" />     
               <span class="show"><i class="fa fa-eye" id="togglePassword"></i></span>
            </div>
         <button type="submit" name="submitLogin" class="btn btn-auth-submit">Đăng nhập</button>
            <p class="social-text">hoặc đăng nhập với</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fa fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-linkedin"></i>
              </a>
            </div>
          </form>
          
     </div>



<div class="tab-pane fade" id="tab_auth_register">
        <form role="form" method="post" enctype="multipart/form-data">
            <h2 class="title">Đăng ký</h2>
            <div class="input-field">
              <i class="fa fa-user"></i>
              <input type="text" placeholder="Tài khoản ..." name="user_full" required/>
            </div>

            <div class="input-field">
              <i class="fa fa-envelope"></i>
              <input type="email" placeholder="Email ..." name="mail" required="" />
            </div>
        
            <div class="input-field">
              <i class="fa fa-lock"></i>
              <input type="password" placeholder="Mật khẩu..." name="user_pass" required="" >
            </div>

            <div class="input-field">
              <i class="fa fa-lock"></i>
              <input type="password" placeholder="Nhập lại mật khẩu..." name="user_re_pass" required="" >
            </div> 

            <!-- <div id="html_element"></div>-->   
                     
            <div class="form-group" hidden>
                  <input name="user_level" value="2">
             </div>

           <button type="submit" name="submitRegister" class="btn btn-auth-submit">Đăng ký</button>
            <p class="social-text">hoặc đăng ký với</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fa fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fa fa-linkedin"></i>
              </a>
            </div>
          </form>
</div>

                </div>
            </div>
        </div>
    </div>
 </div>
</div>
</div>
 
<!--end form login-->



  <?php
  if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
      case 'about':
        include_once('pages/about.php');
        break;
      case 'binhluan':
        include_once('pages/binhluan.php');
        break;
      case 'blog':
        include_once('pages/blog.php');
        break;
      case 'contact':
        include_once('pages/contact.php');
        break;
      case 'thongtin':
        include_once('pages/thongtin.php');
        break;
      case 'thongtinnha':
        include_once('pages/thongtinnha.php');
        break;
      case "trangchu":
        include_once("pages/trangchu.php");
        break; 
      case "dangtin":
        include_once("pages/dangtin.php");
        break; 
      case "output":
        include_once("admin/output.php");
        break;  
      case "account_user":
        include_once("pages/account_user.php");
        break;  
      case "blog_content":
        include_once("pages/blog_content.php");
        break;  
      case "quanli_tin":
        include_once("pages/quanli_tin.php");
        break;  
      case "edit_tin":
        include_once("pages/edit_tin.php");
        break;  
      case "delete_tin":
        include_once("pages/delete_tin.php");
        break;  
   
   
    }
  } else {
    include_once('pages/trangchu.php');
  }

  ?>

  

  <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Về chúng tôi</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
              
                Chúng tôi luôn mong muốn đem lại <br>trải nghiệm tốt nhất cho khách hàng
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone: </span> lvphu.20it3@vku.udn.vn</li>
                <li class="color-a">
                  <span class="color-text-a">Email: </span>113</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h4 class="w-title-a text-brand">Chính sách</h4>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Bảo mật</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Uy tín</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Chất lượng</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Hợp lý</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Khu vực nổi bật</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Hồ Chí Minh</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Hà Nội</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Đà nẵng</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Hải Phòng</a>
                </li>           
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- <div id="preloader"></div>
 -->
<script>
  
     const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');
                togglePassword.addEventListener('click', function (e) {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
});
          
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>  <!--ScrollReveal JS-->



  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


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

        
        $('#district').empty().append('<option value="0">Quận/Huyện</option>');
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
