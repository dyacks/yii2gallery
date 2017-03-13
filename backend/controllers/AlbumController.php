<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;
use backend\models\Album;
//use app\models\UploadForm;

/**
 * Site controller
 */
class AlbumController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['album'],
                'rules' => [
                    [
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionAdd(){
        $model = new Album();
        return $this->render('createAlbum', ['model' => $model]);
    }

    public function actionUpload(){
        $model = new Album();
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request->post('Album');
            $model->name = $request['name'];
            $model->date = $request['date'];
            $model->description = $request['description'];

            $model->save();
            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->upload()) {
                $session = Yii::$app->session;
                $session->addFlash('info', 'Вы успешно добавили новый альбом');
                return $this->render('/photo\sortPhotos', ['model' => $model]);
            }
        }
        return $this->render('createAlbum', ['model' => $model]);
    }

    // for Test / after delete
    public function actionSortest($id){
        $id = Yii::$app->request->get('id');
        $model = Album::findOne($id);
        return $this->render('/photo\sortPhotos', ['model' => $model]);
    }

    public function actionSort(){
        return $this->render('sortAlbums');
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
            return $this->goBack();
        } else {
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
