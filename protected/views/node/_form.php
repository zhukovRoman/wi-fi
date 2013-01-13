<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'node-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/addNode.js', CClientScript::POS_END); ?>



<?php echo $form->errorSummary($model); ?>

<?php $this->renderPartial("formParts/_firstPart", array("model" => $model, "form" => $form)); ?>
<hr>
<?php $this->renderPartial("formParts/_secondPart", array("model" => $model, "form" => $form)); ?>
<?php $this->renderPartial("formParts/_map", array("model" => $model, "form" => $form)); ?>
<?php $this->renderPartial("formParts/_thirdPart", array("model" => $model, "form" => $form)); ?>
<hr>
<?php $this->renderPartial("formParts/_tags", array("model" => $model, "form" => $form)); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Добавить' : 'Сохранить',
    ));
    ?>
</div>



<?php $this->endWidget(); ?>
