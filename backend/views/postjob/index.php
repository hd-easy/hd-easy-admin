<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use  app\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet box">
    <div class="mytitle">
        <?= Yii::$app->params[backend_cates][$this->context->id];?>
    </div>
    <div class="">
        <table>
            <tr>
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
            'id',
            [
                'label'=>'客户',
                'format'=>'raw',
                'value'=>function($model){
                        return  User::findOne($model->user_id)['display_name'];
                    }
            ],
           'mobile',
            'topic',
             'district',
             'address',
            'beginning_time',
            [
                'label'=>'操作',
                'format'=>'raw',
                'value'=>function($model){
                        return  '<a href="'.Url::toRoute(['details','id'=>$model->id]).'" ><span class="label label-sm label-success">详情/接单</span></a>';
                    }
            ],
]
    ]); ?>

    </div>
</div>
<script src="<?=$this->context->get_path()?>/custom/search.js" type="text/javascript"></script>

