<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "dove_role".
 *
 * @property string $id
 * @property string $pid
 * @property string $rolename
 * @property string $remark
 * @property integer $status
 * @property integer $listorder
 * @property string $rules
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dove_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'listorder'], 'integer'],
            [['rules'], 'required'],
            [['rules'], 'string'],
            [['rolename'], 'string', 'max' => 32],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'rolename' => 'Rolename',
            'remark' => 'Remark',
            'status' => 'Status',
            'listorder' => 'Listorder',
            'rules' => 'Rules',
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Role::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        return $dataProvider;
    }
}
