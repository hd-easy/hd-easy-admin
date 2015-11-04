<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
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
            'job_id',
            'user_id',
            'agency_id',
            'employee_id',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
