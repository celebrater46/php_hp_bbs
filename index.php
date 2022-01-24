<?php

require_once "bbs/Comment.php";

$title = "PHP HP BBS";

$list = file("bbs/list.txt");
$comments = get_comments($list);
$comments = array_reverse($comments);

function get_comments($list){
    $array = [];
    foreach ($list as $line){
//        $temp = explode("|", $line);
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
        <p>作品の感想、アプリやゲームのバグ報告等あったらください。</p>
        <p>当サイトに関係のない書き込みは IP ごとブロックします。</p>
        <?php foreach ($comments as $comment) : ?>
            <div class="comment">
                <hr>
                <p>
                    <?php echo $comment->id; ?>:
                    <span class="name"><?php echo $comment->sender; ?></span>
                    <?php echo $comment->date_string; ?>
                    ID:<?php echo $comment->unique; ?>
                    [返信]
                </p>
<!--                <h2>--><?php //echo $comment->title; ?><!--</h2>-->
                <div class="text">
                    <?php if($comment->reply !== 0 && $comment->reply !== "") : ?>
                        <p>&gt;&gt; <?php echo $comment->reply; ?></p>
                        <p>　</p>
                    <?php endif; ?>
                    <?php foreach ($comment->text as $line) : ?>
                        <p><?php echo $line; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

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
