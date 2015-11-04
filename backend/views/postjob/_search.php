<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostJobsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'job_status') ?>

    <?php // echo $form->field($model, 'payment_id') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'intro') ?>

    <?php // echo $form->field($model, 'view_time') ?>

    <?php // echo $form->field($model, 'week') ?>

    <?php // echo $form->field($model, 'period') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'term_period') ?>

    <?php // echo $form->field($model, 'cleaning_type') ?>

    <?php // echo $form->field($model, 'cleaning_pet_type') ?>

    <?php // echo $form->field($model, 'work_times') ?>

    <?php // echo $form->field($model, 'workingdays_perweek') ?>

    <?php // echo $form->field($model, 'cleaning_time_estimate') ?>

    <?php // echo $form->field($model, 'estimated_date') ?>

    <?php // echo $form->field($model, 'cleaning_size') ?>

    <?php // echo $form->field($model, 'beginning_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'beginning_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'worker') ?>

    <?php // echo $form->field($model, 'price_range') ?>

    <?php // echo $form->field($model, 'stay_type') ?>

    <?php // echo $form->field($model, 'sex_type') ?>

    <?php // echo $form->field($model, 'cure_type') ?>

    <?php // echo $form->field($model, 'baby_age_type') ?>

    <?php // echo $form->field($model, 'number_family') ?>

    <?php // echo $form->field($model, 'food_type') ?>

    <?php // echo $form->field($model, 'baby_type') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
