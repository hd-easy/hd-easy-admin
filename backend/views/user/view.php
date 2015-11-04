<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
            'mobile',
            'password',
            'wechat',
            'qq',
            'weibo',
            'display_name',
            'image',
            'is_employee',
            'is_employer',
            'create_time',
            'city',
            'province',
            'district',
            'longitude',
            'latitude',
            'address',
            'claims',
            'balance',
        ],
    ]) ?>

</div>
