<?php
$this->breadcrumbs=array(
	'Advcomps'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Advcomp','url'=>array('index')),
	array('label'=>'Create Advcomp','url'=>array('create')),
	array('label'=>'View Advcomp','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Advcomp','url'=>array('admin')),
);
?>

<h1>Update Advcomp <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>