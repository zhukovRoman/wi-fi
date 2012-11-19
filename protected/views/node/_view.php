<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hostname')); ?>:</b>
	<?php echo CHtml::encode($data->hostname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</b>
	<?php echo CHtml::encode($data->serial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mac_wifi')); ?>:</b>
	<?php echo CHtml::encode($data->mac_wifi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mac_lte')); ?>:</b>
	<?php echo CHtml::encode($data->mac_lte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inet_type')); ?>:</b>
	<?php echo CHtml::encode($data->inet_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($data->district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group')); ?>:</b>
	<?php echo CHtml::encode($data->group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_by')); ?>:</b>
	<?php echo CHtml::encode($data->setup_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_date')); ?>:</b>
	<?php echo CHtml::encode($data->setup_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_address')); ?>:</b>
	<?php echo CHtml::encode($data->setup_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_place')); ?>:</b>
	<?php echo CHtml::encode($data->setup_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_contact')); ?>:</b>
	<?php echo CHtml::encode($data->setup_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setup_tel')); ?>:</b>
	<?php echo CHtml::encode($data->setup_tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activated')); ?>:</b>
	<?php echo CHtml::encode($data->activated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fw_version')); ?>:</b>
	<?php echo CHtml::encode($data->fw_version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_lat')); ?>:</b>
	<?php echo CHtml::encode($data->geo_lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_long')); ?>:</b>
	<?php echo CHtml::encode($data->geo_long); ?>
	<br />

	*/ ?>

</div>