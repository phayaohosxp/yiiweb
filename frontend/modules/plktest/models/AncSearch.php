<?php
namespace frontend\modules\plktest\models;

use yii\base\Model;
use yii2mod\query\ArrayQuery;
use yii\data\ArrayDataProvider;

class AncSearch extends Model {
    public $hospcode, $hosname,$b,$a; 
    public $date1,$date2;
    
    function __construct($date1,$date2){ 
        $this->date1 = $date1;
        $this->date2 = $date2;
    }
    public function attributeLabels() {
        return [
            'hospcode' => 'รหัส',
            'hosname' => 'หน่วยบริการ',
            'b'=>'เป้าหมาย',
            'a'=>'ผลงาน'
        ];
    }
    public function rules() {
        return [
            [['hospcode','hosname','b','a'], 'safe']
        ];
    }
    public function search($params = null) {
        $sql = " SELECT p.check_hosp hospcode,h.hosname

,COUNT(DISTINCT CONCAT(l.cid,'-',l.bdate)) b
,COUNT(DISTINCT IF( a.g1_ga <=12, CONCAT(a.cid,'-',a.bdate),NULL)) a

FROM	t_labor l 
INNER JOIN t_person_cid p ON l.cid=p.cid
INNER JOIN chospital_amp h ON p.check_hosp=h.hoscode
LEFT JOIN t_person_anc a ON l.cid=a.cid AND l.bdate =a.bdate
WHERE p.check_typearea in(1,3) AND p.discharge IN(9)
AND p.nation in(99)  
";
        
        if($this->date1 and $this->date2){
            $sql.="AND l.BDATE BETWEEN '$this->date1' AND '$this->date2' ";           
        }
        $sql.=" GROUP BY p.check_hosp ";
        
        $models = \Yii::$app->db->createCommand($sql)->queryAll();
        $query = new ArrayQuery();
        $query->from($models);
        
        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'hospcode', $this->hospcode]);
            $query->andFilterWhere(['like', 'hosname', $this->hosname]);            
           
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

