<?php
    if (isset( $_GET['page']) )
    {
        if( (int)$_GET['page'] > 0)
        {
            $curPage = (int)$_GET['page'];
            var_dump($curPage);
        }
            
        else
        {  
            http_response_code(404);
            header("Location: 404.php");
            exit();
        }   
    }
    else
    {
        $curPage = 1;
    }       
    if (isset( $_GET['cost-from'])&& ($_GET['cost-from'] >=0 ))
    {
        $startPrice = (float)$_GET['cost-from'];
        $outputFilt['cost-from'] = $startPrice;
    }
    else 
    {
        $startPrice = 0;
    }
    if ( isset( $_GET['cost-to'])&& ($_GET['cost-to']  >=0 ))
    {
        $finalPrice = (float)$_GET['cost-to'];
        $outputFilt['cost-to'] = $finalPrice;
    }
    else 
    {
        $finalPrice = 0;
    }
    if (isset( $_GET['catId']))
    {
        if( (int)$_GET['catId'] > 0)
            $catId = (int)$_GET['catId'];
        else
        {
            http_response_code(404);
            header("Location: 404.php");
            exit();
        }     
    }
    else 
    {
        $catId = 0;
    }
    include("application/models/catalog.php");
?>