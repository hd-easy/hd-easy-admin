<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostJob */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php  $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data','class'=>'form-horizontal'],'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"\">{error}</div>",
        'labelOptions' => ['class' => 'col-md-3 control-label'],
    ],]);?>
<div class="form-body">
    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'view_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'week')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'term_period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cleaning_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cleaning_pet_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_times')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workingdays_perweek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cleaning_time_estimate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estimated_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cleaning_size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beginning_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'beginning_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker')->textInput() ?>

    <?= $form->field($model, 'price_range')->textInput() ?>

    <?= $form->field($model, 'stay_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cure_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'baby_age_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_family')->textInput() ?>

    <?= $form->field($model, 'food_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'baby_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success  btn-circle' : 'btn btn-primary  btn-circle']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
