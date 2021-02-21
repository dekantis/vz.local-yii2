<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $blank->id;
$this->params['breadcrumbs'][] = ['label' => 'Бланки анализов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-blank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $blank->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $blank->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить бланк?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить бланк анализов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="analysis-blank-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <table border="1" width="100%">
            <caption>ЧВУП "Ветззолэнд" Результаты биохимического исследования крови</caption>
            <tr>
                <th>Вид животного:</th>
                <td><?=$blank->category?></td>
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
                <td colspan="6"><?=$blank->keeper?></td>
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
                <td colspan="2"><?=$standart->total_protein_min?>-<?=$standart->total_protein_max?></td>
                <td colspan="2">г/л</td>
            </tr>
            <tr>
                <th>Креатинин</th>
                <td><?=$blank->creatinine?></td>
                <td colspan="2"><?=$standart->creatinine_min?>-<?=$standart->creatinine_max?></td>
                <td colspan="2">мкмоль/л</td>
            </tr>
            <tr>
                <th>Мочевина</th>
                <td><?=$blank->urea?></td>
                <td colspan="2"><?=$standart->urea_min?>-<?=$standart->urea_max?></td>
                <td colspan="2">ммоль/л</td>
            </tr>
            <tr>
                <th>АЛТ</th>
                <td><?=$blank->alt?></td>
                <td colspan="2"><?=$standart->alt_min?>-<?=$standart->alt_max?></td>
                <td colspan="2">Ед/л</td>
            </tr>
            <tr>
                <th>АСТ</th>
                <td><?=$blank->ast?></td>
                <td colspan="2"><?=$standart->ast_min?>-<?=$standart->ast_max?></td>
                <td colspan="2">Ед/л</td>
            </tr>
            <tr>
                <th>Альфа-амилаза</th>
                <td><?=$blank->lamilaza?></td>
                <td colspan="2"><?=$standart->lamilaza_min?>-<?=$standart->lamilaza_max?></td>
                <td colspan="2">Ед/л</td>
            </tr>
            <tr>
                <th>ГГТ</th>
                <td><?=$blank->ggt?></td>
                <td colspan="2"><?=$standart->ggt_min?>-<?=$standart->ldg_max?></td>
                <td colspan="2">МЕ/л</td>
            </tr>
            <tr>
                <th>Щелочная фофатаза</th>
                <td><?=$blank->alkaline_phosphatase?></td>
                <td colspan="2"><?=$standart->alkaline_phosphatase_min?>-<?=$standart->alkaline_phosphatase_max?></td>
                <td colspan="2">МЕ/л</td>
            </tr>
            <tr>
                <th>Фосфор</th>
                <td><?=$blank->phosphorus?></td>
                <td colspan="2"><?=$standart->phosphorus_min?>-<?=$standart->phosphorus_max?></td>
                <td colspan="2">МЕ/л</td>
            </tr>
            <tr>
                <th>Кальций</th>
                <td><?=$blank->calcium?></td>
                <td colspan="2"><?=$standart->calcium_min?>-<?=$standart->calcium_max?></td>
                <td colspan="2">ммоль/л</td>
            </tr>
            <tr>
                <th>Магний</th>
                <td><?=$blank->mg?></td>
                <td colspan="2"><?=$standart->mg_min?>-<?=$standart->mg_max?></td>
                <td colspan="2">ммоль/л</td>
            </tr>
            <tr>
                <th>Общий билирубин</th>
                <td><?=$blank->total_bilirubin?></td>
                <td colspan="2"><?=$standart->total_bilirubin_min?>-<?=$standart->total_bilirubin_max?></td>
                <td colspan="2">мкмоль/л</td>
            </tr>
            <tr>
                <th>Холестерин</th>
                <td><?=$blank->cholesterol?></td>
                <td colspan="2"><?=$standart->cholesterol_min?>-<?=$standart->cholesterol_max?></td>
                <td colspan="2">ммоль/л</td>
            </tr>
            <tr>
                <th>ЛДГ</th>
                <td><?=$blank->ldg?></td>
                <td colspan="2"><?=$standart->ldg_min?>-<?=$standart->ldg_max?></td>
                <td colspan="2">Ед/л</td>
            </tr>
            <tr>
                <th>Глюкоза</th>
                <td><?=$blank->glucose?></td>
                <td colspan="2"><?=$standart->glucose_min?>-<?=$standart->glucose_max?></td>
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
</div>
