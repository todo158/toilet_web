<?php
  require('dbconnect.php');

  $sql = "SELECT * FROM `toilets`";
  if(!empty($_POST['sort']) && isset($_POST['sort'])){
    $sql = $sql . 'WHERE ';
    $sql = $sql . $_POST['sort'][0] . '>0';
    for($i=1;$i<count($_POST['sort']);$i++){
      $sql = $sql . ' AND ' . $_POST['sort'][$i] . '>0';
    }
  }
  $toilets = mysqli_query($db, $sql);
  $array = array();
  while($rec = mysqli_fetch_assoc($toilets)){
    $array[] = $rec;
  }
  echo "<pre>";
  var_dump($array);
  echo "</pre>";
 ?>
