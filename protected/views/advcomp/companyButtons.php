<div style="margin-top: 10px">
<?php 
    $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Установить ценники',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>Yii::app()->createUrl("advcomp/editPrice", array('id'=>$model->id)),
)); ?> 
</div>
<div style="margin-top: 10px">
<?php 
    $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Редактировать',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>Yii::app()->createUrl("advcomp/update", array('id'=>$model->id)),
)); ?> 
</div>
<div style="margin-top: 10px">
<?php 
    $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Добавить средства на баланс',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>Yii::app()->createUrl("advcomp/addStep2", array('id'=>$model->id)),
)); ?> 
</div>