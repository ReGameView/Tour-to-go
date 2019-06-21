<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RealProperty */

$this->title = $model->fullAddress;
$this->params['breadcrumbs'][] = ['label' => 'Real Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="real-property-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить запись', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'attributes' => [
            'id',
            [
                'label' => 'Тип',
                'attribute' => 'typepr.title',
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->typepr->title;
                }

            ],
            'city',
            'area',
            'street',
            'house',
            'floor',
            'apartment',
            'disc',
            'type',
            'price',
            'per',
            'count',
        ],
    ]) ?>

</div>
