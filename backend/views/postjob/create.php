<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostJob */

$this->title = '创建新数据';
$this->params['breadcrumbs'][] = ['label' => 'Post Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
           创建新数据
        </div>

    </div>
    <div class="portlet-body form">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
