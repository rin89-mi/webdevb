<?php
$zip1 = $_POST['zip1'] ?? '';
$zip2 = $_POST['zip2'] ?? '';

$zip = $zip1 . '-' . $zip2;

if (preg_match('/^\d{3}-\d{4}$/', $zip)) {
    echo "正しい郵便番号です。:" . $zip;
}else{
    echo "郵便番号が正しくありません";
}