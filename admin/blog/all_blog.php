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
          <li class="breadcrumb-item"><a href="#">Danh sách blog</a></li>
        </ul>
      </div>
      
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_blog" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm blog mới
        </a>
    </div> <br> <br>

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
                                    <th>Chủ đề</th>
                                    <th>Tiêu đề</th>
                                    <th>Ảnh</th>
                                    <th>Bài viết</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                           
                                $sql = "SELECT * FROM blog";                           
                                $query = mysqli_query($conn, $sql);                     
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td style=""><?php echo $row['blog_id'] ?></td>
                                        <td style=""><?php echo $row['title'] ?></td>
                                        <td style=""><?php echo $row['sologan'] ?></td>
                                        <td style="text-align: center"><img width="130" height="150" 
                                        src="img/<?php echo $row['image'];?>" /></td>
                                        <td><?php echo $row['description'] ?></td>
                                     
                <td class="form-group">
                    <p><a href="index.php?page_layout=edit_blog&id=<?php echo $row['blog_id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></p>
                    <!-- Button trigger modal -->
                    <a onclick="$('#dialog-example_<?php echo $row['blog_id'] ?>').modal('show');" href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o"></i></a>
                </td>
                <!-- Modal -->
                <div id="dialog-example_<?php echo $row['blog_id'] ?>" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="dialog-example_<?php echo $row['blog_id'] ?>">
                            <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Bạn thực sự muốn xóa bài blog:
                                  với id: <span style="color:red">"<?php echo $row['blog_id']?>"</span> không?</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#dialog-example_<?php echo $row['blog_id'] ?>').modal('hide');">Hủy</button>
                                <a href="index.php?page_layout=del_blog&id=<?php echo $row['blog_id']; ?>" class="btn btn-danger" style="color: #fff;"> Xóa</a>
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