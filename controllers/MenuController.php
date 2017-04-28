<?php

namespace app\controllers;

use Yii;
use app\models\Menu;
use app\models\Role;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * MenuController implements the CRUD actions for Menu model.
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
     * 状态管理
     */
    public function actionSetDisplay(){
        if(!$id = intval(Yii::$app->request->get('id'))){
            $this->prompts(array('result'=> 0, 'action' => 'alert','msg' => '系统繁忙，请稍后再试！'));
            exit();
        }
        $has = Yii::$app->request->get('has');
        $menu= $this->findModel($id);
        $menu->is_display = $has;
        $menu->save();
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
        //$result = Role::find()->asArray()->all();
        /*$query = Menu::find();
        $result = $this->getPagedRows($query,['pageSize'=>10]);
        print_r($result['rows']);
        return $this->render('role',['result'=>$result]);*/
        $searchModel = new Role();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('role', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMenuList(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('roleid');
            $post = implode(',',Yii::$app->request->post('post'));
            $model = Role::findOne($id);
            $model->rules = $post;
            $model->save();
            $this->prompts(array('result'=> 1, 'action' => 'eval','msg' => "parent.closeModal('menuPriv')"));
            exit();

        }else{
            $id = Yii::$app->request->get('id');
            $result['menu']= Menu::find()->where(['is_display'=>1])->select('id,pid,is_display,listorder,menuname')->orderBy('listorder asc,id asc')->asArray('id,pid,is_display,listorder,menuname')->all();
            $role = Role::find()->select('rules')->asArray()->where(['id'=>$id])->asArray()->one();
            //组合权限
            $result['priv'] = explode(',',$role['rules']);
            foreach ($result['menu'] as $k => $v) {
               $result['menu'][$k]['priv'] = 0;
               if(in_array($v['id'], $result['priv'])){
                   $result['menu'][$k]['priv'] = 1;
               }
            }
            $menus = Menu::channel($result['menu'],1);
            return $this->renderPartial('menulist',['menus'=>$menus,'roleid'=>$id]);
        }
    }

    /************************* 用户管理 *********************/
    /**
     * 用户管理
     */
    public function actionUser(){
        $userModel = new User();
        $dataProvider  = $userModel->get_user();
        return $this->render('user',['dataProvider' => $dataProvider]);
    }
    /************************ 用户管理end *****************/
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
     *
     * @param unknown $query
     * @param array $config ['db','page','pageSize','orderBy','rows','pager']
     * @return multitype:\yii\data\Pagination unknown
     */
    public static function getPagedRows($query, $config = [])
    {
        $db = isset($config['db'])?$config['db']:null;
        $countQuery = clone $query;
        $pager = new Pagination([
            'totalCount' => $countQuery->count('*', $db),
        ]);
        if (isset($config['page'])){
            $pager->setPage($config['page'], true);
        }

        if (isset($config['pageSize'])){
            $pager->setPageSize($config['pageSize'], true);
        }
        $rows = $query->offset($pager->offset)->limit($pager->limit);
        if (isset($config['orderBy'])){
            $rows = $rows->orderBy($config['orderBy']);
        }
        $rows = $rows->all($db);

        $rowsLable = isset($config['rows']) ? $config['rows'] : 'rows';
        $pagerLable = isset($config['pager']) ? $config['pager'] : 'pager';
        $ret = [];
        $ret[$rowsLable] = $rows;
        $ret[$pagerLable] = $pager;
        return $ret;
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
