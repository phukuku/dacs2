<?php
if (!defined('hang')) {
	 echo'<script> alert("Bạn phải đăng nhập");</script>';
	 header('location: ?page_layout=trangchu');
}
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
<body class="app sidebar-mini">
	<header class="app-header"><a class="app-header__logo" href="?page_layout=output">Bất Động Sản</a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      
      <ul class="app-nav">
      
      
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
        </li>
        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">	
        	<?php
								// $sql = "SELECT*FROM user WHERE user_mail='$mail'";
								// $query = mysqli_query($conn, $sql);
								// $row = mysqli_fetch_array($query);
								echo $row['user_full'];
					?></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">

            <li><a class="dropdown-item" href="index.php?page_layout=account"><i class="fa fa-user fa-lg"></i> Thông tin</a></li>
            <li><a class="dropdown-item" href="?page_layout=output"><i class="fa fa-sign-out fa-lg"></i>Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </header>
	
	 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
     <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="img/<?php echo $row['user_image']; ?>" height="60px" width="60px"> 
         <div>
      
          
          	Xin chào,
        <?php
								// $sql = "SELECT*FROM user WHERE user_mail='$mail'";
								// $query = mysqli_query($conn, $sql);
								// $row = mysqli_fetch_array($query);
								echo $row['user_full'];
					?>
					</div>
        
      </div>

      <ul class="app-menu">
     	<?php if (defined("admin")) { ?>
     	<li class="active">
        	<a class="app-menu__item" href="index.php?page_layout=dashboard"><i class="app-menu__icon fa fa-dashboard"></i>
        	<span class="app-menu__label">Dashboard</span></a>
        </li>

		      <li>
        	  <a class="app-menu__item" href="index.php?page_layout=user"><i class="app-menu__icon fa fa-pie-chart"></i>
            <span class="app-menu__label">Quản lý tài khoản</span></a>
         </li>	   
	       <li>
        	 <a class="app-menu__item" href="index.php?page_layout=baidang"><i class="app-menu__icon fa fa-th-list"></i>
        	 <span class="app-menu__label">Quản lý bài viết</span></a>
        </li>

        <li>
        	 <a class="app-menu__item" href="index.php?page_layout=blog"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản lý blog</span></a>
        </li>

         <li>
        	<a class="app-menu__item" href="index.php?page_layout=contact"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản lý contact</span></a>
        </li>

		    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Thống kê</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">          
             <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Doanh thu</a></li>
             <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Doanh thu 1</a></li>
          </ul>
        </li>
  
       <li><a class="app-menu__item" href="?page_layout=output"><i class="fa fa-sign-out fa-lg"></i><span class="app-menu__label">Thoát</span></a></li>
       
		<?php } ?>
      </ul>
    </aside>


	<?php
	if (isset($_GET['page_layout'])) {
		switch ($_GET['page_layout']) {
			case 'baidang':
				include_once('admin/baidang/baidang.php');
				break;
			case 'add_baidang':
				include_once('admin/baidang/add_baidang.php');
				break;
			case 'edit_baidang':
				include_once('admin/baidang/edit_baidang.php');
				break;
			case 'del_baidang':
				include_once('admin/baidang/del_baidang.php');
				break;
				
			case 'blog':
				include_once('admin/blog/all_blog.php');
				break;
			case 'add_blog':
				include_once('admin/blog/add_blog.php');
				break;
			case 'edit_blog':
				include_once('admin/blog/edit_blog.php');
				break;
			case 'del_blog':
				include_once('admin/blog/del_blog.php');
				break;

			case 'contact':
				include_once('admin/contact/all_contact.php');
				break;
			case 'del_contact':
				include_once('admin/contact/del_contact.php');
				break;

			case 'user':
				include_once('admin/users/user.php');
				break;
			case 'add_user':
				include_once('admin/users/add_user.php');
				break;
			case 'edit_user':
				include_once('admin/users/edit_user.php');
				break;
			case 'del_user':
				include_once('admin/users/del_user.php');
				break;
			case 'dashboard':
				include_once('admin/dashboard.php');
				break;
			case "account":
				include_once("admin/users/account.php");
				break;		
			case "output":
				include_once("admin/output.php");
				break;		
					
			
			
		}
	} else {
		include_once('admin/dashboard.php');
	}

	?>

    <script>  


    	       //menu kéo qua
					    (function () {
						"use strict";

						var treeviewMenu = $('.app-menu');

						// Toggle Sidebar
						$('[data-toggle="sidebar"]').click(function(event) {
							event.preventDefault();
							$('.app').toggleClass('sidenav-toggled');
						});

						// Activate sidebar treeview toggle
						$("[data-toggle='treeview']").click(function(event) {
							event.preventDefault();
							if(!$(this).parent().hasClass('is-expanded')) {
								treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
							}
							$(this).parent().toggleClass('is-expanded');
						});

						// Set initial active toggle
						$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

						//Activate bootstrip tooltips
						$("[data-toggle='tooltip']").tooltip();

					})();

  
            //show image khi chọn
            function showImages() {
                var fileSelected = document.getElementById('upload').files;
                if (fileSelected.length > 0) {
                    var fileToLoad = fileSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoaderEvent) {
                        var srcData = fileLoaderEvent.target.result;
                        var newImage = document.createElement('img');
                        newImage.src = srcData;
                        document.getElementById('displayImg').innerHTML = newImage.outerHTML;
                
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
            }
   
    </script>

</body>

</html>