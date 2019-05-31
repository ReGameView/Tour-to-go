<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->textInput() ?>

    <?= $form->field($model, 'id_property')->textInput() ?>

<!--    --><?//= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput(['value' => Yii::$app->user->id, 'disabled' => true]) ?>
    <?php
        var_dump($model);
    ?>
    <?php
        if($model['deleted_at'] != NULL)
        {
            echo $form->field($model, 'deleted_at')->textInput(['disabled' => true]);
        }
        elseif($model['updated_at'] == NULL && $model['created_at'] != NULL)
        {
            echo $form->field($model, 'created_at')->textInput(['value' => date("Y-m-d H:i:s"), 'disabled' => true]);
        }elseif ($model['updated_at'] != NULL) {
            echo $form->field($model, 'created_at')->textInput(['value' => date("Y-m-d H:i:s"), 'disabled' => true]);
        }
    ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
