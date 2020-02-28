<?php


class User {

    private $User_ID;
    private $Name;
    private $Email;
    private $Password;
    




    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }





}