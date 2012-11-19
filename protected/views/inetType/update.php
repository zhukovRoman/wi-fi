<?php
$this->breadcrumbs=array(
	'Inet Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InetType','url'=>array('index')),
	array('label'=>'Create InetType','url'=>array('create')),
	array('label'=>'View InetType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage InetType','url'=>array('admin')),
);
?>

<h1>Update InetType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>