
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Bài viết tuyệt vời của chúng tôi</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="trangchu.html">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Blog
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->


  <!--/ News Grid Star /-->
  <section class="news-grid grid">
    <div class="container">
      <div class="row">
        <?php $sql="SELECT * FROM blog";
                       $kt= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/<?php echo $row['image']; ?>" alt="" width="350px" height="380px" class="img-b">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="?page_layout=blog_content&id=<?php echo $row['blog_id']; ?>" class="category-b"><?php echo $row['title']; ?></a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="?page_layout=blog_content&id=<?php echo $row['blog_id']; ?>"><?php echo $row['sologan']; ?></a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b"><?php echo $row['created_at']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div> 
      <?php }?>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Grid End /-->




