<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dove_menu".
 *
 * @property string $id
 * @property string $pid
 * @property string $menuname
 * @property string $url
 * @property string $m
 * @property string $c
 * @property string $a
 * @property string $remark
 * @property integer $child
 * @property integer $listorder
 * @property integer $is_display
 * @property string $createtime
 * @property string $style
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dove_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'child', 'listorder', 'is_display', 'createtime'], 'integer'],
            [['menuname', 'm', 'c', 'a'], 'string', 'max' => 32],
            [['url'], 'string', 'max' => 180],
            [['remark', 'style'], 'string', 'max' => 255],
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
            'menuname' => 'Menuname',
            'url' => 'Url',
            'm' => 'M',
            'c' => 'C',
            'a' => 'A',
            'remark' => 'Remark',
            'child' => 'Child',
            'listorder' => 'Listorder',
            'is_display' => 'Is Display',
            'createtime' => 'Createtime',
            'style' => 'Style',
        ];
    }
}
