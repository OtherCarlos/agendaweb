<?php /* @var $this Controller */ ?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo Yii::app()->request->baseUrl; ?>/images/city_new_york.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    CalendarioWEB
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo $this->createUrl('/site/index'); ?>">
                        <i class="pe-7s-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->createUrl('/userProfile/index'); ?>">
                        <i class="pe-7s-user"></i>
                        <p>Perfil de Usuario</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->createUrl('/calendario/index'); ?>">
                        <i class="pe-7s-date"></i>
                        <p>Calendario</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inicio</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
				<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->createUrl('/site/logout'); ?>">
                                <p>Cerrar Sesión</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <div class="content">
            <div class="container-fluid">
	<?php echo $content; ?>
                    </div>
            </div>

	<div class="clear"></div>
        
         <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Calendario WEB. Joel Palma
                </p>
            </div>
        </footer>


    </div></div>

        
	
        
</body>
        <!--   Core JS Files   -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js" type="text/javascript"></script>
	<!--<script src="<?php // echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>-->

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/light-bootstrap-dashboard.js"></script>


</html>
