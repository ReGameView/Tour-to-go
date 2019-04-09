<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */

$this->title = 'Create Real Property';
$this->params['breadcrumbs'][] = ['label' => 'Real Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
