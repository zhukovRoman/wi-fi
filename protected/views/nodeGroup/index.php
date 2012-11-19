<?php
$this->breadcrumbs=array(
	'Node Groups',
);

$this->menu=array(
	array('label'=>'Create NodeGroup','url'=>array('create')),
	array('label'=>'Manage NodeGroup','url'=>array('admin')),
);
?>

<h1>Node Groups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
