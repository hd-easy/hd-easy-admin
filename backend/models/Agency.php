<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * This is the model class for table "agency".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $contact_number
 * @property string $contact_person
 * @property string $address
 * @property string $email
 * @property string $type
 * @property string $qq
 * @property string $wechat
 * @property integer $employee_number
 * @property string $create_time
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $auth_key
 * @property string $district
 */
class Agency extends \yii\db\ActiveRecord  implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_number'], 'integer'],
            [['create_time'], 'safe'],
            [['name', 'image', 'email', 'type', 'qq', 'wechat'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 300],
            [['contact_number', 'contact_person'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 200],
            [['username', 'password'], 'string', 'max' => 32],
            [['image'], 'file','skipOnEmpty' => true],
            [['district'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '中介公司ID',
            'name' => '中介名称',
            'description' => '描述',
            'image' => '图片',
            'contact_number' => '联络电话',
            'contact_person' => '联络人',
            'address' => '地址',
            'email' => '邮件',
            'type' => '服务工种',
            'qq' => 'qq',
            'wechat' => '微信',
            'employee_number' => '会员数目',
            'create_time' => '创建时间',
            'username' => '登入系统名',
            'password' => '登录密码',
            'district' => '工作区域',
        ];
    }



    /**
     * @inheritdoc
     * @return AgencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgencyQuery(get_called_class());
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->auth_key;
        return md5('sol will not let you down');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
//        return $this->getAuthKey() === $authKey;
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_time = date('Y-m-d H:i:s',time());
            } else
            {
                //$this->updated_at = time();
            }
            if(strlen($this->password)==32)
            {
                unset($this->password);
            }else
            {
                $this->password=md5($this->password);
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
                $pic_name = 'uploads/' . substr(md5(microtime().$image->baseName),0,15) . '.' . $image->extension;
                $image->saveAs($pic_name);
                $this->image = $pic_name;
            }else
            {
                unset($this->image);
            }
        }
        return $this;
    }
}
