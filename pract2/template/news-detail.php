<?
    include ("includes/lib.php");
    if (isset( $_GET['id']) && (int)$_GET['id']>0)
    {
        $id = (int)$_GET['id'];
        include("application/models/news-detail.php"); 
    }
    else
    {
        error();
    }
       
?>