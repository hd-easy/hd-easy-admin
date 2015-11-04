<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $job_id
 * @property integer $user_id
 * @property integer $agency_id
 * @property string $messages
 * @property string $create_time
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'user_id', 'agency_id'], 'integer'],
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
            'job_id' => 'Job ID',
            'user_id' => 'User ID',
            'agency_id' => 'Agency ID',
            'messages' => 'Messages',
            'create_time' => 'Create Time',
        ];
    }
}
