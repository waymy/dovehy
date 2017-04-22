<?php

namespace app\controllers;

use Yii;
use app\models\Menus;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Menu;


class SystemController extends Controller
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * 提示函数 自动判断是否是AJAX访问
     * @param  [type] $arr array('result'=> 0, 'action' => 'alert','msg' => '用户名或密码不对！'));
     * @return [type]
     */
    public function prompts($arr){
        $request = Yii::$app->request;
        if($request->isAjax){
            echo json_encode($arr);
            exit();
        }
    }

    /**
     * 增加菜单
     */
    public function actionMenus(){
        $model = new Menu();
        $menus = $model->getMenusList();
        return $this->render('menus',['menus'=>$menus]);
    }

    /**
     * edit menus
     * @param $id
     * @return json
     */
    public function actionEditMenu(){
        $req = Yii::$app->request;
        $id  = $req->get('id');
        if($req->get('act') == 'save'){
            $model = Menu::findOne($req->post('id'));
            if ($model->load(Yii::$app->request->post(),'') && $model->save()) {
                $res = ['result'=> 1, 'action' => 'reload','msg' => '操作成功！'];
            }else{
                $res = ['result'=> 0, 'action' => 'alert','msg' => '操作失败！'];
            }
            $this->prompts($res);
            exit;
        }
        $result = (new \yii\db\Query())->select([])
            ->from('dove_menu')
            ->where(['id' => $id])
            ->one();
        $this->prompts(['result'=> 1, 'action' => 'empty','msg' => $result]);
    }

    /**
     * 删除邮件
     * @throws NotFoundHttpException
     */
    public function actionDelMenu(){
        $res = Yii::$app->request;
        $id = intval($res->get('id'));
        if(!$id){
            $this->prompts(['result'=> 0, 'action' => 'alert','msg' => '系统繁忙，请稍后再试！']);
        }
        if($count = Menu::find()->where(['pid' => $id])->count()){
            $this->prompts(['result'=> 0, 'action' => 'alert','msg' => '请先删除子级栏目']);
        }
        $row = Menu::find()->where(['id' => $id])->asArray()->one();
        if($this->findModel($id)->delete()){
            if(!Menu::find()->where(array('pid' => $row['pid']))->count()){
                $menu= $this->findModel( $row['pid']);
                $menu->child = 0;
                $menu->save();
            }
            $this->prompts(array('result'=> 1, 'action' => 'reload','msg' => '操作成功！'));
        }else{
            $this->prompts(array('result'=> 0, 'action' => 'alert','msg' => '系统繁忙，请稍后再试！'));
        }
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActionLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
