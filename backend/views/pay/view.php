<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Records', 'url' => ['index']];
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
            'agency_id',
            'user_id',
            'employee_id',
            'job_id',
            'alipay_id',
            'payment_method',
            'payment_record',
            'account_number',
            'bank_name',
            'curreny',
            'amount',
            'remarks',
            'create_time',
        ],
    ]) ?>

</div>
