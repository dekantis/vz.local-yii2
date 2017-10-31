<?php
$this->title = 'Главная';
?>
<div class="row">
    <div class="text-center">
        <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item item-1 active">
                    <!-- <img src="images/slide1.png" alt="First Slide"> -->
                    <div class="carousel-caption">
                        <h3 class="lead text-primary">Прайс лист</h3>
                        <p>Стоимость услуг в наших лечебницах </p>
                        <a href="site/price" class="btn btn-success btn-advanced">Подробнее</a>
                    </div>
                </div>
                <div class="item item-2">
                    <!-- <img src="images/slide2.png" alt="Second Slide"> -->
                    <div class="carousel-caption">
                        <h3 class="lead text-primary">Наши контанкты</h3>
                        <p>Где и как нас найти?</p>
                        <a href="site/contact" class="btn btn-success btn-advanced">Подробнее</a>
                    </div>
                </div>
                <div class="item item-3">
                    <!-- <img src="images/slide3.png" alt="Third Slide"> -->
                    <div class="carousel-caption">
                        <h3  class="lead text-primary">Анализы крови</h3>
                        <p>Знайте больше о состоянии вашего любимца
                        </p>
                        <a href="/analysis/" class="btn btn-success btn-advanced">Подробнее</a>
                    </div>
                </div>
                <div class="item item-4">
                    <!-- <img src="images/slide3.png" alt="Third Slide"> -->
                    <div class="carousel-caption">
                        <h3  class="lead text-primary">Новости</h3>
                        <p>Объявления и новости нашего ресураса
                        </p>
                        <a href="/news/" class="btn btn-success btn-advanced">Подробнее</a>
                    </div>
                </div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
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
                    VK.Widgets.Group("vk_groups", {mode: 0, width: "320", height: "100"},  117177507);
                </script></center>
            </p>
        </div>
    </div>
    <div class="col-md-8 col-lg-8">
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
<!--<div class="row">
    <div class="lead">
         <h2 class="heading">Рекомендации. <span class="text-muted">Важные для ВАС</span></h2>
    </div>
    <div class="col-md-8">
      <p class="lead text-justify text-indent">Тут очень важные рекомндации для вас</p>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="recomendation-block">
            <img class="img-responsive" alt="Какое-то название" src="/img/2.jpg">
         </div>
    </div>
</div>-->
