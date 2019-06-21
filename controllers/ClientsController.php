<?php

namespace app\controllers;

use app\models\Order;
use app\models\QueryClients;
use app\models\RealProperty;
use app\models\TypeProperty;
use Yii;
use app\models\Clients;
use app\models\ClientsSearch;
use app\models\OrderSearch;
use app\models\Users;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;


/**
 * ClientsController implements the CRUD actions for Clients model.
 */
class ClientsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Clients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clients model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $client = Clients::findOne($id);

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(['OrderSearch' => ["id_client" => $id]]);

        return $this->render('view', [
            'model' => $client,
            '$searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Clients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clients();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Clients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clients::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionQuery()
    {
        $clients = Clients::find()->select(['id', 'f', 'i', 'o'])->all();
        $clients = ArrayHelper::map($clients, 'id', 'fullName');
        $typeProperty = TypeProperty::find()->select(['id', 'title'])->all();
        $typeProperty = ArrayHelper::map($typeProperty, 'id', 'title');

        $model = new QueryClients();
        $clientModel = new Users();
        if(Yii::$app->request->getBodyParam('new_user') == 1)
        {
            if($clientModel->load(Yii::$app->request->post()) && $clientModel->save())
            {
                if($model->load(Yii::$app->request->post()) && $model->save())
                {
                    return $this->redirect(['search', 'id' => $model->id]);
                }

            }
        }else
        {
            if($model->load(Yii::$app->request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('query', [
            'model' => $model,
            'clients' => $clients,
            'typeProperty' => $typeProperty,
            'clientModel' => $clientModel
        ]);
    }

    public function actionCreateu($id)
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelClient = Clients::find()->where(['id' => $_POST['client']])->one();
            $modelClient->id_user = $model->id;
            $modelClient->save();
            return $this->redirect(['view', 'id' => $modelClient->id]);
        }
        $client = true;
        return $this->render('createu', [
            'model' => $model,
            'idClient' => $id,
            'client' => Clients::find()->where(['id' => $id])->one(),
        ]);
    }
}
