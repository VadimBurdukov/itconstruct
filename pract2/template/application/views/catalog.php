
<?
    require("application/views/includes/template_header.php");

?>

    <h1 class="invisible">Каталог товаров</h1>
    <nav class="bread-crumbs-container">
        <ul class="bread-crumbs">
            <?foreach ($breadCrumbs as $href => $b):
                if($href!=""):?>
                    <li class="bread-crumb"><a class="bread-crumb__link" href="<?=$href?>"><?=$b?></a></li>   
                <?else:?>
                    <li class="bread-crumb bread-crumb_current"><?=$b?></li>
                <?endif;?>
            <?endforeach;?>
        </ul>
    </nav>

    <form class="search-filter" id="catalog-page__search-filter-1" action="catalog.php" method="GET">
        <span class="search-filter__item">
            <label class="search-filter__label" for="cost-from">Цена</label>
            <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from" placeholder="от">
        </span>
        <span class="search-filter__item">
            <label class="search-filter__label" for="cost-to">—</label>
            <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до">
        </span>
        
        <?foreach ($output as $o =>$value):
            if ($o == "catId"): ?>
                <input type="hidden" name=<?=$o?> value=<?=$value?>>
            <?endif;?>
        <? endforeach?>
            
        <input class="form-submit search-filter__apply" type="submit" value="Применить">
        <input class="form-submit search-filter__drop" type="button" value="Сбросить фильтры">
    </form>
    <ul class="categories categories__reposition">
        <?  foreach ($products as $product):
                $prodParam = array();
                if (isset($catId))
                    $prodParam+=['catIdProd' => $catId];
                $prodParam+=['id' => $product['id']];
                $prodParamString = http_build_query($prodParam);
                if (!$product['img'])
                    $product['img'] = "layout/img/category-none.jpg" ?>
                <li class="category good-piece">
                    <a class="category__link" href="product.php?<?=$prodParamString?>">
                        <img class="category__image good__image" src="<?=$product['img']?>" alt="category-image-1">
                        <span class="category__name-container good_name"><span class="category__name-inner"><?=$product['name']?></span></span>
                    </a>
                    <span class="good-price good_price"><?=$product['price']." "?><small class="good-price__currency">руб.</small></span>
                </li>
        <?  endforeach  ?>
    </ul>
    <ul class="paginator catalog-page__paginator">
        <? for ($i = 1; $i <=$maxPage; $i++) 
        {  
            if ($i == $curPage): ?>
                    <li class="paginator__elem paginator__elem_current">
                        <span class="paginator__link">
                            <?=$i?>
                        </span>
                    </li>
            <? else: ?>
                <li class="paginator__elem">
                    <?
                            $output['page'] = $i;
                            $paramString = http_build_query($output);
                    ?>
                    <a href="catalog.php?<?=$paramString?>" class="paginator__link">  
                        <?=$i;?>
                    </a>
                </li>
            <? endif;
        }
        if ($curPage != $maxPage):
            $output['page'] = $curPage+1;
            $paramString = http_build_query($output); ?>
                <li class="paginator__elem paginator__elem_next">
                    <a href="catalog.php?<?=$paramString?>" class="paginator__link">
                        Следующая страница
                    </a>
                </li>
        <? endif; ?>         
    </ul>
</main>
<?
    require("application/views/includes/template_footer.php");
?>