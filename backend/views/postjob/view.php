<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostJob */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Post Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新数据', ['update', 'id' => $model->id], ['class' => 'btn btn-primary  btn-circle']) ?>
        <?= Html::a('删除数据', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger  btn-circle',
            'data' => [
                'confirm' => '确定要删除这条数据么?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'mobile',
            'topic',
            'job_status',
            'payment_id',
            'service_type',
            'intro',
            'view_time',
            'week',
            'period',
            'city',
            'province',
            'district',
            'address',
            'create_time',
            'term_period',
            'cleaning_type',
            'cleaning_pet_type',
            'work_times',
            'workingdays_perweek',
            'cleaning_time_estimate',
            'estimated_date',
            'cleaning_size',
            'beginning_date',
            'end_date',
            'beginning_time',
            'end_time',
            'worker',
            'price_range',
            'stay_type',
            'sex_type',
            'cure_type',
            'baby_age_type',
            'number_family',
            'food_type',
            'baby_type',
            'longitude',
            'latitude',
        ],
    ]) ?>

</div>
