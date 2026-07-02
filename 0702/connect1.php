<?php
require_once './functions.php';
try{
    //functions.phpの関数を実行
    $dbh = db_open();
//sql文を作った
$sql = 'SELECT title,author FROM books';
//sql文を実行した->返り値は$staementに入った
$statement = $dbh -> query($sql);

//while(ここがtuleのとき)ずっとループ
while ($row = $statement->fetch()){
    echo "書籍:" .str2html($row[0]) . "<br>";
    echo "書籍名:" .str2html($row[1]) . "<br><br>";
}

var_dump($statement);

}catch(PDOException $e){
    echo "エラー! :". str2html($e->getMessage()). "<br>";
    exit;
}
