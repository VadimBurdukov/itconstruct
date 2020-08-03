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
    /*----------------------------DB CONNECTION------------------------------------*/
    const topMenuItems = array("index.php"=>"Главная","catalog.php"=>array("items"=>"","name"=>"Каталог"),"about.php" => "О компании","news.php" => "Новости", 
                                "paydelivery.php" => "Доставка и оплата","contacts.php" => "Контакты" );    
?>