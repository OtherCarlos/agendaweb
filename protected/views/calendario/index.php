<script>
$('#nav-calendario').addClass('active');
</script>

<?php
$baseUrl = Yii::app()->baseUrl; 
Yii::app()->getClientScript()->registerCssFile($baseUrl.'/css/calendar.css');

$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'calendario-form',
	'enableAjaxValidation'=>false,
));

Yii::import('application.extensions.calendarPHP.CalendarPHP', true);

$calendar = new Calendar();
 
echo $calendar->show($baseUrl.'/calendario/index', $baseUrl.'/calendario/admin/');

$this->endWidget();

?>
