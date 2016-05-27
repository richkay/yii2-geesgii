<?php

namespace richkay\geesgii\controllers;

use Yii;
use richkay\geesgii\models\DevRecord;
use richkay\geesgii\models\DevRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DevRecordController implements the CRUD actions for DevRecord model.
 */
class DevRecordController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all DevRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DevRecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DevRecord model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DevRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DevRecord();
        if ($model->load(Yii::$app->request->post())) {
			$model->save();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
		echo json_encode($data);
    }
	
	public function actionSave()
    {
        $data = Yii::$app->request->post();
		$ns= $data['DevRecord']['ns'];
		if (($model = DevRecord::find()->where(['ns'=>$ns,'type_class'=>'M'])->one()) !== null) {
			if ($model->load(Yii::$app->request->post())) {
				$model->save();
				return '';
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}else{
			$model = new DevRecord();
			if ($model->load(Yii::$app->request->post())) {
				$model->save();
				return '';
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}
		echo json_encode($data);
    }

    /**
     * Updates an existing DevRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DevRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DevRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DevRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DevRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
