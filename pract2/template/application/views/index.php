<?

    getheader();
?>

    <main class="categories">
        <h1 class="invisible">Company - Электронные сигареты</h1>
        <ul class="categories">
            <?
                global $ctgs;
                    foreach ($ctgs as $cat) 
                    {
                        if ($cat['img'] == NULL)
                            $cat['img'] = "layout/img/category-none.jpg" 
            ?>
                        <li class="category">
                            <a class="category__link" href="#">
                                <img class="category__image" src="<?=$cat['img']?>" alt="category-image-<?=$cat['id']?>">
                                <span class="category__name-container"><span class="category__name-inner"><?=$cat['name']?></span></span>
                            </a>
                        </li>
            <?  
                    } 
            ?>
            
        </ul>
    </main>




</div>
<?
    getfooter();
?>