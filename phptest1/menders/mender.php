<?php

// XSS対策
function str2html(string $string): string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// DB接続
function db_open(): PDO {

    $user = 'phpuser';
    $password = '1234haku';

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];

    try {
        $dbh = new PDO(
            'mysql:host=localhost;dbname=sample_db;charset=utf8',
            $user,
            $password,
            $opt
        );

        return $dbh;

    } catch (PDOException $e) {
        exit('DB接続エラー: ' . $e->getMessage());
    }
}