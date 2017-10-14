<?php

use \yii\redactor\widgets\Redactor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
?>
<div class="news-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <?= $form->field($model, 'imageFile')->fileInput() ?>
        </div>
        <div class="col-md-9 col-lg-9">
            <?= $form->field($model, 'news_discriprion')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <?= $form->field($model, 'text_html')->widget(Redactor::className(), [
         'clientOptions' => [
             'lang' => 'ru',
             'plugins' => ['clips', 'fontcolor','imagemanager']
         ]
    ])?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
