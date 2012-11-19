<?php
$this->breadcrumbs=array(
	'Node Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NodeGroup','url'=>array('index')),
	array('label'=>'Manage NodeGroup','url'=>array('admin')),
);
?>

<h1>Create NodeGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>