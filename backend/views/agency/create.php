<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agency */

$this->title = '录入 中介信息';
$this->params['breadcrumbs'][] = ['label' => 'Agencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
        </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

