<?php

namespace app\controllers;

use app\models\Artists;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\swiftmailer\Mailer;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm as Login;
use app\models\ContactForm;
use app\models\Products;
use app\models\RegForm as Signup;
use yii\data\ActiveDataProvider;
use yii\mail\BaseMailer;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
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

    public function actionIndex()
    {
        $products = Products::find()->where("hide != 1")->orderBy('create_date')->limit(4)->all();
        return $this->render('index', ['products' => $products]);
    }


    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $form = new ContactForm();
        $notice = [];
        if($form->load(Yii::$app->request->post()) && $form->validate()){
            $name = Html::encode($form->name);
            $email = Html::encode($form->email);
            $subject = Html::encode($form->subject);
            $body = Html::encode($form->body);
            $check = Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo('to@domain.com')
                ->setSubject($subject)
                ->setHtmlBody('Сообщение от '. $name .' Email: '.$email.'<p>'.$body.'</p>')
                ->send();
            if($check == true) {
                $notice['text'] = "Вопрос отправлен";
                $notice['type'] = 1;
            } else {
                $notice['text'] = "Произошла ошибка";
                $notice['type'] = 0;
            }

        }
        return $this->render('contact', [
            'model' => $form,
            'notice' => $notice,
        ]);
    }

    public function actionArtists(){
        $artists = new ActiveDataProvider([
            'query' => Artists::find()->where(['hide' => 0]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render("artists", [
            "artists" => $artists,
        ]);
    }
    public function actionRegistration(){
        $model = new Signup();
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                return $this->redirect("login");
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    public function actionAbout(){
        return $this->render('about');
    }
}
