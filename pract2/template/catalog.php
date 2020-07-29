
<?php

    $paramString = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
   
    parse_str($paramString, $output);
    if (isset( $output['page']))
    {
        $curPage = (int)$output['page'];
    }
   
    else 
        $curPage = 1;

    if (isset( $output['cost-from']) && isset( $output['cost-to']))
    {
        $startPrice = $output['cost-from'];
        $finalPrice = $output['cost-to'];
    }

    if (isset( $output['catId']))
    {

        $catId = $output['catId'];
        
    }
     
    include("application/models/catalog.php");
    
?>