<?
    if (isset( $_GET['id']) && (int)$_GET['id']>0)
    {
        $id = (int)$_GET['id'];
        include("application/models/news-detail.php"); 
    }
    else
    {
        http_response_code(404);
        header("Location: 404.php");
        exit();
    }
       
?>