<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dove_auth_group_access".
 *
 * @property string $uid
 * @property string $group_id
 */
class Access extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dove_auth_group_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'group_id'], 'required'],
            [['uid', 'group_id'], 'integer'],
            [['uid', 'group_id'], 'unique', 'targetAttribute' => ['uid', 'group_id'], 'message' => 'The combination of Uid and Group ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'group_id' => 'Group ID',
        ];
    }
    public function getGroup(){
        return $this->hasMany(Group::className(), ['id' => 'uid']);
    }
}
