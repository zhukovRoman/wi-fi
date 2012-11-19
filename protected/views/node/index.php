

<?php
//$this->widget('bootstrap.widgets.TbListView', array(
//    'dataProvider' => $dataProvider,
//    'itemView' => '_view',
//));
?>

<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>
<div id="map" style="height: 600px; width: 600px; float:left; margin-right: 20px"></div>

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
    
    <?php 
        foreach ($all as $ap)
        {
            $latlng = "[$ap->geo_lat, $ap->geo_long]";
            $popup = "$ap->hostname<br>$ap->setup_address<br>".  CHtml::link("Детальнее", Yii::app()->createUrl("node/view", array('id'=>$ap->id)));
            echo "L.marker($latlng).addTo(map).bindPopup('$popup');";
            
        }
    ?>
      

</script>