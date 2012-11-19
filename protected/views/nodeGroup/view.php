<?php
$this->breadcrumbs=array(
	'Node Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NodeGroup','url'=>array('index')),
	array('label'=>'Create NodeGroup','url'=>array('create')),
	array('label'=>'Update NodeGroup','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete NodeGroup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NodeGroup','url'=>array('admin')),
);
?>

<h1>View NodeGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
