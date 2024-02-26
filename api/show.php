<?php
include_once "db.php";

$res = $Que->find($_POST['id']);
$res['sh'] = ($res['sh'] == 1) ? 0 : 1;
// $res = $Que->find($_POST['id']);
// $res['sh'] = ($res['sh'] + 1) % 2;
$Que->save($res);