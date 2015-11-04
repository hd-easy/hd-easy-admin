<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property integer $job_id
 * @property integer $user_id
 * @property integer $agency_id
 * @property integer $employee_id
 * @property string $create_time
 * @property string $update_time
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'user_id', 'agency_id', 'employee_id'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'job_id' => '工作ID',
            'user_id' => '用戶ID',
            'agency_id' => '中介',
            'employee_id' => '僱員ID',
            'update_time' => '最后更新',
            'update_time' => '创建时间',
        ];
    }
}
