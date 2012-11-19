<?php
/* @var $this Comp2apController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comp2aps',
);

$this->menu=array(
	array('label'=>'Create Comp2ap', 'url'=>array('create')),
	array('label'=>'Manage Comp2ap', 'url'=>array('admin')),
);
?>

<h1>Comp2aps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
