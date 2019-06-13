<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RealPropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="real-property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_type') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'area') ?>

    <?= $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'house') ?>

    <?php // echo $form->field($model, 'floor') ?>

    <?php // echo $form->field($model, 'apartment') ?>

    <?php // echo $form->field($model, 'disc') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'per') ?>

    <?php // echo $form->field($model, 'count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
