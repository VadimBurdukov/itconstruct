<?
    session_start();
    if (isset($_POST['feedback-author']) && (isset($_POST['email']))&& (isset($_POST['feedback-text'])))
    {
        $_SESSION['author'] = $_POST['feedback-author'];
        $_SESSION['email'] = $_POST['feedback-author'];
        $_SESSION['text'] = $_POST['feedback-author'];
        if (isset($_POST['phone']))
        {
            $_SESSION['phone'] = $_POST['phone'];
        }
        
    }
    
    include("application/models/contacts.php");
?>
