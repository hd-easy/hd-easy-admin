<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentRecord */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php  $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data','class'=>'form-horizontal'],'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"\">{error}</div>",
        'labelOptions' => ['class' => 'col-md-3 control-label'],
    ],]);?>
<div class="form-body">
    <?= $form->field($model, 'agency_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'job_id')->textInput() ?>

    <?= $form->field($model, 'alipay_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_record')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_number')->textInput() ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'curreny')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success  btn-circle' : 'btn btn-primary  btn-circle']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
