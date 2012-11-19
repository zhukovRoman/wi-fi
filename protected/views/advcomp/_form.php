<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'advcomp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
            
        <?php echo $form->textFieldRow($model,'paddingHeader',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'css',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'banner1',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'banner2',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'owner',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
