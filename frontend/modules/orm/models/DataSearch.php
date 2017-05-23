<?php

namespace frontend\modules\orm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\orm\models\Data;

/**
 * DataSearch represents the model behind the search form about `frontend\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['val', 'owner','d_update'], 'safe'],            
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
        $query = Data::find();
        $query->joinWith('user');

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
        ]);

        $query->andFilterWhere(['like', 'val', $this->val])
           // ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'd_update', $this->d_update])
            ->andFilterWhere(['like', 'user.username', $this->owner]);

        return $dataProvider;
    }
}
