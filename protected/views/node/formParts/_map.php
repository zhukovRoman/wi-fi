<div id="map" style="height: 300px; width: 600px;"></div>

<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>
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