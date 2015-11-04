<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet box">
    <div class="mytitle">
        <?= Yii::$app->params[backend_cates][$this->context->id];?>
    </div>
    <div class="portlet-body form">
        <div >
            <?= Html::a('创建新的数据 ', ['create'], ['class' => 'btn btn-success red']) ?>
        </div>
        <div class="">
            <table>
                <tr>
                    <td>
                        <select  class="select_status form-control">
                            <option value="-1">选择状态</option>
                            <?foreach(Yii::$app->params['empl_status'] as $k=>$v):?>
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
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'姓名',
                'format'=>'raw',
                'value'=>function($model)
                    {
                        return $model->name;
                    },
            ],
            [
                'label'=>'工作种类',
                'format'=>'raw',
                'value'=>function($model){
                        foreach(Yii::$app->params['empl_type_real'] as $k=> $v)
                        {
                            if($model[$v]==1)
                            {
                                $s .=Yii::$app->params['empl_type'][$k].' ';
                            }
                        }
                        return $s;

                    }
            ],
            //'user_id',
            [
                'label'=>'状态',
                'format'=>'raw',
                'value'=>function($model){
                        return Yii::$app->params['empl_status'][$model->status];
                    }
            ],
             'age',
            [
                'label'=>'语言',
                'format'=>'text',
                'value'=>function($model){
                       foreach($model->language as $v)
                       {
                           $s .=Yii::$app->params['empl_lan'][$v].' ';
                       }
                        return $s;
                    }
            ],
             'last_update',
             //'create_time',
//            [
//                'attribute' => 'image',
//                'label'=>'照片',
//                'format'=>'raw',
//                'value'=>function($model){
//                       return '<a href="'.$model->image.'" target="_Blank">'.$model->image.'</a>';
//                    }
//            ],
            // 'company_id',
            ['class' => 'yii\grid\ActionColumn','header' => '操作','template'=>'{update} {delete}'],
        ],
    ]); ?>
    </div>
</div>
<script src="<?=$this->context->get_path()?>/custom/search.js" type="text/javascript"></script>


