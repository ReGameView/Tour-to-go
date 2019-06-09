<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Clients */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить данного клиента?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'f',
            'i',
            'o',
            'phone',
            'address',
            'email:email',
        ],
    ]) ?>
    <h2>Заказы</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'id_property',
                'format' => 'html',
                'label' => 'Адрес',
                'value' => function (\app\models\Order $data) {
//                        return $data->client->getFullName();
                    return Html::a(Html::encode($data->property->name), Url::to(['realproperty/view', 'id' => $data->property->id]));
                },
                //FIXME:: ПОФИКСИТЬ ФИЛЬТР
            ],
        ],
    ]); ?>
</div>
