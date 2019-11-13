<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StoryBride;

/**
 * StoryBrideSearch represents the model behind the search form of `common\models\StoryBride`.
 */
class StoryBrideSearch extends StoryBride
{
    /**
     * @inheritdoc 
     */
    public function rules()
    {
        return [
            [['id_story'], 'integer'],
            [['title', 'content', 'story_pic', 'updated_at'], 'safe'],
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
        $query = StoryBride::find();

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
            'id_story' => $this->id_story,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->orFilterWhere(['like', 'content', $this->title])
            ->andFilterWhere(['like', 'story_pic', $this->story_pic]);

        return $dataProvider;
    }
}
