
<?php

    $query = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    parse_str($query, $output);
    
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
    
    $data = array('curPage'=>$curPage,
              'startPrice'=>$startPrice,
              'finalPrice'=>$finalPrice,
              'catId'=>$catId);

    echo http_build_query($data);
    //НУЖНО ЛИ ВСТАВЛЯТЬ ЭТО В URL, ИЛИ ДОБАВЛЯЕТСЯ АВТОМАТИЧЕСКИ?
    //ПОСЛЕ РИДЕРЕКТА ИЗ ВЬЮХИ ВСЕ ЗНАЧЕНИЯ ОБНУЛЯЮТСЯ
    

    include("application/models/catalog.php");
    
?>