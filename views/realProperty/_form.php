<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="real-property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_type')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Продажа' => 'Продажа', 'Аренда' => 'Аренда', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'per')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
