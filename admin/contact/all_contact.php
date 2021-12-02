<?php
if (!defined('hang')) {
    die('Lỗi đăng nhập');
}  
?>
<?php 
include_once('connect/connect.php');
?>

  <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bất Động Sản</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
    <main class="app-content">
           
     <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Danh sách người liên hệ</a></li>
        </ul>
      </div>
      

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
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Tin nhắn</th>
                                    <th>Tài khoản đăng</th>
                                    <th>Ngày đăng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                           
                                $sql = "SELECT * FROM contact inner join user on contact.user_id=user.user_id";                           
                                $query = mysqli_query($conn, $sql);                     
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['message'] ?></td>
                                        <td><?php echo $row['user_full'] ?></td>
                                         <td><?php echo $row['created'] ?></td>
                                     
                <td class="form-group">
            
                    <!-- Button trigger modal -->
                    <a onclick="$('#dialog-example_<?php echo $row['id'] ?>').modal('show');" href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o"></i></a>
                </td>
                <!-- Modal -->
                <div id="dialog-example_<?php echo $row['id'] ?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="dialog-example_<?php echo $row['id'] ?>">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Bạn thực sự muốn xóa không?</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#dialog-example_<?php echo $row['id'] ?>').modal('hide');">Hủy</button>
                                <a href="index.php?page_layout=del_contact&id=<?php echo $row['id']; ?>" class="btn btn-danger" style="color: #fff;"> Xóa</a>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>

</html>