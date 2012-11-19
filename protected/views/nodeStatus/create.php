<?php
$this->breadcrumbs=array(
	'Node Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NodeStatus','url'=>array('index')),
	array('label'=>'Manage NodeStatus','url'=>array('admin')),
);
?>

<h1>Create NodeStatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>