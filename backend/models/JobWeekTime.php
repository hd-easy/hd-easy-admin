<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_week_time".
 *
 * @property integer $id
 * @property integer $job_id
 * @property string $week
 * @property string $beginning_date
 * @property string $beginning_time
 * @property string $end_time
 * @property string $created_at
 */
class JobWeekTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_week_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id'], 'integer'],
            [['beginning_date', 'created_at'], 'safe'],
            [['week'], 'string', 'max' => 30],
            [['beginning_time', 'end_time'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'week' => 'Week',
            'beginning_date' => 'Beginning Date',
            'beginning_time' => 'Beginning Time',
            'end_time' => 'End Time',
            'created_at' => 'Created At',
        ];
    }
}
