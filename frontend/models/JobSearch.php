<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Job;

/**
 * JobSearch represents the model behind the search form about `frontend\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['date_add', 'device_type', 'device_sn', 'customer', 'date_recept', 'job_rapid', 'job_status', 'date_end', 'job_note'], 'safe'],
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
        $query = Job::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>20
            ]
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
            'date_add' => $this->date_add,
            'date_recept' => $this->date_recept,
            'date_end' => $this->date_end,
        ]);

        $query->andFilterWhere(['like', 'device_type', $this->device_type])
            ->andFilterWhere(['like', 'device_sn', $this->device_sn])
            ->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'job_rapid', $this->job_rapid])
            ->andFilterWhere(['like', 'job_status', $this->job_status])
            ->andFilterWhere(['like', 'job_note', $this->job_note]);

        return $dataProvider;
    }
}
