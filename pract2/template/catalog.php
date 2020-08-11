
<?php
    if (isset( $_GET['page']) )
    {
        if( (int)$_GET['page'] > 0)
            $curPage = (int)$_GET['page'];
        else
        {  
            http_response_code(404);
            header("Location: http://404.php");
        }   
    }
    else
    {
        $curPage = 1;
    }       
    if (isset( $_GET['cost-from'])&& ($_GET['cost-from'] >=0 ))
    {
        $startPrice = (float)$_GET['cost-from'];
    }
    if ( isset( $_GET['cost-to'])&& ($_GET['cost-to']  >=0 ))
    {
        $finalPrice = (float)$_GET['cost-to'];
    }
    if (isset( $_GET['catId']))
    {
        if( (int)$_GET['catId'] > 0)
            $catId = (int)$_GET['catId'];
        else
        {
            http_response_code(404);
            header("Refresh:0; url=404.php");
            exit();
        }     
    }
    include("application/models/catalog.php");
?>