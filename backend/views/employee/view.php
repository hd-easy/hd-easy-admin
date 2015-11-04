<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
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
           // 'id',
           // 'user_id',
            'status',
            'rating',
            'identity_authorized',
            'mobile_authorized',
            'service_type',
            'is_cleaning',
            'is_housekeeper',
            'is_elderlycare',
            'is_matron',
            'is_cook',
            'is_babysitter',
            'intro',
            'age',
            'gender',
            'nationality',
            'language',
            'last_update',
            'create_time',
            [
                'attribute' => 'image',
                'label'=>'照片',
                'format'=>'raw',
                'value'=>    '<a href="'.$model->image.'" target="_Blank">'.$model->image.'</a>'
            ],
           // 'company_id',
        ],
    ]) ?>

</div>
