<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Category;
use common\models\Location;
use common\models\StoryBride;
use common\models\UserCRUD;
use common\models\Todo;
use common\models\Vendor;
use common\models\PhotoVendor;
use common\models\Wishlist;
use common\models\Guestlist;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalCategory = Category::find()->count();
        $totalLocation = Location::find()->count();
        $totalStoryBride = StoryBride::find()->count();
        $totalUserCRUD = UserCRUD::find()->count();
        $totalTodo = Todo::find()->count();
        $totalVendor = Vendor::find()->count();
        $totalPhotoVendor = PhotoVendor::find()->count();
        $totalWishlist = Wishlist::find()->count();
        $totalGuestlist = Guestlist::find()->count();

        return $this->render('index', [
            'totalCategory' => $totalCategory,
            'totalLocation' => $totalLocation,
            'totalStoryBride' => $totalStoryBride,
            'totalUserCRUD' => $totalUserCRUD,
            'totalTodo' => $totalTodo,
            'totalVendor' => $totalVendor,
            'totalPhotoVendor' => $totalPhotoVendor,
            'totalWishlist' => $totalWishlist,
            'totalGuestlist' => $totalGuestlist,
        ]);

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->can('admin'))
                return $this->goBack();
            else {
                // put him out :P Automatically logout. 
                Yii::$app->user->logout();
                // set error on login page. 
                Yii::$app
                    ->getSession()
                    ->setFlash('error', 
                        'You are not authorized to login in admin panel');
                //redirect again page to login form.
                return $this->redirect(['site/login']);
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
