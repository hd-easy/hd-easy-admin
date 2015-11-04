<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = '后端登录页';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?=$this->title?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=$this->context->get_path()?>/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=$this->context->get_path()?>/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?=$this->context->get_path()?>/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#">
	<img src="<?=$this->context->get_path()?>/admin/layout/img/logo-big.png" alt=""/>
	</a>
</div>
<div class="menu-toggler sidebar-toggler">
</div>
<div class="content">
            <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'login-form']); ?>
            <?= $form->field($model, 'username'); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox(); ?>
            <div class="form-group">
                <?= Html::submitButton('登录', ['class' => 'btn blue', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>



</div>
<div class="copyright">
	 <?=date('Y')?> &copy; <?= Yii::$app->params['powered'] ?>
</div>
<script src="<?=$this->context->get_path()?>/global/plugins/respond.min.js"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=$this->context->get_path()?>/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$this->context->get_path()?>/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=$this->context->get_path()?>/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "<?=$this->context->get_path()?>/admin/pages/media/bg/1.jpg",
        "<?=$this->context->get_path()?>/admin/pages/media/bg/2.jpg",
        "<?=$this->context->get_path()?>/admin/pages/media/bg/3.jpg",
        "<?=$this->context->get_path()?>/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>