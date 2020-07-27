
<?php
    
    
    session_start();
    
    if (isset( $_GET['page']))
    {
        $curPage = (int)$_GET['page'];
    }

    else 
        $curPage = 1;

    if (isset( $_GET['cost-from']) && isset( $_GET['cost-to']))
    {
       // $startPrice = $_POST['cost-from'];
        //$finalPrice = $_POST['cost-to'];
        $_SESSION['startPrice'] = $_GET['cost-from'];
        $_SESSION['finalPrice'] = $_GET['cost-to'];
        
    }
    
    include("application/models/catalog.php");
    
?>