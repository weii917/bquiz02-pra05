<?php
include_once "db.php";

$row = $User->find($_POST);
if (!empty($row)) {
    echo "您的密碼為:" . $row['pw'];
} else {
    echo "查無此資料";
}