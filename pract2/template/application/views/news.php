<?
    getheader();
?>  
<main class="inside-content">
    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.html">Главная</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.html">Каталог</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="#">Электронные сигареты</a></li>
            <li class="bread-crumb bread-crumb_current">Электронная сигарета «Такая-то»</li>
        </ul>
    </nav>
    <section class="product">
        <?
            global $news;
            foreach ($news as $n) 
            {?>
                <li class="news-item">
                    <a class="news-item__link" href="news-detail.php?id=<?=$n['id'];?>">
                        <?=$n['announcement'];?>
                    </a>
                    <span class="news-item__date"><?=$n['date'];?></span>
                </li>
            <? 
            } 
        ?>
    </section>
</main>
<?
    getfooter();
?>