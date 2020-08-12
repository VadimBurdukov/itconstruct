<?
    $pdo = getDBConnection();
    $ctgs = getAllCtgrs($pdo);
    $news = getAllNews($pdo);
    
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
            else 
            {   
                $errors = 'Произошла ошибка при отправке отзыва! Пожалуйста, повторите попытку позже<br>';   
            }
        }
    }
    $title = "Контакты";
    $breadCrumbs = array("index.php" => "Главная", "" => $title );
    $items = extendMenu("catalog.php", $ctgs); 
    include ("application/views/contacts.php");
?>