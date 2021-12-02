
  <!--/ Intro Single star /-->
 <section class="intro-single">
    <div class="container">
      <div class="row" style="margin-top:-30px">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Quản lí tin đăng</h1>
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

    <div class="row">
        <div class="col-md-12">
              <div class="table-responsive">
                
                  <table class="table table-hover table-bordered">
            
                            <thead>
                                <tr>
                                    <th>Mã tin</th>
                                    <th>Địa chỉ</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Diện tích</th>
                                    <th>Danh mục</th>
                                    <th>Thông tin</th>
                                    <th>Chi tiết</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             
                                $sql = "SELECT * FROM imformation inner join type ON imformation.typeId=type.typeId
                                    inner join province ON imformation.province_id=province.province_id 
                                    inner join district ON imformation.district_id=district.district_id 
                                    inner join ward ON imformation.ward_id=ward.ward_id
                                     where user_id='$user_id' ORDER BY id_table DESC";
                           
                                $query = mysqli_query($conn, $sql);
                              
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td style=""><?php echo $row['id_table'] ?></td>
                                        <td style=""><?php echo $row['provinceName'] ?>, 
                                                     <?php echo $row['districtName'] ?>, 
                                                     <?php echo $row['wardName'] ?>
                                        </td>
                                        <td style=""><?php echo $row['price'] ?> VNĐ</td>
                                        <td><img width="130" height="180" 
                                        src="img/<?php echo $row['image'];?>" /></td>
                                        <td><?php echo $row['area'] ?> m <sup>2</sup></td>
                                        <td><?php echo $row['sell_rent'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <th><a href="?page_layout=thongtinnha&id=<?php echo $row['id_table']; ?>">Link bài đăng</a></th>
                                     
                <td class="form-group">
                <a href="index.php?page_layout=edit_tin&id=<?php echo $row['id_table']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                <br><br>
                  
                <a onclick="$('#dialog-example_<?php echo $row['id_table'] ?>').modal('show');" href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o"></i></a>
                </td>
                <!-- Modal -->
                <div id="dialog-example_<?php echo $row['id_table'] ?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="dialog-example_<?php echo $row['id_table'] ?>">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Bạn thực sự muốn xóa bài viết của mình không ?</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#dialog-example_<?php echo $row['id_table'] ?>').modal('hide');">Hủy</button>
                                <a href="index.php?page_layout=delete_tin&id=<?php echo $row['id_table']; ?>" class="btn btn-danger" style="color: #fff;"> Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                       </table>
              </div>
          
        </div>
      </div>
 </div>
