<?php
include_once('connect/connect.php');


  if($_POST['tag']=='provinceList'){
    $query = "select * from province";
    $result = mysqli_query($conn,$query);

    $arr =[];
    $i=0;

    while($row = mysqli_fetch_assoc($result)){
      $arr[$i] = $row;
      $i++;
    }

    echo json_encode($arr);//print array
  }
//Get district list from id of province
  if($_POST['tag']=='districtList'){
    $provinceId = $_POST['provinceId'];

    $query = "select * from district where province_id ='".$provinceId."'" ;

    $result = mysqli_query($conn,$query);

    $arr =[];
    $i=0;

    while($row = mysqli_fetch_assoc($result)){
      $arr[$i] = $row;
      $i++;
    }

    echo json_encode($arr);
  }

  // Get ward list from id of district
  if($_POST['tag']=='wardList'){
    $districtsId = $_POST['districtsId'];

    $query = "select * from ward where district_id ='".$districtsId."'" ;

    $result = mysqli_query($conn,$query);

    $arr =[];
    $i=0;

    while($row = mysqli_fetch_assoc($result))
    {
      $arr[$i] = $row;
      $i++;
    }

    echo json_encode($arr);
  }

   
?>