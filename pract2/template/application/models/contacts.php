<?
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    $errorParam = 0;
    if (isset($name) && isset($email)&&isset($request))
    {
        if (!$errors)
        {
            $sql =  "INSERT INTO feedback (name, email, tel, request)
                    VALUES('".$name."', '".$email."', '".$phone."','".$request."')";
            $sendData = $pdo-> query($sql); 
            if($sendData)
            {
                $_SESSION['subFlag'] = false;
            }  
        }
    }
    $title = "Контакты";
    $breadCrumbs = array("index.php" => "Главная", "" => $title );
    $items = menu("catalog.php", $ctgs); 
    include ("application/views/contacts.php");
?>