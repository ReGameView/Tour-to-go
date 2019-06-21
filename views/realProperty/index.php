<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RealPropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Недвижимость';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="real-property-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
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
                'headerOptions' => ['width' => '60'],
            ],
            [
                'attribute' => 'id_type',
                'format' => 'text',
                'label' => 'Тип',
                'headerOptions' => ['width' => '100'],
                'value' => 'typepr.title',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\TypeProperty::find()->asArray()->all(), 'id', 'title'),

            ],
            [
                'attribute' => 'city',
                'format' => 'text',
                'label' => 'Город',
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->city;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\RealProperty::find()->asArray()->all(), 'city', 'city'),
            ],
            [
                'attribute' => 'street',
                'format' => 'text',
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->street;
                }
            ],
            [
                'attribute' => 'house',
                'format' => 'text',
                'headerOptions' => ['width' => '80'],
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->house;
                }
            ],
            [
                'attribute' => 'apartment',
                'format' => 'text',
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->apartment;
                }
            ],

            'disc',
            [
                'attribute' => 'type',
                'format' => 'text',
                'label' => 'Тип продажи',
                'headerOptions' => ['width' => '150'],
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->type;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\RealProperty::find()->asArray()->all(), 'type', 'type'),
            ],
            [
                'attribute' => 'price',
                'format' => 'text',
                'label' => 'Цена',
                'headerOptions' => ['width' => '150'],
                'value' => function(\app\models\RealProperty $data)
                {
                    if($data->per != "")
                        return $data->price . " за " . $data->count . " " . $data->per;
                    else
                        return $data->price;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $data){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['realproperty/delete', 'id' => $data->id], [
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
