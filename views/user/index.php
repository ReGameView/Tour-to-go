<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создание пользователя', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'username',
                'format' => 'text',
                'label' => 'Логин',
            ],
            [
                'attribute' => 'role',
                'format' => 'text',
                'label' => 'Роль',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'role', 'role'),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $data){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['user/delete', 'id' => $data->id], [
                            'data' => [
                                'confirm' => Yii::t('app', 'Вы действительно хотите удалить?'),
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ]
    ]); ?>
    <?php Pjax::end(); ?>
</div>
