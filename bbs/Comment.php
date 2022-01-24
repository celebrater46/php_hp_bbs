<?php

class Comment
{
    public $id;
    public $reply; // ID 何番への返信か
    public $date; // 2022-01-24_00:00:00
    public $sender; // 投稿者名
    public $title;
    public $text;

//    function __construct($id, $reply, $date, $title, $sender){
    function __construct($line){
        $list_data = explode("|", $line); // 2|1|2022-01-24_00:00:00|名も無き者|テスト投稿|わははははははははは
        if(file_exists($list_data[0] . ".txt")){
            $this->id = (int)$list_data[0];
            $this->reply = (int)$list_data[1];
            $this->date = $list_data[2];
            $this->sender = $list_data[3];
            $this->title = $list_data[4];
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