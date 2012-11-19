<?php
$this->breadcrumbs=array(
	'Inet Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InetType','url'=>array('index')),
	array('label'=>'Manage InetType','url'=>array('admin')),
);
?>

<h1>Create InetType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>