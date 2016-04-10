<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ConstructionDiary;
use frontend\models\ConstructionDiarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * ConstructionDiaryController implements the CRUD actions for ConstructionDiary model.
 */
class ConstructionDiaryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ConstructionDiary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConstructionDiarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConstructionDiary model.
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
     * Creates a new ConstructionDiary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ConstructionDiary();

        if ($model->load(Yii::$app->request->post())) {
            // get the instance of the uploaded file
            $imageName = $model->csite_name;
            $model->file = UploadedFile::getInstance($model, 'image');
            $model->file->saveAs( 'uploads/' . $imageName . '.' . $model->file->extension );

            // save the path in to Database
            $model->image = 'uploads/' . $imageName . "." . $model->file->extension;


            $model->user_id = Yii::$app->user->getId();
            $model->save();
            return $this->redirect(['view', 'id' => $model->csdiary_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ConstructionDiary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->csdiary_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ConstructionDiary model.
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
     * Finds the ConstructionDiary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConstructionDiary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConstructionDiary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
