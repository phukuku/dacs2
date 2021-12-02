<?php 
include_once('connect/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Admin</title>
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
          <li class="breadcrumb-item"><a href="#">Quản lý thành viên</a></li>
        </ul>
      </div>
      
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm user
        </a>
    </div><br><br>

    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <form method="POST">      
                  <table class="table table-hover table-bordered" id="sampleTable">
        
                  
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ & Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php
                
                                $sql = "SELECT*FROM user";
                                $query = mysqli_query($conn, $sql);
                                // mysqli_fetch_array($query);
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    
                                        <tr>
                                    <td style=""><?php echo $row['user_id'];?></td>
                                    <td style=""><?php echo $row['user_full'];?></td>
                                    <td style=""><?php echo $row['user_mail'];?></td>
                                    <td><span class="label label-<?php if($row['user_level']==1){echo "danger";}else{echo 'success';}?>"><?php if($row['user_level']==1){echo 'Admin';}else{echo 'khach hang';}?></span></td>
                                    <th><?php echo $row['created_at'];?></th>

                                    
                   <!--Xóa user-->  
                                       <td class="form-group">
                                            <a href="index.php?page_layout=edit_user&id=<?php echo $row['user_id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                            <!-- Button trigger modal -->
                                            <a onclick="$('#dialog-example_<?php echo $row['user_id'] ?>').modal('show');" href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o"></i></a>
                                        </td>
                 <!--xóa -->
         <div id="dialog-example_<?php echo $row['user_id'] ?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="dialog-example_<?php echo $row['user_id'] ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn thực sự muốn xóa
                         <span style="color:red">người dùng: "<?php echo $row['user_full'].'" , ID: "'.$row['user_id']; ?>"
                          </span> không?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#dialog-example_<?php echo $row['user_id'] ?>').modal('hide');">Hủy</button>
                        <a href="index.php?page_layout=del_user&id=<?php echo $row['user_id'];?>" class="btn btn-danger" style="color: #fff;"> Xóa</a><!--file.php thì ? -->
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
      </div>
    </main>
    <!-- Essential javascripts for application to work-->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

  </body>
</html>