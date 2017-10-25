<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="es">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl; ?>/css/main.css" type="text/css">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>   
        <script src="<?= Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?= Yii::app()->request->baseUrl; ?>/js/util.js"></script>
</head>
<body>
	<?php echo $content;?>
</body>
</html>
