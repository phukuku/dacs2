<?php include_once('search.php');?>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Thông tin các khu vực nổi bật</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Properties Grid
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->
   

       <div class="col-md-10 offset-md-1">
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" >
            <li class="nav-item">
              <a class="nav-link active" id="pills-tab-all" data-toggle="pill" href="#pills-all" >Tất cả</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-hanoi" data-toggle="pill" href="#pills-hn">Hà Nội</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-danang" data-toggle="pill" href="#pills-dn">Đà Nẵng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-hcm" data-toggle="pill" href="#pills-hcm">Hồ Chí Minh</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">



            <div class="tab-pane fade show active" id="pills-all" aria-labelledby="pills-tab-all">
        
            
  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
  <?php
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $row_per_page =6;// số bài 1 viết trang
                $per_rows = $page * $row_per_page - $row_per_page;
                $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM imformation"));
                $total_pages = ceil($total_rows / $row_per_page);
                $list_page = " ";
                $page_prev = $page - 1;
                if ($page_prev <= 1) {
                    $page_prev = 1;
                }
                $list_page .= '<li class="page-item"><a class="page-link" href="?page_layout=thongtin&page=' . $page_prev . '"><span class="ion-ios-arrow-back"></span></a></li>';//pages 
            
                // in dam so trang hien tai
                if (!isset($_GET['page'])) {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == 1) {
                            $list_page .= '<li class="page-item active"><a class="page-link" href="?page_layout=thongtin&page=' . $i . '">' . $i . '</a></li>';
                        }// active trang 1
                        for ($i = 2; $i <= $total_pages; $i++) {
                            $list_page .= '<li><a class="page-link" href="?page_layout=thongtin&page=' . $i . '">' . $i . '</a></li>';
                        }//in ra mấy trang khác ko active
                    }
                } else {
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $_GET['page']) {
                            $list_page .= '<li class="page-item active"><a class="page-link" href="?page_layout=thongtin&page=' . $i . '">' . $i . '</a></li>';
                        }//in trang đang click
                        if ($i != $_GET['page']) {
                            $list_page .= '<li class="page-item"><a class="page-link" href="?page_layout=thongtin&page=' . $i . '">' . $i . '</a></li>';
                        }//in ra các trang hiện có
                    }
                }
                //page next
                $page_next = $page + 1;
                if ($page_next > $total_pages) {
                    $page_next = $total_pages;
                }
                $list_page .= '<li class="page-item">
                <a class="page-link" href="?page_layout=thongtin&page=' . $page_next . '">
                 <span class="ion-ios-arrow-forward"></span></a>
               </li>';


                    if(isset($_POST['search'])&&!empty($_POST['search']))
                             {
                                $key=$_POST['search'];
                                $sql = "SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id where price like '%$key%' or area like '%$key%'
                                   or quantityFloor like '%$key%' or quantityBed like '%$key%' or quantityBath like '%$key%' or numberHouse like '%$key%'
                                    ORDER BY id_table ";                                 
                             }

                      else if(isset($_POST['province'])&&!empty($_POST['province'])&&empty($_POST['district']))
                       {
                          $key=$_POST['province'];
                         
                          $sql = "SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                              inner join province ON imformation.province_id=province.province_id 
                              inner join district ON imformation.district_id=district.district_id 
                              inner join ward ON imformation.ward_id=ward.ward_id where imformation.province_id like '%$key%'";
                                        
                       }
                        else if(isset($_POST['district'])&&!empty($_POST['district']))
                       {
                          $key=$_POST['province'];
                          $key1=$_POST['district'];
                          $sql = "SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                              inner join province ON imformation.province_id=province.province_id 
                              inner join district ON imformation.district_id=district.district_id 
                              inner join ward ON imformation.ward_id=ward.ward_id where imformation.province_id like '%$key%' and 
                              imformation.district_id like '%$key1%'";                                     
                       }

                       else if(isset($_POST['typeId'])&&!empty($_POST['typeId']))
                       {
                          $key=$_POST['typeId'];
                          $key1=$_POST['province'];
                          $key2=$_POST['district'];
                          $sql = "SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                              inner join province ON imformation.province_id=province.province_id 
                              inner join district ON imformation.district_id=district.district_id 
                              inner join ward ON imformation.ward_id=ward.ward_id where imformation.typeId like '%$key%' and imformation.province_id like '%$key1%' and imformation.district_id like '%$key2%'";                                     
                       }
                        

                             else{
                       $sql="SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id ORDER BY id_table DESC LIMIT $per_rows, $row_per_page";
                                  
                                  }
                 
                       $kt= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
       
               <img src="img/<?php echo $row['image']; ?>"width="350px" height="380px" class="img-b"> <!--class="img-a img-fluid"-->
              
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $row['districtName']; ?>
                      <br /><?php echo $row['provinceName']; ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a"><?php echo $row['sell_rent']; ?> | $ <?php echo $row['price']; ?> tỷ</span>
                  </div>
                  <a href="?page_layout=thongtinnha&id=<?php echo $row['id_table']; ?>" class="link-a">Nhấn để xem chi tiết
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Diện tích</h4>
                      <span><?php echo $row['area']; ?> m <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Tầng</h4>
                      <p align="center"><span><?php echo $row['quantityFloor']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng ngủ</h4>
                      <p align="center"><span><?php echo $row['quantityBed']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng tắm</h4>
                      <p align="center"><span><?php echo $row['quantityBath']; ?></span></p> 
                    </li>
                  </ul>
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
              <?php echo $list_page; ?>       
            </ul>
          </nav>
        </div>
      </div>

    
    </div>
  </section>
  <!--/ Property Grid End /-->
 </div>

             
<div class="tab-pane fade" id="pills-hn" aria-labelledby="pills-tab-hanoi">
                       
  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row"> 

            <?php
                       $sql="SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id where province.province_id=2 ";
                       $kt= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
       
               <img src="img/<?php echo $row['image']; ?>"width="350px" height="380px" class="img-b"><!--class="img-a img-fluid"-->
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $row['districtName']; ?>
                      <br /><?php echo $row['provinceName']; ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a"><?php echo $row['sell_rent']; ?> | $ <?php echo $row['price']; ?> tỷ</span>
                  </div>
                  <a href="?page_layout=thongtinnha&id=<?php echo $row['id_table']; ?>" class="link-a">Nhấn để xem chi tiết
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Diện tích</h4>
                      <span><?php echo $row['area']; ?> m <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Tầng</h4>
                      <p align="center"><span><?php echo $row['quantityFloor']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng ngủ</h4>
                      <p align="center"><span><?php echo $row['quantityBed']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng tắm</h4>
                      <p align="center"><span><?php echo $row['quantityBath']; ?></span></p> 
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>     
    <?php }?>
          
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->
</div>

   <div class="tab-pane fade" id="pills-dn" aria-labelledby="pills-tab-danang">
             <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row"> 
       

         <?php
                       $sql="SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id where province.province_id=3 ";
                       $kt= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
       
               <img  src="img/<?php echo $row['image']; ?>" width="350px" height="380px" class="img-b">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $row['districtName']; ?>
                      <br /><?php echo $row['provinceName']; ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a"><?php echo $row['sell_rent']; ?> | $ <?php echo $row['price']; ?> tỷ</span>
                  </div>
                  <a href="?page_layout=thongtinnha&id=<?php echo $row['id_table']; ?>" class="link-a">Nhấn để xem chi tiết
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Diện tích</h4>
                      <span><?php echo $row['area']; ?> m <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Tầng</h4>
                      <p align="center"><span><?php echo $row['quantityFloor']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng ngủ</h4>
                      <p align="center"><span><?php echo $row['quantityBed']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng tắm</h4>
                      <p align="center"><span><?php echo $row['quantityBath']; ?></span></p> 
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>     
    <?php }?>
          
     
        
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->
   </div>

            <div class="tab-pane fade" id="pills-hcm"  aria-labelledby="pills-tab-hcm">
                 <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row"> 

         <?php
                       $sql="SELECT * FROM imformation inner join type ON imformation.typeId= type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id where province.province_id=1 ";
                       $kt= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($kt)){ ?> 
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
       
               <img src="img/<?php echo $row['image']; ?>" width="350px" height="380px" class="img-b">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#"><?php echo $row['districtName']; ?>
                      <br /><?php echo $row['provinceName']; ?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a"><?php echo $row['sell_rent']; ?> | $ <?php echo $row['price']; ?> tỷ</span>
                  </div>
                  <a href="?page_layout=thongtinnha&id=<?php echo $row['id_table']; ?>" class="link-a">Nhấn để xem chi tiết
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Diện tích</h4>
                      <span><?php echo $row['area']; ?> m <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Tầng</h4>
                      <p align="center"><span><?php echo $row['quantityFloor']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng ngủ</h4>
                      <p align="center"><span><?php echo $row['quantityBed']; ?></span></p>
                    </li>
                    <li>
                      <h4 class="card-info-title">Phòng tắm</h4>
                      <p align="center"><span><?php echo $row['quantityBath']; ?></span></p> 
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>     
    <?php }?>
          
        
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->     

            </div>
          </div>
        </div>
