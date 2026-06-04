<?php
$str = "12345678";
$rtn = preg_match('/\d{7}/u', $str, $match);
$str = "1234567あ";
$rtn = preg_match('/\d{7}/u', $str, $match2);
$str = "111-1234567";
$rtn = preg_match('/\d{7}/u', $str, $match3);

echo "結果1<br>";
var_dump($match);
echo "<br>";
echo "結果1<br>";
var_dump($match2);
echo "<br>";
echo "結果1<br>";
var_dump($match3);
echo "<br>";
echo "<br>";
