

<?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/css/multiselect/multi-select.css'); ?>
<select multiple="multiple" id="cities" name="cities[]" data-placeholder="Выберите город...">
    <?php 
        foreach ($cities as $city)
        {
            echo "<option value='$city->id'>" . $city->name . "</option>";
        }
    ?>
</select>
<br>
<select multiple="multiple" id="tags" name="tags[]" data-placeholder="Добавьте фильтр...">
    <?php 
        foreach ($tags as $tag)
        {
            echo "<option value='$tag->id'>" . $tag->text . "</option>";
        }
    ?>
</select>
<!--<a href='#' id='deselect-all'>Убрать все</a>-->
<hr>
<script>
    var nodesOfCity = <?php echo json_encode($citiesSelect);?>;
    var nodesOfTag = <?php echo json_encode($tagsSelect);?>;
    var selectedNodes = [];
    
    function filter ()
    {
        //сброс фильтра
        selectedNodes = [];
        for (m in markers)
            {
                markers[m].checkOff();
                selectedNodes[selectedNodes.length]=markers[m];
                //markers[m].checkOn();
            }
        
        
        //добавляем все фильтры
        var selectedCities = $("#cities").val();
        //selectedNodes =  cityFilter (selectedCities);
        var toAdd = paramFilter(selectedCities, nodesOfCity);
        selectedNodes = arrayMerge(selectedNodes, toAdd);
        
        var selectedTags = $("#tags").val();
        toAdd = paramFilter (selectedTags, nodesOfTag);
        
        selectedNodes = arrayMerge(selectedNodes, toAdd);
        
        console.log (selectedNodes);
        for (id in selectedNodes)
            {
                selectedNodes[id].checkOn();
                console.log(selectedNodes[id]);
            }
    }
    function paramFilter (selected, HashMap)
    {
         //console.log(selected);
         var res = [];
         for (tmpId in selected)
         {
            var cityId = selected[tmpId];
            //console.log("=========="+cityId+"=============")
            for (id in HashMap[cityId])
              {
                  //console.log("Выделяем следующие точки:"+nodesOfCity[cityId][id]);
                  res[res.length] =  markers[HashMap[cityId][id]];
              }
         }
         //console.log(res);
         return res;
    }
    
    function arrayMerge(selected, toAdd)
    {
        //console.log (selected);
        //console.log(toAdd);
       
        if (toAdd.length == 0)
                return selected;
        var res = [];
        for (ids in selected)
            {
                var currentMarkerCheck = selected[ids];
                for (idm in toAdd)
                    {
                        var currentToAdd = toAdd[idm];
                        if (currentToAdd.getId()==currentMarkerCheck.getId())
                            res[res.length]=currentMarkerCheck;
                    }
            }
        //console.log(res);
        return res;
    }
    
    $("#cities").chosen(); 
    $("#cities").change(function () {filter();});
    $("#tags").chosen(); 
    $("#tags").change(function () {filter();});
</script>

<?php Yii::app()->getClientScript()->registerScriptFile('http://cdn.leafletjs.com/leaflet-0.4/leaflet.js', CClientScript::POS_HEAD); ?>
<div id="map" style="height: 600px; width: 600px; float:left; margin-right: 20px; margin-top:20px;"></div>

<div class="input" style="float:right; width: 300px" >
    <input type="text" id="chosenAP">
</div>
<script>
    
    var IconSelect = L.icon({
        iconUrl: 'http://wi-fi/images/marker-icon-select.png',
        iconAnchor: [22, 63]
    });
    var IconDefault = L.icon({
        iconUrl: 'http://wi-fi/images/marker-icon.png',
        iconAnchor: [22, 63]
    });
    
    function onMarkerMouseOver(e)
    {
        this.openPopup();
    }
    
    function onMouseOut (e)
    {
        this.closePopup();
    }
    
    function onMarkerDblClick(e) {
            //alert (123);
            this.closePopup();
            console.log (this.id);
            //this.setOpacity(0.1);
            this.checkOn();
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
    },

    setCheck: function () {
        this.check = true;
        return this;
    },
    
    getCheck: function () {
        return this.check;
    },
    setCity: function (cityId)
    {
        this.city=cityId;
        return this;
    },
    getCity: function() {
        return this.city;
    },
    
    checkOn: function ()
    {
        if (!this.check)
                {
                    this.setIcon(IconSelect);
                    this.check = true;
                }   
    },
    
    checkOff: function ()
    {
      
      if (this.check)
          {
               //this.setIcon(new L.Icon.Default());
               this.setIcon(IconDefault);
               this.check = false;
               //this.update();
          }
    }
});

    var map = L.map('map', {
        center: [55.76, 37.56],
        zoom: 12,
        dragging: true,
        scrollWheelZoom: true,
        doubleClickZoom: false
    });

    L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
    }).addTo(map);
    var markers = [];

    <?php 
        for ( $i = 0; $i<count($all); $i++)
        {
            $ap = $all[$i];
            $latlng = "[$ap->geo_lat, $ap->geo_long]";
            $popup = "$ap->hostname<br>$ap->setup_address<br>".CHtml::link("Детальнее", Yii::app()->createUrl("node/view", array('id'=>$ap->id)));
           // echo "var my_marker_$ap->id = new mymarker($latlng).setId($ap->id).bindPopup('$popup').on('dblclick', onMarkerDblClick).addTo(map);";
            echo "markers[$ap->id] = new mymarker($latlng, {icon: IconDefault}).setId($ap->id).".
                                            "setCity($ap->city).bindPopup('$popup').".
                                            "on('dblclick', onMarkerDblClick).".
                                            //"on('mouseover', onMarkerMouseOver).".
                                             //"on('mouseout', onMouseOut)".
                                                                "addTo(map);";
        }
    ?> 
  
</script>

