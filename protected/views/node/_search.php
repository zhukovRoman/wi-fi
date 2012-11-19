<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hostname',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'serial',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'mac_wifi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'mac_lte',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'inet_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'region',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'area',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'district',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'group',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'setup_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'setup_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'setup_address',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'setup_place',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'setup_contact',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'setup_tel',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'activated',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ip_address',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'fw_version',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'geo_lat',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'geo_long',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit'
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
