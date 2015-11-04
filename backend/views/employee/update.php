<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = '更新数据  ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
           <?=$this->title ?>
        </div>
    </div>
    <div class="portlet-body form">
        <?=$this->render('_form', [
        'model' => $model,
        ]) ?>

    </div>
</div>
