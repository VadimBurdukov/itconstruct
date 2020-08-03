<?
    $paramString = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    parse_str($paramString, $output);

    if (isset( $output['id']))
    {
        if((int)$output['id'])
            $id = (int)$output['id'];
        else 
            require("404.php");
    }
    if (isset( $output['catIdProd']))
    {
        if((int)$output['catIdProd'])
            $catId = (int)$output['catIdProd'];
        else 
            require("404.php");
    }
    
    include("application/models/product.php");
?>