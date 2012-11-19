<?php
$this->breadcrumbs=array(
	'Node Statuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NodeStatus','url'=>array('index')),
	array('label'=>'Create NodeStatus','url'=>array('create')),
	array('label'=>'Update NodeStatus','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete NodeStatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NodeStatus','url'=>array('admin')),
);
?>

<h1>View NodeStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
