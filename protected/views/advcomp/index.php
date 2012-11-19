<?php
$this->breadcrumbs=array(
	'Advcomps',
);

$this->menu=array(
	array('label'=>'Create Advcomp','url'=>array('create')),
	array('label'=>'Manage Advcomp','url'=>array('admin')),
);
?>

<h1>Advcomps</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
