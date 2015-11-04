<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property string $rating
 * @property string $identity_authorized
 * @property string $mobile_authorized
 * @property string $service_type
 * @property string $is_cleaning
 * @property string $is_housekeeper
 * @property string $is_elderlycare
 * @property string $is_matron
 * @property string $is_cook
 * @property string $is_babysitter
 * @property string $intro
 * @property integer $age
 * @property string $gender
 * @property string $nationality
 * @property string $language
 * @property string $last_update
 * @property string $create_time
 * @property string $image
 * @property integer $expected_salary
 * @property string $name
 *  @property string $tel
 *  @property string $province
 * @property string $city
 * @property string $district
 *@property string $qq
 * @property string $wechat
 * @property string $source
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'age', 'company_id','expected_salary'], 'integer'],
            [['last_update', 'create_time'], 'safe'],
            [['status','tel','province', 'city', 'district','qq','wechat', 'source'], 'string', 'max' => 30],
            [['rating', 'is_cleaning', 'is_housekeeper', 'is_elderlycare', 'is_matron', 'is_cook', 'is_babysitter', 'nationality',], 'string', 'max' => 10],
            [['identity_authorized', 'mobile_authorized', 'gender'], 'string', 'max' => 1],
            [['service_type'], 'string', 'max' => 20],
            [['intro'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['image'], 'file','skipOnEmpty' => true]
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
            'name'=>'名称',
            'status' => '状态',
            'tel'=>'电话',
            'rating' => '評分總平均分數',
            'identity_authorized' => '实名认证',
            'mobile_authorized' => '手机认证',
            'service_type' => 'Service Type',
            'is_cleaning' => '是否保潔種類 ',
            'is_housekeeper' => '是否保姆種類',
            'is_elderlycare' => '是否照顧老人種類',
            'is_matron' => '是否月嫂種類',
            'is_cook' => '是否廚嫂種類',
            'is_babysitter' => '是否育嬰種類',
            'intro' => '個人介紹',
            'age' => '年齡',
            'gender' => '性別',
            'nationality' => '民族',
            'language' => '語言',
            'last_update' => '最後更新時間',
            'create_time' => '提交時間',
            'image' => '照片',
            'company_id' => '中介公司',
            'expected_salary' => '期望薪水',
            'wechat' =>'微信',
            'source'=>'加入来源',
            'qq'=>'QQ号码'
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->company_id = Yii::$app->user->identity->id;
                $this->create_time = date('Y-m-d H:i:s');
            } else
            {
            }
            $this->last_update =date('Y-m-d H:i:s');
            if($_REQUEST["Employee"]['language'] != '')
            {
                $this->language = implode(',',$_REQUEST["Employee"]['language']);
            }else
            {
                $this->language=null;
            }
            $this->handel_upload();
            return true;
        } else {
            return false;
        }
    }

    public function handel_upload()
    {
        if (Yii::$app->request->isPost)
        {
            $image = UploadedFile::getInstance($this, 'image');
            if($image !='')
            {
                $pic_name = 'uploads/employee/' . substr(md5(microtime().$image->baseName),0,15) . '.' . $image->extension;
                $image->saveAs($pic_name);
                $this->image = $pic_name;
            }else
            {
                unset($this->image);
            }
        }
        return $this;
    }

    public function afterfind()
    {
        parent::afterFind();
        $this->language = explode(',',$this->language);
    }
}
