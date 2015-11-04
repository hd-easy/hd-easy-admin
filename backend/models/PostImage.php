<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_image".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $image
 * @property string $create_time
 */
class PostImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
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
            'post_id' => 'Post ID',
            'image' => 'Image',
            'create_time' => 'Create Time',
        ];
    }
}
