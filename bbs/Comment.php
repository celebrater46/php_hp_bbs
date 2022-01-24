<?php

class Comment
{
    public $id;
    public $reply; // ID 何番への返信か
    public $date; // 2022-01-24_00:00:00
    public $date_string; // 2022-01-24_00:00:00
    public $date_unix; // unix time stamp
    public $sender; // 投稿者名
    public $title;
    public $text = []; // コメント内容
    public $cap; // 2ch とかのなりすまし対策のトリップ
    public $hp; // 投稿者のホームページの URL
    public $mail; // 投稿者のメールアドレス
    public $ip; // 投稿者の IP アドレス

    function __construct($line){
//        12|11|2007/06/13(Wed) 00:23:15|1181661795|名も無き投稿者|無題|7I7Cj53d7YIoI|https://google.com/|hoge123@google.com|192.168.1.100|53|0
//        $id|$reply|$date|$date_unix|$sender|$title|$text|$cap|$hp|$mail|$ip|0（改行コードによるバグ対策）
        $list_data = explode("|", $line);
        $this->id = (int)$list_data[0];
        $this->reply = (int)$list_data[1];
        $this->date = $list_data[2];
        $this->date_string = $list_data[2];
        $this->date_unix = $list_data[3];
        $this->sender = $list_data[4] === "" ? "名も無き投稿者" : $list_data[4];
        $this->title = $list_data[5] === "" ? "無題" : $list_data[5];
        $this->cap = $list_data[6] === "" ? "----------" : "◆" . $list_data[6];
        $this->hp = $list_data[7];
        $this->mail = $list_data[8];
        $this->ip = $list_data[9];
        $this->get_text();
    }

    function get_text(){
        $path = "bbs/comments/" . $this->id . ".txt";
        if(file_exists($path)){
            $temp = file($path);
            foreach ($temp as $line){
                if($line === "" || $line === "\r" || $line === "\n" || $line === "\r\n"){
                    array_push($this->text, "　");
                } else {
                    array_push($this->text, $line);
                }
            }
        } else {
            $this->text = [$path . "が存在しないか、読み込めません。"];
        }
    }
}