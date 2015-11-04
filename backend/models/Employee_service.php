<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_service".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $type_id
 * @property integer $salary
 * @property string $intro
 */
class Employee_service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id', 'type_id', 'salary'], 'integer'],
            [['intro'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'type_id' => 'Type ID',
            'salary' => 'Salary',
            'intro' => 'Intro',
        ];
    }
}
