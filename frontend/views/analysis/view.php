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
            <td style='color: <?= $blank->total_protein > $standart->total_protein_max || $blank->total_protein < $standart->total_protein_min ? "red" : "inherit"?>'><?=$blank->total_protein?></td>
            <td colspan="2"><?=$standart->total_protein_min?>-<?=$standart->total_protein_max?></td>
            <td colspan="2">г/л</td>
        </tr>
        <tr>
            <th>Альбумин</th>
            <td style='color: <?= $blank->albumen > $standart->albumen_max || $blank->albumen < $standart->albumen_min ? "red" : "inherit"?>'><?=$blank->albumen?></td>
            <td colspan="2"><?=$standart->albumen_min?>-<?=$standart->albumen_max?></td>
            <td colspan="2">г/л</td>
        </tr>
        <tr>
            <th>Креатинин</th>
            <td style='color: <?= $blank->creatinine > $standart->creatinine_max || $blank->creatinine < $standart->creatinine_min ? "red" : "inherit"?>'><?=$blank->creatinine?></td>
            <td colspan="2"><?=$standart->creatinine_min?>-<?=$standart->creatinine_max?></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Мочевина</th>
            <td style='color: <?= $blank->urea > $standart->urea_max || $blank->urea < $standart->urea_min ? "red" : "inherit"?>'><?=$blank->urea?></td>
            <td colspan="2"><?=$standart->urea_min?>-<?=$standart->urea_max?></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>АЛТ</th>
            <td style='color: <?= $blank->alt > $standart->alt_max || $blank->alt < $standart->alt_min ? "red" : "inherit"?>'><?=$blank->alt?></td>
            <td colspan="2"><?=$standart->alt_min?>-<?=$standart->alt_max?></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>АСТ</th>
            <td style='color: <?= $blank->ast > $standart->ast_max || $blank->ast < $standart->ast_min ? "red" : "inherit"?>'><?=$blank->ast?></td>
            <td colspan="2"><?=$standart->ast_min?>-<?=$standart->ast_max?></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>Альфа-амилаза</th>
            <td style='color: <?= $blank->lamilaza > $standart->lamilaza_max || $blank->lamilaza < $standart->lamilaza_min ? "red" : "inherit"?>'><?=$blank->lamilaza?></td>
            <td colspan="2"><?=$standart->lamilaza_min?>-<?=$standart->lamilaza_max?></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>ГГТ</th>
            <td style='color: <?= $blank->ggt > $standart->ggt_max || $blank->ggt < $standart->ggt_min ? "red" : "inherit"?>'><?=$blank->ggt?></td>
            <td colspan="2"><?=$standart->ggt_min?>-<?=$standart->ggt_max?></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Щелочная фосфатаза</th>
            <td style='color: <?= $blank->alkaline_phosphatase > $standart->alkaline_phosphatase_max || $blank->alkaline_phosphatase < $standart->alkaline_phosphatase_min ? "red" : "inherit"?>'><?=$blank->alkaline_phosphatase?></td>
            <td colspan="2"><?=$standart->alkaline_phosphatase_min?>-<?=$standart->alkaline_phosphatase_max?></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Фосфор</th>
            <td style='color: <?= $blank->phosphorus > $standart->phosphorus_max || $blank->phosphorus < $standart->phosphorus_min ? "red" : "inherit"?>'><?=$blank->phosphorus?></td>
            <td colspan="2"><?=$standart->phosphorus_min?>-<?=$standart->phosphorus_max?></td>
            <td colspan="2">МЕ/л</td>
        </tr>
        <tr>
            <th>Кальций</th>
            <td style='color: <?= $blank->calcium > $standart->calcium_max || $blank->calcium < $standart->calcium_min ? "red" : "inherit"?>'><?=$blank->calcium?></td>
            <td colspan="2"><?=$standart->calcium_min?>-<?=$standart->calcium_max?></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>Магний</th>
            <td style='color: <?= $blank->mg > $standart->mg_max || $blank->mg < $standart->mg_min ? "red" : "inherit"?>'><?=$blank->mg?></td>
            <td colspan="2"><?=$standart->mg_min?>-<?=$standart->mg_max?></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>Общий билирубин</th>
            <td style='color: <?= $blank->total_bilirubin > $standart->total_bilirubin_max || $blank->total_bilirubin < $standart->total_bilirubin_min ? "red" : "inherit"?>'><?=$blank->total_bilirubin?></td>
            <td colspan="2"><?=$standart->total_bilirubin_min?>-<?=$standart->total_bilirubin_max?></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Холестерин</th>
            <td style='color: <?= $blank->cholesterol > $standart->cholesterol_max || $blank->cholesterol < $standart->cholesterol_min ? "red" : "inherit"?>'><?=$blank->cholesterol?></td>
            <td colspan="2"><?=$standart->cholesterol_min?>-<?=$standart->cholesterol_max?></td>
            <td colspan="2">ммоль/л</td>
        </tr>
        <tr>
            <th>ЛДГ</th>
            <td style='color: <?= $blank->ldg > $standart->ldg_max || $blank->ldg < $standart->ldg_min ? "red" : "inherit"?>'><?=$blank->ldg?></td>
            <td colspan="2"><?=$standart->ldg_min?>-<?=$standart->ldg_max?></td>
            <td colspan="2">Ед/л</td>
        </tr>
        <tr>
            <th>Глюкоза</th>
            <td style='color: <?= $blank->glucose > $standart->glucose_max || $blank->glucose < $standart->glucose_min ? "red" : "inherit"?>'><?=$blank->glucose?></td>
            <td colspan="2"><?=$standart->glucose_min?>-<?=$standart->glucose_max?></td>
            <td colspan="2">мкмоль/л</td>
        </tr>
        <tr>
            <th>Врачебная пометка:</th>
            <td colspan="5"><?=$blank->medical_mark?></td>
        </tr>
        <tr>
            <th>Врач:</th>
            <td colspan="5">
                <?=$blank->doctor->fullname?>
            </td>
        </tr>
        <tr>
            <th>Дата</th>
            <td colspan="2"><?=date('d.m.Y', $blank->date_publication)?></td>
        </tr>
    </table>
</div>
