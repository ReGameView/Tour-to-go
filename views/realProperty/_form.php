<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="real-property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_type')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\TypeProperty::find()->asArray()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Продажа' => 'Продажа', 'Аренда' => 'Аренда' ]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'per')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <script async>
        let lastClassName = "";
        console.log(document.getElementsByClassName('field-realproperty-per'));
        document.getElementById("realproperty-type").addEventListener('change', function (e) {
            let activeClass = e.target.value;
            switch (e.target.value) {
                case "Продажа":
                    document.getElementsByClassName('field-realproperty-per')[0].style.display = "none";
                    document.getElementsByClassName('field-realproperty-count')[0].style.display = "none";
                    break;
                case "Аренда":
                    document.getElementsByClassName('field-realproperty-per')[0].style.display = "block";
                    document.getElementsByClassName('field-realproperty-count')[0].style.display = "block";
                    break;
            }
        })
    </script>
</div>
