<?php
$this->breadcrumbs=array(
	'Node Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NodeGroup','url'=>array('index')),
	array('label'=>'Create NodeGroup','url'=>array('create')),
	array('label'=>'View NodeGroup','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage NodeGroup','url'=>array('admin')),
);
?>

<h1>Update NodeGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>