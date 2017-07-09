<?php
//ファイルを読み込み
   function executeQuery($sql){
    $url = "localhost";
    $user = "root";
    $pass = "";
    $db = "toilet";

    // MySQLへ接続する
    $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

    // データベースを選択する
    $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
    mysql_set_charset('utf8');
    // クエリを送信する
    $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

    // MySQLへの接続を閉じる
    mysql_close($link) or die("MySQL切断に失敗しました。");

    //戻り値
    return($result);
  }

$sort = $_POST["sort"];

  //抽出条件を組み立てる
  $array = explode($sort);
  $cnt = count($array);
  $where = "WHERE ";

  for($i=0; $i < $cnt; $i++){
    $where.= "PREF_NAME LIKE '%".$array[$i]."%'";
  }

  // クエリを送信する
  $sql = "SELECT * FROM floors ".$where;
  $sql .= " ORDER BY PREF_CD";
  $result = executeQuery($sql);
  print $sql;
  //結果セットの行数を取得する
  $rows = mysql_num_rows($result);

  //表示するデータを作成
  if($rows){
    while($row = mysql_fetch_array($result)) {
      $tempHtml .= "<tr>";
      $tempHtml .= "<td>".$row["PREF_CD"]."</td><td>".$row["PREF_NAME"]."</td>";
      $tempHtml .= "</tr>\n";
    }
    $msg = $rows."件のデータがあります。";
  }else{
    $msg = "データがありません。";
  }

  //結果保持用メモリを開放する
  mysql_free_result($result);
?>
