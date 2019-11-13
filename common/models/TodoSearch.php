<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Todo;

/**
 * TodoSearch represents the model behind the search form of `common\models\Todo`.
 */
class TodoSearch extends Todo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_todo'], 'integer'],
            [['todo_name', 'due_date', 'status', 'id_user', 'id_category'], 'safe'],
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
        $query = Todo::find();

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

        $query->joinWith('user');
        $query->joinWith('category');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_todo' => $this->id_todo,
            'due_date' => $this->due_date,
        ]);

        $query->andFilterWhere(['like', 'todo_name', $this->todo_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'user.username', $this->id_user])
            ->andFilterWhere(['like', 'category.category_name', $this->id_category]);

        return $dataProvider;
    }
}
