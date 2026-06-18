<?php

require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
include __DIR__. '/inc/error_check.php';

try{
# connect1.php
//返り値を持ったfunctions.php
    $dbh = db_open();
//sql文を作った
$sql = "INSERT INTO books(id,title,isbn,price,publish,author)
VALUES (NULL, :title ,:isbn, :price, :publish,:author)";
//sql文を実行した->返り値は$staementに入った
$stmt = $dbh->prepare($sql);

//整数型に変換している。なぜ？　-> formから取得する値は、すべて文字列型
 $price = (int) $_POST['price'];
 // bindParam() メソッドを使って、プレースホルダに値をバインドします。
$price = (int)$_POST['price'];
$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
//ここだけ変換した変数を取得している。
$stmt->bindParam(':price', $price, PDO::PARAM_INT);
$stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
$stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);

$stmt -> execute();
echo "データが格納されました。";
echo '<a href="index.php">リストに戻る</a>';
var_dump($stmt);

}catch(PDOException $e){
    echo "エラー! :". str2html($e->getMessage()). "<br>";
    exit;
}

 include __DIR__ . '/inc/footer.php';