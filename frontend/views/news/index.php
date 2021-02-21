<?php

use yii\widgets\ListView;

$this->title = 'Новости';
?>
<section class="section-primary-a">
    <h2>Новости</h2>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_news',
    'layout' => "{items}\r\n{sorter}\r\n{pager}"
]);?>

</section>
