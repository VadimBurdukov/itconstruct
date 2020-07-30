<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="layout/css/stylesheet.css">
	<link rel="shortcut icon" href="layout/img/favicon.png" type="image/png">
	<link rel="alternate" href="https://allfont.ru/allfont.css?fonts=arial-narrow">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="layout/js/script.js"></script>
	<title>Company - Интернет-магазин электронных сигарет</title>
</head>

<body>
	<header class="page-header">
		<div class="wrapper">
			<aside class="header-top">
				<div class="header-logo">
					<img class="header-logo__image" src="layout/img/logo.png" alt="Логотип" width="95" height="75">
					<span class="header-logo__caption">Company</span>
				</div>
				<div class="company-info">
					<b class="company-info__tagline">Нанотехнологии здоровья</b>
					<div class="contacts">
						<a class="contacts__link-mail" href="mailto:info@company.ru">info@company.ru</a>
						<a class="contacts__link-phone" href="tel:+73833491849">+7 (383) 349-18-49</a>
					</div>
				</div>
			</aside>
			<div class="user-info">
				
			</div>
		</div>
		<nav class="header-nav">
			<div class="wrapper">
				<span class="menu-toggler">Меню</span>
				<ul class="menu-togglable">
					<li class="header-nav-item">
                        <span>
                            <span class="header-nav-item__link header-nav-item__link_current">Главная</span>
                        </span>
                    </li>
					<li class="header-nav-item">
						<span class="header-nav-item__container-for-link"><a class="header-nav-item__link" href="catalog.php">Каталог</a></span>
						<ul class="sub-menu">
							<?
								global $ctgs;
									foreach ($ctgs as $cat) 
									{
							?>
										<li class="sub-menu__list-item">
											<a class="sub-menu__link" href="catalog.php?cat=<?=$cat['name']?>">
												<?=$cat['name']?>
											</a>
										</li>
							<?
									}
							?>
						</ul>
					</li>
					<?foreach (topMenuItems as $item => $href) {?>
						<li class="header-nav-item">
							<span>
								<a class="header-nav-item__link" href="<?=$href?>">
									<?=$item?>
								</a>
							</span>
						</li>
					<?
					}?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="content">
		<div class="wrapper content__wrapper">
			
		