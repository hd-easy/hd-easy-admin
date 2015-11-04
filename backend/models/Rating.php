<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $employee_id
 * @property integer $job_id
 * @property string $rating
 * @property string $created_at
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'employee_id', 'job_id'], 'integer'],
            [['created_at'], 'safe'],
            [['rating'], 'string', 'max' => 30]
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
            'employee_id' => 'Employee ID',
            'job_id' => 'Job ID',
            'rating' => 'Rating',
            'created_at' => 'Created At',
        ];
    }
}
