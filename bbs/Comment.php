<?php

class Comment
{
    public $id;
    public $reply; // ID 何番への返信か
    public $date; // 2022-01-24_00:00:00
    public $date_unix; // unix time stamp
    public $sender; // 投稿者名
    public $title;
    public $text = []; // コメント内容
    public $unique; // 2ch とかのなりすまし対策のトリップ
    public $hp; // 投稿者のホームページの URL
    public $mail; // 投稿者のメールアドレス
    public $ip; // 投稿者の IP アドレス

//     function __construct($id, $reply, $date, $title, $sender){
    function __construct($line){
//        2|1|2007/05/25(Fri) 04:01:07|名も無き投稿者|無題|wf9NFq8ibtbks|https://google.com/|hoge123@google.com|192.168.1.100|60|0
//        $id|$reply|$date|$date_unix|$sender|$title|$text|$unique|$hp|$mail|$ip|0（改行コードによるバグ対策）
        $list_data = explode("|", $line);
        if(file_exists($list_data[0] . ".txt")){
            $this->id = (int)$list_data[0];
            $this->reply = (int)$list_data[1];
            $this->date = $list_data[2];
            $this->date_unix = $list_data[3];
            $this->sender = $list_data[4];
            $this->title = $list_data[5];
            $this->unique = $list_data[6];
            $this->hp = $list_data[7];
            $this->mail = $list_data[8];
            $this->ip = $list_data[9];
//            $this->text = file($list_data[0] . ".txt");
        } else {
            $this->id = null;
            $this->reply = null;
            $this->date = null;
            $this->date_unix = null;
            $this->sender = null;
            $this->title = $list_data[0] . ".txt が存在しないか、読み込めません。";
//            $this->text = [$list_data[0] . ".txt が存在しないか、読み込めません。"];
            $this->unique = null;
            $this->hp = null;
            $this->mail = null;
            $this->ip = null;
        }
    }

    function get_text(){
        $path = "comments/" . $this->id . ".txt";
        if(file_exists($path)){
            $this->text = file($path);
        } else {
            $this->text = [$path . "が存在しないか、読み込めません。"];
        }
    }
}