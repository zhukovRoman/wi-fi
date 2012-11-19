<?php
/* @var $this Comp2apController */
/* @var $model Comp2ap */

$this->breadcrumbs=array(
	'Comp2aps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comp2ap', 'url'=>array('index')),
	array('label'=>'Create Comp2ap', 'url'=>array('create')),
	array('label'=>'View Comp2ap', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comp2ap', 'url'=>array('admin')),
);
?>

<h1>Update Comp2ap <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>