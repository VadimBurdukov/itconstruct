<?include("application/views/includes/template_header.php");?>
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
    <h1 class="contacts-page__main-headline">Контакты</h1>
    <table class="contacts-section">
        <tbody>
            <tr>
                <td>
                    <h2>Адрес нашего офиса:</h2>
                    <p>
                        630065, г. Новосибирск, Декабристов, 92, корп.7
                        <br>Время приема заказов по телефону -
                    </p>
                    <p>
                        с 9.30 до 18.00
                        <br>Телефоны: +7 (383) 255‒15‒15 ; 349‒18‒49
                    </p>
                    <h2>Магазины партнеры:</h2>
                    <h3>Москва:</h3>
                    <p>
                        Красный проспект, 50, стр. 1. универмаг "Московский":
                        <br>1-й этаж, левое крыло пав. 71, тел.: +7 (383) 239‒39‒50;
                    </p>
                    <h3>Санкт-Петербург:</h3>
                    <p>
                        www.president-spa.club, (913) 321-83-54
                    </p>
                </td>
                <td class="contacts-section__second-column">
                    <h2>ООО «Компания»</h2>
                    <p>
                        Ген. директор:Иванов А.Ю.
                    </p>
                    <p>
                        Юридический адрес: 630065, г. Новосибирск,
                        <br>Декабристов, 92, корп.7
                    </p>
                    <p>
                        ИНН 7733700983; КПП 7737655901;
                    </p>
                    <p>
                        ОГРН 1097746493754 от 15 июня 2014г.
                    </p>
                    <p>
                        Наименование банка: ОАО «УРАЛСИБ»
                    </p>
                    <p>
                        г. Москва БИК 042591537;
                        <br>Корр. счет 31542814300000000327; Расчетный счет 40418710900020003009
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <?if((!$_SESSION['subFlag'])):?>
        <h2 class="feedback-form__headline">Благодарим за отзыв!</h2>
    <?else:?>  
    <section class="feedback-form">
        <h2 class="feedback-form__headline">Форма обратной связи</h2>
        <p class="feedback-form__hint">
            <span class="required-star">*</span> — обязательные для заполнения поля
        </p>
        <?if ($errors):?>
            <aside class="error-box error-text" >
                <p class="error-message">          
                    <?echo $errors;?>
                </p>
            </aside>
        <?endif;?>
        <form method="POST" class="registration-form" name="contats-page__feedback-form">
            <div class="feedback-form__row">
                <label class="inner-label" for="feedback-author">
                    Имя <span class="required-star">*</span>
                </label>
                <input class="inner-input-box inner-input-box__name" <?if (isset( $name)):?> value=<?=$name;?> <?endif;?> type="text"  name="feedback-author"  id="feedback-author">
                <span class="error-text feedback-form__error-hint error-emptyness invisible">Поле «Имя» должно быть заполнено</span>
            </div>
            <div class="feedback-form__row">
                <label class="inner-label" for="email">
                    Электронная почта <span class="required-star">*</span>
                </label>
                <input class="inner-input-box inner-input-box__email" <?if (isset($email)):?>value=<?=$email?><?endif;?> type="email" name="email" id="email">
                <span class="error-text feedback-form__error-hint error-emptyness invisible">Поле «Электронная почта» должно
                    быть заполнено</span>
            </div>
            <div class="feedback-form__row">
                <label class="inner-label optional" for="phone">
                    Телефон
                </label>
                <input class="inner-input-box" <?if (isset($phone)&&($phone)): ?>value=<?=$phone?><?endif;?> type="tel"  name="phone" id="phone">
            </div>
            <div class="feedback-form__row feedback-form__row_left-shift">
                <label class="inner-label feedback-text-area__label" for="feedback-text">
                    Пожалуйста укажите какого рода информация вас интересует <span class="required-star">*</span>
                </label>
                <textarea class="inner-input-box feedback-text-area__input"  name="feedback-text" id="feedback-text" ><?if (isset($request)):?><?=$request?><?endif;?></textarea>
                <div>
                    <input class="form-submit data-send" type="submit" value="Отправить">
                    <input class="form-submit clear-inputs" type="button" value="Очистить поля">
                </div>
            </div>
        </form>
    </section>
    <?endif;?>
</main>
<?require("application/views/includes/template_footer.php");?>