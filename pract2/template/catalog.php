
<?php
    if (isset( $_GET['page']))
    {
        $curPage = (int)$_GET['page'];
    }

        /* ПО ИДЕЕ elseif, а на else выход на 404, добавлю позже  */

    else 
        $curPage = 1;

    if (isset( $_POST['cost-from']) && isset( $_POST['cost-to']))
    {
        $startPrice = $_POST['cost-from'];
        $finalPrice = $_POST['cost-to'];
    }

    include("application/models/catalog.php");
?>