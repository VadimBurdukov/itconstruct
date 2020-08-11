<?
    if (isset( $_GET['id']) && (int)$_GET['id']>0 )
    {
        $id = (int)$_GET['id'];
    }
        else 
        {
            require("404.php");
        }         
    if (isset( $_GET['catIdProd']))
    {
        if((int)$_GET['catIdProd']>0)
            $catId = (int)$_GET['catIdProd'];
        else 
        {
            require("404.php");
        }        
    }
    include("application/models/product.php");
?>