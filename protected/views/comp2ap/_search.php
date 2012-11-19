<?php
/* @var $this Comp2apController */
/* @var $model Comp2ap */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_comp'); ?>
		<?php echo $form->textField($model,'id_comp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_ap'); ?>
		<?php echo $form->textField($model,'id_ap'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->