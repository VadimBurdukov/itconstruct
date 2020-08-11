<?
    if (isset( $_GET['id']) && (int)$_GET['id']>0 )
    {
        $id = (int)$_GET['id'];
    }
        else 
        {
            http_response_code(404);
            header("Location: 404.php");
            exit();
        }         
    if (isset( $_GET['catIdProd']))
    {
        if((int)$_GET['catIdProd']>0)
            $catId = (int)$_GET['catIdProd'];
        else 
        {
            http_response_code(404);
            header("Location: 404.php");
            exit();
        }        
    }
    include("application/models/product.php");
?>