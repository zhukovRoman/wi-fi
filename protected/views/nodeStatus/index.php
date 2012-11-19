<?php
$this->breadcrumbs=array(
	'Node Statuses',
);

$this->menu=array(
	array('label'=>'Create NodeStatus','url'=>array('create')),
	array('label'=>'Manage NodeStatus','url'=>array('admin')),
);
?>

<h1>Node Statuses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
