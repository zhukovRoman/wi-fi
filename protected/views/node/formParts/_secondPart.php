<!--
<?php echo $form->dropDownListRow($model, 'country', Country::getDropDrownItems(), array('class' => 'span5')); ?>

<div id="dropDownRegion" style="display: blcok;">
<?php echo $form->dropDownListRow($model, 'region', Region::getDropDrownItems(), array('class' => 'span5',)); ?>
</div>

<div id="dropDownCity" style="display: block;">
<?php echo $form->dropDownListRow($model, 'city', City::getDropDrownItems(), array('class' => 'span5')); ?>
</div>-->


<div id="dropDownArea" style="display: block;">
    <?php echo $form->dropDownListRow($model, 'area', Area::getDropDrownItems($model->isNewRecord), array('class' => 'span5')); ?>
</div>

<div id="dropDownDistrict" style="display: block;">
    <?php echo $form->dropDownListRow($model, 'district', District::getDropDrownItems($model->isNewRecord), array('class' => 'span5')); ?>
</div>

<?php echo $form->dropDownListRow($model, 'status', NodeStatus::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'group', NodeGroup::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'geo_lat', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'geo_long', array('class' => 'span5')); ?>