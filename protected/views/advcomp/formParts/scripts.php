<script>
    var nodesOfCity = <?php echo json_encode($citiesSelect); ?>;
    var nodesOfTag = <?php echo json_encode($tagsSelect); ?>;
    var selectedNodes = [];
    $(document).ready(function() {
       filter();
    });
    function appendPoint()
    {   
        selectedNodes = [];
        for(var id in markers)
            {
                if (markers[id].check)
                    selectedNodes.push(markers[id].getId());
            }
        //$("#chosenAP").val("");
        $("#Advcomp_selectedPoint").val(selectedNodes.join());
        $("#counter").text(selectedNodes.length);
    }
    
    function compareCondition (nodeParam, selectedSet)
    {
       
        if (selectedSet == null) 
            return true;
        if (nodeParam instanceof Array)
        {
            console.log (nodeParam);
            //console.log (selectedSet);
            //var NodeTags = nodeParam;
            //var selectedTags = selectedSet;
            for (var tagId in nodeParam)
            {
                var currentTagOfNode = nodeParam[tagId];
                if (selectedSet.indexOf(String(currentTagOfNode))!=-1)
                {
                    // console.log ("inarray");
                    return true;
                }
            }
            return false;
        }
        else 
        {
            //console.log (selectedSet);
            //console.log(nodeParam);
            if (selectedSet.indexOf(String(nodeParam))!=-1)
            {
                //console.log ("inarray");
                return true;
            }
                    
            else
                return false
        }
    }
    
    function unselectAll()
    {
        for (var nodeId in markers) {
            var currentNode = markers [nodeId];
            currentNode.checkOff();
        }
    }
   
    function filter ()
    {
        var selectedCities = $("#cities").val();
        var selectedTags = $("#tags").val();
        
        if (selectedCities==null && selectedTags==null){
            unselectAll();
            return;
        }
        
        for (var nodeId in markers) {
            var currentNode = markers [nodeId];
            var compare = compareCondition(currentNode.getCity(), selectedCities) && 
                compareCondition(currentNode.getTags(), selectedTags);
            if (compare) currentNode.checkOn()
            else currentNode.checkOff();
        }
        appendPoint();
        //console.log(selectedCities);
        
    }
    function currentSelect (nodeId)
    {
       
        if ($("#cities").val()!=null || $("#tags").val()!=null){
            $("#cities option:selected").removeAttr("selected");
            $('#cities').trigger('liszt:updated');
            $("#tags option:selected").removeAttr("selected");
            $('#tags').trigger('liszt:updated');
            unselectAll();
        }
        
        
        selectedNodes = [];
        var currentMarker = markers [nodeId];
        (currentMarker.check)? currentMarker.checkOff() : currentMarker.checkOn();
        appendPoint();
        //console.log(currentMarker, nodeId, currentMarker.getCheck());
        
    }
    $("#cities").chosen(); 
    $("#cities").change(function () {filter();});
    $("#tags").chosen(); 
    $("#tags").change(function () {filter();});
    
    
    var IconSelect = L.icon({
        iconUrl: 'http://wi-fi/images/marker-icon-select.png',
        iconAnchor: [12, 41],
        popupAnchor: [0, -40]
    });
    var IconDefault = L.icon({
        iconUrl: 'http://wi-fi/images/marker-icon.png',
        iconAnchor: [12, 41],
        popupAnchor: [0, -40]
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
        
        
        this.closePopup();
        currentSelect(this.id);
        
    }
    
    var mymarker = L.Marker.extend({
        check: false,
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
            return this;
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
            return this;
        },
        
        getTags: function ()
        {
            return this.tags;
        },
        
        setTags: function (tags)
        {
            this.tags = tags;
            return this;
        }
        
    });

    var map = L.map('map', {
        center: [55.755, 37.60],
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
for ($i = 0; $i < count($all); $i++) {
//for ($i = 0; $i < 3; $i++) {
    $ap = $all[$i];
    //echo "var tags = ". json_encode($ap->getTags()). ";";
    $tags = json_encode($ap->getTags());
    $latlng = "[$ap->geo_lat, $ap->geo_long]";
    $popup = "$ap->hostname<br>$ap->setup_address<br>" . CHtml::link("Детальнее", Yii::app()->createUrl("node/view", array('id' => $ap->id)));
    // echo "var my_marker_$ap->id = new mymarker($latlng).setId($ap->id).bindPopup('$popup').on('dblclick', onMarkerDblClick).addTo(map);";
    echo "markers[$ap->id] = new mymarker($latlng, {icon: IconDefault})." .
    "setId($ap->id)." .
    "setCity($ap->city)." .
    "bindPopup('$popup')." .
    "setTags($tags)." .
    //"checkOn().".
    "on('dblclick', onMarkerDblClick)." .
    //"on('mouseover', onMarkerMouseOver).".
    //"on('mouseout', onMouseOut)".
    "addTo(map);";
    //echo json_encode();
}
?> 
  
</script>