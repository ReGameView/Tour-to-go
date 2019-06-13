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
        'summary' => 'Показано {begin} из {end}',
        'columns' => [
            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'ID',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'id_type',
                'format' => 'text',
                'label' => 'Тип',
                'headerOptions' => ['width' => '150'],
                'value' => function(\app\models\RealProperty $data)
                {
                    return 1;
                }
            ],
            [
                'attribute' => 'city',
                'format' => 'text',
                'label' => 'Адрес',
                'value' => function(\app\models\RealProperty $data)
                {
                    return $data->fullAddress;
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
                    if($data->id_type == 1)
                        return $data->type;
                    else
                        return "Продажа";
                }
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
