<?require("application/views/includes/template_header.php");?>  
    <nav class="bread-crumbs-container product__bread-crumbs">
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
    <section class="product">
        <h1 class="product__info-block-part product__headline"><?=$newsTitle?></h1>
        <small class="good-price__currency"><?=$date?></small>
        <article class="product__description">
            <?=$desc?>
        </article>
    </section>
</main>
            
<?require("application/views/includes/template_footer.php");?>