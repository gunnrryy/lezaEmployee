<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salaries;

/**
 * SalarySearch represents the model behind the search form about `app\models\Salaries`.
 */
class SalarySearch extends Salaries
{
    public $below;
    public $above;
    public $beforeDate;
    public $afterDate;
    public $remark;
    
    
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee',
            'above' => 'Salary Above',
            'below' => 'Salary Below',
            'beforeDate' => 'Salary Date Before',
            'afterDate' => 'Salary Date After',
            'remark' => 'Remark',
        ];
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id'], 'integer'],
            [['salary'], 'number'],
            [['salary_date', 'variation_type', 'remarks', 'added_on', 'updated_on'], 'safe'],
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
//        print_r($params);
//        die();
        $query = Salaries::find();

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
            'employee_id' => $this->employee_id,
            'salary' => $this->salary,
            'salary_date' => $this->salary_date,
            'added_on' => $this->added_on,
            'updated_on' => $this->updated_on,
        ]);
        
        if (!empty($params['SalarySearch']['above'])) {
            $query->andWhere(['>', 'salary', $params['SalarySearch']['above']]);
        }
        if (!empty($params['SalarySearch']['below'])) {
            $query->andWhere(['<', 'salary', $params['SalarySearch']['below']]);
        }
        
        if (!empty($params['SalarySearch']['afterDate'])) {
            $query->andWhere(['>', 'salary_date', $params['SalarySearch']['afterDate']]);
        }
        if (!empty($params['SalarySearch']['beforeDate'])) {
            $query->andWhere(['<', 'salary_date', $params['SalarySearch']['beforeDate']]);
        }
        if (!empty($params['SalarySearch']['remark'])) {
            $query->andWhere(['like', 'remarks', "{$params['SalarySearch']['remark']}"]);
        }

//        echo $query->createCommand()->rawSql;
//        die();
        $query->andFilterWhere(['like', 'variation_type', $this->variation_type])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
