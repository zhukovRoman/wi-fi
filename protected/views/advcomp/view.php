<?php
$this->breadcrumbs=array(
	'Advcomps'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Advcomp','url'=>array('index')),
	array('label'=>'Create Advcomp','url'=>array('create')),
	array('label'=>'Update Advcomp','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Advcomp','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advcomp','url'=>array('admin')),
);
?>

<h1>View Advcomp #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'css',
		'banner1',
		'banner2',
		'status',
		'owner',
	),
)); ?>
