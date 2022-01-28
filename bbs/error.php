<?php

$code = isset($_GET["code"]) ? (int)$_GET["code"] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Enin Fujimi">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>ERROR</title>
</head>
<body>
    <div class="containter">
        <h1>ERROR</h1>
        <?php switch ($code) : case 1 : ?>
            <p>投稿できる文字数は最大で 2000 文字までです。</p>
            <p>Cannot post a text over 2000 characters.</p>
        <?php default: ?>
            <p>不明なエラーが発生しました！</p>
            <p>Unknown error occurred!</p>
        <?php endswitch; ?>
        <p>　</p>
        <p>　</p>
        <p><a href="../index.php">- BACK -</a></p>
    </div>
</body>
</html>