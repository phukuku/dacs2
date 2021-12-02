
<?php  
   include_once('connect/connect.php');

   if (defined("user")){ 
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        $date=date("d-m-Y");
        $sql="INSERT INTO contact(name,email,message,user_id,created) 
        VALUE('$name','$email','$message','$user_id','$date')";//$user_id lấy từ index.php
        $query=mysqli_query($conn,$sql);
        $success = '<div class="alert alert-success" style="color:red">Bạn đã gửi tin thành công, vui lòng chờ để chúng tôi xem !</div>';
      
      }
    }
      else{
         
         $error = '<div class="alert alert-danger" style="color:red">Bạn phải đăng nhập trước khi để lại lời nhắn !</div>';
    }

?>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <?php if (isset($error)) {
                        echo $error;
                    }; ?>

     <?php if (isset($success)) {
                        echo $success;
                    }; ?>
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Contact US</h1>
            <span class="color-text-a">Các bạn có thể liên hệ với chúng tôi bằng những hình thức dưới đây.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="trangchu.html">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Liên hệ
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
         
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7671.5322688459455!2d108.24763653488768!3d15.973584800000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314211d3b0f75107%3A0x39ce35bf163a2594!2zS1RYIFRyxrDhu51uaCBDxJAgQ05UVCBo4buvdSBuZ2jhu4sgVmnhu4d0IC0gSMOgbg!5e0!3m2!1svi!2s!4v1631238975384!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form class="form-a contactForm" action="" method="post" role="form">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Tên..." required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Emai liên lạc..." required>
                    </div>
                  </div>
        
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea name="message" class="form-control" rows="9" placeholder="Tin nhắn..." required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-outline-success">Gửi tin nhắn</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Liên hệ</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email:
                      <span class="color-a">lvphu.20it3@vku.udn.vn</span>
                    </p>
                    <p class="mb-1">Phone.
                      <span class="color-a">113</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Tìm kiếm</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                      470 Trần Đại Nghĩa,Hòa Quý,Ngũ Hành Sơn,Đà Nẵng
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box">
                <div class="icon-box-icon">
                  <span class="ion-ios-redo"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Mạng xã hội</h4>
                  </div>
                  <div class="icon-box-content">
                    <div class="socials-footer">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->

