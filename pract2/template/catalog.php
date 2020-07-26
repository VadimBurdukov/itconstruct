
<?php

    if (isset( $_GET['page']))
    {
        $page = (int)$_GET['page'];
    }
    else 
        $page = 1;
    include("application/models/catalog.php");
?>