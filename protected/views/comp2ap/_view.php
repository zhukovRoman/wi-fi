<?php
/* @var $this Comp2apController */
/* @var $data Comp2ap */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_comp')); ?>:</b>
	<?php echo CHtml::encode($data->id_comp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ap')); ?>:</b>
	<?php echo CHtml::encode($data->id_ap); ?>
	<br />


</div>