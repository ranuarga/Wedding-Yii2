<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhotoVendor;

/**
 * PhotoVendorSearch represents the model behind the search form of `common\models\PhotoVendor`.
 */
class PhotoVendorSearch extends PhotoVendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_photo'], 'integer'],
            [['photo', 'id_vendor'], 'safe'],
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
        $query = PhotoVendor::find();

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

        $query->joinWith('vendor');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_photo' => $this->id_photo,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'vendor.vendor_name', $this->id_vendor]);

        return $dataProvider;
    }
}
