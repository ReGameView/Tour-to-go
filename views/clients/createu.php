<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */

$this->title = 'Создание пользователя для клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $client->fullName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../user/_formCreateClient', [
        'model' => $model,
        'idClient' => $idClient
    ]) ?>

</div>
