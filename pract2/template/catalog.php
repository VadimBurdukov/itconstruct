
<?php

    $paramString = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    
    parse_str($paramString, $output);
    if (isset( $output['page']) )
    {
       
        if( (int)$output['page'] > 0)
            $curPage = (int)$output['page'];
        else 
            require("404.php");
    }
   
    else
        $curPage = 1;

    if (isset( $output['cost-from'])&& ($output['cost-from'] >=0 ))
    {
        $startPrice = (float)$output['cost-from'];
    }
    if ( isset( $output['cost-to'])&& ($output['cost-to']  >=0 ))
    {
        
        $finalPrice = (float)$output['cost-to'];
    }
    if (isset( $output['catId']))
    {
        if( (int)$output['catId'] > 0)
            $catId = (int)$output['catId'];
        else 
            require("404.php");
    }
    
    include("application/models/catalog.php");
    
?>