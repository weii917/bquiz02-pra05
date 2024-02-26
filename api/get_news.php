<?php
include_once "db.php";
$rows = $News->find(['id' => $_GET['id']]);

echo "<span style='font-weight:bolder'>{$rows['title']}</span>";
echo "<br>";
echo nl2br($rows['text']);