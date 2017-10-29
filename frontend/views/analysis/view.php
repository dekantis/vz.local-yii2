<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $blank->animal_name;
$this->params['breadcrumbs'][] = ['label' => 'Бланки анализов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$attributes = [
    'glucose',
    'creatinine',
    'alt',
    'ast',
    'urea',
    'lamilaza',
    'calcium',
    'total_protein',
    'total_bilirubin',
    'alkaline_phosphatase',
    'phosphorus',
];

?>
<div class="analysis-blank-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $blank,
        'attributes' => [
            'animal_name',
            'keeper',
            [
                'attribute' => 'category',
                'label' => 'Вид животного'
            ],
            [
                'attribute' => 'doctor.fullName',
                'label' => 'Доктор'
            ],
            'date_publication:datetime',
        ],
    ]) ?>
    <?php foreach ($attributes as $attribute) : ?>
        <div class="row">
            <div class="col-sm-4">
                <?= $blank->attributeLabels()[$attribute] ?>
            </div>
            <div class="col-sm-4">
                <p>
                <?= $blank->$attribute ?>

                <?php
                    $minAttribute = $attribute . '_min';
                    $maxAttribute = $attribute . '_max';
                ?>

                    ( <?= $standart->$minAttribute ?>
                    - <?= $standart->$maxAttribute ?> )
                </p>
            </div>
        </div>
    <?php endforeach; ?>

    <?= DetailView::widget([
        'model' => $blank,
        'attributes' => [
            'medical_mark:ntext',
        ],
    ]) ?>
    <table border="1" width="100%">
        <caption>ЧВУП "Ветззолэнд" Результаты биохимического исследования крови</caption>
        <tr>
            <th>Вид животного:</th>
            <td>Собака</td>
            <th>Кличка:</th>
            <td><?=$blank->animal_name?></td>
            <th>Год рождения</th>
            <td>
<?php if (!empty($blank->animal_year)) {
    echo $blank->animal_year;
} else {
    echo "-";
}
?>
            </td>
        </tr>
        <tr>
            <th>Владелец</th>
            <td colspan="6">Антон Грыгорич</td>
        </tr>
        <tr>
            <th>Показатель:</th>
            <th>Результат</th>
            <th colspan="2">Норма</th>
            <th colspan="2">Единицы измерения</th>
        </tr>
        <tr>
            <th>Общий белок</th>
            <td><?=$blank->total_protein?></td>
            <td colspan="2"></td>
            <td colspan="2">г/л</td>
        </tr>
        <tr>
            <th>Креатинин</th>
            <td><?=$blank->creatinine?></td>
            <td colspan="2"></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Мочевина</th>
            <td><?=$blank->urea?></td>
            <td colspan="2"></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>АЛТ</th>
            <td><?=$blank->alt?></td>
            <td colspan="2"></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>АСТ</th>
            <td><?=$blank->ast?></td>
            <td colspan="2"></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>Альфа-амилаза</th>
            <td><?=$blank->lamilaza?></td>
            <td colspan="2"></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>ГГТ</th>
            <td></td>
            <td colspan="2"></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Щелочная фофатаза</th>
            <td><?=$blank->alkaline_phosphatase?></td>
            <td colspan="2"></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Фосфор</th>
            <td><?=$blank->phosphorus?></td>
            <td colspan="2"></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Кальций</th>
            <td><?=$blank->calcium?></td>
            <td colspan="2"></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>Магний</th>
            <td></td>
            <td colspan="2"></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>Общий билирубин</th>
            <td><?=$blank->total_bilirubin?></td>
            <td colspan="2"></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Холестерин</th>
            <td></td>
            <td colspan="2"></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>ЛДГ</th>
            <td></td>
            <td colspan="2"></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>Глюкоза</th>
            <td><?=$blank->glucose?></td>
            <td colspan="2"></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Врачебная пометка:</th>
            <td colspan="5"><?=$blank->medical_mark?></td>
        </tr>
        <tr>
            <th>Исследование проводил:</th>
            <td colspan="5"><?=$blank->doctor->fullname?></td>
        </tr>
        <tr>
            <th>Дата</th>
            <td colspan="2"><?=date('d.m.Y', $blank->date_publication)?></td>
        </tr>
    </table>
</div>
