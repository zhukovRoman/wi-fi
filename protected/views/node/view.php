<?php
$this->breadcrumbs = array(
    'Nodes' => array('index'),
    $model->id,
);
?>


<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>

<div id="map" style="height: 400px; width: 400px; float:left; margin-right: 20px"></div>

<script>
    var latlng = [<?php echo "$model->geo_lat, $model->geo_long"; ?>];
    var map = L.map('map', {
        center: latlng,
        zoom: 15,
        dragging: false,
        scrollWheelZoom: true
    });

    L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
    }).addTo(map);

		           
    var marker = L.marker(latlng);
    marker.addTo(map);
   

</script>

<?php
$data = array
    (
    //'id'=>$model->id,
    'hostname'=>$model->hostname,
   // 'serial'=>$model->serial,
    //'mac_wifi'=>$model->mac_wifi,
    //'mac_lte'=>$model->mac_lte,
   // 'inet_type'=>$model->inetType->name,
    'country'=>$model->country0->name,
    'region'=>$model->region0->name,
    'city'=>$model->city0->name,
    'area'=>$model->area0->name,
    'district'=>$model->district0->name,
    //'status'=>$model->status0->name,
    //'group'=>$model->group0->name,
    //'setup_by'=>$model->setup_by,
   // 'setup_date'=>$model->setup_date,
    'setup_address'=>$model->setup_address,
    'setup_place'=>$model->setup_place,
    //'setup_contact'=>$model->setup_contact,
    //'setup_tel'=>$model -> setup_tel,
    //'activated'=> $model->activated,
    //'ip_address'=> $model -> ip_address,
    //'fw_version'=>$model->fw_version,
    'tags'=>$model->getListTags(),
    //'geo_lat',
    //'geo_long',
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $data,
//    'attributes' => array(
//        array('name' => 'firstName', 'label' => 'First name'),
//        array('name' => 'lastName', 'label' => 'Last name'),
//        array('name' => 'language', 'label' => 'Language'),
//    ),
    'htmlOptions' => array('style' => 'float:left; width: 600px;')
));
?>
<div class="clearfix"></div>
