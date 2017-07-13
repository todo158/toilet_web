<?php
$db = mysqli_connect('localhost','root','','toilet')or
die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');
//floors
$floors = mysqli_query($db, 'SELECT * FROM floors');
//locate
$locate = mysqli_query($db, 'SELECT * FROM locate');
//toilets
$toilets = mysqli_query($db, 'SELECT * FROM toilets');
//floors呼びだし
for($i = 0; $i < 20; $i++){
  $floors_deta = mysqli_fetch_assoc($floors);
}
//locate呼びだし
for($i = 0; $i < 90; $i++){
  $locate_deta = mysqli_fetch_assoc($locate);
}
//toilets呼びだし
for($i = 0; $i < 90; $i++){
  $toilets_deta = mysqli_fetch_assoc($toilets);
}

if(empty($_GET["sort"])){
     echo "何も選んでません";
}else{
     $toilet_sort = $_GET["sort"];
     $toilet = array('japan' => '和式', 'foreign' => '洋式', 'warm' => 'あたたかい', 'song' => 'おとひめ', 'wash' => 'ウォシュレット');
     for($i=0;$i<count($toilet_sort);$i++){
          $check_toilet[$toilet_sort[$i]]="checked";
     }
     error_reporting(0);
     foreach($toilet_sort as $value){
           $select_toilet .= $toilet[$value]."、";
         }
         $toilet_list=rtrim($select_toilet, "、");
      echo $toilet_list."を選びました。";
}
?>
