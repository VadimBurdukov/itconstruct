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
						<span class="header-nav-item__container-for-link"><a class="header-nav-item__link" href="catalog.html">Каталог</a></span>
						<ul class="sub-menu">
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Электронные сигареты</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Трубки</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Картриджи</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Аккумуляторы и атомайзеры</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Аксессуары</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Зарядные устройства</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Жидкости для заправки</a></li>
							<li class="sub-menu__list-item"><a class="sub-menu__link" href="#">Подарочные наборы</a></li>
						</ul>
					</li>
					<?foreach (topMenuItems as $item) {?>
						<li class="header-nav-item"><span><a class="header-nav-item__link" href="#"><?=$item?></a></span></li>
					<?
					}?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="content">
		<div class="wrapper content__wrapper">
			<div class="sidebar">
				<section class="catalog">
					<h2 class="sidebar__headline">Каталог</h2>
					<ul class="catalog-list">
						<?
							global $ctgs;
							foreach ($ctgs as $cat) 
							{?>
								<li class="catalog-list__item"><a class="catalog-list__link" href="#"><?echo $cat['name']?></a></li>
							<? 
							} ?>
					</ul>
				</section>
				<section class="news">
					<h2 class="sidebar__headline news__headline">Новости</h2>
					<ul class="news-list">
						<li class="news-item">
							<a class="news-item__link" href="#">
								Поздравительная речь президента международной корпорации Хуа Шэн господина Ли Вея в Международный...
							</a>
							<span class="news-item__date">2010-03-03</span>
						</li>
						<li class="news-item">
							<a class="news-item__link" href="#">
								Собрание правления киевского филиала
							</a>
							<span class="news-item__date">2010-02-27</span>
						</li>
						<li class="news-item">
							<a class="news-item__link" href="#">
								Петропавловскому офису международной корпорации Хуа Шен исполнился 1 год
							</a>
							<span class="news-item__date">2010-02-23</span>
						</li>
						<li class="news-item">
							<a class="news-item__link" href="#">
								Проведение церемонии награждения в бишкекском филиале
							</a>
							<span class="news-item__date">2010-02-22</span>
						</li>
						<li class="news-item">
							<a class="news-item__link" href="#">
								Сотрудники иркутского филиала отметили китайский новый
							</a>
							<span class="news-item__date">2010-02-15</span>
						</li>
						<li class="news-item">
							<a class="news-item__link" href="#">
								Празднование китайского нового года в одесском филиале
							</a>
							<span class="news-item__date">2010-02-14</span>
						</li>
					</ul>
					<span class="archive"><a class="archive__link" href="#">Архив новостей</a></span>
				</section>
			</div>
		</div>