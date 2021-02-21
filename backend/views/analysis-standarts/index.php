<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\grid\EnumColumn;
use common\models\AnalysisBlank;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnalysisStandartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Нормы анализов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-standart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить нормы анализов', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'class' => EnumColumn::class,
                'attribute' => 'category_id',
                'enum' => AnalysisBlank::getTypeList()
            ],
            //'glucose_min',
            //'creatinine_min',
            //'alt_min',
            // 'ast_min',
            // 'urea_min',
            // 'lamilaza_min',
            // 'calcium_min',
            // 'total_protein_min',
            // 'total_bilirubin_min',
            // 'alkaline_phosphatase_min',
            // 'phosphorus_min',
            // 'glucose_max',
            // 'creatinine_max',
            // 'alt_max',
            // 'ast_max',
            // 'urea_max',
            // 'lamilaza_max',
            // 'calcium_max',
            // 'total_protein_max',
            // 'total_bilirubin_max',
            // 'alkaline_phosphatase_max',
            // 'phosphorus_max',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
