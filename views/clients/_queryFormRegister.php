<?php

use app\models\Clients;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */
/* @var $clients array app\models\Clients             */
/* @var $typeProperty array app\models\typeProperty   */



?>

<div class="clients-form">

    <?= $form->field($model, 'id_type')->dropDownList($typeProperty)  ?>
    <?= $form->field($model, 'city') ?>
    <?= $form->field($model, 'street') ?>
    <?= $form->field($model, 'house') ?>
    <?= $form->field($model, 'per') ?>
    <?= $form->field($model, 'price') ?>
    <?= $form->field($model, 'area') ?>
    <?= $form->field($model, 'floor') ?>
    <?= $form->field($model, 'apartment') ?>
    <?= $form->field($model, 'disc') ?>
    <?= $form->field($model, 'count') ?>


    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    </div>

</div>
