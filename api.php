<?php
//　参考サイト：https://qiita.com/fantm21/items/603cbabf2e78cb08133e
$url = "http://localhost/toilet_web/toilets.json";
//ファイルの内容を読み込み
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
//連想配列にする
$arr = json_decode($json,true);
//トイレ情報だけ習取得する
echo "<pre>";
var_dump($arr["else"]["1"]["section"]);
var_dump($arr["else"]["1"]["floor"]["1"]["1"]["male"]["style"]);
echo "</pre>";


 ?>
