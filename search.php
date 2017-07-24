<?php
  require('dbconnect.php');

  $sql_toilets = "SELECT * FROM `toilets`";
  //チェックボックスの検索
  if(!empty($_POST['sort']) && isset($_POST['sort'])){
    $sql_toilets = $sql_toilets. 'WHERE ';
    $sql_toilets = $sql_toilets . $_POST['sort'][0] . '>0';
    for($i=1;$i<count($_POST['sort']);$i++){
      $sql_toilets = $sql_toilets . ' AND ' . $_POST['sort'][$i] . '>0';
    }
  }
  $toilets = mysqli_query($db, $sql_toilets);
  $array = array();
  while($rec = mysqli_fetch_assoc($toilets)){
    $array[] = $rec;
  }
  echo "<pre>";
  var_dump($array);
  echo "</pre>";
 ?>
