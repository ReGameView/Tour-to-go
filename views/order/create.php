<?php

use yii\helpers\Html;

/* @var $this yii\web\View                      */
/* @var $model app\models\Order                 */
/* @var $clients app\models\Clients             */
/* @var $realProperty app\models\RealProperty   */
/* @var $user app\models\User                   */

$this->title = 'Создание заказа';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'clients' => $clients,
        'realProperty' => $realProperty,
        'model' => $model,
        'user' => $user
    ]) ?>

</div>
