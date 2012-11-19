<?php
$this->breadcrumbs=array(
	'Node Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NodeStatus','url'=>array('index')),
	array('label'=>'Create NodeStatus','url'=>array('create')),
	array('label'=>'View NodeStatus','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage NodeStatus','url'=>array('admin')),
);
?>

<h1>Update NodeStatus <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>