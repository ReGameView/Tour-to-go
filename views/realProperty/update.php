<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */

$this->title = 'Обновление недвижимости: ' . $model->getFullAddress();
$this->params['breadcrumbs'][] = ['label' => 'Недвижимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление недвижимости';
?>
<div class="real-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
