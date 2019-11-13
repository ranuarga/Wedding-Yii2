<?php

namespace backend\controllers;

use Yii;
use common\models\PhotoVendor;
use common\models\PhotoVendorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PhotoVendorController implements the CRUD actions for PhotoVendor model.
 */
class PhotoVendorController extends Controller
{
    public $path_web = '/wedding/common/uploads/photo-vendor/';             

    public function path_pc() {
        return Yii::getAlias('@common') . '/uploads/photo-vendor/';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PhotoVendor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoVendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	    $dataProvider->pagination = ['pageSize' => 5,];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhotoVendor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PhotoVendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhotoVendor();

        if ($model->load(Yii::$app->request->post())) {
            $model->file_photo = UploadedFile::getInstance($model, 'file_photo');
            $model->save();
            if ($model->file_photo && $model->validate()) {
                $model->photo_path = $this->path_pc() . $model->id_photo . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->photo_path);
                $model->photo = $this->path_web . $model->id_photo . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_photo]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PhotoVendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file_photo = UploadedFile::getInstance($model, 'file_photo');
            if ($model->file_photo && $model->validate()) {
                if ($model->photo_path != null)
                    unlink($model->photo_path);
                
                $model->photo_path = $this->path_pc() . $model->id_photo . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->photo_path);
                $model->photo = $this->path_web . $model->id_photo . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_photo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PhotoVendor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->photo)
            if(!unlink($model->photo_path)) {
                print_r($model->errors);
                die();
            }        
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the PhotoVendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PhotoVendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhotoVendor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
