<?
    require("application/views/includes/template_header.php");

?>

    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <?foreach ($breadCrumbs as $b => $href):
                if($href!=""):?>
                    <li class="bread-crumb"><a class="bread-crumb__link" href="<?=$href?>"><?=$b?></a></li>   
                <?else:?>
                    <li class="bread-crumb bread-crumb_current"><?=$b?></li>
                <?endif;?>
            <?endforeach;?>
        </ul>
    </nav>
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?=$prod['name']?></h1>
        <img class="product__image" src="<?=$prod['img']?>" alt="Упс! Здесь было фото, но теперь его нет :(">
        <span class="good-price good_price product__info-block-part product__info-price"><?=$prod['price']?> <small class="good-price__currency">руб.</small></span>
        <article class="product__description">
            <?=$prod['description']?>
        </article>
    </section>
</main>
<?
    require("application/views/includes/template_footer.php");
?>