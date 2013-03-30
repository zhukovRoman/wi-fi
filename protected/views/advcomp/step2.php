


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<h3> <?php echo $model->name;?></h3>
Сейчас на счету этой рекламной компании находиться <?php echo $model->balance; ?> рублей <br>
Вложить в эту компанию : <input name="summ" id="summ" type="text" value="0.0">
<br>
 <?php //echo $form->textFieldRow($model, 'balance'); ?>
<p>На Вашем счету доступно <?php echo $acc->balance; ?> рублей. </p>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Оплатить со счета', 
        'htmlOptions'=>array ('name'=>'fromBalance'))); ?>
<p>Или оплатить с помощью </p>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Робокасса', 
    'htmlOptions'=>array ('name'=>'fromRobokassa'))); ?>
 
<?php $this->endWidget(); ?>
