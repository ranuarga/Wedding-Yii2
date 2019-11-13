<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vendor;

/**
 * VendorSearch represents the model behind the search form of `common\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vendor', 'id_category', 'id_location', 'max_price', 'min_price', 'quantity'], 'integer'],
            [['vendor_name', 'address', 'email', 'phone', 'website', 'content', 'rating'], 'safe'],
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
        $query = Vendor::find();

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
            'id_vendor' => $this->id_vendor,
            'id_category' => $this->id_category,
            'id_location' => $this->id_location,
            // 'max_price' => $this->max_price,
            // 'min_price' => $this->min_price,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'vendor_name', $this->vendor_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['>=', 'min_price', $this->min_price])
            ->andFilterWhere(['<=', 'max_price', $this->max_price]);

        return $dataProvider;
    }
}
