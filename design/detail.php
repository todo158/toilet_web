<?php
include('dbconnect.php');
//if(!empty($_GET['id'])&& isset($_GET['id'])) {
  $sql = sprintf('SELECT * FROM `toilets`,`floors`WHERE floors.locate_id =
    toilets.locate_id AND toilets.locate_id = 1 '/*$_GET['id']*/);
  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  while($table =mysqli_fetch_assoc($record)){
    $datas[] = $table;
  }
  $count = count($datas);
//}
  echo "<pre>";
  print_r($datas);
  echo "</pre>";
//}else{
  //header('locate: index.php');
  //exit();
//}

 ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ToiletBox | トイレ検索アプリケーション</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/detail.css">
  </head>
  <body>
    <a class="batu" href="index.html"><img src="../assets/img/material/ic/cansel.png" alt="" ></a>
    <div class="honbuto">
      <ul>
        <?php

for($i = 1; $i <=$datas[0]['floor'] ; $i++):
 ?>
          <p><a href="show.php?id=<?php echo $i;
             ?>"><?php echo $i;?>F</a></p>

          <?php
endfor;
?>
      </ul>
      <div class="map_top">
        <img class="school_map" src="../assets/img/image/school_map.PNG" alt="map">
      </div>

    </div>
    <div class="info">
      <h2>INFORMATION</h2>
      <img class="school_map" src="../assets/img/image/info.PNG" alt="map">
      <table>
      <tr>
        <th>和式</th> <td><?php echo $datas[0]['wa']; ?></td>
      </tr>
      <tr>
        <th>洋式</th> <td><?php echo $datas[0]['yo']; ?></td>
      </tr>
      <tr>
        <th>小べん</th> <td><?php echo $datas[0]['syo']; ?></td>
      </tr>
      <tr>
        <th>あたたかい</th> <td><?php echo $datas[0]['warm']; ?></td>
      </tr>
      <tr>
        <th>おとひめ</th> <td><?php echo $datas[0]['music']; ?></td>
      </tr>
      <tr>
        <th>ウォシュレット</th> <td><?php echo $datas[0]['wash']; ?></td>
      </tr>
      </table>
    </div>
  </body>
</html>
