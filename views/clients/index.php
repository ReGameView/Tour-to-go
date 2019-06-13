<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создание клиента', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Создать запрос', ['query'], ['class' => 'btn btn-primary']) ?>

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
                'attribute' => 'f',
                'format' => 'text',
                'label' => 'Фамилия',
                'headerOptions' => ['width' => '150'],
            ],
            [
                'attribute' => 'i',
                'format' => 'text',
                'label' => 'Имя',
                'headerOptions' => ['width' => '150'],
            ],
            'o',
            'phone',
            //'address',
            'email:email',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>
