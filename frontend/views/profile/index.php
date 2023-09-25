<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;


$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="block-vk text-center">
            <a href="https://vk.com/vetzooland">
                <img class="img-responsive text-center" alt="Какое-то название" src="/img/vk.png">
            </a>
            <p><script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>
                <!-- VK Widget -->
                <center><div id="vk_groups"></div>
                <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 0, width: "360", height: "100"},  117177507);
                </script></center>
            </p>
        </div>
    </div>
    <div class="col-md-8 col-lg-8">
      <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        $menuItems = [
            [
                'label' => 'Настройки',
                'url' => ['/profile/settings'],
                'visible' => !Yii::$app->user->isGuest
            ],
        ];
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => $menuItems,
        ]);
        NavBar::end();
      ?>
        <p class="lead"><h2 class="text-center"><strong>Здравствуйте!</strong></h2></p>
        <p class="text-indent text-justify lead">
            Здесь помогают тем, кто тысячи лет верно служит человеку, разделяя с ним очаг и кров.
            Тем, кто преданно смотрит Вам в глаза в минуты печали и неутолимо резвится в дни радости. Здесь лечат животных!
        </p>
    </div>
</div>
<div class="row">
    <div class="lead text-justify text-indent">
        <p>Вы и только Вы – самые лучшие, самые добрые и самые умные. А мы, ветеринарные врачи, знаем о болезнях животных чуть больше лишь только потому, что обучались этой профессии и ежедневно сталкиваемся с подобными проблемами у братьев наших меньших. Мы, Ваши
            ветеринарные врачи, с радостью применяем знания, навыки и опыт в лечении маленьких друзей. Лечить животных – наша работа, любимая работа. Под сводами нашей лечебницы найдут помощь не только кошки и собаки, но и друзья гораздо
            меньших размеров (грызуны, рептилии, птицы). Заходят к нам в гости и владельцы крупных животных, правда, своих подопечных они оставляют дома. Мы понимаем, что врач не может владеть полными знаниями о всех болезнях у такого
            большого количества видов домашних животных. В сложных случаях Ваши ветеринарные врачи консультируются у своих коллег – опытных специалистов Витебскойветакадемии, ветеринарных врачей Минского и Московского зоопарков. Мы регулярно
            посещаем семинары и мастер-классы. Каждый из нас постоянно внедряет в практику новые методы профилактики, диагностики и лечения.
        </p>
        <p>
            Дорогой посетитель сайта, пусть Ваш питомец будет здоров, пусть его недуги не омрачают жизнь и пусть встречи с Вашим ветеринаром будут носить лишь профилактический характер.
        </p>
        <small class="pull-right lead"><cite>Ваш Ветеринарный Врач.</cite></small>
    </div>
</div>
