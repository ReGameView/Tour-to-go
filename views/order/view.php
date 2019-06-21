<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = "Заказ клиента: " . $model->client->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Заказ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить запись', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить заказ?',
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
                'attribute' => 'id_property',
                'format' => 'html',
                'label' => 'Клиент',
                'value' => function (\app\models\Order $data) {
//                        return $data->client->getFullName();
                    return Html::a(Html::encode($data->client->fullName), Url::to(['clients/view', 'id' => $data->client->id]));
                },
            ],
            [
                'attribute' => 'id_property',
                'format' => 'html',
                'label' => 'Адрес',
                'value' => function (\app\models\Order $data) {
//                        return $data->client->getFullName();
                    return Html::a(Html::encode($data->property->fullAddress), Url::to(['realproperty/view', 'id' => $data->property->id]));
                },
            ],
//            'price',
            'comment',
            'user.username',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
