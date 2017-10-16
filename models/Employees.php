<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $dob
 * @property string $designation
 * @property string $joining_date
 * @property double $salary
 * @property string $photo
 * @property string $added_on
 * @property string $updated_on
 * @property integer $is_active
 *
 * @property Salaries[] $salaries
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'dob', 'designation', 'joining_date', 'salary'], 'required'],
            [['dob', 'photo', 'joining_date', 'added_on', 'updated_on'], 'safe'],
            [['salary'], 'number'],
            [['is_active'], 'integer'],
            [['name', 'designation'], 'string', 'max' => 60],
            [['email', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'dob' => 'Dob',
            'designation' => 'Designation',
            'joining_date' => 'Joining Date',
            'salary' => 'Salary',
            'photo' => 'Photo',
            'added_on' => 'Added On',
            'updated_on' => 'Updated On',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(Salaries::className(), ['employee_id' => 'id']);
    }
}