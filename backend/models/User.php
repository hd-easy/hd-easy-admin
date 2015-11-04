<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $mobile
 * @property string $password
 * @property string $wechat
 * @property string $qq
 * @property string $weibo
 * @property string $display_name
 * @property string $image
 * @property string $is_employee
 * @property string $is_employer
 * @property string $create_time
 * @property string $city
 * @property string $province
 * @property string $district
 * @property string $longitude
 * @property string $latitude
 * @property string $address
 * @property string $claims
 * @property integer $balance
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['balance'], 'integer'],
            [['mobile'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 60],
            [['wechat', 'qq', 'weibo', 'longitude', 'latitude'], 'string', 'max' => 40],
            [['display_name', 'image'], 'string', 'max' => 50],
            [['is_employee', 'is_employer'], 'string', 'max' => 1],
            [['city', 'province', 'district'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 300],
            [['claims'], 'string', 'max' => 10]
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
            'password' => 'Password',
            'wechat' => 'Wechat',
            'qq' => 'Qq',
            'weibo' => 'Weibo',
            'display_name' => 'Display Name',
            'image' => 'Image',
            'is_employee' => 'Is Employee',
            'is_employer' => 'Is Employer',
            'create_time' => 'Create Time',
            'city' => 'City',
            'province' => 'Province',
            'district' => 'District',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'address' => 'Address',
            'claims' => 'Claims',
            'balance' => 'Balance',
        ];
    }
}
