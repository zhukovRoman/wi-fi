<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>
	 
<fieldset> 
	<legend>Активация аккаунта</legend>
	
	<br><p><span class="label label-success">Спасибо!</span>
	Вы почти зарегистрировались, осталось только активировать аккаунт. Инструкции по активации отправлены по электронной почте на адрес, указанный при регистрации.</p>
	
	<?php echo CHtml::link(CHtml::encode("Вернуться на главную"), Yii::app()->homeUrl); ?>

</fieldset> 	 
<?php $this->endWidget(); ?>