<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dove_auth_group".
 *
 * @property string $id
 * @property string $title
 * @property integer $status
 * @property string $rules
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dove_auth_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['rules'], 'string'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'rules' => 'Rules',
        ];
    }
}
