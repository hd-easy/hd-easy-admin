<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>后台管理页面   <?=Yii::$app->params['backend_cates'][$this->context->id];?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="t22w@qq.com" name="description"/>
<meta content="Mark" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=$this->context->get_path()?>/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?=$this->context->get_path()?>/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->context->get_path()?>/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="#">
			<img src="<?=$this->context->get_path()?>/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?=$this->context->get_path()?>/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					<?=Yii::$app->user->identity->name?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
<!--						<li>-->
<!--							<a href="#">-->
<!--							<i class="icon-user"></i> My Profile</a>-->
<!--						</li>-->
						<li>
							<a href="<?=Url::toRoute('/login/logout');?>">
							<i class="icon-key"></i> 退出登录 </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
                <?php foreach(Yii::$app->params['backend_cates'] as $k=>$v):?>
				<li class="<?=($k == $this->context->id)?'active':''?>">
					<a href="<?=Url::toRoute('/'.$k);?>">
					<span class="title"><?=$v?></span>
					</a>
				</li>
                <?php endforeach;?>
<!--				<li>-->
<!--					<a href="javascript:;">-->
<!--					<i class="icon-basket"></i>-->
<!--					<span class="title">eCommerce</span>-->
<!--					<span class="arrow "></span>-->
<!--					</a>-->
<!--					<ul class="sub-menu">-->
<!--						<li>-->
<!--							<a href="ecommerce_index.html">-->
<!--							<i class="icon-home"></i>-->
<!--							Dashboard</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="ecommerce_orders.html">-->
<!--							<i class="icon-basket"></i>-->
<!--							Orders</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="ecommerce_orders_view.html">-->
<!--							<i class="icon-tag"></i>-->
<!--							Order View</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="ecommerce_products.html">-->
<!--							<i class="icon-handbag"></i>-->
<!--							Products</a>-->
<!--						</li>-->
<!--						<li>-->
<!--							<a href="ecommerce_products_edit.html">-->
<!--							<i class="icon-pencil"></i>-->
<!--							Product Edit</a>-->
<!--						</li>-->
<!--					</ul>-->
<!--				</li>-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
                    <?php $this->beginBody() ?>
                    <?= $content ?>
                    <?php $this->endBody() ?>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
        <?=date('Y')?> &copy; <?= Yii::$app->params['powered'] ?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=$this->context->get_path()?>/global/plugins/respond.min.js"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=$this->context->get_path()?>/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?=$this->context->get_path()?>/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=$this->context->get_path()?>/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
      });
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>