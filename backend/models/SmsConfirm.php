<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms_confirm".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $confirm_code
 * @property string $time
 */
class SmsConfirm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_confirm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'confirm_code', 'time'], 'required'],
            [['time'], 'safe'],
            [['mobile'], 'string', 'max' => 20],
            [['confirm_code'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'confirm_code' => 'Confirm Code',
            'time' => 'Time',
        ];
    }
}
