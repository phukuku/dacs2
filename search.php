

 <!--/ Form Search/-->
 <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Tìm kiếm ngôi nhà yêu thích</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="POST" action="">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <!-- <label for="Type">Keyword</label> -->
         <input type="text" name="search" class="form-control form-control-lg form-control-a" placeholder="Nhập thông tin...">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">Tỉnh/thành phố</label>
                      <select class="form-control" onchange="getDistrictList(this.value)"
                        name="province" id="province">
                            <option value="0">Tỉnh/Thành phố</option>           
                       </select>
             </div>
          </div>
          

          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Quận/huyện</label>
                      <select class="form-control" onchange="getWardList(this.value)" 
                        name="district" id="district" required> 
                          <option value="0">Quận/huyện</option>
                      </select>
            </div>
          </div>



          <div class="col-md-12">
            <div class="form-group">   
               <label for="">Nhu cầu</label>
                  <select class="form-control" name="typeId" required="">
                     <option value="0">Nhu cầu</option>
                      <?php 
                         $sql_type="SELECT * FROM type";  
                          $kt_type=mysqli_query($conn,$sql_type);
                          while($row_type= mysqli_fetch_assoc($kt_type)){ ?>
  <option value="<?php echo $row_type['typeId'];?>"><?php echo $row_type['sell_rent'];?></option>
                      <?php }?>
                  </select>
            </div>
          </div>


    
      <input class="billing_address_1" name="" type="hidden" value="">
      <input class="billing_address_2" name="" type="hidden" value="">
      

          <div class="col-md-12">
            <button name="" class="btn btn-b">Tìm kiếm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /-->
