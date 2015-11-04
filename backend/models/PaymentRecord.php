<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_record".
 *
 * @property integer $id
 * @property integer $agency_id
 * @property integer $user_id
 * @property integer $employee_id
 * @property integer $job_id
 * @property string $alipay_id
 * @property string $payment_method
 * @property string $payment_record
 * @property integer $account_number
 * @property string $bank_name
 * @property string $curreny
 * @property string $amount
 * @property string $remarks
 * @property string $create_time
 */
class PaymentRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'user_id', 'employee_id', 'job_id', 'account_number'], 'integer'],
            [['amount'], 'number'],
            [['create_time'], 'safe'],
            [['alipay_id', 'payment_method', 'payment_record'], 'string', 'max' => 30],
            [['bank_name'], 'string', 'max' => 50],
            [['curreny'], 'string', 'max' => 20],
            [['remarks'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agency_id' => '中介公司',
            'user_id' => '用戶id',
            'employee_id' => '員工id',
            'job_id' => '工作id',
            'alipay_id' => '支付寶id',
            'payment_method' => '付款方式',
            'payment_record' => '收據數碼',
            'account_number' => '戶口號碼',
            'bank_name' => '銀行名稱',
            'curreny' => 'curreny',
            'amount' => '款項',
            'remarks' => '备注',
            'create_time' => '创建时间',
        ];
    }
}
