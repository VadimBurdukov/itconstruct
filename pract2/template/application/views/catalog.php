
<?
    getheader();
    global $curPage;
    global $products;
    global $maxPage;
?>
    <main class="inside-content">
        <h1 class="invisible">Каталог товаров</h1>
        <nav class="bread-crumbs-container">
            <ul class="bread-crumbs">
                <li class="bread-crumb"><a class="bread-crumb__link" href="index.html">Главная</a></li>
                <li class="bread-crumb bread-crumb_current">Каталог</li>
            </ul>
        </nav>

        <form class="search-filter" id="catalog-page__search-filter-1" action="catalog.php" method="POST">
            <span class="search-filter__item">
                <label class="search-filter__label" for="cost-from">Цена</label>
                <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from" placeholder="от">
            </span>
            <span class="search-filter__item">
                <label class="search-filter__label" for="cost-to">—</label>
                <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до">
            </span>
            <input class="form-submit search-filter__apply" type="submit" value="Применить">
            <input class="form-submit search-filter__apply reset__button" type="button" value="Сбросить">
        </form>
        <ul class="categories categories__reposition">
            <? 
                foreach ($products as $product) 
                {
                    if ($product['img'] == NULL)
                        $product['img'] = "layout/img/category-none.jpg" 
            ?>
                    <li class="category good-piece">
                        <a class="category__link" href="product.html">
                            <img class="category__image good__image" src="<?=$product['img']?>" alt="category-image-1">
                            <span class="category__name-container good_name"><span class="category__name-inner"><?=$product['name']?></span></span>
                        </a>
                        <span class="good-price good_price"><?=$product['price']." "?><small class="good-price__currency">руб.</small></span>
                    </li>
            <?  
                    }                 
            ?>
        </ul>
        <ul class="paginator catalog-page__paginator">
            <?                
                for ($i = 1; $i <=$maxPage; $i++) 
                {  
                    if ($i == $curPage) 
                    {
                        ?>
                            <li class="paginator__elem paginator__elem_current"><span class="paginator__link"><?=$i?></span></li>
                        <?
                    }
                    else
                    {
                        ?>
                            <li class="paginator__elem"><a href="catalog.php?page=<?=$i;?>" class="paginator__link"><?=$i;?></a></li>
                        <?
                    }
                }
                if ($curPage != $maxPage) 
                {
                    /*
                    var_dump($curPage);
                    var_dump($maxPage);*/
                    ?>
                        <li class="paginator__elem paginator__elem_next"><a href="catalog.php?page=<?=$curPage+1;?>" class="paginator__link">Следующая страница</a></li>
                    <?
                }  
            ?>         
        </ul>
    </main>
</div>
<?

    getfooter();
?>