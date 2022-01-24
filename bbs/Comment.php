<?php

class Comment
{
    public $id;
    public $reply; // ID 何番への返信か
    public $date; // 2022-01-24_00:00:00
    public $date_unix; // unix time stamp
    public $sender; // 投稿者名
    public $title;
    public $text; // コメント内容
    public $hp; // 投稿者のホームページの URL
    public $mail; // 投稿者のメールアドレス
    public $unique; // 2ch とかのなりすまし対策のトリップ
    public $ip; // 投稿者の IP アドレス


//    function __construct($id, $reply, $date, $title, $sender){
    function __construct($line){
        // 2|1|2022-01-24_00:00:00|1255394956|名も無き者|テスト投稿|わははははははははは|http://enin-world.sakura.ne.jp/|skmt.3b.kzm.knpch@gmail.com|yjLxrzJFriH9s|192.168.1.100|0
        // $id|$reply|$date|$date_unix|$sender|$title|$text|$hp|$mail|$unique|$ip|0（改行コードによるバグ対策）
        $list_data = explode("|", $line);
        if(file_exists($list_data[0] . ".txt")){
            $this->id = (int)$list_data[0];
            $this->reply = (int)$list_data[1];
            $this->date = $list_data[2];
            $this->sender = $list_data[3];
            $this->trip = $list_data[4];
            $this->title = $list_data[5];
            $this->text = file($list_data[0] . ".txt");
        } else {
            $this->id = null;
            $this->reply = null;
            $this->date = null;
            $this->title = $list_data[0] . ".txt が存在しないか、読み込めません。";
            $this->text = [$list_data[0] . ".txt が存在しないか、読み込めません。"];
        }
//        if(file_exists($id . ".txt")){
//            $this->id = $id;
//            $this->reply = $reply;
//            $this->date = $date;
//            $this->title = $title;
//            $this->sender = $sender;
//            $this->text = file($id . ".txt");
//        } else {
//            $this->id = null;
//            $this->reply = null;
//            $this->date = null;
//            $this->title = $id . ".txt が存在しないか、読み込めません。";
//            $this->text = [$id . ".txt が存在しないか、読み込めません。"];
//        }
    }
}