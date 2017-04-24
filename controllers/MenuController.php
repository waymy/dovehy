<?php

namespace app\controllers;

use Yii;
use app\models\Menu;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenusearchController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Menu();
        $menus = $model->getMenusList();
        return $this->render('index',['menus'=>$menus]);
    }

    /**
     * edit menus
     * @param $id
     * @return json
     */
    public function actionEditMenu(){
        $req = Yii::$app->request;
        if($req->get('act') == 'save'){
            $model = $this->findModel($req->post('id'));
            if ($model->load(Yii::$app->request->post(),'') && $model->save()) {
                $res = ['result'=> 1, 'action' => 'reload','msg' => '操作成功！'];
            }else{
                $res = ['result'=> 0, 'action' => 'alert','msg' => '操作失败！'];
            }
            $this->prompts($res);
        }else{
            $id  = $req->get('id');
            $result = Menu::find()
                ->where(['id' => $id])
                ->asArray()
                ->one();
            $this->prompts(['result'=> 1, 'action' => 'empty','msg' => $result]);
        }
    }

    /**
     * 增加菜单
     */
    public function actionDealMenu(){
        if(!Yii::$app->request->isPost){
            $this->prompts(array('result'=> 0, 'action' => 'alert','msg' => '您访问的页面不存在！'));
        }
        //修改 排序
        if(!empty(Yii::$app->request->post('name'))){
            $data = [];
            $sql = '';
            $order = Yii::$app->request->post('order');
            foreach (Yii::$app->request->post('name') as $key => $value) {
                $sql .= 'update '.Menu::tableName().' set menuname = "'.htmlspecialchars($value).'",listorder = "'.intval($order[$key]).'"  where id = '.$key .';';
            }
            Yii::$app->db->createCommand($sql)->execute();
        }

        //添加顶级菜单
        $new1level = Yii::$app->request->post('new1level');
        if(isset($new1level) && !empty($new1level)){
             foreach ($new1level as $k => $v) {
                $model = new Menu();
                $model->menuname = htmlspecialchars($v);
                $model->listorder = intval($_POST['newcatorder'][$k]);
                $model->createtime = time();

                if(!$model->save()){
                    $this->prompts(array('result'=> 0, 'action' => 'alert','msg' => '操作失败！'));
                    exit();
                }
            }
        }

         //添加子级菜单
        $new2level = Yii::$app->request->post('new2level');
        if(isset($new2level) && !empty($new2level)){
             foreach ($new2level as $k => $v) {
                 foreach ($v as $key => $value) {
                     $model = new Menu();
                     $model->pid = intval($k);
                     $model->menuname = htmlspecialchars($value);
                     $model->listorder = intval(Yii::$app->request->post('neworder')[$k][$key]);
                     $model->createtime = time();
                     if(!$model->save()){
                         $this->prompts(array('result'=> 0, 'action' => 'alert','msg' => '操作失败！'));
                         exit();
                     }
                     $menu= $this->findModel( $k);
                     $menu->child = 1;
                     $menu->save();
                 }
             }
         }
         $this->prompts(array('result'=> 1, 'action' => 'reload','msg' => '操作成功！'));
    }

    /**
     * 删除菜单
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

    public function actionRole(){
        return $this->render('role');
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Menu the loaded model
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
