<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
        'columns' => [
            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'ID',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'id_client',
                'format' => 'text',
                'label' => 'Клиент',
//                'value' => function (\app\models\Order $data) {
//                    var_dump($data);
//                    return Html::a(Html::encode($data->f . $data->i . $data->o), Url::to(['view', 'id' => $data->id]));
//                },
            ],
            'id_client',
            'id_property',
//            'price',
            'comment',
            //'id_user',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
