<?php


class News {

    private $NEWS_ID;
    private $NEWS;
    private $COUNT;
    private $SUM;




    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }


}