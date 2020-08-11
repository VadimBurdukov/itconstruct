<?
    include ("includes/lib.php");
    if (isset( $_GET['id']) && (int)$_GET['id']>0 )
    {
        $id = (int)$_GET['id'];
    }
    else 
    {
        error();
    }      
    $catId = 0;   
    if (isset( $_GET['catIdProd']))
    {
        if((int)$_GET['catIdProd']>0)
            $catId = (int)$_GET['catIdProd'];
        else 
        {
           error();
        }        
    }
    include("application/models/product.php");
?>