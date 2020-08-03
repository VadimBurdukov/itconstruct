<?
    require("application/views/includes/template_header.php");
?>  

    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
            <li class="bread-crumb bread-crumb_current">Все новости</li>
        </ul>
    </nav>
    <section class="product">
        <? foreach ($news as $n):?>
            <li class="news-item">
                <a class="news-item__link" href="news-detail.php?id=<?=$n['id'];?>">
                    
                    <?=$n['announcement'];?>
                </a>
                <span class="news-item__date"><?=$n['date'];?></span>
            </li>
        <?  endforeach  ?>
    </section>
</main>
<?
    require("application/views/includes/template_footer.php");
?>