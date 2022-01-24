<?php

// convert from yybbs log

$list = "list.txt";
//$txt = "";
$log = file("test.log");

foreach ($log as $line){
    $replaced = str_replace("麻呂", "永人", $line);
    $replaced = str_replace("仲川", "富士見", $replaced);
    $temp = explode("<>", $replaced);
    $txt = "comments/" . $temp[0] . ".txt";
    error_log(
        $temp[0] . "|" .
        $temp[1] . "|" .
        $temp[2] . "|" .
        $temp[3] . "|" .
        $temp[5] . "|" .
        $temp[7] . "|" .
        $temp[9] . "|" .
        $temp[8] . "|" .
        "192.168.1.100" . "|" .
        "0\n", 3, $list
    );
    $temp2 = str_replace("<br>", "\n", $temp[6]);
    error_log($temp2, 3, $txt);
}

$remade = file("list.txt");

//show_list();
//
//function show_list(){
//    $temp = file("list.txt");
//    foreach ($temp as $line){
//        echo $line . PHP_EOL;
//    }
//}

// 2|1|2022-01-24_00:00:00|1255394956|名も無き者|テスト投稿|わははははははははは|http://enin-world.sakura.ne.jp/|skmt.3b.kzm.knpch@gmail.com|yjLxrzJFriH9s|192.168.1.100|0
// $id|$reply|$date|$date_unix|$sender|$title|$text|$hp|$mail|$unique|$ip|0（改行コードによるバグ対策）

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Convert from YYBBS to PHP HP BBS</title>
</head>
<body>
<h1>Test Convert from YYBBS to PHP HP BBS</h1>
<p>Hello World.</p>

<?php foreach ($remade as $line) : ?>
    <p><?php echo $line; ?></p>
<?php endforeach; ?>

</body>
</html>
