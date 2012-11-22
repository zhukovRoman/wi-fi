<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'node-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/addNode.js', CClientScript::POS_END); ?>
<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'hostname', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'serial', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mac_wifi', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'mac_lte', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->dropDownListRow($model, 'inet_type', InetType::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'ip_address', array('class' => 'span5', 'maxlength' => 11)); ?>

<?php echo $form->textFieldRow($model, 'fw_version', array('class' => 'span5', 'maxlength' => 10,)); ?>

<hr>
<!--
<?php echo $form->dropDownListRow($model, 'country', Country::getDropDrownItems(), array('class' => 'span5')); ?>

<div id="dropDownRegion" style="display: blcok;">
    <?php echo $form->dropDownListRow($model, 'region', Region::getDropDrownItems(), array('class' => 'span5',)); ?>
</div>

<div id="dropDownCity" style="display: block;">
    <?php echo $form->dropDownListRow($model, 'city', City::getDropDrownItems(), array('class' => 'span5')); ?>
</div>-->


<div id="dropDownArea" style="display: block;">
    <?php echo $form->dropDownListRow($model, 'area', Area::getDropDrownItems(), array('class' => 'span5')); ?>
</div>

<div id="dropDownDistrict" style="display: block;">
    <?php echo $form->dropDownListRow($model, 'district', District::getDropDrownItems(), array('class' => 'span5')); ?>
</div>

<?php echo $form->dropDownListRow($model, 'status', NodeStatus::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'group', NodeGroup::getDropDrownItems(), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'geo_lat', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'geo_long', array('class' => 'span5')); ?>

<div id="map" style="height: 300px; width: 600px;"></div>
<hr>
<script>

    var map = L.map('map', {
        center: [55.75, 37.62],
        zoom: 13,
        dragging: true,
        scrollWheelZoom: true
    });

    L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
    }).addTo(map);

		           
    var marker = L.marker([51.5, -0.09],{draggable: true});
<?php
if (!$model->isNewRecord) {
    echo "marker.setLatLng([$model->geo_lat, $model->geo_long]);";
    echo "marker.addTo(map);";
}
?>	

    function onMapClick(e) {
        //alert (e.latlng);
        marker.addTo(map);
        marker.setLatLng(e.latlng);
        //marker.Update();
                    
        $("#Node_geo_lat").val(e.latlng.lat);
        $("#Node_geo_long").val(e.latlng.lng);
    }

    map.on('click', onMapClick);

</script>

<?php echo $form->textFieldRow($model, 'setup_address', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'setup_place', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'setup_contact', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'setup_tel', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'activated', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'setup_by', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'setup_date', array('class' => 'span5')); ?>

<HR>

<?php 
$this->widget('zii.widgets.jui.CJuiSortable', array(
      'items'=>array(
          'id1'=>'Item 1',
          'id2'=>'Item 2',
          'id3'=>'Item 3',
      ),
      // additional javascript options for the JUI Sortable plugin
      'options'=>array(
          'delay'=>'300',
          'connectWith'=> "#allItems",
          
      ),
      'htmlOptions'=>array('id'=>'selectedItems'),
  ));
$this->widget('zii.widgets.jui.CJuiSortable', array(
      'items'=>array(
          'id1'=>'Item 4',
          'id2'=>'Item 5',
          'id3'=>'Item 6',
      ),
      // additional javascript options for the JUI Sortable plugin
      'options'=>array(
          'delay'=>'300',
          'connectWith'=> "#selectedItems",
          
      ),
      'htmlOptions'=>array('id'=>'allItems'),
  ));
?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
