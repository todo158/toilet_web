<?php
$db = mysqli_connect('localhost','root','','toilet')or
die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');
//floors
$floors = mysqli_query($db, 'SELECT * FROM floors');
$floors_deta = mysqli_fetch_assoc($floors);
//locate
$locate = mysqli_query($db, 'SELECT * FROM locate');
$locate_deta = mysqli_fetch_assoc($locate);
//toilets
$toilets = mysqli_query($db, 'SELECT * FROM toilets');
$toilets_deta = mysqli_fetch_assoc($toilets);


?>
