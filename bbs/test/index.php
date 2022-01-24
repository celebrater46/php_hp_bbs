<?php

// convert from yybbs log

$list = "list.txt";
//$txt = "";
$log = file("test.log");

//$i = 0;
foreach ($log as $line){
    $replaced = str_replace("麻呂", "永人", $line);
    $replaced = str_replace("仲川", "富士見", $replaced);
    $temp = explode("<>", $replaced);
    $txt = "comments/" . $temp[0] . ".txt";
//    error_log(
//        $temp[0] . "|" .
//        $temp[1] . "|" .
//        $temp[2] . "|" .
//        $temp[3] . "|" .
//        $temp[5] . "|" .
//        $temp[9] . "|" .
//        $temp[7] . "|" .
//        $temp[8] . "|" .
//        "192.168.1.100" . "|" .
//        "0\n", 3, $list
//    );
    error_log(
        $temp[0] . "|" .
        $temp[1] . "|" .
        $temp[2] . "|" .
        "名も無き投稿者" . "|" .
        "無題" . "|" .
        $temp[9] . "|" .
        "https://google.com/" . "|" .
        "hoge123@google.com" . "|" .
        "192.168.1.100" . "|" .
        "0\n", 3, $list
    );
//    $temp2 = str_replace("<br>", "\n", $temp[6]);
    $temp2 = str_replace("<br>", "\n", get_sample_text($temp[0]));
    error_log($temp2, 3, $txt);
//    $i++;
}

$remade = file("list.txt");

function get_sample_text($id){
    $array = [];
    for($i = 0; $i < 50; $i++){
        array_push($array, $id . " 番目の投稿です。");
    }
    return implode($array);
}

//show_list();
//
//function show_list(){
//    $temp = file("list.txt");
//    foreach ($temp as $line){
//        echo $line . PHP_EOL;
//    }
//}

// 2|1|2022-01-24_00:00:00|1255394956|名も無き者|テスト投稿|わははははははははは|yjLxrzJFriH9s|http://enin-world.sakura.ne.jp/|skmt.3b.kzm.knpch@gmail.com|192.168.1.100|0
// $id|$reply|$date|$date_unix|$sender|$title|$text|$unique|$hp|$mail|$ip|0（改行コードによるバグ対策）

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
