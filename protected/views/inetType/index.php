<?php
$this->breadcrumbs=array(
	'Inet Types',
);

$this->menu=array(
	array('label'=>'Create InetType','url'=>array('create')),
	array('label'=>'Manage InetType','url'=>array('admin')),
);
?>

<h1>Inet Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
