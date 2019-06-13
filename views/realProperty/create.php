<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */

$this->title = 'Создание записи';
$this->params['breadcrumbs'][] = ['label' => 'Недвижимость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
