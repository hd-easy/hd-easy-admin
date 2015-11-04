<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\User;
use app\models\Employee;
use app\models\PostJob;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet box">
    <div class="mytitle">
        <?= Yii::$app->params[backend_cates][$this->context->id];?>
    </div>
    <div class="portlet-body form">
<!--        <div >-->
<!--            --><?//= Html::a('创建新的数据 ', ['create'], ['class' => 'btn btn-success red']) ?>
<!--        </div>-->
        <div class="">
            <table>
                <tr>
                    <td>
                        <select  class="select_status form-control">
                            <option value="-1">选择状态</option>
                            <?foreach(Yii::$app->params['job_status'] as $k=>$v):?>
                                <option value="<?=$k?>"><?=$v?></option>
                            <?endforeach;?>
                        </select>
                    </td>
                    <td>
                        &nbsp;  &nbsp;  &nbsp;
                    </td>
                    <td>
                        <select class="select_type form-control">
                            <option value="-1">选择工作种类</option>
                            <?foreach(Yii::$app->params['empl_type'] as $k=>$v):?>
                                <option value="<?=$k?>"><?=$v?></option>
                            <?endforeach;?>
                        </select>
                    </td>
                    <td>
                        &nbsp;  &nbsp;  &nbsp;
                    </td>
                    <td>
                        <input type="text" class="user_value">
                        <a href="<?=Url::toRoute(['index','st'=>'1']);?>" class="btn green searchname">搜索员工 </a>
                    </td>
                    <td>
                        &nbsp;  &nbsp;  &nbsp;
                    </td>
                    <td>
                        <input type="text" class="tel_value">
                        <a href="<?=Url::toRoute(['index','st'=>'2']);?>" class="btn green searchtel">搜索电话 </a>
                    </td>
                </tr>
            </table>
        </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"<div class='wrap'>{summary}{pager}</div>{items}\n<div class='wrap'>{summary}{pager}</div>",
        'columns' => [
            'job_id',
            'update_time',
            [
                'label'=>'工作种类',
                'format'=>'raw',
                'value'=>function($model){
                        return  Yii::$app->params['empl_type'][PostJob::findOne($model->job_id)['service_type']];
                    }
            ],
            [
                'label'=>'工作状态',
                'format'=>'raw',
                'value'=>function($model){
                        return  Yii::$app->params['job_status'][PostJob::findOne($model->job_id)['job_status']];
                    }
            ],
            [
                'label'=>'地区',
                'format'=>'raw',
                'value'=>function($model){
                        return  PostJob::findOne($model->user_id)['district'];
                    }
            ],
            [
                'label'=>'地址',
                'format'=>'raw',
                'value'=>function($model){
                        return  PostJob::findOne($model->user_id)['address'];
                    }
            ],
            [
                'label'=>'配置工作人员',
                'format'=>'raw',
                'value'=>function($model){
                        return  Employee::findOne($model->employee_id)['name'];
                    }
            ],
            [
                'label'=>'客户',
                'format'=>'raw',
                'value'=>function($model){
                        return  User::findOne($model->user_id)['display_name'];
                    }
            ],
            [
                'label'=>'客户电话',
                'format'=>'raw',
                'value'=>function($model){
                        return  PostJob::findOne($model->job_id)['mobile'];
                    }
            ],
            [
                'label'=>'付款记录',
                'format'=>'raw',
                'value'=>function($model){
                        return  '记录';
                    }
            ],
        ],
    ]); ?>

    </div>
</div>
<script src="<?=$this->context->get_path()?>/custom/search.js" type="text/javascript"></script>

