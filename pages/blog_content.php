
<?php 

   $id=$_GET['id'];
   $sql="SELECT * FROM blog WHERE blog_id=$id";
   $kt= mysqli_query($conn,$sql);
  

?>
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Phản hồi từ khách hàng</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="trangchu.html">Home</a>
              </li>
                <li class="breadcrumb-item">
                <a href="blog.html">Blog</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Comment
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Single Star /-->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="news-img-box">
            <img src="img/bdsmuadich.jpg" class="img-fluid" style="margin: 5px">
          </div>
        </div>
         <div class="col-sm-6">
          <div class="news-img-box">
            <img src="img/bdsmuadich1.jpg"  class="img-fluid" style="margin: 5px">
          </div>
        </div>

 <?php while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
            
              <li class="list-inline-item mr-2">
                <strong>Chủ đề:</strong>
                <span class="color-text-a"><?php echo $row['title']; ?></span>
              </li>
              <li class="list-inline-item">
                <strong>Ngày: </strong>
                <span class="color-text-a"><?php echo $row['created_at']; ?></span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
            <p class="post-intro">
             <?php echo $row['sologan']; ?>
            </p>
           <?php echo $row['description']; ?>
            </p>
        
            <blockquote class="blockquote">
              <p class="mb-4">Bất động sản sẽ như diều gặp gió, khi mà dịch bệnh được kiểm soát.</p>
           <!--    <footer class="blockquote-footer">
                <strong>Người tấu hài:</strong>
                <cite title="Source Title">Phú Lê </cite>
              </footer> -->
            </blockquote>
            <p>
              Hãy cho ý kiến của bạn về vấn đề bất động sản trong thời gian sắp tới
            </p>
          </div>
          <div class="post-footer">
            <div class="post-share">
              <span>Share: </span>
              <ul class="list-inline socials">
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
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <div class="title-box-d">
            <h3 class="title-d">Comments (4)</h3>
          </div>
          <div class="box-comments">
            <ul class="list-comments">
              <li>
                <div class="comment-avatar">
                  <img src="img/author-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Hoàng Kiệt</h4>
                  <span>20 08 2021</span>
                  <p class="comment-description">
                   You are best
                  </p>
                  <a href="">Reply</a>
                </div>
              </li>
              <li class="comment-children">
                <div class="comment-avatar">
                  <img src="img/author-1.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Hiếu Trần</h4>
                  <span>21 08 2021</span>
                  <p class="comment-description">
                    Are you sure? I will invest
                  </p>
                  <a href="">Reply</a>
                </div>
              </li>
              <li>
                <div class="comment-avatar">
                  <img src="img/author-2.jpg" alt="">
                </div>
                <div class="comment-details">
                  <h4 class="comment-author">Phu Le</h4>
                  <span>23 09 2021</span>
                  <p class="comment-description">
                   Nói thì hay, ngon đầu tư đi
                  </p>
                  <a href="">Reply</a>
                </div>
              </li>
            </ul>
          </div>
            <?php }?>
          <div class="form-comments">
            <div class="title-box-d">
              <h3 class="title-d"> Để lại bình luận</h3>
            </div>
            <form class="form-a">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputName">Tên của bạn</label>
                    <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Tên..."
                      required>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="inputEmail1">Enter email</label>
                    <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                      placeholder="Email *" required>
                  </div>
                </div>
                
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="textMessage">Bình luận</label>
                    <textarea id="textMessage" class="form-control" placeholder="Bình luận của bạn..." name="message" cols="45"
                      rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-outline-success">Gửi bình luận</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Single End /-->
