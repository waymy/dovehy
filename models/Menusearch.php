<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menu;

/**
 * Menusearch represents the model behind the search form about `app\models\Menu`.
 */
class Menusearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'child', 'listorder', 'is_display', 'createtime'], 'integer'],
            [['menuname', 'url', 'm', 'c', 'a', 'remark', 'style'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = Menu::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'child' => $this->child,
            'listorder' => $this->listorder,
            'is_display' => $this->is_display,
            'createtime' => $this->createtime,
        ]);

        $query->andFilterWhere(['like', 'menuname', $this->menuname])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'm', $this->m])
            ->andFilterWhere(['like', 'c', $this->c])
            ->andFilterWhere(['like', 'a', $this->a])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'style', $this->style]);

        return $dataProvider;
    }
}
