<?
    require("application/views/includes/template_header.php");

?>
    <h1 class="invisible">Company - Электронные сигареты</h1>
    <?if(count ($ctgs) != NULL):?>
        <ul class="categories">
            <?foreach ($ctgs as $cat):
                if (!$cat['img'])
                    $cat['img'] = "layout/img/category-none.jpg" ?>
                <li class="category">
                    <a class="category__link" href="catalog.php?catId=<?=$cat['id']?>">
                        <img class="category__image" src="<?=$cat['img']?>" alt="category-image-<?=$cat['id']?>">
                        <span class="category__name-container"><span class="category__name-inner"><?=$cat['name']?></span></span>
                    </a>
                </li>
            <? endforeach ?>
        </ul>
    <?endif;
    require("application/views/includes/template_footer.php");
?>