<?php
/* @var $this Comp2apController */
/* @var $model Comp2ap */

$this->breadcrumbs=array(
	'Comp2aps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Comp2ap', 'url'=>array('index')),
	array('label'=>'Manage Comp2ap', 'url'=>array('admin')),
);
?>

<h1>Create Comp2ap</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>