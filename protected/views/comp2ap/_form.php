<?php
/* @var $this Comp2apController */
/* @var $model Comp2ap */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comp2ap-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_comp'); ?>
		<?php echo $form->textField($model,'id_comp'); ?>
		<?php echo $form->error($model,'id_comp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_ap'); ?>
		<?php echo $form->textField($model,'id_ap'); ?>
		<?php echo $form->error($model,'id_ap'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->