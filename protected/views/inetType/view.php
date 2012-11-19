<?php
$this->breadcrumbs=array(
	'Inet Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List InetType','url'=>array('index')),
	array('label'=>'Create InetType','url'=>array('create')),
	array('label'=>'Update InetType','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete InetType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InetType','url'=>array('admin')),
);
?>

<h1>View InetType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
