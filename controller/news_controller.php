<?php

require_once '../model/dbconnection.php';
require_once '../model/news.php';
require_once '../model/dataAccess.php';

$news = [];



$newsOBject = new News();

$daoObject = DAO::getInstance();

$news = $daoObject->getAllNews();




