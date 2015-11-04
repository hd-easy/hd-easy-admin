<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_job".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $mobile
 * @property string $topic
 * @property string $job_status
 * @property integer $payment_id
 * @property string $service_type
 * @property string $intro
 * @property string $view_time
 * @property string $week
 * @property string $period
 * @property string $city
 * @property string $province
 * @property string $district
 * @property string $address
 * @property string $create_time
 * @property string $term_period
 * @property string $cleaning_type
 * @property string $cleaning_pet_type
 * @property string $work_times
 * @property string $workingdays_perweek
 * @property string $cleaning_time_estimate
 * @property string $estimated_date
 * @property string $cleaning_size
 * @property string $beginning_date
 * @property string $end_date
 * @property string $beginning_time
 * @property string $end_time
 * @property integer $worker
 * @property integer $price
 * @property integer $price_range
 * @property string $stay_type
 * @property string $sex_type
 * @property string $cure_type
 * @property string $baby_age_type
 * @property integer $number_family
 * @property string $food_type
 * @property string $baby_type
 * @property string $longitude
 * @property string $latitude
 * @property string $locallongitude
 * @property string $locallatitude
 *  @property string $employee_id
 */
class PostJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'payment_id', 'worker', 'price', 'price_range', 'number_family'], 'integer'],
            [['create_time', 'beginning_date', 'end_date'], 'safe'],
            [['mobile'], 'string', 'max' => 40],
            [['topic', 'period', 'address', 'cleaning_pet_type'], 'string', 'max' => 100],
            [['job_status', 'view_time', 'city', 'province', 'district', 'beginning_time', 'end_time','employee_id'], 'string', 'max' => 30],
            [['service_type', 'term_period', 'cleaning_size', 'stay_type', 'sex_type', 'cure_type', 'baby_age_type', 'food_type', 'baby_type'], 'string', 'max' => 10],
            [['intro'], 'string', 'max' => 255],
            [['week', 'work_times', 'workingdays_perweek', 'cleaning_time_estimate', 'estimated_date', 'locallongitude', 'locallatitude'], 'string', 'max' => 50],
            [['cleaning_type'], 'string', 'max' => 80],
            [['longitude', 'latitude'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '連接user ID',
            'mobile' => '手机',
            'topic' => '工作標題',
            'job_status' => '工作状态',
            'payment_id' => '付款id',
            'service_type' => 'Service Type',
            'intro' => '服務簡介',
            'view_time' => '瀏覽次數',
            'week' => '星期',
            'period' => '時段',
            'city' => '城市',
            'province' => '省份',
            'district' => '地區',
            'address' => '地址',
            'create_time' => '創建時間',
            'term_period' => '短期(日計)/長期(月計)',
            'cleaning_type' => '保潔種類 ',
            'cleaning_pet_type' => '小犬/大犬/貓/其他',
            'work_times' => '工作時數',
            'workingdays_perweek' => '每週工作日數',
            'cleaning_time_estimate' => '服務時數預估',
            'estimated_date' => '預產期',
            'cleaning_size' => '單位面績',
            'beginning_date' => 'Beginning Date',
            'end_date' => 'End Date',
            'beginning_time' => '起始日期',
            'end_time' => '结束日期',
            'worker' => '工人數目',
            'price' => '薪金',
            'price_range' => '心理價位',
            'stay_type' => '住家/不住家',
            'sex_type' => '男人/女人',
            'cure_type' => '自理/半自理/不能自理',
            'baby_age_type' => '1-6個月/7-12個月/1歲-2歲/2歲-3歲',
            'number_family' => '家庭人數',
            'food_type' => '米食/麵食/素食',
            'baby_type' => '男嬰/女嬰',
            'longitude' => '經度',
            'latitude' => '緯度',
            'locallongitude' => '現在經度',
            'locallatitude' => '現在緯度',
        ];
    }
}
