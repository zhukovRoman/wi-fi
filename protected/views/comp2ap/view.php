<?php
/* @var $this Comp2apController */
/* @var $model Comp2ap */

$this->breadcrumbs=array(
	'Comp2aps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comp2ap', 'url'=>array('index')),
	array('label'=>'Create Comp2ap', 'url'=>array('create')),
	array('label'=>'Update Comp2ap', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comp2ap', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comp2ap', 'url'=>array('admin')),
);
?>

<h1>View Comp2ap #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_comp',
		'id_ap',
	),
)); ?>
