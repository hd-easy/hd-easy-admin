<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $agency_id
 * @property integer $employee_id
 * @property integer $job_id
 * @property string $messages
 * @property string $create_time
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id', 'agency_id', 'employee_id', 'job_id'], 'integer'],
            [['create_time'], 'safe'],
            [['messages'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'agency_id' => 'Agency ID',
            'employee_id' => 'Employee ID',
            'job_id' => 'Job ID',
            'messages' => 'Messages',
            'create_time' => 'Create Time',
        ];
    }
}
