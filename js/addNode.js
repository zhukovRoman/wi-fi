/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(function($){

    $("#Node_area").change(function () {       
        $selected = $("#Node_area option:selected");
        if($selected.val()!=0)
        {
            //если выбрали не первый пункт --выберите """""" --
            $("#Node_area option[value=0]").remove();
            //alert ($selected.text());
            $.ajax({
                url: 'index.php?r=node/selectArea',
                data:"select="+$selected.val(),
                type: 'POST',
                success: function(data) {
                    addDistrict (data);
                },
                error: function(data) {
                    alert ("error");
                }
            });
        }
              
               
    });
    function addDistrict (data)
    {
        var resp = $.parseJSON(data);
        if (resp.count!=0)
        {
            //показываем поле и добавляем элементы
            $("#Node_district").html(resp.html);
            //$("#Node_district").removeAttribute('disabled');
            //document.getElementById("Node_district").removeAttribute("disable");
        }
        else {
           // $("#Node_district").createAttribute('disabled');
            //$("#Node_district").attr("disabled", "disabled");
        }
    }

//    $("#Node_country").change(function () {       
//        $selected = $("#Node_country option:selected");
//        if($selected.val()!=0)
//        {
//            //если выбрали не первый пункт --выберите """""" --
//            $("#Node_country option[value=0]").remove();
//            alert ($selected.text());
//            $.ajax({
//                url: 'index.php?r=node/selectCountry',
//                data:"select="+$selected.val(),
//                type: 'POST',
//                success: function(data) {addRegions (data);},
//                error: function(data) {alert ("error");}
//            });
//        }
//              
//               
//    });
//    
//    function addRegions (data)
//    {
//        var resp = $.parseJSON(data);
//        if (resp.count!=0)
//            {
//                //показываем поле и добавляем элементы
//                $("#Node_region").html(resp.html);
//                $("#dropDownRegion").show();
//            }
//    }
       
});
