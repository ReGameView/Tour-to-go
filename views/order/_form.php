<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View                      */
/* @var $model app\models\Order                 */
/* @var $clients app\models\Clients             */
/* @var $realProperty app\models\RealProperty   */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->dropDownList($clients) ?>

    <?= $form->field($model, 'id_property')->dropDownList($realProperty)  ?>

<!--    --><?//= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->dropDownList([$user["id"] => $user["username"]], ['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
