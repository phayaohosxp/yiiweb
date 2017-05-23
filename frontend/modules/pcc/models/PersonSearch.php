<?php

namespace frontend\modules\pcc\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pcc\models\Person;

/**
 * PersonSearch represents the model behind the search form about `frontend\modules\pcc\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age'], 'integer'],
            [['prename', 'name', 'lname', 'birth', 'addr', 'moo', 'prov_code', 'amp_code', 'tmb_code', 'lat', 'lon', 'rapid', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'safe'],
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
        $query = Person::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birth' => $this->birth,
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'addr', $this->addr])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'prov_code', $this->prov_code])
            ->andFilterWhere(['like', 'amp_code', $this->amp_code])
            ->andFilterWhere(['like', 'tmb_code', $this->tmb_code])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lon', $this->lon])
            ->andFilterWhere(['like', 'rapid', $this->rapid])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
