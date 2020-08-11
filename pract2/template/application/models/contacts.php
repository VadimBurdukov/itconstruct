<?
    //include ("includes/lib.php");
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $errorParam = 0;
    if (isset($name) && isset($email)&&isset($request))
    {
        if(!isset($phone))
            $phone = '-';
        if ( $errors=='')
        {
            $sql =  "INSERT INTO feedback (name, email, tel, request)
                    VALUES('".$name."', '".$email."', '".$phone."','".$request."')";
            $pdo-> query($sql); 
            $_SESSION['subFlag'] = trUe;
            $name = '';
            $email = '';
            $phone = '';
            $request = '';
            /* ЗДЕСЬ НУЖНО БУДЕТ ПОМЕНЯТЬ НА ПОСТ !!!!! */
        }
    }
    $title = "Контакты";
    $breadCrumbs = array("index.php" => "Главная", "" => $title );
    $items = menu("catalog.php", $ctgs); 
    include ("application/views/contacts.php");
?>