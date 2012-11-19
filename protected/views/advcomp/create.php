<?php
$this->breadcrumbs=array(
	'Advcomps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advcomp','url'=>array('index')),
	array('label'=>'Manage Advcomp','url'=>array('admin')),
);
?>

<h1>Create Advcomp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>