<?php

use app\models\Clients;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QueryClients */
/* @var $clientModel app\models\Clients */

/* @var $clients array app\models\Clients             */
/* @var $typeProperty array app\models\typeProperty   */

$this->title = 'Создать запрос от клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="clients-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <select name="select" id="select" class="form-control">
            <option value="block">Выберите тип пользователя</option>
            <option value="new_user">Новый пользователь</option>
            <option value="old_user">Уже зарегистрированный пользователь</option>
        </select>
    </div>

    <hr>

    <div id="old_user" style="display: none;">

        <input type="hidden" name="new_user" value="0">
        <?= $this->render('_queryForm', [
            'model' => $model,
            'clients' => $clients,
            'typeProperty' => $typeProperty
        ]) ?>

    </div>
    <div id="new_user" style="display: none;">

        <?php $form = ActiveForm::begin(); ?>
        <input type="hidden" name="new_user" value="1">
            <?= $this->render('../user/_formCreateClient', [
                'clientModel' => $clientModel,
                'form' => $form
            ]);
            ?>

        <hr>

            <?= $this->render('_queryFormRegister', [
                'model' => $model,
                'typeProperty' => $typeProperty,
                'form' => $form

            ]) ?>
        <?php ActiveForm::end(); ?>

    </div>

</div>
<script async>
    let lastClassName = "";
    document.getElementById("select").addEventListener('change', function (e) {
        let activeClass = e.target.value;
        switch (e.target.value) {
            case "block":
                if(document.getElementById('new_user').style.display !== "none")
                {
                    document.getElementById('new_user').style.display = "none";
                }
                if(document.getElementById('old_user').style.display !== "none")
                {
                    document.getElementById('old_user').style.display = "none";
                }
                break;
            case "new_user":
                if(document.getElementById('old_user').style.display !== "none")
                {
                    document.getElementById('old_user').style.display = "none";
                }
                if(document.getElementById('new_user').style.display !== "block")
                {
                    document.getElementById('new_user').style.display = "block";
                }
                break;
            case "old_user":
                if(document.getElementById('new_user').style.display !== "none")
                {
                    document.getElementById('new_user').style.display = "none";
                }
                if(document.getElementById('old_user').style.display !== "block")
                {
                    document.getElementById('old_user').style.display = "block";
                }
                break;
        }
    })
</script>