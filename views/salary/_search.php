<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\field\FieldRange;
use kartik\form\ActiveForm;
use app\models\Employees;

/* @var $this yii\web\View */
/* @var $model app\models\SalarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salaries-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($searchModel, 'employee_id')->dropDownList(
            ArrayHelper::map(
                    Employees::find()->where(['is_active' => 1])->all(), 'id', 'name'), ['prompt' => "Please select Employee", 'label' => "Employee"]) ?>

    <?=
        FieldRange::widget([
        'form' => $form,
        'model' => $searchModel,
        'label' => 'Enter amount range',
        'attribute1' => 'above',
        'attribute2' => 'below',
        'type' => FieldRange::INPUT_TEXT,
    ]);
    ?>
    
    <?php
    echo '<label class="control-label">Salary Dates between</label>';
    echo DatePicker::widget([
        'model' => $searchModel,
        'type' => DatePicker::TYPE_RANGE,
        'attribute' => 'afterDate',
        'attribute2' => 'beforeDate',
        'options' => ['placeholder' => 'Start date'],
        'options2' => ['placeholder' => 'End date'],
        'form' => $form,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($searchModel, 'remark') ?>

    <?php // echo $form->field($searchModel, 'remarks') ?>

    <?php // echo $form->field($searchModel, 'added_on') ?>

    <?php // echo $form->field($searchModel, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
