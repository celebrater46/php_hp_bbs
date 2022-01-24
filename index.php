<?php

$title = "PHP HP BBS";

$list = file("bbs/list.txt");
$comments = get_comments($list);

function get_comments($list){
    $array = [];
    foreach ($list as $line){
        $temp = explode("|", $line);
        array_push($array, new Comment($line));
    }
    return $array;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="containter">
        <h1><?php echo $title; ?></h1>
        <p>Hello World.</p>
        <div class="comment">
            <hr>
            <p>1: <span class="name">通りすがりの名無しさん</span> 2022/1/24 15:16:34 ID:yjLxrzJFriH9s [返信]</p>
            <h2>タイトル</h2>
            <div>
                1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。1 番目の投稿です。
            </div>
        </div>
    </div>

</body>
</html>
