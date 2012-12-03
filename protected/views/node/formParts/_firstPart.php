<?php echo $form->textFieldRow($model, 'hostname', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'serial', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mac_wifi', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mac_lte', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->dropDownListRow($model, 'inet_type', InetType::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'ip_address', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldRow($model, 'fw_version', array('class' => 'span5', 'maxlength' => 10,)); ?>
