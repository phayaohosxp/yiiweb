<?php

namespace frontend\modules\visit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\visit\models\Tbperson;

/**
 * TbpersonSearch represents the model behind the search form about `frontend\modules\visit\models\Tbperson`.
 */
class TbpersonSearch extends Tbperson {

    /**
     * @inheritdoc
     */
    public $glob_find;

    public function rules() {
        return [
            [['id', 'age_y'], 'integer'],
            [['prename', 'name', 'lname', 'birth', 'sex', 'addr', 'prov_code', 'amp_code', 'tmb_code', 'dischage_code', 'color', 'note'], 'safe'],
            [['glob_find','created_by'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Tbperson::find();
        $query->joinWith('prov')->joinWith('ampur')->joinWith('tambon');

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
            'birth' => $this->birth,
            'age_y' => $this->age_y,
        ]);

        $query->andFilterWhere(['like', 'prename', $this->prename])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'lname', $this->lname])
                ->andFilterWhere(['like', 'sex', $this->sex])
                ->andFilterWhere(['like', 'addr', $this->addr])
                ->andFilterWhere(['like', 'c_province.changwatname', $this->prov_code])
                ->andFilterWhere(['like', 'c_ampur.ampurname', $this->amp_code])
                ->andFilterWhere(['like', 'c_tambon.tambonname', $this->tmb_code])
                ->andFilterWhere(['like', 'dischage_code', $this->dischage_code])
                ->andFilterWhere(['like', 'color', $this->color])
                ->andFilterWhere(['like', 'note', $this->note])
                ->andFilterWhere(['like','created_by',  $this->created_by]);

        if ($this->glob_find) {
            $query->orFilterWhere(['like', 'prename', $this->glob_find])
                    ->orFilterWhere(['like', 'name', $this->glob_find])
                    ->orFilterWhere(['like', 'lname', $this->glob_find])
                    ->orFilterWhere(['like', 'addr', $this->glob_find])
                    ->orFilterWhere(['like', 'c_province.changwatname', $this->glob_find])
                    ->orFilterWhere(['like', 'c_ampur.ampurname', $this->glob_find])
                    ->orFilterWhere(['like', 'c_tambon.tambonname', $this->glob_find])
                    ->orFilterWhere(['like', 'note', $this->glob_find]);
                    
        }



        return $dataProvider;
    }

}
