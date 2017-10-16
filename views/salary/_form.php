<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Employees;

/* @var $this yii\web\View */
/* @var $model app\models\Salaries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salaries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'employee_id')->textInput()  ?>
    <?=
    $form->field($model, 'employee_id')->dropDownList(
            ArrayHelper::map(
                    Employees::find()->where(['is_active' => 1])->all(), 'id', 'name'), ['prompt' => "Please select Employee", 'label' => "Employee"])
    ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?=
    $form->field($model, 'salary_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd'
        ]
    ])
    ?>

    <?= $form->field($model, 'variation_type')->dropDownList(['deduction' => 'Deduction', 'allowance' => 'Allowance',], ['prompt' => '']) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'added_on')->textInput() ?>

    <?php // $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
