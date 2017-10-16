<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salaries".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property double $salary
 * @property string $salary_date
 * @property string $variation_type
 * @property string $remarks
 * @property string $added_on
 * @property string $updated_on
 *
 * @property Employees $employee
 */
class Salaries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salaries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'salary', 'salary_date', 'variation_type', 'remarks'], 'required'],
            [['employee_id'], 'integer'],
            [['salary'], 'number'],
            [['salary_date', 'added_on', 'updated_on'], 'safe'],
            [['variation_type'], 'string'],
            [['remarks'], 'string', 'max' => 255],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee',
            'salary' => 'Salary',
            'salary_date' => 'Salary Date',
            'variation_type' => 'Variation Type',
            'remarks' => 'Remarks',
            'added_on' => 'Added On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::className(), ['id' => 'employee_id']);
    }
}
