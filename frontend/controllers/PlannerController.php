<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\UserCRUD;
use common\models\Wishlist;
use common\models\GuestlistSearch;
use common\models\Guestlist;
use common\models\Todo;

class PlannerController extends Controller
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
                        'actions' => 
                            [
                                'dashboard',
                                'wishlist', 
                                'unwish',
                                'budget',
                                'remove-spend',
                                'profile',
                                'checklist',
                                'create-todo',
                                'update-todo',
                                'delete-todo',
                                'guestlist',
                                'create-guest',
                                'update-guest',
                                'delete-guest',
                            ],
                        'allow' => true,
                        'roles' => ['@'],
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

    public function uid()
    {
        return Yii::$app->user->identity->id;
    }

    public function findUserModel()
    {
        return UserCRUD::findOne($this->uid());
    }
    
    public function actionDashboard()
    {
        $this->layout = 'plannerLayout';

        $minSpend = 0;
        $maxSpend = 0;
        $model = $this->findUserModel();

        $wishlist = Wishlist::find()->where(['id_user' => $this->uid()]);
        $countWishlist = $wishlist->count();
        $wishlist = $wishlist->all();
        foreach ($wishlist as $wish) {
            $minSpend += $wish->vendor->min_price;
            $maxSpend += $wish->vendor->max_price;
        }

        $todos = Todo::find()->where(['id_user' => $this->uid()]);
        $allTodos = $todos->count();
        $done = $todos->andWhere(['status' => 'Done'])->count();

        $guestlist = Guestlist::find()->where(['id_user' => $this->uid()]);
        $countGuest = $guestlist->count();
        $notResponded = $guestlist->andWhere(['status' => 'Not Responded'])->count();
        $accepted = $guestlist->andWhere(['status' => 'Accepted'])->count();
        $declined = $guestlist->andWhere(['status' => 'Declined'])->count();
        
        return $this->render('dashboard', [
            'model' => $model,
            'minSpend' => $minSpend,
            'maxSpend' => $maxSpend,
            'allTodos' => $allTodos,
            'done' => $done,
            'countWishlist' => $countWishlist,
            'countGuest' => $countGuest,
            'notResponded' => $notResponded,
            'accepted' => $accepted,
            'declined' => $declined,
        ]);
    }

    public function actionWishlist()
    {
        $this->layout = 'plannerLayout';

        $wishlist = Wishlist::find()->where(['id_user' => $this->uid()]);
        $countWishlist = $wishlist->count();
        $pages = new Pagination(['totalCount' => $countWishlist, 'pageSize' => 6]);
        $wishlist = $wishlist->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('wishlist', [
            'countWishlist' => $countWishlist,
            'wishlist' => $wishlist,
            'pages' => $pages,
        ]);
    }

    public function actionUnwish($id)
    {
        $this->deleteWish($id);

        return $this->redirect(['wishlist']);
    }

    public function deleteWish($id)
    {
        $wish = Wishlist::findOne($id);
        if($wish->id_user == $this->uid()) {
            $wish->delete();
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBudget()
    {
        $this->layout = 'plannerLayout';
        
        $minSpend = 0;
        $maxSpend = 0;
        $avgSpend = 0;
        $myBudget = $this->findUserModel()->budget;
        
        $wishlist = Wishlist::find()
            ->where(['id_user' => $this->uid()]);
        $countWish = $wishlist->count();
        $wishlist = $wishlist->all();
        
        foreach ($wishlist as $wish) {
            $minSpend += $wish->vendor->min_price;
            $maxSpend += $wish->vendor->max_price;
            $avgSpend += ($minSpend + $maxSpend) / 2;
        }
        return $this->render('budget', [
            'myBudget' => $myBudget,
            'wishlist' => $wishlist,
            'minSpend' => $minSpend,
            'maxSpend' => $maxSpend,
            'avgSpend' => $avgSpend,
            'countWish' => $countWish,
        ]);
    }

    public function actionRemoveSpend($id)
    {
        $this->deleteWish($id);

        return $this->redirect(['budget']);
    }

    public function actionProfile()
    {
        $this->layout = 'plannerLayout';

        $model = $this->findUserModel($this->uid());
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
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionChecklist()
    {
        $this->layout = 'plannerLayout';
        
        $todos = Todo::find()
            ->where(['id_user' => $this->uid()])
            ->all();
        
        return $this->render('checklist', [
            'todos' => $todos,
        ]);
    }

    public function actionCreateTodo()
    {
        $this->layout = 'plannerLayout';

        $model = new Todo();
        $model->id_user = $this->uid();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['checklist']);
        }

        return $this->render('create-todo', [
            'model' => $model,
        ]);
    }

    public function actionUpdateTodo($id)
    {
        $this->layout = 'plannerLayout';

        $model = Todo::findOne($id);

        if ($model->id_user == $this->uid())
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['checklist']);
            }
    
            return $this->render('update-todo', [
                'model' => $model,
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteTodo($id)
    {
        $model = Todo::findOne($id);
        
        if($model->id_user == $this->uid()) {
            $model->delete();

            return $this->redirect(['checklist']);
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGuestlist()
    {
        $this->layout = 'plannerLayout';

        $guestlist = Guestlist::find()
            ->where(['id_user' => $this->uid()]);
        
        $countGuest = $guestlist->count();
        $amount = 0;
        foreach ($guestlist->all() as $guest) {
            $amount += $guest->amount;
        }
        $pages = new Pagination(['totalCount' => $countGuest, 'pageSize' => 10]);
        $guestlist = $guestlist->offset($pages->offset)
            ->limit($pages->limit)
            ->all();        
            
        return $this->render('guestlist', [
            'guestlist' => $guestlist,
            'amount' => $amount,
            'pages' => $pages,
        ]);
    }

    public function actionCreateGuest()
    {
        $this->layout = 'plannerLayout';

        $model = new Guestlist();
        $model->id_user = $this->uid();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['guestlist']);
        }

        return $this->render('create-guest', [
            'model' => $model,
        ]);
    }

    public function actionUpdateGuest($id)
    {
        $this->layout = 'plannerLayout';

        $model = Guestlist::findOne($id);

        if ($model->id_user == $this->uid())
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['guestlist']);
            }
    
            return $this->render('update-guest', [
                'model' => $model,
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteGuest($id)
    {
        $model = Guestlist::findOne($id);
        
        if($model->id_user == $this->uid()) {
            $model->delete();

            return $this->redirect(['guestlist']);
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
?>