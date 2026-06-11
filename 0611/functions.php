<?php
// XSS対策の関数
function str2html(string $string){
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

//db_open (まだ、ローカル関数)
function db_open(){
    # connect1.php
$user = 'phpuser';
$password = '1234haku';
$opt = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_EMULATE_PREPARES => false,
  PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
];

$dbh = new PDO('mysql:host=localhost;dbname=sample_db;charset=utf8', $user, $password, $opt);
return $dbh;
}