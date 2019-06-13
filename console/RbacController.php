<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $role = ['root' => '', 'admin' => '', ];
        $table = ['user', 'clients', 'orders', 'tour'];
        $permission = ['create', 'read', 'update', 'delete', 'hard_delete'];
        $tablePermission = [];
        foreach ($role as $key => $item)
        {
//            $item = $auth->createRole($key);
//            $auth->add($item);
            echo "add Role: $key \n\r";
        }
        foreach ($table as $item)
        {
            foreach ($permission as $value)
            {
                array_push($tablePermission, $item. ucfirst($value));
            }
        }
        array_flip($tablePermission);
        foreach ($tablePermission as $key => $item)
        {
//            $item = $auth->createPermission($key);
//            $auth->add($item);
            echo "add Permission: $key \n\r";
        }
    }
}