<?php
$url = "http://localhost/toilet_web/assets/json/toilets_information.json";
//ファイルの内容を読み込み
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//連想配列にする
$arr = json_decode($json,true);
//トイレ情報だけ習取得する
echo "<pre>";
// var_dump($arr["E"]["section"]);
var_dump($arr["M"]["floor"]["1"]["male"]["style"]);
echo "</pre>";
 ?>
