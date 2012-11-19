

<?php
//$this->widget('bootstrap.widgets.TbListView', array(
//    'dataProvider' => $dataProvider,
//    'itemView' => '_view',
//));
?>

<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>
<div id="map" style="height: 600px; width: 600px; float:left; margin-right: 20px"></div>

<div class="input" style="float:right; width: 300px" >
    <input type="text" id="chosenAP">
    <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Collapsible Group Item #1
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
</div>
</div>
<script>
    function onMarkerDblClick(e) {
            //alert (123);
            this.closePopup();
            console.log (this.id);
            this.setOpacity(0.1);
            $("#chosenAP").val($("#chosenAP").val()+this.id+";")
    }
    
    var mymarker = L.Marker.extend({
    setId: function (id){
        this.id = id;
        return this;
    },
    
    getId: function () {
        return this.id;
    },
    
    setGroup: function (groupId)
    {
      this.group = groupId;
      return this;
    },
    
    getGroup: function ()
    {
        return this.group;
    }

    
});

    var map = L.map('map', {
        center: [55.75, 37.62],
        zoom: 13,
        dragging: true,
        scrollWheelZoom: true,
        doubleClickZoom: false
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
            echo "var my_marker_$ap->id = new mymarker($latlng);";
            echo " my_marker_$ap->id.setId($ap->id).addTo(map).bindPopup('$popup').on('dblclick', onMarkerDblClick);";
            //echo "L;";
        }
    ?> 
    
    $(function() {
        // run the currently selected effect
        function runEffect() {
        
    };
        // set effect from select menu value
        $( "#button" ).click(function() {
            runEffect();
            return false;
        });
    });
//    var one = L.layerGroup([a, b, c]);
//    var two = L.layerGroup([a, d]);
//    map.addLayer(one);
//    map.addLayer(two);
    
        

</script>

