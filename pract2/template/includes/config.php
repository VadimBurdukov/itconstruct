<?php

    
    /*==============================DB CONNECTION======================================*/
    /*----------------------------Connection consts------------------------------------*/

    const host = '127.0.0.1';
    const db   = 'cig_store';
    const user = 'root';
    const pass = '';
    const charset = 'utf8';
    
    /*===============================CAT PAGE=====================================*/
    const prodPerPage = 1;
    const newsPerPage = 2;

    /*===============================MAIN PAGE=====================================*/
    $topMenuItems = array("index.php"=>array("items"=>array(),"name"=>"Главная"),
                          "catalog.php"=>array("items"=>array(),"name"=>"Каталог"),
                          "about.php" => array("items"=>array(),"name"=>"О компании"),
                          "news.php" => array("items"=>array(),"name"=>"Новости"), 
                          "paydelivery.php" => array("items"=>array(),"name"=>"Доставка и оплата"),
                          "contacts.php" => array("items"=>array(),"name"=>"Контакты" ));    
?>