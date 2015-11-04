<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_image".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $image
 * @property string $create_time
 */
class EmployeeImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['create_time'], 'safe'],
            [['image'], 'string', 'max' => 100]
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
            'image' => 'Image',
            'create_time' => 'Create Time',
        ];
    }
}
