<?
    include ("includes/lib.php");
    session_start();
    $errors='';
    $_SESSION['subFlag'] = false;
    if (isset($_POST['feedback-author']))
    {
        $name = $_POST['feedback-author'];
        if(!$_POST['feedback-author'])
            $errors.='Поле Имя должно быть заполнено!<br>';
    }
    if (isset($_POST['email']))
    {
        $email = $_POST['email'];
        if(!$_POST['email'])
            $errors.='Поле Электронная почта должно быть заполнено!<br>';
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors.='Введите корректный адрес электронной почты!<br>';
        }
    }
    if (isset($_POST['phone'])&&($_POST['phone']))
    {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['feedback-text']))
    {
        
        $request = $_POST['feedback-text'];
        if(!$_POST['feedback-text'])
            $errors.='Поле Отзыв должно быть заполнено!<br>';
    }
    include("application/models/contacts.php");
?>
