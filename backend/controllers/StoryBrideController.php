<?php

namespace backend\controllers;

use Yii;
use common\models\StoryBride;
use common\models\StoryBrideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * StoryBrideController implements the CRUD actions for StoryBride model.
 */
class StoryBrideController extends Controller
{
    public $path_web = '/wedding/common/uploads/story-bride/';             

    public function path_pc() {
        return Yii::getAlias('@common') . '/uploads/story-bride/';
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
     * Lists all StoryBride models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StoryBrideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 5,];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StoryBride model.
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
     * Creates a new StoryBride model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StoryBride();

        if ($model->load(Yii::$app->request->post())) {
            $time = new \DateTime('now', new \DateTimeZone('WIB'));
            $model->updated_at = $time->format('Y-m-d H:i:s');
            $model->file_photo = UploadedFile::getInstance($model, 'file_photo');
            $model->save();
            if ($model->file_photo && $model->validate()) {
                $model->pic_path = $this->path_pc() . $model->id_story . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->pic_path);
                $model->story_pic = $this->path_web . $model->id_story . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_story]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StoryBride model.
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
                if ($model->pic_path != null)
                    unlink($model->pic_path);
                
                $model->pic_path = $this->path_pc() . $model->id_story . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->pic_path);
                $model->story_pic = $this->path_web . $model->id_story . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_story]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StoryBride model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->story_pic)
            if(!unlink($model->pic_path)) {
                print_r($model->errors);
                die();
            }        
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StoryBride model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StoryBride the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StoryBride::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
