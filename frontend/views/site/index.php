<?php
$this->title = 'Главная';
?>
<div class="row">
    <div class="text-center">
        <div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="/img/price.jpg" class="d-block w-100" alt="Price">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/img/map.png" class="d-block w-100" alt="Map">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/news.jpg" class="d-block w-100" alt="News">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/new.jpg" class="d-block w-100" alt="New">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fourth slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="block-vk text-center">
            <a href="https://vk.com/vetzooland">
                <img class="stack-Img img-fluid" alt="Какое-то название" src="/img/vk.png">
            </a>
            <p><script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>
                <!-- VK Widget -->
                <center><div id="vk_groups"></div>
                <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 0, width: "300px", height: "75px"},  117177507);
                </script></center>
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-8">
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
            большого количества видов домашних животных. В сложных случаях Ваши ветеринарные врачи консультируются у своих коллег – опытных специалистов Витебской ветакадемии, ветеринарных врачей Минского и Московского зоопарков. Мы регулярно
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
