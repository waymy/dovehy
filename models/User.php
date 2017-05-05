<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "dove_user".
 *
 * @property string $uid
 * @property string $pid
 * @property string $username
 * @property string $password
 * @property string $token
 * @property string $mobile
 * @property string $email
 * @property string $qq
 * @property integer $level
 * @property integer $number
 * @property string $lastloginip
 * @property integer $lastlogintime
 * @property integer $login_num
 * @property string $expiredate
 * @property integer $status
 * @property string $createtime
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dove_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'username', 'password', 'token'], 'required'],
            [['level', 'number', 'lastlogintime', 'login_num', 'expiredate', 'status', 'createtime'], 'integer'],
            [['uid', 'pid', 'mobile'], 'string', 'max' => 11],
            [['username', 'password'], 'string', 'max' => 32],
            [['token'], 'string', 'max' => 64],
            [['email'], 'string', 'max' => 120],
            [['qq', 'lastloginip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'pid' => 'Pid',
            'username' => 'Username',
            'password' => 'Password',
            'token' => 'Token',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'qq' => 'Qq',
            'level' => 'Level',
            'number' => 'Number',
            'lastloginip' => 'Lastloginip',
            'lastlogintime' => 'Lastlogintime',
            'login_num' => 'Login Num',
            'expiredate' => 'Expiredate',
            'status' => 'Status',
            'createtime' => 'Createtime',
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function get_user(){
        $query = User::find();
        $query->joinWith(['access']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
    /**
     * 关联auth表
     */
    public function getAccess()
    {
            // hasOne要求返回两个参数 第一个参数是关联表的类名 第二个参数是两张表的关联关系
            // 这里uid是auth表关联id, 关联user表的uid id是当前模型的主键id
            return $this->hasMany(Access::className(), ['uid' => 'uid'])->joinWith(['group']);
     }

    public function addUser($data){
        if(empty($data['username']) && empty($data['password']) && empty($data['token'])){
            return ['result'=> 0, 'action' => 'alert','msg' => '请填写用户基本信息！'];
        }
        //用户是否存在
        $row_username = User::find()->where(array('username' => $data['username']))->count('uid');
        if($row_username){
            return['result'=> 0, 'action' => 'alert','msg' => '该用户名已存在！'];
        }
        //toke是否存在
        $row_token = User::find()->where(array('token' => $data['token']))->count('uid');
        if($row_token){
            return ['result'=> 0, 'action' => 'alert','msg' => '该token已存在！'];
        }
        $this->setAttributes($data);
        $this->uid  = $this->create_guid();
        $this->password = md5($this->password);
        if($this->save()){
            $url = Yii::$app->urlManager->createUrl(['menu/user']);
            return ['result'=> 1, 'action' => 'send_goto','msg' => array('msg' => '操作成功！','url' => $url)];
        }else{
            var_dump($this->getErrors());
            return ['result'=> 0, 'action' => 'alert','msg' => '操作失败！'];
        }
    }
    /**创建全球唯一标识id*/
    public function create_guid($flag =''){
        //$zimu = range('A','Z');
        //shuffle($zimu);
        $flag = $flag ? $flag : '';
        $uuid = $flag . rand(100000000,999999999);
        return $uuid;
    }
}
