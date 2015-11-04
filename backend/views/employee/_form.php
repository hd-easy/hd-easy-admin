<link href="<?=$this->context->get_path()?>/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<script src="<?=$this->context->get_path()?>/custom/Area.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/custom/AreaData_min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function (){
        initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '44', '0', '0');
        var city ="<?=$model->city;?>";
        var district = '<?=$model->district?>';
        if(city !='')
        {
            Pre_select("#seachcity",city)
            changeCity($('#seachcity').val(),'seachdistrict','seachdistrict');
            Pre_select("#seachdistrict",district)
        }
    });

    function Pre_select(select_name,sel_val)
    {
        var temp = select_name+' option';
        $(temp).each(function (){
            if($(this).text().trim() == sel_val){
                $(select_name).val($(this).val());
            }
        });
    }

    //得到地区码
    function getAreaID(){
        var area = 0;
        if($("#seachdistrict").val() != "0"){
            area = $("#seachdistrict").val();
        }else if ($("#seachcity").val() != "0"){
            area = $("#seachcity").val();
        }else{
            area = $("#seachprov").val();
        }
        return area;
    }

    function showAreaID() {
        //地区码
        var areaID = getAreaID();
        //地区名
        var areaName = getAreaNamebyID(areaID) ;
        alert("您选择的地区码：" + areaID + "      地区名：" + areaName);
    }

    //根据地区码查询地区名
    function getAreaNamebyID(areaID){
        var areaName = "";
        if(areaID.length == 2){
            areaName = area_array[areaID];
        }else if(areaID.length == 4){
            var index1 = areaID.substring(0, 2);
            areaName = area_array[index1] + " " + sub_array[index1][areaID];
        }else if(areaID.length == 6){
            var index1 = areaID.substring(0, 2);
            var index2 = areaID.substring(0, 4);
            areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
        }
        return areaName;
    }
</script>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

    <?php  $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data','class'=>'form-horizontal'],'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-4\">{input}</div>\n<div class=\"\">{error}</div>",
        'labelOptions' => ['class' => 'col-md-3 control-label'],
    ],]);?>
<div class="form-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(Yii::$app->params['empl_sex_flag'],['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'nationality')->dropDownList(Yii::$app->params['empl_nation'],['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'language')->checkboxList(Yii::$app->params['empl_lan']) ?>
    <div class="form-group field-employee-language">
        <label for="employee-language" class="col-md-3 control-label">所在地区</label>
        <div class="col-md-4">
                <select id="seachprov"  disabled="disabled" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;&nbsp;
                <select id="seachcity"  onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;&nbsp;
                <span id="seachdistrict_div"><select id="seachdistrict"></select></span>
                <input type="hidden" name="Employee[province]"  value="广东省">
                <input type="hidden" name="Employee[city]" class="c_val">
                <input type="hidden" name="Employee[district]" class="d_val">
        </div>
    </div>
    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['empl_status'],['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->dropDownList(Yii::$app->params['source'],['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_authorized')->dropDownList(Yii::$app->params['empl_yn_flag'],['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'mobile_authorized')->dropDownList(Yii::$app->params['empl_yn_flag'],['prompt'=>'请选择']) ?>

    <div class="show_diag">
    <?= $form->field($model, 'is_cleaning',['labelOptions' => ['class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'1'],$enclosedByLabel=false) ?>
    <?= $form->field($model, 'is_housekeeper',['labelOptions' => ['seq'=>'2','class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'2'],$enclosedByLabel=false) ?>
    <?= $form->field($model, 'is_elderlycare',['labelOptions' => ['class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'3'],$enclosedByLabel=false) ?>
    <?= $form->field($model, 'is_matron',['labelOptions' => ['class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'4'],$enclosedByLabel=false) ?>
    <?= $form->field($model, 'is_cook',['labelOptions' => ['class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'5'],$enclosedByLabel=false) ?>
    <?= $form->field($model, 'is_babysitter',['labelOptions' => ['class' => ' col-md-3 control-label my-line-height']])->checkbox(['class'=>'6'],$enclosedByLabel=false) ?>
    </div>

    <?= $form->field($model, 'last_update')->textInput(['disabled'=>'true']) ?>

    <?= $form->field($model, 'create_time')->textInput(['disabled'=>'true']) ?>
    <input type="hidden" name="service_data" id="service_data" value="57575756857">
<!--    --><?//= $form->field($model, 'company_id')->textInput() ?>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['id'=>'sub_btn','class' => $model->isNewRecord ? 'btn btn-success  btn-circle' : 'btn btn-primary  btn-circle']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div>
        <div >
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加工作经验和期待薪资
                </h4>
            </div>
            <div class="modal-body">
                <div style="margin-top: 6px">
                    <label for="employee-intro" class="">工作经验简介</label>
                    <div class=""><textarea maxlength="255" name="Employee[intro]" class="form-control" id="introval"></textarea></div>
                    <div class=""></div>
                </div>
                <div style="margin-top: 9px">
                    <label for="employee-intro" class="">期待薪资</label>
                    <input type="text" value="0.00" class="form-control" id="salary_val">
                    <input type="hidden" id="type_tag">
                    <div class=""></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-circle red" id="reset_type">清除内容
                </button>
                <button type="button" class="btn btn-success  btn-circle" id="save_type">
                    提交更改
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
  var type_sets=<?=$this->context->get_service_info($_REQUEST['id'])?>;
$('.show_diag input').change(function()
{
    if($(this).parent().attr('class')=='checked')
    {
         $data =type_sets[$(this).attr('class')];
        $('#introval').attr('value',$data['intro']);
         $('#salary_val').attr('value',$data['salary']);
         $('#myModal').modal({'show':true});
        $('#type_tag').attr('value',$(this).attr('class'));
    }
});
$('#save_type').click(function()
  {
      type = $('#type_tag').attr('value');
      data =type_sets[type];
      data['intro'] = $('#introval').attr('value');
      data['salary'] =  $('#salary_val').attr('value');
      $('#myModal').modal('hide');
  }
);
  $('#reset_type').click(function()
      {
          type = $('#type_tag').attr('value');
          data =type_sets[type];
          data['intro'] = null;
          data['salary'] =  null;
          $('#introval').attr('value',null);
          $('#salary_val').attr('value',null);
          //$('#myModal').modal('hide');
      }
  );
    $('#sub_btn').click(function()
    {
        $('#service_data').attr('value',JSON.stringify(type_sets));
        $('.c_val').attr('value',$('#seachcity option:selected').text());
        $('.d_val').attr('value',$('#seachdistrict option:selected').text());
        //$('#w0').submit();
        return true;
    });
</script>
