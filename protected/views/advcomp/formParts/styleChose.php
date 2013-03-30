<?php 
$styles = array (
    'standart'=>'Стандартная',
    'pink'=>'Розовая',
    'green'=>'Зеленая',
    'yellow'=>'Желтая',
    'blue'=>'Синяя',
);
echo $form->dropDownListRow($model, 'css', $styles); ?>

<img src="images/standartStyle.jpg" id ="standart" class="style-example">
<img src="images/pinkStyle.jpg" id ="pink" class="hide style-example">
<img src="images/greenStyle.jpg" id ="green" class="hide style-example">
<img src="images/yellowStyle.jpg" id ="yellow" class="hide style-example">
<img src="images/blueStyle.jpg" id ="blue" class="hide style-example">

<script type="text/javascript">
    $('#Advcomp_css').change(function () {
        //alert (this.val());
        var sel = $('#Advcomp_css option:selected').val();
        $('.style-example').each(function () {
           
            $(this).addClass("hide");
        });
        $('#'+sel).removeClass("hide");
    });
    
    
    $(document).ready(function() {
      
       
        //$("#ifNoNeedTopBanner").hide();
        //$("#noNeedTopBanner").attr('checked', 'checked');
       
        var sel = $('#Advcomp_css option:selected').val();
        $('.style-example').each(function () {
           
            $(this).addClass("hide");
        });
        $('#'+sel).removeClass("hide");
    });
</script>