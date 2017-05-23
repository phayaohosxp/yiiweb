<?php

namespace frontend\modules\dao\models;

use yii\base\Model;
use yii2mod\query\ArrayQuery;
use yii\data\ArrayDataProvider;

class RptSearch extends Model {

    public $val, $owner,$d_update; 
    public $d_begin,$d_end;
    
    function __construct($begin,$end){ 
        $this->d_begin = $begin;
        $this->d_end=$end;
    }

    public function attributeLabels() {
        return [
            'val' => 'ข้อมูล',
            'owner' => 'เจ้าของ'
        ];
    }

    public function rules() {
        return [
            [['val','owner','d_update'], 'safe']
        ];
    }

    public function search($params = null) {
        $sql = "select d.val,d.owner owner_id,u.username owner,d.d_update from data d ";
        $sql.= " left join user u on u.id=d.owner";
        if($this->d_begin and $this->d_end){
            $sql.=" where d.d_update between '$this->d_begin 00:00:00' AND '$this->d_end 23:59:59' ";            
        }

        $models = \Yii::$app->db->createCommand($sql)->queryAll();
        $query = new ArrayQuery();
        $query->from($models);
        
        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'val', $this->val]);
            $query->andFilterWhere(['like', 'owner', $this->owner]);            
           
        }
        
        
        $all_models = $query->all();        
        
        if (!empty($all_models[0])) {
            $cols = array_keys($all_models[0]);
        }

        return new ArrayDataProvider([
            'allModels' => $all_models,
            //'totalItems'=>100,
            'sort' => !empty($cols) ? ['attributes' => $cols] : FALSE,
            'pagination' => [
                'pageSize' => 25
            ]
        ]);
    }//search
}
