<?php

namespace backend\controllers;

use Yii;
use common\models\UserCRUD;
use common\models\Todo;
use common\models\UserCRUDSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException; 
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use frontend\models\SignupForm;
use common\models\AuthAssignment;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for UserCRUD model.
 */
class UserController extends Controller
{
    public $path_web = '/wedding/common/uploads/user/';             

    public function path_pc() {
        return Yii::getAlias('@common') . '/uploads/user/';
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'create-admin'],
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
     * Lists all UserCRUD models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserCRUDSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserCRUD model.
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
     * Creates a new UserCRUD model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $todos = Todo::find()->where(['id_user' => null])->all();
                foreach($todos as $todo) 
                { 
                    $clone = new Todo();
                    $clone->attributes = $todo->attributes;
                    $clone->id_todo = null;
                    $clone->id_user = $user->id;
                    $clone->save(); 
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Create New Admin.
     *
     * @return mixed
     */
    public function actionCreateAdmin()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                // if (Yii::$app->getUser()->login($user)) {
                //     return $this->goHome();
                // }
                $admin = new AuthAssignment();
                $admin->item_name = 'admin';
                $admin->user_id = $user->id;
                if(!$admin->save()){
                    print_r($admin->errors);
                    die();
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create-admin', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UserCRUD model.
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
                
                $model->pic_path = $this->path_pc() . $model->id . '.' . $model->file_photo->extension;
                $model->file_photo->saveAs($model->pic_path);
                $model->user_pic = $this->path_web . $model->id . '.' . $model->file_photo->extension;
            }
            $model->file_photo = null;
            $model->save();        
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserCRUD model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->user_pic)
            if(!unlink($model->pic_path)) {
                print_r($model->errors);
                die();
            }        
        $model->delete();
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserCRUD model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserCRUD the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserCRUD::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
