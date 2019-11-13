<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\LoginForm;
use common\models\Vendor;
use frontend\models\VendorSearch;
use common\models\PhotoVendor;
use common\models\Category;
use common\models\StoryBride;
use common\models\StoryBrideSearch;
use common\models\Wishlist;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup', 'wish'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'wish'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'indexLayout';
        
        $categories = Category::find();
        $count = $categories->count();
        $categories = $categories->all();
        $stories = StoryBride::find()->offSet(1)->limit(3)->all();

        return $this->render('index', [
            'categories' => $categories,
            'count' => $count,
            'stories' => $stories,
        ]);
    }

    /**
     * Lists all StoryBride models.
     * @return mixed
     */
    public function actionStory()
    {        
        $searchModel = new StoryBrideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $pages = new Pagination(['totalCount' => $dataProvider->query->count(), 'pageSize' => 3]);
        $recents = $dataProvider->query->orderBy(['updated_at' => SORT_ASC])->limit(5)->all();
        $dataProvider = $dataProvider->query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        
        return $this->render('story', [
            'models' => $dataProvider,
            'searchModel' => $searchModel,
            'recents' => $recents,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single StoryBride model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewStory($id)
    {
        $recents = StoryBride::find()
            ->orderBy(['updated_at' => SORT_ASC])
            ->limit(3)
            ->all();

        return $this->render('view-story', [
            'model' => $this->findStoryModel($id),
            'recents' => $recents,
        ]);
    }

    /**
     * Finds the StoryBride model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StoryBride the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findStoryModel($id)
    {
        if (($model = StoryBride::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Displays Vendor based on Category.
     *
     * @return mixed
     */
    public function actionVendor($id)
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['vendor.id_category' => $id]);
        $vendorsCount = $dataProvider->query->count();
        $pages = new Pagination(['totalCount' => $vendorsCount, 'pageSize' => 9]);
        $dataProvider = $dataProvider->query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $category = Category::findOne($id);
        
        return $this->render('vendor', [
            'vendors' => $dataProvider,
            'searchModel' => $searchModel,
            'vendorsCount' => $vendorsCount,
            'category' => $category,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Vendor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewVendor($id)
    {
        $model = $this->findVendorModel($id);
        $recommends = Vendor::find()
            ->where(['id_location' => $model->id_location])
            ->andWhere(['!=', 'id_vendor', $model->id_vendor])
            ->limit(3)->all();
        $photos = PhotoVendor::find()
            ->where(['id_vendor' => $model->id_vendor])->all();
        
        return $this->render('view-vendor', [
            'model' => $model,
            'photos' => $photos,
            'recommends' => $recommends,
        ]);
    }

    /**
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVendorModel($id)
    {
        if (($model = Vendor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Add Vendor to Wishlist.
     * @param integer $id
     * @return mixed
     */
    public function actionWish($id)
    {
        $wish = Wishlist::find()
            ->where(['id_vendor' => $id])
            ->andWhere(['id_user' => Yii::$app->user->identity->id])
            ->one();

        if($wish == null) {
            $wish = new Wishlist();
            $wish->id_vendor = $id;
            $wish->id_user = Yii::$app->user->identity->id;
            $wish->save();
        }
        
        Yii::$app->session->setFlash('success', 'Added to Wishlist');
        // Back to vendor listing based on category
        return $this->redirect(['vendor', 'id' => $wish->vendor->id_category]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
