<?php
$url = "http://tpu-wc-book.sakura.ne.jp/toilets_information.json";
//ファイルの内容を読み込み
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//連想配列にする
$arr = json_decode($json,true);

$locate = $_POST["building"];
if(empty($_POST["floor"])){
  $floor = 1;
}else{
  $floor = $_POST["floor"];
}
if(isset($_POST["gender"]) && !empty($_POST["gender"])){
  $gender = array(
    "0" => $_POST["gender"]
  );
}else{
  $gender = array(
    "0" => "male",
    "1" => "female",
    "2" => "multipurpose");
}
// echo $gender;
if(isset($_POST["style"]) && !empty($_POST["style"])){
  $judge = false;
  $style = $_POST["style"];
}else{
  $judge = true;
  $style = 0;
}
//お探しのトイレ一回だけ表示するため
$get_toilet = true;
// フロアの名前、階、性別
function floor_name($locate,$floor,$gender,$arr,$j){
  if($gender[$j] == "male"){
    $gender[$j] = "男性トイレ";
  }elseif($gender[$j] == "female"){
    $gender[$j] = "女性トイレ";
  }else{
    $gender[$j] = "多目的トイレ";
  }
  return $arr[$locate]["section"]." ".$floor."F"." ".$gender[$j];
}
//トイレの写真
function toilet_photo($locate,$floor,$gender,$arr,$i,$j){
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["toilet_photo"];
}
//和式
function japanese_style($locate,$floor,$gender,$arr,$i,$j){
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["japanese_style"]."個";
}
//洋式
function western_style($locate,$floor,$gender,$arr,$i,$j){
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["western_style"]."個";
}
//小便
function piss($locate,$floor,$gender,$arr,$i,$j){
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["piss"]."個";
}
//ウォシュレット
function washlet($locate,$floor,$gender,$arr,$i,$j){
  if(!empty($arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["washlet"])){
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["washlet"] = "あり";
  }else{
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["washlet"] = "なし";
  }
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["washlet"];
}
//あたたかい
function warm($locate,$floor,$gender,$arr,$i,$j){
  if(!empty($arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["warm"])){
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["warm"] = "あり";
  }else{
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["warm"] = "なし";
  }
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["warm"];
}
//おとひめ
function otohime($locate,$floor,$gender,$arr,$i,$j){
  if(!empty($arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["otohime"])){
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["otohime"] = "あり";
  }else{
    $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["otohime"] = "なし";
  }
  return $arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0]["otohime"];
}
 ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ToiletBooks | トイレ検索アプリケーション</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/detail.css">
  </head>
  <body>
    <div class="back_to_top_page">
      <bottun onclick="history.back()"><img src="./assets/img/material/ic/arrow_back.png" alt="トップへ戻る" title="トップへ戻る"></a>
    </div>
    <div class="contents">
      <!-- schoolmap -->
      <div class="floor_photo">
        <img class="school_map" src="./assets/img/image/school_map.PNG" alt="map">
      </div>
      <div class="title">
        <h3><img src="./assets/img/material/ic/information.png" alt="">INFORMATION</h3>
      </div>

      <!-- 棟と階があるかの確認 -->
      <?php if(isset($arr[$locate]) && isset($arr[$locate]["floor"][$floor])): ?>
        <!-- jsonファイルにある性別の数だけ回す -->
        <?php for($i=0;$i<count($arr[$locate]["floor"][$floor]);$i++): ?>
          <!-- 選択した性別分だけ回す -->
          <?php for($j=0;$j<count($gender);$j++): ?>
            <!-- jsonに選択した性別があるかの確認 -->
            <!-- 性別選択したとき -->
            <?php if(key($arr[$locate]["floor"][$floor][$i+1]) == $gender[$j]): ?>
              <?php for($k=0;$k<count($style);$k++) :?>
                <?php if(!empty($arr[$locate]["floor"][$floor][$i+1][$gender[$j]]["style"][0][$style[$k]])): ?>
                  <div class="floor_title">
                    <h1><?php echo floor_name($locate,$floor,$gender,$arr,$j); ?></h1>
                  </div>
                  <!-- トイレ入口の写真 -->
                  <div class="info_image">
                    <img class="school_map" src=<?php echo toilet_photo($locate,$floor,$gender,$arr,$i,$j); ?> alt="map">
                  </div>
                  <div class="information">
                    <div class="info">
                      <!-- 和式 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>和式</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo japanese_style($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- 洋式 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>洋式</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo western_style($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- 小便の個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>小便</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo piss($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- ウォシュレットの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>ウォシュレット</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo washlet($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- あたたかいの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>あたたかい</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo warm($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- おとひめの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>おとひめ</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo otohime($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php $get_toilet = false; ?>
                <?php elseif($judge): ?>
                  <div class="floor_title">
                    <h1><?php echo floor_name($locate,$floor,$gender,$arr,$j); ?></h1>
                  </div>
                  <div class="info_image">
                    <img class="school_map" src=<?php echo toilet_photo($locate,$floor,$gender,$arr,$i,$j); ?> alt="map">
                  </div>
                  <div class="information">
                    <div class="info">
                      <!-- 和式の個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>和式</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo japanese_style($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- 洋式の個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>洋式</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo western_style($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- 小便の個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>小便</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo piss($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- ウォシュレットの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>ウォシュレット</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo washlet($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- あたたかいの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>あたたかい</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo warm($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                      <!-- おとひめの個数 -->
                      <div class="info_content">
                        <div class="info_item">
                          <h1>おとひめ</h1>
                        </div>
                        <div class="info_number">
                          <h1><?php echo otohime($locate,$floor,$gender,$arr,$i,$j); ?></h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $get_toilet = false; ?>
                <?php endif; ?>
              <?php endfor; ?>
            <?php elseif(key($arr[$locate]["floor"][$floor][$i+1]) != $gender[$j]): ?>
            <?php endif; ?>
          <?php endfor; ?>
        <?php endfor; ?>
        <!-- 一度も情報が表示されなかったとき -->
        <?php if($get_toilet): ?>
          <h2>お探しのトイレはありません</h2>
        <?php endif; ?>
      <?php endif; ?>

      <!-- 棟と階のないもの-->
      <?php if(empty($arr[$locate]) || empty($arr[$locate]["floor"][$floor])): ?>
        <h2>お探しのトイレはありません</h2>
      <?php endif; ?>
    </div>
    <div class="footer">
      <small>Copyright &copy; CCM(Core Creative Manager) - Toyama Prefectural University.All right reserved.</small>
    </div>
  </body>
</html>
