<?php
require_once "../functions.php";

$fp = fopen("songs.csv", "r");

if ($fp === false) {
    echo "ファイルのオープンに失敗しました";
    exit;
}

// formから検索ワード取得
$keyword = $_POST["keyword"];

$found = false;

while ($row = fgetcsv($fp)) {

    $line = implode(",", $row);

    if (strpos($line, $keyword) !== false) {

        $found = true;

        echo "曲名: " . $row[0] . "<br>";
        echo "アーティスト名: " . $row[1] . "<br>";
        echo "ジャンル: " . $row[2] . "<br>";
        echo "リリース年: " . $row[3] . "<br>";
        echo "メモ: " . $row[4] . "<br>";
        echo "<hr>";
    }
}

if(!$found){
    echo "検索結果が見つかりませんでした";
}

fclose($fp);
?>