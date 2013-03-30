<script  type="text/javascript">
    
 
function changeBg (resp)
{
    //console.log(resp);
    if (resp.success)
    {
        var path = resp.filename;
        var bg = document.getElementById("bg");
        $("#Advcomp_background").val(path);
        bg.src = path;
        var color="";
        if (resp.red.length<2)
            var color = color+"0";
        var color = color+ resp.red;
        if (resp.green.length<2)
            var color = color+ "0";
         var color = color+ resp.green;
         if (resp.blue.length<2)
            var color = color+ "0";
         var color = color+ resp.blue;
            
        $('#Advcomp_bg_color').val(color);
        $("#virtualScreen").css('background-color','#'+color);
    }
    else 
        {
            alert (resp.msg);
        }
}
    
function BgColorChange()
{
    var val = $('#Advcomp_bg_color').val();
    //var bg = document.getElementById("bg");
    $("#virtualScreen").css('background-color','#'+val);
}
    
function marginChange ()
{
    var val =  parseInt($('#Advcomp_margin_top').val());
    console.log(val);
    if ((val>=100) && (val<=300))
    {
        $('#startPageContent').css('top',(val/2)+'px');
        console.log(val/2+'px');
    }
};


</script>

<div id="virtualScreen" lass="container-background" 
     style="width:960px; height: 540px; 
            border: 1px solid; margin: 0 auto; 
            position: relative; 
            background-color: 
                <?php 
                if ($model->background)
                    echo "#".$model->bg_color;
                else echo "#d5d5d5"
             ?>; 
            margin-bottom: 20px;">
    <img src="
         <?php 
            if ($model->background)
                echo $model->background;
            else echo "images/noBrand.jpg"
         ?>
         " style="width: 100%;  position: absolute;" id="bg">
    <div id ="startPageContent" 
        style="position: relative;
                width: 450px;
                height: 327px;
                top: <?php echo $model->margin_top/2; ?>px;
                left: 255px;
                    ">
            <img src="images\startPageWithBanners.jpg" >
            <img id="topBannerImg" 
                 src="<?php if ($model->banner1) echo $model->banner1;?>" 
                 style="position:absolute; top: 42px;left: 43px; width: 82%;">
            <img id="downBannerImg" 
                 src="<?php if ($model->banner2) echo $model->banner2;?>" 
                 style="position:absolute; top: 252px; left: 43px; width: 82%;">
    </div>
</div>
<p>Дополнительные параметры:</p>
<?php echo $form->textFieldRow($model, 'bg_color', array('prepend' => '#', 'onChange' => "BgColorChange()")); ?>
<?php echo $form->textFieldRow($model, 'margin_top', array('append' => 'px', 'onChange' => "marginChange()", 'hint' => "Отступ сверху для блока с информацией. >100 <300")); ?>

