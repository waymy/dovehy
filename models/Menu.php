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

    /**
     * 查询全部菜单数据
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getMenusList(){
        $result = Menu::find()->select('id,pid,is_display,listorder,menuname')->orderBy('listorder asc,id asc')->asArray('id,pid,is_display,listorder,menuname')->all();
        $menu = $this->channel($result,1);
        return $menu;
    }

    /**
     * 递归操作数组创建树状等级数组(可用于递归栏目操作)
     * @param array  $data           操作的数组
     * @param string $fieldPri      唯一键名，如果是表则是表的主键
     * @param string $fieldPid      父ID键名
     * @param number $pid           一级PID的值
     * @param number $sid           子ID用于获得指定指ID的所有父ID栏目
     * @param number $type          操作方式1=>返回多维数组,2=>返回一维数组,3=>得到指定子ID(参数$sid)的所有父栏目
     * @param string $html          栏目名称前缀，用于在视图中显示层次感的栏目列表
     * @return arary
     */
    public function channel($data, $type = 2, $fieldPri = 'id', $fieldPid = 'pid', $pid = 0, $sid = '', $html = "---", $level = 1) {
        if (!$data) {
            return array();
        }
        switch ($type) {
            case 1:
                $arr = array();
                foreach ($data as $v) {
                    if ($v[$fieldPid] == $pid) {
                        $arr[$v[$fieldPri]] = $v;
                        $arr[$v[$fieldPri]]['html'] = str_repeat($html, $level-1);
                        $arr[$v[$fieldPri]]["data"] = $this->channel($data, $type, $fieldPri, $fieldPid, $v[$fieldPri], $sid,  $html,$level + 1);
                    }
                }
                return $arr;
            case 2:
                $arr = array();
                $id=0;
                foreach ($data as $v) {
                    if ($v[$fieldPid] == $pid) {
                        $arr[$id] = $v;
                        $arr[$id]['level'] = $level;
                        $arr[$id]['html'] = str_repeat($html, $level-1);
                        $sArr = array();
                        $sArr = $this->channel($data, $type, $fieldPri, $fieldPid, $v[$fieldPri], $sid,  $html, $level + 1);
                        $arr = array_merge($arr,$sArr);
                        $id=count($arr);
                    }
                }
                return $arr;
            case 3:
                $arr = array();
                foreach ($data as $v) {
                    if ($v[$fieldPri] == $sid) {
                        $arr[] = $v;
                        $sArr = array();
                        $sArr = $this->channel($data, $type, $fieldPri, $fieldPid, $pid, $v[$fieldPid], $html, $level + 1);
                        $arr = array_merge($arr,$sArr);
                    }
                }
                return ($arr);
        }
    }
    /**
     *
     */
    public function getEditMenu(){

    }
}
