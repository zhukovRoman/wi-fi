<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    //'htmlOptions'=>array('class'=>'well'),
)); ?>
 

<div class="clearfix">
    <?php
        $this->renderPartial("chosePoint", array(
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

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
 
<?php $this->endWidget(); ?>
