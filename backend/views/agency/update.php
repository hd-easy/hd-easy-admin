<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agency */

$this->title = '更新 中介管理: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '中介管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
