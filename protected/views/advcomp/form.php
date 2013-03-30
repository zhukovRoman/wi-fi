<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    //'htmlOptions'=>array('class'=>'well'),
)); ?>
 

<div class="clearfix">
    <?php echo $form->textFieldRow($model, 'name', 
            array('class'=>'span5')); ?> 
    <?php
        $this->renderPartial("formParts/chosePoint", array(
            'model' => $model,
            //'dataProvider' => $dataProvider,
            'all' => $all,
            'cities' => $cities,
            'citiesSelect' => $citiesSelect,
            'tagsSelect' => $tagsSelect,
            'tags' => $tags,
            'form'=> $form,
                )
        );
    ?>
</div>
<hr>
    <?php
        $this->renderPartial("choseStyle", array(
            'model' => $model,
            'form'=> $form,
                )
        );
    ?>
<hr>

<?php 
$text = ($model->isNewRecord)? "Перейти к оплате" : "Сохранить";
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>$text)); ?>
 
<?php $this->endWidget(); ?>
