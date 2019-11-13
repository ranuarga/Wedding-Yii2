<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use common\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public $path_web = '/wedding/common/uploads/category/';             

    public function path_pc() {
        return Yii::getAlias('@common') . '/uploads/category/';
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	    $dataProvider->pagination = ['pageSize' => 5,];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            $model->file_photo = UploadedFile::getInstance($model, 'file_photo');
            $model->save();
            if ($model->file_photo && $model->validate()) {
                $model->pic_path = $this->path_pc() . $model->id_category . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->pic_path);
                $model->category_pic = $this->path_web . $model->id_category . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_category]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
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
                if ($model->pic_path) {
                    unlink($model->pic_path);
                }
                $model->pic_path = $this->path_pc() . $model->id_category . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->pic_path);
                $model->category_pic = $this->path_web . $model->id_category . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_category]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {  
        $model = $this->findModel($id);
        if($model->category_pic)
            if(!unlink($model->pic_path)) {
                print_r($model->errors);
                die();
            }        
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
