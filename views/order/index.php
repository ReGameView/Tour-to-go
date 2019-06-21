<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $clients app\models\Clients             */
/* @var $realProperty app\models\RealProperty   */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создание заказа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'columns' => [
            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'ID',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'client.fullName',
                'format' => 'html',
                'label' => 'Клиент',
                'value' => function (\app\models\Order $data) {
//                        return $data->client->getFullName();
                    return Html::a(Html::encode($data->client->getFullName()), Url::to(['clients/view', 'id' => $data->client->id]));
                },
                //FIXME:: ПОФИКСИТЬ ФИЛЬТР
            ],
            [
                'attribute' => 'property.fullAddress',
                'format' => 'html',
                'label' => 'Адрес',
                'value' => function (\app\models\Order $data) {
//                        return $data->client->getFullName();
                    return Html::a(Html::encode($data->property->fullAddress), Url::to(['realproperty/view', 'id' => $data->property->id]));
                },
                //FIXME:: ПОФИКСИТЬ ФИЛЬТР
            ],
            [
                'attribute' => 'comment',
                'format' => 'text',
                'label' => 'Комментарий',
                'filter' => false,
                'headerOptions' => ['width' => '200'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $data){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['order/delete', 'id' => $data->id], [
                            'data' => [
                                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
