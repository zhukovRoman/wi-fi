<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('css')); ?>:</b>
	<?php echo CHtml::encode($data->css); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner1')); ?>:</b>
	<?php echo CHtml::encode($data->banner1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner2')); ?>:</b>
	<?php echo CHtml::encode($data->banner2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	*/ ?>

</div>