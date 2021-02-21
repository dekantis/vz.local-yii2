<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

?>

<div class="record-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'animal_type')->textInput() ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'clinic_id')->dropDownList($clinicList, [
                    'id' => 'clinic',
                    'onchange' => 'updateAvailableHour()',
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'animal_name')->textInput() ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'date')->widget(DatePicker::class, [
                'name' => 'check_issue_date',
                'value' => date('d-M-Y', strtotime('+2 days')),
                'options' => [
                    'id' => 'date',
                    'placeholder' => 'Выберите дату',
                    'onchange' => 'updateAvailableHour()'
                ],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy',
                    'todayHighlight' => true,
                ]
            ])?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'hour')->dropDownList([],[
                'id' => 'hours',
                'disabled' => true
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'reason_vizit')->textarea() ?>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?= Html::submitButton('Записаться', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
var updateAvailableHour = function() {
    var url = '/site/available-hours';
    var hours = $('#hours');
    var date = $('#date').val();
    var clinicId = $('#clinic').val();

    if (!date) {
       hours.prop('disabled', true);
       return;
    }
    
    $.get(url + '?date=' + date + '&clinic_id=' + clinicId, function(data) {
        hours.html('');
        if(data == []) {
            hours.prop('disabled', true);
        } else {
            hours.prop('disabled', false);
            $.each(data, function(index, value) {
                hours.append('<option value="' + index + '">' + value + '</options>');
            });
        }
    }, 'json');
}
JS;

$this->registerJs($js, $this::POS_END)

?>